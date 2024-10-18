<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Spatie\Permission\Models\Permission;

class CategoryController extends Controller
{

    public function index()
    {
        $params = request()->query();
        $categories = category::with('permissions')
        ->filter($params)
        ->paginate(10);
        return view('admin.category.index', compact('categories', 'params'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.category.create', compact('permissions'));
    }

    public function store(CategoryRequest $request)
    {
        $request->validated();

        $giveRole = category::create($request->all());

        if ($request->permissions) {
            $giveRole->permissions()->sync($request->permissions);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Category Created Successfully');
    }

    public function edit(category $category)
    {
        $permissions = Permission::all();
        $categoryPermissions = $category->permissions->modelKeys();
        return view('admin.category.edit', compact('category', 'permissions', 'categoryPermissions'));
    }

    public function update(CategoryRequest $request, category $category)
    {
        $validatedData = $request->validated();

        $category->update(['name' => $validatedData['name']]);

        $category->permissions()->sync($validatedData['permissions'] ?? []);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
    }
}
