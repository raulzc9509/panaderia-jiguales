<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Product::orderBy('name')->get()
        );
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
            'active' => 'nullable|boolean',
        ]);

        $data['active'] = $data['active'] ?? true;

        $product = Product::create($data);

        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'unit' => 'sometimes|required|string|max:50',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'stock_min' => 'sometimes|required|integer|min:0',
            'active' => 'sometimes|boolean',
        ]);

        $product->update($data);

        return response()->json($product);
    }

    public function deactivate(Product $product)
    {
        $product->update(['active' => false]);

        return response()->json([
            'message' => 'Producto desactivado.',
            'product' => $product
        ]);
    }

    public function lowStock()
    {
        return response()->json(
            Product::whereColumn('stock', '<=', 'stock_min')
                ->orderBy('stock')
                ->get()
        );
    }
}