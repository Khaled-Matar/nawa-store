<?php

use App\Http\Controllers\Api\V1\AccessTokensController;
use App\Http\Controllers\Api\V1\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// auto prefix in route is /api/ so thsi route is /api/products
Route::apiResource('products', ProductsController::class); // 5 Routes

Route::post('/access-tokens', [AccessTokensController::class, 'store'])
    ->middleware('guest:sanctum');

Route::delete('/access-tokens', [AccessTokensController::class, 'destroy'])
    ->middleware('auth:sanctum');

Route::get('/access-tokens', [AccessTokensController::class, 'index'])
    ->middleware('auth:sanctum');
