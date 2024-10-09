<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\ProductController;
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

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');
});

Route::middleware(['auth', 'role:admin|super-admin'])->as('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');

    Route::resource('products', ProductController::class);

    Route::get('/orders', function () {
        return view('admin.order');
    })->name('orders')->middleware('permission:show-order');
    // lihat data order
    // export data
    // halaman all order
    // halaman order pending
    // halaman order gagal
    // halaman konfirmasi pembayaran

    Route::get('/users', function () {
        return view('admin.user');
    })->name('users')->middleware('permission:show-user');

    Route::resource('admin-accounts', AdminAccountController::class);
    Route::post('/admin-accounts/{admin_account}/suspend', [AdminAccountController::class, 'suspend'])->name('admin-accounts.suspend');

    Route::middleware(['role:super-admin'])->group(function () {
        Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
        Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
        Route::post('permissions/store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::put('permissions/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::delete('permissions/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    });

    Route::get('role-permissions', [PermissionController::class, 'role'])->name('permissions.role');
    Route::get('role-permissions/edit/{id}', [PermissionController::class, 'rolePermissionEdit'])->name('permissions.role.edit');
    Route::put('role-permissions/update/{id}', [PermissionController::class, 'rolePermissionUpdate'])->name('permissions.role.update');
});
