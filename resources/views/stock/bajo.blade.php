<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Bajo stock</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 rounded shadow overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="py-2">Producto</th>
                            <th>Unidad</th>
                            <th>Stock</th>
                            <th>Mínimo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $p)
                            <tr class="border-b">
                                <td class="py-2">{{ $p->name }}</td>
                                <td>{{ $p->unit }}</td>
                                <td class="font-semibold">{{ $p->stock }}</td>
                                <td>{{ $p->stock_min }}</td>
                                <td>
                                    <span class="px-2 py-1 rounded text-white {{ $p->active ? 'bg-green-600' : 'bg-gray-500' }}">
                                        {{ $p->active ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="py-4 text-center text-gray-500">No hay productos en bajo stock.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
