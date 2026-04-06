<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryApiController extends Controller
{
    public function storeMovement(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:ENTRADA,SALIDA',
            'qty' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($data) {

            $product = Product::lockForUpdate()->findOrFail($data['product_id']);

            if ($data['type'] === 'SALIDA' && $product->stock < $data['qty']) {
                return response()->json([
                    'message' => 'Stock insuficiente.',
                    'current_stock' => $product->stock
                ], 422);
            }

            if ($data['type'] === 'ENTRADA') {
                $product->stock += $data['qty'];
            } else {
                $product->stock -= $data['qty'];
            }

            $product->save();

            return response()->json([
                'message' => 'Movimiento registrado.',
                'product' => $product,
            ], 201);
        });
    }
}