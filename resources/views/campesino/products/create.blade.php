<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Nuevo Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('campesino.productos.store') }}" method="POST" enctype="multipart/form-data">
                    {{-- Usamos el formulario parcial --}}
                    @include('campesino.products._form')
                    
                    {{-- ESTA ES LA SECCIÓN DE BOTONES ACTUALIZADA  --}}
                    <div class="flex items-center justify-end mt-6 border-t pt-4">
                        <a href="{{ route('campesino.productos.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancelar</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                            Guardar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

