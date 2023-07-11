<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/products/{product}', [ProductsController::class, 'show'])
    ->name('shop.products.show');
Route::get('/grids', [ProductsController::class, 'index'])
    ->name('grids');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'store']);
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store']);
Route::get('/checkout/thankyou', [CheckoutController::class, 'success'])
    ->name('checkout.success');
