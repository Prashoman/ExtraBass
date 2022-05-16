<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkout(){
        if(strpos(url()->previous(), "cart")){
            return view('frontend.checkout.index');
        }else{
            return abort('404');
        }

    }

}
