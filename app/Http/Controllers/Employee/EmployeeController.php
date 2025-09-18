<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest; // ¡IMPORTANTE! Importamos el validador.
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Muestra la lista de todos los empleados.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Muestra el formulario para crear un nuevo empleado.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Guarda el nuevo empleado en la base de datos.
     */
    public function store(StoreEmployeeRequest $request)
    {
        // 1. La validación se ejecuta automáticamente gracias a StoreEmployeeRequest.
        // 2. Si la validación es exitosa, creamos el empleado con los datos limpios.
        Employee::create($request->validated());

        // 3. Redirigimos al listado con un mensaje de éxito.
        return redirect()->route('employee.index')->with('ok', 'Empleado creado exitosamente.');
    }

    /**
     * Muestra un recurso específico.
     */
    public function show(Employee $employee)
    {
        // Lógica para mostrar un solo empleado (lo implementaremos más adelante).
    }

    /**
     * Muestra el formulario para editar un recurso.
     */
    public function edit(Employee $employee)
    {
        // Lógica para mostrar el formulario de edición (lo implementaremos más adelante).
    }

    /**
     * Actualiza un recurso específico en la base de datos.
     */
    public function update(Request $request, Employee $employee)
    {
        // Lógica para actualizar (lo implementaremos más adelante).
    }

    /**
     * Elimina un recurso específico de la base de datos.
     */
    public function destroy(Employee $employee)
    {
        // Lógica para eliminar (lo implementaremos más adelante).
    }
}