<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'midia_post' => 'nullable|string|max:255',
            'titulo_post' => 'required|string|max:200',
            'texto_post' => 'required|string',
            'aprovado_post' => 'nullable|boolean',
            'bioma_id' => 'required|exists:biomas,id_bioma',
            'postador_id' => 'required|exists:info_postador,id_postador'
        ];
    }
}
