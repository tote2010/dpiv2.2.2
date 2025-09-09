<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'email2' => 'nullable|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'dni' => 'nullable|numeric|unique:users',
            'fechanacimiento' => 'nullable|date',
            'empresa' => 'max:100',
            'telefonos' => 'max:255',
            'direccion' => 'max:100',
            'localidad' => 'max:100',
            'provincia' => 'max:100',
            'roles' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'Este campo debe contener caracteres solo alfabéticos.',
            'name.max' => 'La cantidad máxima de caracteres para este campo es de 100.',
            'lastname.required' => 'El apellido es obligatorio.',
            'lastname.string' => 'Este campo debe contener caracteres solo alfabéticos.',
            'lastname.max' => 'La cantidad máxima de caracteres para este campo es de 100.',
            'dni.unique' => 'El DNI/Pasaporte ya está registrado en el sistema.',
            'dni.numeric' => 'El DNI/Pasaporte debe contener caracteres solo numéricos.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, introducir una dirección de correo electrónico válida.',
            'email.unique' => 'El correo electrónico ya está registrado en el sistema.',
            'email2.email' => 'Por favor, introducir una dirección de correo electrónico válida.',
            'email2.unique' => 'El correo electrónico ya está registrado en el sistema.',
            'password.required' => 'Ingresar una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Confirmar la contraseña.',
            'fechanacimiento.date' => 'Por favor, introduce una fecha válida.',
            'telefonos.max' => 'La cantidad máxima de caracteres para este campo es de 255.',
            'empresa.max' => 'La cantidad máxima de caracteres para este campo es de 100.',
            'direccion.max' => 'La cantidad máxima de caracteres para este campo es de 100.',
            'localidad.max' => 'La cantidad máxima de caracteres para este campo es de 100.',
            'provincia.max' => 'La cantidad máxima de caracteres para este campo es de 100.',
            'roles.required' => 'El obligatorio seleccionar un rol para el usuario nuevo.',
        ];
    }
}
