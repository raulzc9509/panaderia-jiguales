<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Registrar movimiento</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-jig-card p-6 rounded shadow space-y-4">

                @if (session('status'))
                    <div class="p-3 bg-green-100 rounded">{{ session('status') }}</div>
                @endif

                @if ($errors->any())
    <div
        class="mb-4 rounded border border-red-300 bg-red-50 p-4 text-red-800"
        style="border:1px solid #fca5a5; background:#fef2f2; color:#991b1b; padding:12px; border-radius:8px;"
    >
        <p style="font-weight:700; margin-bottom:6px;">No se pudo guardar el movimiento:</p>
        <ul style="margin:0; padding-left:18px;">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif



                <form method="POST" action="{{ route('inventario.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm mb-1">Producto</label>
                        <select name="product_id" class="w-full border rounded p-2" required>
                            @foreach($products as $p)
                                <option value="{{ $p->id }}">{{ $p->name }} (Stock: {{ $p->stock }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Tipo</label>
                        <select name="type" class="w-full border rounded p-2" required>
                            <option value="IN">Entrada</option>
                            <option value="OUT">Salida</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Cantidad</label>
                        <input type="number" min="1" name="quantity" class="w-full border rounded p-2" required />
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Costo unitario (opcional)</label>
                        <input type="number" step="0.01" min="0" name="unit_cost" class="w-full border rounded p-2" />
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Nota (opcional)</label>
                        <input type="text" maxlength="255" name="note" class="w-full border rounded p-2" />
                    </div>

                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-jig-accent text-white rounded">Guardar</button>
                        <a href="{{ route('inventario.index') }}" class="px-4 py-2 border rounded">Volver</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
