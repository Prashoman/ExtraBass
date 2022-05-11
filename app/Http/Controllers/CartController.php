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

    public function addcart(Request $request, $product_id){


        if(Cart::where('user_id', auth()->id())->where('product_id', $product_id)->exists()){
            Cart::where('user_id', auth()->id())->where('product_id', $product_id)->increment('amount', $request->qtybutton);
       }
       else{
        Cart::insert([
            'user_id'=> auth()->id(),
            'vendor_id'=>Product::find($product_id)->user_id,
            'product_id'=>$product_id,
            'amount'=>$request->qtybutton,
            'created_at'=> Carbon::now(),
        ]);
       }
       return back();



    }
    public function viewcart(){
        return view('frontend.cart.index');
    }
    public function romovecart($id){
        Cart::find($id)->delete();
        return back();
    }
    public function allcartremove($user_id){
      Cart::where('user_id', $user_id)->delete();
      return back();

    }
}
