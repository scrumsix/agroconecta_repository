<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tienda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white rounded-lg shadow-xl overflow-hidden mb-8 p-6">
                <h3 class="text-2xl font-bold text-gray-800">¡Bienvenido a la tienda de AgroConecta!</h3>
                <p class="text-gray-600 mt-2">Explora los productos frescos que nuestros campesinos han cosechado para ti. Calidad y sabor directo del campo a tu hogar.</p>
            </div>

            <div class="mb-8">
                <input type="text" placeholder="Buscar productos..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse ($products as $product)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                        <a href="{{ route('tienda.show', $product) }}">
                            <img class="w-full h-48 object-cover" src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400x300.png?text=Sin+Imagen' }}" alt="Imagen de {{ $product->name }}">
                        </a>
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-800">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">Vendido por: {{ $product->user->name }}</p>
                            
                            {{-- 👇 ESTA ES LA LÍNEA ACTUALIZADA 👇 --}}
                            <p class="text-xl font-semibold text-green-600 mt-2">${{ number_format($product->price, 2) }} / {{ $product->unit }}</p>
                            
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-4">
                                @csrf
                                <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-700 transition-colors duration-300">
                                    Añadir al Carrito
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <p class="text-center text-gray-500 text-lg">No hay productos disponibles en este momento.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>

        </div>
    </div>
</x-app-layout>

