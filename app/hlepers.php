<?php

use App\Models\Cart;
use App\Models\Rating;
use App\Models\User;

 function wishlists(){
return App\Models\Wishlist::where('user_id', auth()->id())->get();
}
function VendorName($all_product){
    return App\Models\User::find($all_product->user_id)->name;
    }
    function CartallProduct(){
        return App\Models\Cart::where('user_id', auth()->id())->get();
    }
    function TotalProduct(){
        return App\Models\Cart::where('user_id', auth()->id())->count();
    }
    function CartvendorName($product_id){

        return User::where('id', Cart::find($product_id)->vendor_id)->first()->name;
    }
    function RtingProduct($product_id){

        return Rating::where('product_id', $product_id)->avg('rate');

    }
    function ReviewProduct($product_id){

        //return Rating::where('product_id', $product_id)->count();
        if(Rating::where('product_id', $product_id)->count() >=2){
            return Rating::where('product_id', $product_id)->count(). " Reviews";
        }
        else{
            return Rating::where('product_id', $product_id)->count(). " Review";
        }

    }









?>
