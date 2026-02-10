<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $products = Product::orderBy('id', 'desc')->get();

      return view('productos.index', compact('products'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\Illuminate\Http\Request $request){
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'unit' => ['required', 'string', 'max:20'],
        'price' => ['required', 'numeric', 'min:0'],
        'stock' => ['required', 'integer', 'min:0'],
        'stock_min' => ['required', 'integer', 'min:0'],
    ]);

    // activo por defecto
    $data['active'] = true;

    \App\Models\Product::create($data);

    return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
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
    public function edit(Product $producto)
    {
    return view('productos.edit', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $producto)
    {
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'unit' => ['required', 'string', 'max:50'],
        'price' => ['required', 'numeric', 'min:0'],
        'stock' => ['required', 'integer', 'min:0'],
        'stock_min' => ['required', 'integer', 'min:0'],
        'active' => ['required', 'boolean'],
    ]);

    $producto->update($data);

    return redirect()->route('productos.index')->with('status', 'Producto actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
