<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra la lista de todos los usuarios.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        // La clave está aquí: pasamos un nuevo objeto User a la vista.
        // La vista _form ahora tendrá acceso a la variable $user,
        // aunque todas sus propiedades (name, email, etc.) estarán vacías.
        return view('admin.users.create', [
            'user' => new \App\Models\User(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * (Lo implementaremos después)
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * (No lo usaremos por ahora)
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * (Lo implementaremos después)
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * (Lo implementaremos después)
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * (Lo implementaremos después)
     */
    public function destroy(User $user)
    {
        //
    }
}