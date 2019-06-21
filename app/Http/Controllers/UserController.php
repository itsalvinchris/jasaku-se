<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Book;
use Auth;
use Str;
use Carbon\Carbon;
use App\Payment;
use Storage;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home',compact('products'));
    }

    public function getBook($id)
    {
        $p_id = $id;
        
        return view('buy',compact('p_id'));
    }

    public function storeBook(Request $request, $id)
    {
        $hours = $request->input('time-book');
        //dd(Str::random(20).Carbon::now()->timestamp);
        $id_book = Str::random(20).Carbon::now()->timestamp;
        foreach($hours as $hour){
            $a = $request->all();
            $newDate = date("d-m-Y", strtotime($a['date']));
            $newDay = date("l", strtotime($a['date']));

            $book = new Book;
            $book->book_id = $id_book;
            $book->product_id = $id;
            $book->user_id = Auth::user()->id;

            $book->day = $newDay;
            $book->date = $newDate;
            $book->hour = $hour;
            $book->status = "Not paid";
            $book->save();  
            
        }
        return redirect('/history');
    }

    public function getAllHistory(){
        $books = Book::where('user_id', Auth::user()->id)->get();
        $history = array();
        //dd(count($history));

        for($i=0 ; $i<count($books) ; $i++){
            if(count($history) == 0){
                array_push($history,$books[$i]);
            } else if($history[count($history)-1]->book_id == $books[$i]->book_id){
                $hour_history = $history[count($history)-1]->hour;
                $hour_history_split = explode("-",$hour_history);

                $hour_now_split = explode("-",$books[$i]->hour);
                $history[count($history)-1]->hour = $hour_history_split[0].'-'.$hour_now_split[1];
            } else{
                array_push($history,$books[$i]);
            }
        }
        //$history = collect($history);
        //dd($history);
        //dd($history[0]->id);
        return view('history',compact('history'));
    }

    public function storePaymentReceipt(Request $request, $id){
        $payment = new Payment;
        $payment->book_id = $id;
        $payment->payment_bank = $request->paymet_bank_name;
        $payment->payment_date = $request->paymet_bank_date;
        $payment->payment_receipt_number = $request->paymet_bank_receipt_number;
        $file_name = $id.Str::random(5).'.'.$request->payment_receipt->extension();
        Storage::disk('local')->put('public/payment_receipt/'.$file_name, file_get_contents($request->payment_receipt));
        $payment->payment_receipt_image = 'payment_receipt/'.$file_name;
        $payment->save();
        $books = Book::where('book_id',$id)->get();
        foreach($books as $book){
            $book->status = "On Payment Review";
            $book->save();
        }
        //$books->save();
        return redirect('/history');
    }
}
