<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Tienda de Productos Frescos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <div class="grid grid-cols-1 msd:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($products as $product)
                        <div class="border rounded-lg shadow-lg overflow-hidden">
                            {{-- Puedes añadir una imagen del producto aquí más adelante --}}
                            <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300.png?text=Producto" alt="Imagen del producto">
                            <div class="p-4">
                                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                                <p class="text-gray-600 mt-2">${{ number_format($product->price, 2) }}</p>
                                <p class="text-sm text-gray-500 mt-2">Vendido por: {{ $product->user->name }}</p>
                                
                                {{-- Aquí podrían ir botones como "Ver Detalle" o "Añadir al Carrito" --}}
                                <div class="mt-4">
                                    <a href="{{ route('tienda.show', $product) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
    Ver Producto
</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3">
                            <p class="text-center text-gray-500">
                                No hay productos disponibles en este momento.
                            </p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>