<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App;
use App\ProductOperationalHour;
use Auth;
use Carbon\Carbon;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $a = ProductOperationalHour::all();
        $check = sizeof($a);
        $hours = array();
        $dayOfWeek = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        for($i = 0 ; $i < sizeof($a) ; $i++){
            $hours[$i]['day'] = $dayOfWeek[$i%7];
            
            if($a[$i]->hour == "closed"){
                $hours[$i]['open'] = "closed";
                $hours[$i]['closed'] = "closed";
            }
            else{
                $hours[$i]['open'] = substr($a[$i]->hour,0,5);
                $hours[$i]['closed'] = substr($a[$i]->hour,strlen($a[$i]->hour)-5,5);
            }
        }
        $dailies = array(
            '00.00','01.00','02.00','03.00','04.00','05.00',
            '06.00','07.00','08.00','09.00','10.00','11.00',
            '12.00','13.00','14.00','15.00','16.00','17.00',
            '18.00','19.00','20.00','21.00','22.00','23.00',
            'closed'
        );
        return view('admin.dashboard',compact('products','hours','dailies','check'));
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
        //dd($request->all());

        $product = new Product();
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->person_name = $request->person_name;
        $file_name = Carbon::now()->timestamp.'.'.$request->images->extension();
        Storage::disk('local')->put('public/product_images/'.$file_name, file_get_contents($request->images));
        $product->images = 'product_images/'.$file_name;
        $product->save();

        for ($i=0; $i < 7; $i++) {
            if($request->input('dayIn'.($i+1))== "closed"){
                $newHour = "closed";
            }
            else{
                $newHour = $request->input('dayIn'.($i+1))." - ".$request->input('dayOut'.($i+1));
            }
            $hour = new ProductOperationalHour;
            $hour->product_id = $product->id;
            $hour->day = $i+1;
            $hour->hour = $newHour;
            $hour->save();
        }

        if(App::getLocale() == 'id'){
            return back()->with('status','Data Berhasil Simpan');
        }else{
            return back()->with('status','Data Has Been Successfully Saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrfail($id);
        Storage::disk('local')->delete('public'.$product->images);
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->person_name = $request->person_name;
        $file_name = Carbon::now()->timestamp.'.'.$request->images->extension();
        Storage::disk('local')->put('public/product_images/'.$file_name, file_get_contents($request->images));
        $product->images = 'product_images/'.$file_name;
        $product->update();

        $hour = ProductOperationalHour::where('product_id',$id)->get();
        for ($i=0; $i < 7; $i++) {
            if($request->input('dayIn'.($i+1))== "closed"){
                $newHour = "closed";
            }
            else{
                $newHour = $request->input('dayIn'.($i+1))."-".$request->input('dayOut'.($i+1));
            }
            
            $hours = ProductOperationalHour::find($hour[$i]->id);
            $hours->product_id = $product->id;
            $hours->hour = $newHour;
            $hours->save();
        }

        if(App::getLocale() == 'id'){
            return back()->with('status','Data Berhasil Disunting');
        }else{
            return back()->with('status','Data Has Been Successfully Edited');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrfail($id);
        $product->delete();
        if(App::getLocale() == 'id'){
            return back()->with('status','Data Berhasil Dihapus');
        }else{
            return back()->with('status','Data Has Been Successfully Deleted');
        }
    }


}
