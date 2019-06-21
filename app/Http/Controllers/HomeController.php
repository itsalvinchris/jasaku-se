<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ContactUs;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::take(6)->get();
        //$categories = $categories->get(6);
        return view('welcome',compact('categories'));
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function productList()
    {   
        //dd(Input::all());
        if(Input::get('category')){
            $category_input = Input::get('category');
            $category = Category::where('categories', $category_input)->first();
            //dd($category_id);
            if($category){
                $products = Product::where('category_id',$category->id)->get();
                return view('product-list',compact('products','category'));
            } else {
                $products = [];
                $status = 'Product Not Found';
                return view('product-list',compact('products','status'));
            }
        } else{
            $products = Product::all();
            return view('product-list',compact('products'));
        }
    }

    public function getBuy($id)
    {
        $p_id = $id;
        $product = Product::where('id',$id)->first();
        return view('buy-view',compact('p_id','product'));
    }

    public function storeContactUs(Request $request)
    {
        $contact_us = new ContactUs();
        $contact_us->name = $request->name;
        $contact_us->email = $request->email;
        $contact_us->message = $request->message;
        $contact_us->save();
        return redirect('/contact-us');
    }
}
