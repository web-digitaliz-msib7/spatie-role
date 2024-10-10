<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissonRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissonRequest $request)
    {
        $request->validated();
        Permission::create($request->all());
        return redirect()->route('permissions.index')->with('success', 'Permission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $permission)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit', compact('permission'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissonRequest $request, Permission $permission)
    {
        $request->validated();
        $permission->update($request->all());
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully');
    }

    // public function role()
    // {
    //     $roles = Role::all();
    //     return view('admin.role-permission.roles-permission', compact('roles'));
    // }

    // public function rolePermissionEdit(Role $permission)
    // {
    //     $permissions = Permission::all();
    //     return view('admin.role-permission.role-permission-edit', compact('id', 'permissions'));
    // }

    // public function rolePermissionUpdate(Request $request, Role $permission)
    // {
    //     // Validate the incoming request
    //     $validatedData = $request->validate([
    //         'name' => 'array',
    //         'name.*' => 'integer|exists:permissions,id',
    //     ]);

    //     // Retrieve permission names based on the IDs
    //     $permissions = Permission::whereIn('id', $validatedData['name'] ?? [])->pluck('name');

    //     $permission->syncPermissions($permissions);

    //     return redirect()->route('admin.permissions.role')->with('success', 'Permissions updated successfully.');
    // }


}
