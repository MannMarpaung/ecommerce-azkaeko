<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('product', App\Http\Controllers\ProductController::class);
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
});

Route::group(['middleware' => ['auth', 'admin']], function () {});
Route::group(['middleware' => ['auth', 'seller']], function () {});
Route::group(['middleware' => ['auth', 'user']], function () {});