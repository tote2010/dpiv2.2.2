<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules()
    {
        return [
            // 'nombre' => 'required|string|max:100',
            // 'categorias_id' => 'required|exists:categorias,id',
            // 'comentarios' => 'max:255',
            'nombre' => ['required', 'string', 'max:150'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'acepta_adicionales' => ['boolean'],
            'comentarios' => ['nullable', 'string'],
            'activo' => ['boolean'],
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

    public function prepareForValidation()
    {
        $this->merge([
            'acepta_adicionales' => $this->boolean('acepta_adicionales'),
            'activo' => $this->boolean('activo'),
        ]);
    }
}