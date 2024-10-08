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
    Route::get('admin-accounts', [SuperAdminController::class, 'index'])->name('admin.accounts');

    Route::get('/admin-accounts/create', [SuperAdminController::class, 'create'])->name('admin.accounts.create');
    Route::post('/admin-accounts/store', [SuperAdminController::class, 'store'])->name('admin.accounts.store');
    Route::put('/admin-accounts/update/{id}', [SuperAdminController::class, 'update'])->name('admin.accounts.update');
    Route::get('/admin-accounts/edit/{id}', [SuperAdminController::class, 'edit'])->name('admin.accounts.edit');
    Route::delete('/admin-accounts/destroy/{id}', [SuperAdminController::class, 'destroy'])->name('admin.accounts.destroy');

    Route::get('permissions', [PermissionController::class, 'index'])->name('admin.permissions');
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('admin.permissions.create');
    Route::post('permissions/store', [PermissionController::class, 'store'])->name('admin.permission.store');
    Route::get('permissions/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::put('permissions/update/{id}', [PermissionController::class, 'update'])->name('admin.permission.update');
    Route::delete('permissions/destroy/{id}', [PermissionController::class, 'destroy'])->name('admin.permission.destroy');

    Route::get('role-permissions', [PermissionController::class, 'role'])->name('admin.permissions.role');
    Route::get('role-permissions/edit/{id}', [PermissionController::class, 'rolePermissionEdit'])->name('admin.permissions.role.edit');
    Route::put('role-permissions/update/{id}', [PermissionController::class, 'rolePermissionUpdate'])->name('admin.permissions.role.update');
});