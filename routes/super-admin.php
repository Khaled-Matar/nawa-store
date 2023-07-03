<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'auth.type:super-admin'])->prefix('/admin')->group(function () {

    Route::resource('users', UsersController::class);

    Route::get('/trashed', [UsersController::class, 'trashed'])
        ->name('users.trashed');

    Route::put('/users/{category}/restore', [UsersController::class, 'restore'])
        ->name('users.restore');

    Route::delete('/users/{category}/force', [UsersController::class, 'forceDelete'])
        ->name('users.force-delete');

});