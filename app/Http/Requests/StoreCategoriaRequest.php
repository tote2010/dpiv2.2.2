<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // luego podemos meter roles
    }
    
    public function rules(): array
    {
        return [     
            'nombre' => ['required', 'string', 'max:100', 'unique:categorias,nombre'],   
            'activo' => ['required', 'boolean'],   
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'name.string' => 'Este campo debe contener caracteres solo alfabéticos.',
            'name.max' => 'La cantidad máxima de caracteres para este campo es de 100.',
            'nombre.unique' => 'Ya existe una categoría con ese nombre',
        ];
    }
}