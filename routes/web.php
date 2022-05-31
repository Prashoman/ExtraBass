<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\admin\CuponController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/email/offer', [HomeController::class, 'emailoffer'])->name('emailoffer');
Route::get('/email/send/{id}', [HomeController::class, 'sendemail'])->name('send.email');
Route::get('/location', [HomeController::class, 'location'])->name('location');
Route::post('/location/active', [HomeController::class, 'location_active'])->name('location.active');
Route::get('/order/details', [HomeController::class, 'order_details'])->name('order.details');


Route::get('/invoice/download/{id}', [HomeController::class, 'invoice_download'])->name('invoice.download');
Route::get('/order/list', [HomeController::class, 'order_list'])->name('order.list');
Route::get('/order/delivared/{id}', [HomeController::class, 'order_delivared'])->name('order.delivared');
Route::get('order/details/{id}', [HomeController::class, 'orders_details'])->name('orders.details');
Route::post('rating/{id}', [HomeController::class, 'rating'])->name('rating');

Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
Route::post('/profile/name/change',[ProfileController::class, 'changename'])->name('change.name');
Route::post('/profile/password/change',[ProfileController::class, 'changepassword'])->name('change.password');
Route::post('/profile/Photo/change',[ProfileController::class, 'changephoto'])->name('change.photo');
Route::get('/', [FrontendController::class, 'index'])->name('/');
Route::get('product/details/{slug}', [FrontendController::class, 'productdetails'])->name('product.details');
Route::get('category/product/{id}', [FrontendController::class, 'categorywish'])->name('category.wish');
Route::resource('category', CategoryController::class);
Route::resource('vendor', VendorController::class);
Route::resource('product', ProductController::class);
Route::resource('wishlist', WishlistController::class);
Route::get('Wishlist/insert/{prduct_id}', [WishlistController::class, 'insert'])->name('wishlist.insert');
Route::get('Wishlist/remove/{wishlist_id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('cart/insert/{wishlist_id}', [CartController::class, 'insert'])->name('cart.insert');
Route::post('cart/add/{product_id}', [CartController::class, 'addcart'])->name('cart.add');
Route::get('cart', [CartController::class, 'viewcart'])->name('cart.view');
Route::get('cart/remove/{id}', [CartController::class, 'romovecart'])->name('cart.remove');
Route::get('allcart/remove/{user_id}', [CartController::class, 'allcartremove'])->name('allcart.remove');
Route::post('cart/update', [CartController::class, 'updatecart'])->name('updatecart');
Route::resource('cupon', CuponController::class);
Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('checkout', [CheckoutController::class, 'checkout_store'])->name('checkout.store');
Route::post('checkout/get/up', [CheckoutController::class, 'checkout_get'])->name('checkout_get');




// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
