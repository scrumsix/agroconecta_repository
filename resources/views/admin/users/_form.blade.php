@csrf

{{-- Campo Nombre --}}
<div class="mb-6">
    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
           class="block w-full mt-1 bg-gray-50 border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
</div>

{{-- Campo Email --}}
<div class="mb-6">
    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
           class="block w-full mt-1 bg-gray-50 border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
</div>

{{-- Campo Rol --}}
<div class="mb-6">
    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Rol:</label>
    <select name="role" id="role" 
            class="block w-full mt-1 bg-gray-50 border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
        <option value="cliente" @if(old('role', $user->role) == 'cliente') selected @endif>Cliente</option>
        <option value="campesino" @if(old('role', $user->role) == 'campesino') selected @endif>Campesino</option>
        <option value="repartidor" @if(old('role', $user->role) == 'repartidor') selected @endif>Repartidor</option>
        <option value="admin" @if(old('role', $user->role) == 'admin') selected @endif>Administrador</option>
    </select>
</div>

{{-- Campo Contraseña --}}
<div class="mb-4">
    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
    <input type="password" name="password" id="password" 
           class="block w-full mt-1 bg-gray-50 border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" @if($user->exists) @else required @endif>
    @if($user->exists)
        <p class="text-xs text-gray-500 mt-1">Deja este campo en blanco para no cambiar la contraseña.</p>
    @endif
</div>