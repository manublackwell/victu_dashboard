<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShippingTxtController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\CouponController;

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

//auth

Route::group(['middleware' => ['alreadyLoggedIn']], function() {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::get('/register', [AdminAuthController::class, 'register'])->name('register');
    Route::post('/account/create', [AdminAuthController::class, 'create'])->name('account-create');
    Route::post('/account/login', [AdminAuthController::class, 'check'])->name('account-check');
});


Route::group(['middleware' => ['adminAuth']], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/shipping-txt/create', [ShippingTxtController::class, 'getDownload'])->name('generate-shipping-txt');

    Route::resource('/orders', OrdersController::class);
    Route::resource('/products', ProductsController::class);
    Route::resource('/warehouses', WarehouseController::class);
    Route::resource('/coupons', CouponController::class);
});
