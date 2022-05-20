<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkout(){



        if(strpos(url()->previous(), "cart") || strpos(url()->previous(), "checkout")){
            $countries = Country::where('status', 'active')->get(['id', 'name']);

            return view('frontend.checkout.index', compact('countries'));
        }else{
            return abort('404');
        }

    }
    public function checkout_store(Request $request){
        return $request;

    }
    public function checkout_get(Request $request){

        $show_name = "<option value=''>--Please select a City--</option>";

      foreach(City::where('country_id', $request->country_id)->get(['id', 'name']) as $city){
        $show_name .="<option value='$city->id'>$city->name</option>";

      }
      echo $show_name;
    }

}
