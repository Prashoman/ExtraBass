<?php

namespace App\Http\Controllers;

use App\Models\Biling_details;
use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\Cupon;
use App\Models\Order_detail;
use App\Models\Order_summery;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $request->validate([
            '*' => 'required',
            'city' =>'required',

            'message' => 'nullable'
        ]);


        $order_summery_id = Order_summery::insertGetId([
            'user_id' => auth()->id(),
            'cupon_name' => session('cupon_name'),
            'cart_total' => session('Total_price'),
            'discount' => session('discount_price'),
            'sub_total' =>round(session('Total_price') - session('discount_price')),
            'shiping' => 30,
            'grand_total' => round(session('Total_price') - session('discount_price')+30),
            'payment_option' => $request->payment_way,
            'created_at' => Carbon::now(),
        ]);


        Biling_details::insert([

            'summery_id' => $order_summery_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'post_code' => $request->postcode,
            'order_note' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        foreach(CartallProduct() as $cart){
            Order_detail::insert([
                'summery_id' => $order_summery_id,
                'vendor_id' => $cart->vendor_id,
                'product_id' => $cart->product_id,
                'amount' => $cart->amount,
                'created_at' => Carbon::now(),
            ]);
            Product::find($cart->product_id)->decrement('quentity', $cart->amount);

            Cart::find($cart->id)->delete();
        }
        if(session('cupon_name')){
            Cupon::where('cupon_name', session('cupon_name'))->decrement('limit', 1);
        }




        if($request->payment_way == 1){
            return redirect('home')->with('success_payment', 'Purchase Completed SuccessFull.');
        }
        else{

            Session::put('S_order_summery_id',$order_summery_id);
            return redirect('/pay');
        }



    }
    public function checkout_get(Request $request){

        $show_name = "<option value=''>--Please select a City--</option>";

      foreach(City::where('country_id', $request->country_id)->get(['id', 'name']) as $city){
        $show_name .="<option value='$city->id'>$city->name</option>";

      }
      echo $show_name;
    }

}
