<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi Carrito de Compras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                @if (session('ok'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('ok') }}</span>
                    </div>
                @endif

                @if(isset($cart) && count($cart) > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Precio</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php $total = 0; @endphp
                            @foreach($cart as $id => $details)
                                @php $total += $details['price'] * $details['quantity']; @endphp
                                <tr>
                                    <td class="px-6 py-4">{{ $details['name'] }}</td>
                                    <td class="px-6 py-4">${{ number_format($details['price'], 2) }}</td>
                                    
                                    {{-- 👇 ESTA ES LA CELDA ACTUALIZADA 👇 --}}
                                    <td class="px-6 py-4">
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" 
                                                   class="w-20 text-center border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500" min="1">
                                            <button type="submit" class="ml-2 text-sm text-indigo-600 hover:text-indigo-900 font-semibold">Actualizar</button>
                                        </form>
                                    </td>
                                    
                                    <td class="px-6 py-4">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-right mt-6">
                        <p class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</p>
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Proceder al Pago
                            </button>
                        </form>
                    </div>
                @else
                    <div class="text-center">
                        <p class="text-gray-500 text-lg">Tu carrito de compras está vacío.</p>
                        <a href="{{ route('tienda.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Ir a la Tienda
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

