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
        $permissions = Permission::all();
        return view('admin.account.index', compact('permissions'));
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

        return to_route('admin.accounts')->with('success', 'Account Created Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
        $permissions = Permission::all();
        $userPermissions = $id->permissions->pluck('id')->toArray();
        return view('admin.account.edit', compact('id', 'permissions', 'userPermissions'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id->id,
            'old_password' => 'nullable|string|min:8',
            'password' => 'nullable|string|min:8|confirmed',
            'permissions' => 'array', // Validasi permissions
            'permissions.*' => 'integer|exists:permissions,id', // Validasi ID permission
        ]);
    
        // Pastikan pengguna memasukkan old_password jika mengubah password
        if ($request->old_password && !Hash::check($request->old_password, $id->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }
    
        // Update user data
        $id->name = $request->name;
        $id->email = $request->email;
    
        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $id->password = Hash::make($request->password);
        }

        $id->save();

        // Sinkronisasi permissions
        $permissions = Permission::whereIn('id', $request->permissions ?? [])->pluck('name');
        $id->syncPermissions($permissions);

        return redirect()->route('admin.accounts')->with('success', 'Account updated successfully.');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        $id->delete();
        return redirect()->route('admin.accounts')->with('success', 'Account deleted successfully');
    }

}