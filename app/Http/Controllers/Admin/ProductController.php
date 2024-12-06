<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $params = request()->query();
        $products = Product::filter($params)->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // Validasi request
        $validated = $request->validated();

        // Pastikan file gambar diupload
        if ($request->hasFile('gambar')) {
            $product = Product::create($validated);
            $product->addMediaFromRequest('gambar')->usingName($product->name)->toMediaCollection('products');
            return to_route('admin.products.index')->with('success', 'Product Created Successfully');
        } else {
            return back()->withErrors(['gambar' => 'Gambar tidak ditemukan.']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        if ($request->hasFile('gambar')) {
            $product->clearMediaCollection('products');
            $product->addMediaFromRequest('gambar')->usingName($product->name)->toMediaCollection('products');
            return to_route('admin.products.index')->with('success', 'Product Edited Successfully');
        }
        return to_route('admin.products.index')->with('success', 'Product update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('admin.products.index')->with('success', 'Product Deleted Successfully');
    }

    public function changePublish(Request $request, Product $product)
    {
        try {
            $product->update(['is_published' => $request->is_published]);

            return response()->json(['message' => 'Product Published Status Changed']);
        } catch (\Throwable $th) {
            Log::error($th);
            throw new \Exception('Failed to change product published status');
        }
    }
}
