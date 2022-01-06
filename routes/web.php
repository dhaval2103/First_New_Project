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
Route::get('afterloginmaster', [frontendcontroller::class, 'afterloginmaster'])->name('afterloginmaster');

Route::get('allproduct', [frontendcontroller::class, 'allproduct'])->name('allproduct');
Route::get('viewallproduct', [frontendcontroller::class, 'viewallproduct'])->name('viewallproduct');
Route::get('productdetail/{id}', [frontendcontroller::class, 'productdetail'])->name('productdetail');
Route::get('cartview', [frontendcontroller::class, 'cartview'])->name('cartview');
Route::post('addtocart', [frontendcontroller::class, 'addtocart'])->name('addtocart');
Route::post('selectqty', [frontendcontroller::class, 'selectqty'])->name('selectqty');
Route::get('checkout', [frontendcontroller::class, 'checkout'])->name('checkout');
Route::get('stripe', [frontendcontroller::class, 'stripe'])->name('stripe');
Route::post('stripepayment', [frontendcontroller::class, 'stripepayment'])->name('stripepayment');
Route::get('deletecart/{id}', [frontendcontroller::class, 'deletecart']);
Route::post('customerdetail', [frontendcontroller::class, 'customerdetail'])->name('customerdetail');
Route::get('cartview', [frontendcontroller::class, 'cartview'])->name('cartview');
Route::get('billview/{id}', [frontendcontroller::class, 'billview'])->name('billview');
Route::get('orderview', [frontendcontroller::class, 'orderview'])->name('orderview');
Route::get('generatepdf/{id}', [frontendcontroller::class, 'generatepdf'])->name('generatepdf');