<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest; // ¡ESTA ES LA LÍNEA CLAVE QUE FALTABA!
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
        Employee::create($request->validated());
        return redirect()->route('employee.index')->with('ok', 'Empleado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     * (No lo usaremos por ahora)
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Muestra el formulario para editar un empleado existente.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Actualiza el empleado en la base de datos.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employee.index')->with('ok', 'Empleado actualizado exitosamente.');
    }

    /**
     * Elimina un empleado de la base de datos.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('ok', 'Empleado eliminado exitosamente.');
    }
}

