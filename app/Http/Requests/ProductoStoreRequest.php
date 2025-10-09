<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:100',
            'categoria_id' => 'required|exists:categorias,id',
            'comentarios' => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'Este campo debe contener caracteres solo alfabéticos.',
            'nombre.max' => 'La cantidad máxima de caracteres para este campo es de 100.',
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
            'comentarios.max' => 'La cantidad máxima de caracteres para este campo es de 255.',
        ];
    }
}
