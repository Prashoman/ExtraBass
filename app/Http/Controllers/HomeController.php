<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\EmailOffer;
use App\Models\Country;
use App\Models\Order_detail;
use App\Models\Order_summery;
use App\Models\Rating;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

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
    public function location(){
        $countries = Country::get(['id', 'name', 'status']);
        return view('admin.location.index', compact('countries'));
    }
    public function location_active(Request $request){
        Country::where('status', 'active')->update([
            'status' => 'deractive'
        ]);
        foreach($request->country as $key => $contry){

           Country::find($contry)->update([
            'status' => 'active',
        ]);

        }
        return back();

    }

    public function order_details(){
       $Order_summeries = Order_summery::where('user_id', auth()->id())->get();
        return view('admin.order_details.index', compact('Order_summeries'));
    }
    public function invoice_download($id){

        $Order_summeries = Order_summery::find($id);

        $pdf = PDF::loadView('pdf.invoice', compact('Order_summeries'));
        return $pdf->download('invoice.pdf');
    }
    public function order_list(){
        $Order_summeries = Order_summery::all();
        return view('admin.all_orders.index', compact('Order_summeries'));
    }
    public function order_delivared($id){

        Order_summery::find($id)->update([
            'delivared' => 1,
        ]);
        return back();
    }
    public function orders_details($id){
         $order_summeris = Order_summery::find(Crypt::decrypt($id));

        $order_details = Order_detail::where('summery_id', Crypt::decrypt($id))->get();

        return view('admin.myorders.index', compact('order_summeris', 'order_details'));
    }
    public function rating(Request $request, $id){


       Rating::insert([
        'user_id' => auth()->id(),
        'order_details_id' => $id,
        'product_id' => Order_detail::find($id)->product_id,
        'massege' => $request->massege,
        'rate' => $request->rate,
        'created_at' => Carbon::now()

       ]);
       return back();
    }
}
