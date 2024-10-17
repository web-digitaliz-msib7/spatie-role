<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminAccountController extends Controller
{
    public function index()
    {
        Gate::authorize('view-admin-account');
        $params = request()->query();

        $users = User::role('admin')
            ->with('permissions')
            ->filter($params)
            ->paginate(10);
        $permissions = Permission::all();
        return view('admin.account.index', compact('users', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        Gate::authorize('create-admin-account');
        $users = User::role('admin')->with('permissions')->get();
        // $permissions = Permission::all();

        $categories = category::with('permissions')->get();

        return view('admin.account.create', compact('categories', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create-admin-account');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'permissions' => 'array',
            'permissions.*' => 'integer|exists:permissions,id',
        ]);

        // Membuat user baru dengan password yang sudah dienkripsi
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('admin');

        // Menambahkan izin ke user jika ada yang dipilih
        if ($request->permissions) {
            $user->permissions()->sync($request->permissions);
        }

        return to_route('admin.admin-accounts.index')->with('success', 'Account Created Successfully');
    }
    public function edit(User $admin_account)
    {
        Gate::authorize('update-admin-account');

        $categories = Category::with('permissions')->get();
        $userPermissions = $admin_account->permissions->pluck('id')->toArray();

        return view('admin.account.edit', compact('admin_account', 'categories', 'userPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $adminAccount)
    {
        Gate::authorize('edit-admin-account');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $adminAccount->id,
            'old_password' => 'nullable|string|min:8',
            'password' => 'nullable|string|min:8|confirmed',
            'permissions' => 'array', // Validasi permissions
            'permissions.*' => 'integer|exists:permissions,id', // Validasi ID permission
        ]);

        // Pastikan pengguna memasukkan old_password jika mengubah password
        if ($request->old_password && !Hash::check($request->old_password, $adminAccount->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }

        // Update user data
        $adminAccount->name = $request->name;
        $adminAccount->email = $request->email;

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $adminAccount->password = Hash::make($request->password);
        }

        $adminAccount->save();

        // Sinkronisasi permissions
        $permissions = Permission::whereIn('id', $request->permissions ?? [])->pluck('name');
        $adminAccount->syncPermissions($permissions);

        return redirect()->route('admin.admin-accounts.index')->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $adminAccount)
    {
        Gate::authorize('delete-admin-account');

        $adminAccount->delete();
        return redirect()->route('admin.admin-accounts.index')->with('success', 'Account deleted successfully');
    }

    public function suspend(User $adminAccount)
    {
        $adminAccount->suspend();

        return back();
    }
}
