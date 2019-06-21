<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\Payment;
use App\Book;
use App\ContactUs;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //return view('admin.dashboard');
        return view('admin.dashboard');
    }

    public function indexVerify()
    {
        $payments = Payment::all();
        $books = Book::all();
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
        // dd($history);
        return view('admin.verify', compact('payments','history'));
    }

    public function storeVerify(Request $request, $book_id)
    {
        $books = Book::where('book_id', $book_id)->get();
        foreach($books as $book){
            $book->status = "Paid";
            $book->save();
        }
        return redirect('admin/verify');
    }

    public function indexHistoryTransactions()
    {
        $payments = Payment::all();
        $books = Book::all();
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
        // dd($history);
        return view('admin.history-transactions', compact('payments','history'));
    }

    public function indexContactUs()
    {
        $contacts = ContactUs::all();
        return view('admin.contact-us', compact('contacts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}