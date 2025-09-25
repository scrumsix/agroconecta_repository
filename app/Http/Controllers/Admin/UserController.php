<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Muestra una lista de todos los usuarios.
     */
    public function index()
    {
        // 1. Obtiene todos los usuarios de la base de datos.
        $users = \App\Models\User::all();

        // 2. Devuelve la vista y le pasa la variable 'users' para que se puedan mostrar.
        return view('admin.users.index', compact('users'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        // Pasamos un 'user' nulo para que el formulario sepa que estamos creando.
        return view('admin.users.create', ['user' => new User()]);
    }

    /**
     * Guarda el nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos que vienen del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|string|in:admin,campesino,cliente,repartidor',
            'password' => 'required|string|min:8',
        ]);

        // Creación del usuario en la base de datos
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.users.index')->with('ok', 'Usuario creado exitosamente.');
    }

    /**
     * Muestra un usuario específico.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     */
    public function edit(User $user)
    {
        // Devolvemos una vista ('edit.blade.php') y le pasamos el usuario específico
        // que Laravel ya ha encontrado en la base de datos por nosotros.
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Actualiza un usuario en la base de datos.
     */
    public function update(Request $request, User $user)
    {
        // 1. Validación de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,campesino,cliente,repartidor',
            'password' => 'nullable|string|min:8', // 'nullable' significa que es opcional
        ]);

        // 2. Actualiza los datos del usuario
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        // 3. Si se proporcionó una nueva contraseña, la actualiza
        if (!empty($validated['password'])) {
            $user->password = \Illuminate\Support\Facades\Hash::make($validated['password']);
        }

        // 4. Guarda los cambios en la base de datos
        $user->save();

        // 5. Redirige a la lista de usuarios con un mensaje de éxito
        return redirect()->route('admin.users.index')->with('ok', 'Usuario actualizado exitosamente.');
    }

    /**
     * Elimina un usuario de la base de datos.
     */
     public function destroy(User $user)
    {
        // 1. Elimina el usuario de la base de datos.
        $user->delete();

        // 2. Redirige de vuelta a la lista de usuarios con un mensaje de éxito.
        return redirect()->route('admin.users.index')->with('ok', 'Usuario eliminado exitosamente.');
    }
}