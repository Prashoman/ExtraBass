<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\EmailOffer;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        if(strpos(url()->previous(), "product/details/")){
            return redirect(url()->previous());
        }
        $all_user = User::count();
        $all_admin = User::where('role', '=', '2')->count();
        $all_customer = User::where('role', '=', '1')->count();
        $all_vendor = User::where('role', '=', '3')->count();

        //echo $all_admin;
        //echo $all_customer;
        //echo $all_user;
        return view('admin.home.home', compact('all_user', 'all_admin', 'all_customer','all_vendor'));
    }
    public function emailoffer()
    {
        $customers = User::where('role', '!=', '2')->get();

        return view('admin.email.index', compact('customers'));
    }
    public function sendemail($id){
        //return User::find($id)->email;


        Mail::to(User::find($id)->email)->send(new EmailOffer());
        return back();
    }
}
