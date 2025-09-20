@csrf

<!-- Mostrador de Errores de Validación -->
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">¡Error!</strong>
        <span class="block sm:inline">Por favor, corrige los siguientes errores:</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Primer Nombre -->
    <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Primer Nombre</label>
        <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    </div>

    <!-- Apellido -->
    <div>
        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
        <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    </div>

    <!-- Email -->
    <div class="md:col-span-2">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email', $employee->email ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    </div>

    <!-- Rol -->
    <div>
        <label for="job_title" class="block mb-2 text-sm font-medium text-gray-900">Rol</label>
        <input type="text" id="job_title" name="job_title" value="{{ old('job_title', $employee->job_title ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>

    <!-- Salario -->
    <div>
        <label for="salary" class="block mb-2 text-sm font-medium text-gray-900">Salario</label>
        <input type="number" id="salary" name="salary" step="0.01" value="{{ old('salary', $employee->salary ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>
</div>