<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        if(Category::where('status', 'show')->count() == 0){
            $categoris = Category::latest()->limit(3)->get();
        }
        else{
            $categoris = Category::where('status', 'show')->get();
        }

        $all_products = Product::all();

        return view('frontend.index', compact('categoris', 'all_products'));
    }

    public function productdetails($slug){


        $related_products = Product::where('slug', '!=', $slug)->where('category_id', Product::where('slug', $slug)->firstOrFail()->category_id)->get();
        $categoris = Category::all();
        $products = Product::where('slug', $slug)->first();

        //echo $product;
        return view('frontend.productdetails', compact('categoris', 'products', 'related_products'));
    }

    public function categorywish($id){
        $category = Category::find($id)->category_name;
       $category_wishs =  Product::where('category_id', $id)->get();
       $all_product = Product::count();


       return view('frontend.categorywish', compact('category_wishs', 'all_product', 'category'));
    }
}
