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
    return redirect('/log-viewer'); // Ini mengarahkan ke package log-viewer jika sudah di-install
})->name('log-viewer');

Route::get('/', [HomeController::class, 'index'])->name('home');
