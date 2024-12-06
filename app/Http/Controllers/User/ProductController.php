<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $params = request()->query();
        $products = Product::all();
        // filter($params)->where('published', '1')->get();
        return view('user.product.index', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('user.product.show', compact('product')); // Menampilkan detail produk
    }
}
