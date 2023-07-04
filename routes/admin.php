<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'auth.type:admin,super-admin'])->prefix('/admin')->group(function () {

    Route::resource('/categories', CategoriesController::class);

    Route::get('/categories/trashed', [CategoriesController::class, 'trashed'])
        ->name('categories.trashed');

    Route::put('/categories/{category}/restore', [CategoriesController::class, 'restore'])
        ->name('categories.restore');

    Route::delete('/categories/{category}/force', [CategoriesController::class, 'forceDelete'])
        ->name('categories.force-delete');

    /////////////////////////////////////////////////////////////////////////////////

    Route::resource('/products', ProductsController::class);
    Route::get('/products/trashed', [ProductsController::class, 'trashed'])
        ->name('products.trashed');
    Route::put('/products/{product}/restore', [ProductsController::class, 'restore'])
        ->name('products.restore');
    Route::delete('/products/{product}/force', [ProductsController::class, 'forceDelete'])
        ->name('products.force-delete');

});
Route::middleware(['auth', 'auth.type:super-admin'])->prefix('/admin')->group(function () {

    Route::resource('users', UsersController::class);

    Route::get('/trashed', [UsersController::class, 'trashed'])
        ->name('users.trashed');

    Route::put('/users/{category}/restore', [UsersController::class, 'restore'])
        ->name('users.restore');

    Route::delete('/users/{category}/force', [UsersController::class, 'forceDelete'])
        ->name('users.force-delete');

});