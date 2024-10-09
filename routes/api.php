<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// CRUD Products
// Route::resource('products', ProductController::class);

// CRUD Products
Route::middleware('role:admin')->group(function () {
    Route::get('/customer/products', [ProductController::class, 'index']);
    Route::post('/customer/products', [ProductController::class, 'store']);
    Route::post('/customer/products/{product}', [ProductController::class, 'update']);
    Route::get('/customer/products/{product}', [ProductController::class, 'show']);
    Route::delete('/customer/products/{product}', [ProductController::class, 'destroy']);
});
