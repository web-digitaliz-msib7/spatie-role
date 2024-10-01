<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// jk tidak di temukan / error hendling
Route::fallback(function () {
    return view('layouts.404');
});
Auth::routes();


Route::get('/log-viewer', function () {
    return redirect('/log-viewer');
})->name('log-viewer');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'verified',])->group(function () {


    Route::get('/products', function () {
        return view('product');
    })->name('product');

    Route::get('/orders', function () {
        return view('order');
    })->name('orders');

    Route::get('/users', function () {
        return view('user');
    })->name('users');
});