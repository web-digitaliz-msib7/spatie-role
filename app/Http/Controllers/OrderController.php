<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('user.order.create', compact('product'));
    }




    public function store(OrderRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = auth()->id();

        $validatedData['product_id'] = $product->id;

        Order::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Successfully Ordered');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
