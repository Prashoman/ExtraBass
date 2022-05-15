<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cupon;
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


        if($request->qtybutton > Product::find($product_id)->quentity){
            return back()->with('stockout', 'This product Stock Out.');
        }else{
            if(Cart::where('user_id', auth()->id())->where('product_id', $product_id)->exists()){


                if((Cart::where('user_id', auth()->id())->where('product_id', $product_id)->first()->amount + $request->qtybutton) > (Product::find($product_id)->quentity)){
                    return back()->with('stockout', 'This product Now all ready Cart.');
                }else{
                    Cart::where('user_id', auth()->id())->where('product_id', $product_id)->increment('amount', $request->qtybutton);
                }
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
        }


       return back();



    }
    public function viewcart(){

        if(isset($_GET['coupon_name'])){
            if($_GET['coupon_name']){
                $cupon_name = $_GET['coupon_name'];
                if(Cupon::where('cupon_name', $cupon_name)->exists()){
                    if(Cupon::where('cupon_name', $cupon_name)->first()->limit > 0){

                        if(Carbon::now()->format('Y-m-d') <= Cupon::where('cupon_name', $cupon_name)->first()->validatey){

                            $discount = Cupon::where('cupon_name', $cupon_name)->first()->discount;
                            $discount_price = (session('Total_price')*$discount)/100;

                        }else{

                            $discount_price = 0;
                            return redirect('cart')->with('cupon_erorr', 'This Cupon Date is Over');
                        }
                    }else{

                        $discount_price = 0;
                        return redirect('cart')->with('cupon_erorr', 'This Cupon limit is Over');
                    }
                }else{

                    $discount_price = 0;
                    return redirect('cart')->with('cupon_erorr', 'This Cupon not my Platform Record');
                }

            }else
            {

                $discount_price = 0;
            }
        }else{
                $cupon_name ="";
                $discount_price = 0;

        }

        return view('frontend.cart.index', compact('cupon_name','discount_price') );
    }
    public function romovecart($id){
        Cart::find($id)->delete();
        return back();
    }
    public function allcartremove($user_id){
      Cart::where('user_id', $user_id)->delete();
      return back();

    }
    public function updatecart(Request $request){
        foreach($request->qtybutton as $cart_id => $cartvalue){
        Cart::find($cart_id)->update([
            'amount' => $cartvalue
        ]);
        }
        return back();
    }
}
