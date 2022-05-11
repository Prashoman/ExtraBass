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
