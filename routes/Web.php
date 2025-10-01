<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\CouponController;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// طلبات (Orders)
Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

// شحن (Shipping)
Route::get('/shipping', [ShippingController::class, 'index']);
Route::post('/shipping', [ShippingController::class, 'store']);
Route::put('/shipping/{id}', [ShippingController::class, 'update']);
Route::delete('/shipping/{id}', [ShippingController::class, 'destroy']);

// خصومات (Coupons)
Route::get('/coupons', [CouponController::class, 'index']);
Route::post('/coupons', [CouponController::class, 'store']);
Route::put('/coupons/{id}', [CouponController::class, 'update']);
Route::delete('/coupons/{id}', [CouponController::class, 'destroy']);