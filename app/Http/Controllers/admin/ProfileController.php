<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Str;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.profile.index');
    }
    public function changename(Request $request){

        User::find(auth()->id())->update([
            'name' => $request->name,
        ]);
        return back();
    }
    public function changepassword(Request $request){
        //return $request->curent_pass;
        if (Hash::check($request->curent_pass, auth()->user()->password)) {
            if($request->pass == $request->pass_confrim){
                User::find(auth()->id())->update([
                    'password' => bcrypt($request->pass)
                ]);
                return back();
            }
            else{
                echo 'dose not match';
            }
        }
        else{
            echo 'mile nai';
        }
    }

    public function changephoto(Request $request){

        $request->validate([
            'profile_photo' => 'required|image',
        ]);
        $profile_photo = $request->file('profile_photo');

        $photo_name = Str::random(5).'-'.auth()->user()->id.'.'.$profile_photo->getClientOriginalExtension();
        echo $photo_name;

        if(auth()->user()->profile_photo != 'default.png'){
            unlink(base_path('public/uploads/profile_photos/'.auth()->user()->profile_photo));
        }
        $link = base_path('public/uploads/profile_photos/'.$photo_name);
       //echo $link;
       Image::make($profile_photo)->resize(600,519)->save($link);
       User::find(auth()->id())->update([
            'profile_photo' => $photo_name,
       ]);
       return back()->with('profile_success', 'Profile Photo Change Successfully!');
    }
}
