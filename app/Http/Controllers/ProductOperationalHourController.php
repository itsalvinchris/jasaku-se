<?php

namespace App\Http\Controllers;

use App\ProductOperationalHour;
use App\Product;
use Illuminate\Http\Request;
use DB;

class ProductOperationalHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\ProductOperationalHour  $productOperationalHour
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOperationalHour $productOperationalHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductOperationalHour  $productOperationalHour
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOperationalHour $productOperationalHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductOperationalHour  $productOperationalHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOperationalHour $productOperationalHour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductOperationalHour  $productOperationalHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOperationalHour $productOperationalHour)
    {
        //
    }

    public function getSchedule(Request $request,$id){
        date_default_timezone_set("Asia/Jakarta");
        $date = date("d-m-Y",strtotime($request->date));
        // $date = $request->date;
        // dd($date);
        $field = $id;
        $currDate = date("d-n-Y");
        $time = date("G");
        $day = date("l", strtotime($date));
        $day = date('N', strtotime($day));
        
        $user = Product::find($id);
        $opening = ProductOperationalHour::where('product_id',$id)->where('day',$day)->first();
        if(strtotime($date) < strtotime($currDate)){
            return 'Tidak bisa booking di hari tersebut';
        }
        // else if(!$opening){
        //     return 'Silahkan mengisi data jam operasional terlebih dahulu';
        // }
        // else if(sizeof($user->schedule_header()->get()) == 0){
        //     return 'Silahkan mengisi data lapangan terlebih dahulu';
        // }
        else if($opening->hour == "00.00 - 00.00"){
            return 'Closed!';
        }
        $book = DB::table('products')
                    ->join('books', 'books.product_id', '=', 'products.id')
                    ->get();
        
        $div = (int)substr($opening->hour, strlen($opening->hour)-5,2) - (int)substr($opening->hour,0,2);
        
        // dd($div);
        $books = array();
        for($j = 0 ; $j < $div; $j++){
            if(strtotime($date) == strtotime($currDate) && ($time+1 > (int)substr($opening->hour,0,2) + $j)){
                $books[$j]['status'] = 'v';
            }
            else{
                $books[$j]['status'] = 'x';
            }
            
            $books[$j]['hour'] = ((int)substr($opening->hour,0,2) + $j).".00-".((int)substr($opening->hour,0,2) + $j +1).".00";
        }
       
        // $date = substr($date, strlen($date)-2, 2);
        
        for($j = 0 ; $j < $div ; $j++){
            for($k = 0 ; $k < sizeOf($book) ; $k++){
                
                $checkHour = (int)substr($book[$k]->hour,0,2) - (int)substr($opening->hour,0,2);
                
                $checkDay = (int)substr($book[$k]->date,0,2) - 1;
                
                if($checkHour == $j && $book[$k]->product_id == $field && $book[$k]->date == $date){
                
                    $books[$j]['status'] = 'v';
                    
                }
            }
        }
        $books = json_decode(json_encode($books));
        return $books;
    }
}
