<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_thanbail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stringable;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $categoris = Category::where('status', 'show')->get();
        return view('admin.product.index', compact('categoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor_products = Product::where('user_id', auth()->id())->get();
        //echo $vendor_products;
        return view('admin.product.show', compact('vendor_products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->file('product_thanbails'));

        // foreach($request->file('product_thanbails') as $thanbails){

        //      $photo_name_thanbails ='badhon'.'-'.Str::random(4).'.'.$thanbails->getClientOriginalExtension();
        //     echo $photo_name_thanbails;

        // }
        // die();
    //     die();


        $request->validate([
            'category_id' => 'required',
        ]);

        $product_photo = $request->file('product_photo');

        $photo_name =auth()->user()->id.'-'. Str::slug($request->product_name).'-'.Str::random(3).'.'.$product_photo->getClientOriginalExtension();
        // echo $photo_name;
        // die;

    //     if(auth()->user()->profile_photo != 'default.png'){
    //         unlink(base_path('public/uploads/profile_photos/'.auth()->user()->profile_photo));
    //     }
        $link = base_path('public/uploads/product_photos/'.$photo_name);
       //echo $link;
       Image::make($product_photo)->resize(270,310)->save($link);

        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'product_price' => $request->product_price,
            'product_code' => $request->product_code,

            'slug' => Str::slug($request->product_name).'-'.Str::random(4).auth()->user()->id,
            'sort_description' => $request->sort_description,
            'long_description' => $request->long_description,
            'quentity' => $request->product_quentity,
            'product_photo' => $photo_name,
            'product_name' => $request->product_name,
        ]);
        //return $product_id;
        // foreach($request->file('product_thanbails') as $thanbails){

        //     $photo_name_thanbails ='badhon'.'-'.Str::random(4).'.'.$thanbails->getClientOriginalExtension();
        //     echo $photo_name_thanbails;
        //     die();


        //      $link = base_path('public/uploads/product_thanbails/'.$photo_name_thanbails);
        //    //echo $link;
        //    Image::make($thanbails)->resize(270,310)->save($link);
        //    Product_thanbail::insert([
        //     'product_id' => $product_id,
        //     'product_thanbails_photo' => $photo_name_thanbails,
        //     'created_at'  => Carbon::now()

        //         ]);
        //         return back();
        // }
        foreach($request->file('product_thanbails') as $thanbails){

             $photo_name_thanbails =$product_id.'-'.Str::random(4).'.'.$thanbails->getClientOriginalExtension();

             $link = base_path('public/uploads/product_thanbails/'.$photo_name_thanbails);
             //echo $link;
             Image::make($thanbails)->resize(800,800)->save($link);

             Product_thanbail::insert([
                'product_id' => $product_id,
                'product_thanbails_photo' => $photo_name_thanbails,
                'created_at'  => Carbon::now()
             ]);

        }
        return back();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
