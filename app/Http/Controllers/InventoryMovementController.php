<?php

namespace App\Http\Controllers;

use App\Models\InventoryMovement;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class InventoryMovementController extends Controller
{
    // Listado de movimientos
    public function index(Request $request)
    {
        $q = InventoryMovement::with(['product:id,name', 'user:id,name'])
            ->latest();

        if ($request->filled('product_id')) {
            $q->where('product_id', $request->product_id);
        }

        $movements = $q->paginate(15)->withQueryString();
        $products = Product::orderBy('name')->get(['id', 'name']);

        return view('inventario.index', compact('movements', 'products'));
    }

    // Formulario para registrar movimiento
    public function create()
    {
        $products = Product::orderBy('name')->get(['id', 'name', 'stock']);
        return view('inventario.create', compact('products'));
    }

    // Guardar movimiento y actualizar stock del producto
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'type' => ['required', 'in:IN,OUT'],
            'quantity' => ['required', 'integer', 'min:1'],
            'unit_cost' => ['nullable', 'numeric', 'min:0'],
            'note' => ['nullable', 'string', 'max:255'],
        ]);

        $data['user_id'] = $request->user()->id;

        DB::transaction(function () use ($data) {
            // Bloquea el producto mientras se actualiza stock (evita errores si 2 personas registran a la vez)
            $product = Product::whereKey($data['product_id'])->lockForUpdate()->firstOrFail();

            if ($data['type'] === 'OUT') {
                if ($product->stock < $data['quantity']) {
                    throw ValidationException::withMessages([
                        'quantity' => 'Stock insuficiente. Stock actual: '.$product->stock,
                    ]);
                }
                $product->stock -= $data['quantity'];
            } else {
                $product->stock += $data['quantity'];
            }


            $product->save();
            InventoryMovement::create($data);
        });

        return redirect()->route('inventario.index')->with('status', 'Movimiento registrado y stock actualizado.');
    }
}
