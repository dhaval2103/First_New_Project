<?php

use App\Http\Controllers\frontendcontroller;
use App\Http\Controllers\HomeController;
use App\Models\image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $image = image::all();
    return view('welcome', compact('image'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('allproduct', [frontendcontroller::class, 'allproduct'])->name('allproduct');
Route::get('viewallproduct', [frontendcontroller::class, 'viewallproduct'])->name('viewallproduct');
Route::get('productdetail/{id}', [frontendcontroller::class, 'productdetail'])->name('productdetail');
Route::get('cartview/{id}', [frontendcontroller::class, 'cartview'])->name('cartview');
Route::post('addtocart', [frontendcontroller::class, 'addtocart'])->name('addtocart');
Route::post('selectqty', [frontendcontroller::class, 'selectqty'])->name('selectqty');
Route::get('checkout', [frontendcontroller::class, 'checkout'])->name('checkout');
Route::get('stripe', [frontendcontroller::class, 'stripe'])->name('stripe');
Route::get('stripepayment', [frontendcontroller::class, 'stripepayment'])->name('stripepayment');
