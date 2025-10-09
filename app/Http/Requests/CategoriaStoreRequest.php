<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:100',
            'comentarios' => 'max:255',            
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'name.string' => 'Este campo debe contener caracteres solo alfabéticos.',
            'name.max' => 'La cantidad máxima de caracteres para este campo es de 100.',
            'comentarios.max' => 'La cantidad máxima de caracteres para este campo es de 255.',
        ];
    }
}
