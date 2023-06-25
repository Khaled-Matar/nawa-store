<?php

use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/admin/products', [ProductsController::class, 'index'])->name('products.index);
// Route::get('/admin/products/create', [ProductsController::class, 'create']);
// Route::post('/admin/products', [ProductsController::class, 'store']);
// Route::get('/admin/products/{id}', [ProductsController::class, 'show']);
// Route::get('/admin/products/{id}/edit', [ProductsController::class, 'edit']);
// Route::put('/admin/products/{id}', [ProductsController::class, 'update']);
// Route::delete('/admin/products/{id}', [ProductsController::class, 'destroy']);
//     =====     // 
Route::resource('/admin/categories', CategoriesController::class);
// ----------------------------------------------------------------------------------------------------------- //
Route::get('admin/products/trashed', [ProductsController::class, 'trashed'])
    ->name('products.trashed');
    Route::put('/admin/products/{product}/restore', [ProductsController::class, 'restore'])
    ->name('products.restore');
Route::delete('/admin/products/{product}/force', [ProductsController::class, 'forceDelete'])
    ->name('products.force-delete');
Route::resource('/admin/products', ProductsController::class);
    
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{product}',[App\Http\Controllers\ProductsController::class, 'show'])
->name('shop.products.show');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{name}', [UserController::class, 'show']);
