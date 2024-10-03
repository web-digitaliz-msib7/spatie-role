<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Handling untuk jika route tidak ditemukan
Route::fallback(function () {
    return view('errors.404');
});

// Routes untuk otentikasi
Auth::routes();

// Route untuk log viewer (misal admin log viewer)
Route::get('/log-viewer', function () {
    return redirect('/log-viewer');
})->name('log-viewer');

// Route untuk dashboard tergantung role
Route::get('/', function () {
    $user = Auth::user();

    if ($user->hasRole('super-admin') || $user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->hasRole('user')) {
        return redirect()->route('user.dashboard');
    }

    return redirect('/login');  // Jika tidak ada role yang sesuai, arahkan ke login
})->middleware('auth')->name('home');

// Route untuk user dashboard
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');
});

// Grouping untuk route admin dan super-admin dengan prefix /admin
Route::middleware(['auth', 'role:admin|super-admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');

    // Route dengan prefix /admin untuk products, orders, dan users
    Route::get('/products', function () {
        return view('admin.product');
    })->name('admin.product')->middleware('can:show-product');

    Route::get('/orders', function () {
        return view('admin.order');
    })->name('admin.orders')->middleware('can:show-order');

    Route::get('/users', function () {
        return view('admin.user');
    })->name('admin.users')->middleware('can:show-user');
});

// Route khusus super-admin dengan prefix /admin
Route::middleware(['auth', 'role:super-admin'])->prefix('admin')->group(function () {
    Route::get('/admin-accounts', function () {
        return view('admin.account');
    })->name('admin.accounts')->middleware('can:show-admin-account');

    Route::get('/permissions', function () {
        return view('admin.permission');
    })->name('admin.permissions')->middleware('can:show-permission');
});