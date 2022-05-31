<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        return view('admin.category.addcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categoris = Category::all();
        return view('admin.category.showcategory.index', compact('categoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_tittle' => 'required',
            'category_photo' => 'required | image'
        ]);

        $category_photo = $request->file('category_photo');

        $photo_name = Str::slug($request->category_name).'-'.Str::random(3).'.'.$category_photo->getClientOriginalExtension();
        //echo $photo_name;

    //     if(auth()->user()->profile_photo != 'default.png'){
    //         unlink(base_path('public/uploads/profile_photos/'.auth()->user()->profile_photo));
    //     }
        $link = base_path('public/uploads/category_photos/'.$photo_name);
       //echo $link;
       Image::make($category_photo)->resize(600,328)->save($link);
       Category::insert([
        'category_name' => $request->category_name,
        'category_tittle' => $request->category_tittle,
        'category_photo' => $photo_name,
        'created_at' => Carbon::now(),
       ]);

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'category_tittle' => $request->category_tittle,

        // ]);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        //return $request->all();
        $request->validate([
            'category_name' => 'required',
            'category_tittle' => 'required',
        ]);
        Category::find($id)->update([
            'category_name'     => $request->category_name,
            'category_tittle'   => $request->category_tittle,
            'status'            => $request->category_status,
        ]);

        if($request->hasFile('new_category_photo'))
        {

            $new_category_photo = $request->file('new_category_photo');

            $photo_name = Str::slug($request->category_name).'-'.Str::random(3).'.'.$new_category_photo->getClientOriginalExtension();
            //echo $photo_name;
            unlink(base_path('public/uploads/category_photos/'.Category::find($id)->category_photo));
            $link = base_path('public/uploads/category_photos/'.$photo_name);
            //echo $link;
            Image::make($new_category_photo)->resize(600,328)->save($link);
            Category::find($id)->update([
                'category_photo' => $photo_name,
            ]);

        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        //echo $category->category_photo;


            unlink(base_path('public/uploads/category_photos/'.Category::find($id)->category_photo));

        $category->delete();

        return back();
    }
}
