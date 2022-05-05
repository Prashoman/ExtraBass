<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
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
