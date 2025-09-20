<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form action="{{ route('employee.update', $employee) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Esta línea llama al formulario y le pasa los datos --}}
                    @include('employee._form')

                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('employee.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                            Cancelar
                        </a>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                            Actualizar Empleado
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>