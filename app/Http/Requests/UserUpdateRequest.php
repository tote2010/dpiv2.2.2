<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'email2' => 'nullable|email',
            'password' => 'nullable|min:8|confirmed',
            'dni' => 'required|string|unique:users,dni,'.$this->user->id,
            'fechanacimiento' => 'date',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'roles' => 'required|array'
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
            'dni.required' => 'El DNI/Pasaporte es obligatorio.',
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
        ];
    }
}