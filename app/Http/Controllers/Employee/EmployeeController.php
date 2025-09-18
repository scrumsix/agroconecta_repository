<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee; // We make sure to import the correct model
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra la lista de todos los empleados.
     */
    public function index()
    {
        // This line now queries the correct model: Employee
        $employees = Employee::all();

        // This part remains the same
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     * Muestra el formulario para crear un nuevo empleado.
     */
    public function create()
    {
        // This function simply shows the view we already created
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     * Guarda el nuevo recurso en la base de datos.
     */
    public function store(Request $request)
    {
        // For now, we will just redirect to the list.
        // We will add the saving logic later.
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     * Muestra un recurso específico.
     */
    public function show(Employee $employee)
    {
        // Logic to show a single employee's details will go here
    }

    /**
     * Show the form for editing the specified resource.
     * Muestra el formulario para editar un recurso.
     */
    public function edit(Employee $employee)
    {
        // Logic to show the edit form will go here
    }

    /**
     * Update the specified resource in storage.
     * Actualiza un recurso específico en la base de datos.
     */
    public function update(Request $request, Employee $employee)
    {
        // Logic to update the employee will go here
    }

    /**
     * Remove the specified resource from storage.
     * Elimina un recurso específico de la base de datos.
     */
    public function destroy(Employee $employee)
    {
        // Logic to delete the employee will go here
    }
}