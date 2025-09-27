<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    {{-- Añadimos FontAwesome para los iconos --}}
    <x-slot name="styles">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 flex items-center">
                    <div class="bg-green-100 rounded-full p-4 mr-4">
                        <i class="fas fa-users fa-2x text-green-600"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Total Usuarios</h3>
                        <p class="mt-1 text-3xl font-semibold text-gray-900">{{ $userCount }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 flex items-center">
                    <div class="bg-green-100 rounded-full p-4 mr-4">
                        <i class="fas fa-leaf fa-2x text-green-600"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Total Productos</h3>
                        <p class="mt-1 text-3xl font-semibold text-gray-900">{{ $productCount }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 flex items-center">
                    <div class="bg-green-100 rounded-full p-4 mr-4">
                        <i class="fas fa-shipping-fast fa-2x text-green-600"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Total Pedidos</h3>
                        <p class="mt-1 text-3xl font-semibold text-gray-900">{{ $orderCount }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Últimos Pedidos</h3>
                    </div>
                    <div class="p-6">
                        <ul class="divide-y divide-gray-200">
                            @forelse($latestOrders as $order)
                                <li class="py-3 flex justify-between items-center">
                                    <span>Pedido #{{ $order->id }} de <span class="font-medium">{{ $order->user->name }}</span></span>
                                    <span class="font-semibold text-gray-800">${{ number_format($order->total, 2) }}</span>
                                </li>
                            @empty
                                <li class="py-3">No hay pedidos recientes.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                     <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Últimos Usuarios Registrados</h3>
                    </div>
                    <div class="p-6">
                        <ul class="divide-y divide-gray-200">
                            @forelse($latestUsers as $user)
                                <li class="py-3 flex justify-between items-center">
                                    <span>{{ $user->name }} <span class="text-sm text-gray-500">({{ $user->role }})</span></span>
                                    <span class="text-gray-600">{{ $user->email }}</span>
                                </li>
                            @empty
                                <li class="py-3">No hay usuarios nuevos.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>