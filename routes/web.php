<?php

use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\OrderController as UserOrderController;
use App\Http\Controllers\OrderController as adminOrderdController;
use App\Http\Controllers\User\ProductController as UserProductController;
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

// Rute untuk pengguna
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');

    // Rute untuk produk
    Route::get('/products', [UserProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [UserProductController::class, 'show'])->name('products.show');

    Route::get('/products/{product}/create/order', [UserOrderController::class, 'create'])->name('products.order.create');
    Route::post('/products/{product}/order', [UserOrderController::class, 'store'])->name('products.order.store');
});

// Rute untuk admin
Route::middleware(['auth', 'role:admin|super-admin'])->as('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');

    Route::resource('products', AdminProductController::class); // Menggunakan alias untuk membedakan

    Route::get('/orders', [adminOrderdController::class, 'index'])->name('orders')->middleware('permission:view-order');

    Route::get('/users', function () {
        return view('admin.user.index');
    })->name('users')->middleware('permission:view-user');

    Route::resource('admin-accounts', AdminAccountController::class);
    Route::post('/admin-accounts/{admin_account}/suspend', [AdminAccountController::class, 'suspend'])->name('admin-accounts.suspend');

    Route::middleware(['role:super-admin'])->group(function () {
        Route::resource('permissions', PermissionController::class);
        Route::resource('categories', CategoryController::class);
    });
});
