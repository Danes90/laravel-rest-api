<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok'
    ]);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/me', [
    AuthController::class,
    'me'
]);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [
    ProductController::class,
    'store'
]);
Route::get('/products/{product}', [
    ProductController::class,
    'show'
]);
Route::put('/products/{product}', [
    ProductController::class,
    'update'
]);

Route::delete('/products/{product}', [
    ProductController::class,
    'destroy'
]);