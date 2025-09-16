<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Usuario; // <-- CORREGIDO: Usamos tu modelo Usuario
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Muestra una lista de todos los recursos (empleados/usuarios).
     */
    public function index()
    {
        // 1. Obtiene todos los registros de la tabla 'usuarios' usando el modelo
        $employees = Usuario::all();

        // 2. Devuelve la vista y le pasa la variable con todos los datos
        return view('employee.index', compact('employees'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        // Aquí irá la lógica para mostrar el formulario de creación
    }

    /**
     * Guarda el nuevo recurso en la base de datos.
     */
    public function store(Request $request)
    {
        // Aquí irá la lógica para guardar un nuevo empleado
    }

    /**
     * Muestra un recurso específico.
     */
    public function show(Usuario $usuario) // <-- CORREGIDO
    {
        // Aquí puedes mostrar los detalles de un solo empleado
    }

    /**
     * Muestra el formulario para editar un recurso.
     */
    public function edit(Usuario $usuario) // <-- CORREGIDO
    {
        // Aquí irá la lógica para mostrar el formulario de edición
    }

    /**
     * Actualiza un recurso específico en la base de datos.
     */
    public function update(Request $request, Usuario $usuario) // <-- CORREGIDO
    {
        // Aquí irá la lógica para actualizar el empleado
    }

    /**
     * Elimina un recurso específico de la base de datos.
     */
    public function destroy(Usuario $usuario) // <-- CORREGIDO
    {
        // Aquí irá la lógica para eliminar el empleado
    }
}