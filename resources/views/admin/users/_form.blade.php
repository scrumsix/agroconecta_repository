@csrf

<!-- Mostrador de Errores de Validación -->
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">¡Error de Validación!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Nombre -->
    <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    </div>

    <!-- Email -->
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    </div>

    <!-- Rol -->
    <div>
        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Rol del Usuario</label>
        <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option value="admin" @selected(old('role', $user->role ?? '') == 'admin')>Administrador</option>
            <option value="campesino" @selected(old('role', $user->role ?? '') == 'campesino')>Campesino</option>
            <option value="cliente" @selected(old('role', $user->role ?? '') == 'cliente')>Cliente</option>
            <option value="repartidor" @selected(old('role', $user->role ?? '') == 'repartidor')>Repartidor</option>
        </select>
    </div>

    <!-- Contraseña -->
    <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <p class="mt-1 text-xs text-gray-500">Dejar en blanco para no cambiar la contraseña.</p>
    </div>
</div>