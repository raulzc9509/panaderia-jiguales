<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Inventario - Movimientos</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

            @if (session('status'))
                <div class="p-3 bg-green-100 rounded">{{ session('status') }}</div>
            @endif

            <div class="bg-white p-4 rounded shadow">
                <form class="flex flex-col sm:flex-row gap-3 items-end" method="GET">
                    <div class="w-full sm:w-80">
                        <label class="block text-sm mb-1">Filtrar por producto</label>
                        <select name="product_id" class="w-full border rounded p-2">
                            <option value="">Todos</option>
                            @foreach($products as $p)
                                <option value="{{ $p->id }}" @selected(request('product_id') == $p->id)>{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="px-4 py-2 bg-gray-800 text-white rounded">Filtrar</button>
<a href="{{ route('inventario.create') }}"
   class="px-4 py-2 bg-blue-600 rounded"
   style="color:#ffffff; font-weight:700;">
   + Registrar
</a>
                </form>
            </div>

            <div class="bg-white p-4 rounded shadow overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="py-2">Fecha</th>
                            <th>Producto</th>
                            <th>Tipo</th>
                            <th>Cantidad</th>
                            <th>Usuario</th>
                            <th>Nota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($movements as $m)
                            <tr class="border-b">
                                <td class="py-2">{{ $m->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $m->product->name }}</td>
                                <td>
                                    <span class="px-2 py-1 rounded text-white {{ $m->type === 'IN' ? 'bg-green-600' : 'bg-red-600' }}">
                                        {{ $m->type === 'IN' ? 'ENTRADA' : 'SALIDA' }}
                                    </span>
                                </td>
                                <td>{{ $m->quantity }}</td>
                                <td>{{ $m->user->name }}</td>
                                <td class="max-w-[320px] truncate">{{ $m->note }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="py-4 text-center text-gray-500">Sin movimientos.</td></tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $movements->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
