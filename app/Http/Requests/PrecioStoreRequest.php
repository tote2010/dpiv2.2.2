<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrecioStoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
