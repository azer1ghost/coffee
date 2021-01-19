<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WebsiteController::class,'index'])->name('homepage');

Route::post('/checkout', [WebsiteController::class,'checkout'])->name('checkout');

Route::post('/payment', [WebsiteController::class,'payment'])->name('payment');

Route::get('/manager', [WebsiteController::class,'manager'])->name('manager');

Route::get('/orders', [WebsiteController::class,'orderList'])->name('orders');
