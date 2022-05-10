<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function insert($wishlist_id){

        //die();
       $vendor_id = Product::find(Wishlist::find($wishlist_id)->product_id)->user_id;

        if(Cart::where('user_id', auth()->id())->where('product_id', Wishlist::find($wishlist_id)->product_id)->exists()){
             Cart::where('user_id', auth()->id())->where('product_id', Wishlist::find($wishlist_id)->product_id)->increment('amount', 1);
        }
        else{
            Cart::insert([
                'user_id'=> auth()->id(),
                'product_id'=> Wishlist::find($wishlist_id)->product_id,
                'vendor_id'=>$vendor_id,
                'created_at'=>Carbon::now()
              ]);
        }

      Wishlist::find($wishlist_id)->delete();
      return back();
    }
}
