<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('admin')->with('permissions')->get();
        $permissions = Permission::all();
        return view('admin.account.index', compact('users', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role('admin')->with('permissions')->get();
        $permissions = Permission::all();
        return view('admin.account.create', compact('permissions', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'permissions' => 'array', // Validasi untuk izin
            'permissions.*' => 'integer|exists:permissions,id', // Validasi setiap izin
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

        return to_route('admin-accounts.index')->with('success', 'Account Created Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $admin_account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin_account)
    {
        $permissions = Permission::all();
        $userPermissions = $admin_account->permissions->pluck('id')->toArray();
        return view('admin.account.edit', compact('admin_account', 'permissions', 'userPermissions'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin_account)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin_account->id,
            'old_password' => 'nullable|string|min:8',
            'password' => 'nullable|string|min:8|confirmed',
            'permissions' => 'array', // Validasi permissions
            'permissions.*' => 'integer|exists:permissions,id', // Validasi ID permission
        ]);

        // Pastikan pengguna memasukkan old_password jika mengubah password
        if ($request->old_password && !Hash::check($request->old_password, $admin_account->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }

        // Update user data
        $admin_account->name = $request->name;
        $admin_account->email = $request->email;

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $admin_account->password = Hash::make($request->password);
        }

        $admin_account->save();

        // Sinkronisasi permissions
        $permissions = Permission::whereIn('id', $request->permissions ?? [])->pluck('name');
        $admin_account->syncPermissions($permissions);

        return redirect()->route('admin-accounts.index')->with('success', 'Account updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin_account)
    {
        $admin_account->delete();
        return redirect()->route('admin-accounts.index')->with('success', 'Account deleted successfully');
    }
}
