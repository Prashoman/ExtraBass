<?php

use App\Models\Cart;
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









?>
