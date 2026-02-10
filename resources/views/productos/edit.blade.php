<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar producto</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow space-y-4">

                @if (session('status'))
                    <div class="p-3 bg-green-100 rounded">{{ session('status') }}</div>
                @endif

                @if ($errors->any())
                    <div style="border:1px solid #fca5a5; background:#fef2f2; color:#991b1b; padding:12px; border-radius:8px;">
                        <b>No se pudo guardar:</b>
                        <ul style="margin:6px 0 0 0; padding-left:18px;">
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('productos.update', $producto->id) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm mb-1">Nombre</label>
                        <input name="name" class="w-full border rounded p-2" value="{{ old('name', $producto->name) }}" required>
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Unidad</label>
                        <input name="unit" class="w-full border rounded p-2" value="{{ old('unit', $producto->unit) }}" required>
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Precio</label>
                        <input type="number" step="0.01" min="0" name="price" class="w-full border rounded p-2"
                               value="{{ old('price', $producto->price) }}" required>
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Stock</label>
                        <input type="number" min="0" name="stock" class="w-full border rounded p-2"
                               value="{{ old('stock', $producto->stock) }}" required>
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Stock mínimo</label>
                        <input type="number" min="0" name="stock_min" class="w-full border rounded p-2"
                               value="{{ old('stock_min', $producto->stock_min) }}" required>
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Activo</label>
                        <select name="active" class="w-full border rounded p-2" required>
                            <option value="1" @selected(old('active', $producto->active) == 1)>Sí</option>
                            <option value="0" @selected(old('active', $producto->active) == 0)>No</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-gray-800 text-white rounded">Guardar cambios</button>
                        <a href="{{ route('productos.index') }}" class="px-4 py-2 border rounded">Volver</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
