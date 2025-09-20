<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // ¡IMPORTANTE! Esta línea es necesaria.

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Determina si el usuario está autorizado para hacer esta petición.
     */
    public function authorize(): bool
    {
        // Lo ponemos en true para permitir que cualquier usuario autenticado pueda actualizar.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Obtiene las reglas de validación que se aplican a la petición.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                // Esta es la regla clave para la actualización:
                // El email debe ser único en la tabla 'employees',
                // pero debe ignorar el del propio empleado que estamos editando.
                Rule::unique('employees')->ignore($this->employee),
            ],
            'job_title' => 'nullable|string|max:255',
            'salary' => 'nullable|numeric|min:0',
        ];
    }
}
