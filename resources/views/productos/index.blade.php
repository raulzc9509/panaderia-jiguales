<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-jig-card overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-gray-700">Listado de productos</p>

                        <a href="{{ route('productos.create') }}"
                           class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">
                            + Nuevo producto
                        </a>
                    </div>

                    @if($products->isEmpty())
    <p class="text-gray-600">No hay productos registrados aún.</p>
@else
    <div class="overflow-x-auto">
        <table class="min-w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2 text-left">ID</th>
                    <th class="border px-3 py-2 text-left">Nombre</th>
                    <th class="border px-3 py-2 text-left">Unidad</th>
                    <th class="border px-3 py-2 text-left">Precio</th>
                    <th class="border px-3 py-2 text-left">Stock</th>
                    <th class="border px-3 py-2 text-left">Stock mín.</th>
                    <th class="border px-3 py-2 text-left">Activo</th>
                    <th class="border px-3 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $p)
                    <tr>
                        <td class="border px-3 py-2">{{ $p->id }}</td>
                        <td class="border px-3 py-2">{{ $p->name }}</td>
                        <td class="border px-3 py-2">{{ $p->unit }}</td>
                        <td class="border px-3 py-2">${{ number_format($p->price, 2) }}</td>
                        <td class="border px-3 py-2">{{ $p->stock }}</td>
                        <td class="border px-3 py-2">{{ $p->stock_min }}</td>
                        <td class="border px-3 py-2">{{ $p->active ? 'Sí' : 'No' }}</td>
                        <td class="border px-3 py-2">
                            <a class="text-blue-600 hover:underline"
                               href="{{ route('productos.edit', $p) }}">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
