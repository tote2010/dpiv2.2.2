<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrecioUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'precio' => 'required|min:0|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'precio.required' => 'El campo Precio es obligarorio',
            'precio.min' => 'El campo Precio debe ser mayor o igual a 0',
            'precio.numeric' => 'El campo Precio debe numérico',
        ];
    }
}
