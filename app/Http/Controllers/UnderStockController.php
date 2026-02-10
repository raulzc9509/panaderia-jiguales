<?php

namespace App\Http\Controllers;

use App\Models\Product;

class UnderStockController extends Controller
{
    public function __invoke()
    {
        $products = Product::query()
            ->whereColumn('stock', '<=', 'stock_min')
            ->orderBy('stock', 'asc')
            ->get(['id','name','unit','stock','stock_min','active']);

        return view('stock.bajo', compact('products'));
    }
}
