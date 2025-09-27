<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Mostramos el nombre del producto en el encabezado --}}
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Columna de la Imagen --}}
                    <div>
                        <img class="w-full h-auto object-cover rounded-lg shadow-md" src="https://via.placeholder.com/600x400.png?text=Producto" alt="Imagen del producto">
                    </div>

                    {{-- Columna de los Detalles --}}
                    <div>
                        <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                        
                        <p class="text-2xl text-gray-700 mb-4">${{ number_format($product->price, 2) }}</p>
                        
                        <p class="text-gray-600 mb-4">
                            <span class="font-bold">Vendido por:</span> {{ $product->user->name }}
                        </p>
                        
                        <p class="text-gray-600 mb-4">
                            <span class="font-bold">Unidades disponibles:</span> {{ $product->stock }}
                        </p>
                        
                        <div class="mt-4">
                            <h3 class="text-lg font-semibold">Descripción</h3>
                            <p class="text-gray-600 mt-2">
                                {{ $product->description ?? 'El vendedor no ha añadido una descripción.' }}
                            </p>
                        </div>
                        
                        <div class="mt-6">
                             {{--  ESTE BLOQUE HA SIDO REEMPLAZADO --}}
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Añadir al Carrito
                                </button>
                                <a href="{{ route('tienda.index') }}" class="ml-4 text-gray-500 hover:text-gray-700">
                                    Volver a la tienda
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
