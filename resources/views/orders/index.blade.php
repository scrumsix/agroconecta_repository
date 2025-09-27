<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <h3 class="text-lg font-medium text-gray-900 mb-4">Historial de Pedidos</h3>

                @forelse ($orders as $order)
                    <div class="border rounded-lg p-4 mb-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-bold">Pedido #{{ $order->id }}</p>
                                <p class="text-sm text-gray-600">Realizado el: {{ $order->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($order->status == 'pendiente') bg-yellow-100 text-yellow-800 @else bg-green-100 text-green-800 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Precio Unitario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td class="px-4 py-2">{{ $item->product->name }}</td>
                                            <td class="px-4 py-2">{{ $item->quantity }}</td>
                                            <td class="px-4 py-2">${{ number_format($item->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-right mt-2">
                            <p class="font-bold">Total del Pedido: ${{ number_format($order->total, 2) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500">
                        <p>Aún no has realizado ningún pedido.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>