<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'auth'], function () {
    Route::get('/', [LoginController::class, 'loginpage'])->name('logins');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth:admin'], function () {

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
    Route::get('userdetail', [DashboardController::class, 'userdetail'])->name('userdetail');
    Route::post('edituser', [DashboardController::class, 'edituser'])->name('edituserdata');
    Route::post('updateuser', [DashboardController::class, 'updateuser'])->name('updateuserdata');
    Route::post('deletuser', [DashboardController::class, 'deleteuser'])->name('deleteuserdata');
    Route::get('addproduct', [DashboardController::class, 'addproduct'])->name('addproduct');
    Route::get('productdetail', [DashboardController::class, 'productdetail'])->name('productdetail');
    Route::get('addwatchbrand', [DashboardController::class, 'addwatchbrand'])->name('addwatchbrand');
    Route::post('insertwatch', [DashboardController::class, 'insertwatch'])->name('insertwatch');
    Route::post('productinsert', [DashboardController::class, 'productinsert'])->name('productinsert');
    Route::post('productdelete', [DashboardController::class, 'productdelete'])->name('productdelete');
    Route::get('productedit/{id}', [DashboardController::class, 'productedit'])->name('productedit');
    Route::post('productupdate', [DashboardController::class, 'productupdate'])->name('productupdate');
    Route::get('productview/{id}', [DashboardController::class, 'productview'])->name('productview');
    Route::get('cartview/{id}', [DashboardController::class, 'cartview'])->name('cartview');
    Route::post('deleteimage', [DashboardController::class, 'deleteimage'])->name('deleteimage');
    Route::get('orderdetail', [DashboardController::class, 'orderdetail'])->name('orderdetail');
    Route::get('viewbilldetail/{id}', [DashboardController::class, 'viewbilldetail'])->name('viewbilldetail');
});