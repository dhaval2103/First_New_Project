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
    Route::post('addproduct', [DashboardController::class, 'addproduct'])->name('addproduct');
    Route::get('productdetail', [DashboardController::class, 'productdetail'])->name('productdetail');
});
