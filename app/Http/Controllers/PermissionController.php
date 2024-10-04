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
        return redirect()->route('admin.permissions')->with('success', 'Permission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $id)
    {
        return view('admin.permission.edit', compact('id'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissonRequest $request, Permission $id)
    {
        $request->validated();
        $id->update($request->all());
        return redirect()->route('admin.permissions')->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $id)
    {
        $id->delete();
        return redirect()->route('admin.permissions')->with('success', 'Permission deleted successfully');
    }

    public function role()
    {
        $roles = Role::all();
        return view('admin.permission.roles-permission', compact('roles'));
    }

    public function rolePermissionEdit(Role $id)
    {
        $permissions = Permission::all();
        return view('admin.permission.role-permission-edit', compact('id', 'permissions'));
    }

    public function rolePermissionUpdate()
    {
        
    }
}
