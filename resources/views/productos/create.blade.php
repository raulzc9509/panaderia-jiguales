<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo producto
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST" action="{{ route('productos.store') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input name="name" type="text" value="{{ old('name') }}"
                                   class="mt-1 block w-full border rounded px-3 py-2"
                                   required>
                            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Unidad</label>
                                <input name="unit" type="text" value="{{ old('unit', 'UND') }}"
                                       class="mt-1 block w-full border rounded px-3 py-2"
                                       required>
                                @error('unit') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Precio</label>
                                <input name="price" type="number" step="0.01" min="0" value="{{ old('price', 0) }}"
                                       class="mt-1 block w-full border rounded px-3 py-2"
                                       required>
                                @error('price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Stock inicial</label>
                                <input name="stock" type="number" min="0" value="{{ old('stock', 0) }}"
                                       class="mt-1 block w-full border rounded px-3 py-2"
                                       required>
                                @error('stock') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Stock mínimo</label>
                                <input name="stock_min" type="number" min="0" value="{{ old('stock_min', 0) }}"
                                       class="mt-1 block w-full border rounded px-3 py-2"
                                       required>
                                @error('stock_min') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{ route('productos.index') }}" class="px-4 py-2 border rounded">
                                Volver
                            </a>

                            <button class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">
                                Guardar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
