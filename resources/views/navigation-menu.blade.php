<nav x-data="{ open: false }" class="bg-green-800 border-b border-green-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <span class="text-white text-xl font-bold">AgroConecta</span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                    {{-- ENLACES COMUNES --}}
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-green-200 hover:text-white">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('tienda.index') }}" :active="request()->routeIs('tienda.index')" class="text-green-200 hover:text-white">
                        {{ __('Tienda') }}
                    </x-nav-link>

                    {{-- ENLACES POR ROL --}}
                    @if(auth()->user()->role == 'admin')
                        <x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')" class="text-green-200 hover:text-white">
                            {{ __('Gestionar Usuarios') }}
                        </x-nav-link>
                    @elseif(auth()->user()->role == 'campesino')
                        <x-nav-link href="{{ route('campesino.productos.index') }}" :active="request()->routeIs('campesino.productos.*')" class="text-green-200 hover:text-white">
                            {{ __('Mis Productos') }}
                        </x-nav-link>
                    @elseif(auth()->user()->role == 'cliente')
                        <x-nav-link href="{{ route('orders.index') }}" :active="request()->routeIs('orders.index')" class="text-green-200 hover:text-white">
                            {{ __('Mis Pedidos') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                {{-- CARRITO (Solo para Clientes) --}}
                @if(auth()->user()->role == 'cliente')
                    <a href="{{ route('cart.index') }}" class="me-4">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-200 hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            @if (count(session('cart', [])) > 0)
                                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                    {{ count(session('cart', [])) }}
                                </span>
                            @endif
                        </div>
                    </a>
                @endif
                
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-700 hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}
                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                </button>
                            </span>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.show') }}"> {{ __('Profile') }} </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}" x-data><@csrf<x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"> {{ __('Log Out') }} </x-dropdown-link></form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-green-200 hover:text-white focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /><path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-green-800">
        {{-- ... Código del menú responsivo ... --}}
    </div>
</nav>