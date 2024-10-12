<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('errors.404');
});

Auth::routes();

Route::get('/', function () {
    $user = Auth::user();

    if ($user && ($user->hasRole('super-admin') || $user->hasRole('admin'))) {
        return redirect()->route('admin.dashboard');
    } elseif ($user && $user->hasRole('user')) {
        return redirect()->route('user.dashboard');
    }

    return redirect('/login');
})->middleware('auth')->name('home');

Route::middleware(['auth', 'role_or_permission:user'])->group(function () {
    Route::get('/user-dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');
});

Route::middleware(['auth', 'role_or_permission:admin|super-admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/products', function () {
        return view('admin.product');
    })->name('admin.product')->middleware('permission:show-product');

    Route::get('/orders', function () {
        return view('admin.order');
    })->name('admin.orders')->middleware('permission:show-order');

    Route::get('/users', function () {
        return view('admin.user');
    })->name('admin.users')->middleware('permission:show-user');
});

Route::middleware(['auth', 'role_or_permission:super-admin'])->prefix('admin')->group(function () {

    Route::resource('admin-accounts', SuperAdminController::class);

    Route::resource('permissions', PermissionController::class);
});
