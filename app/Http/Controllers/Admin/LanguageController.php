<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class LanguageController extends Controller
{
    public function __contruct(){
        $this->middleware('auth:admin');
    }

    public function changeLang($locale){
        if(Session::has('locale')){
            Session::forget('locale');
        }
        Session::put('locale',$locale);
        return back();
    }
}
