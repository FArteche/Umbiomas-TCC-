<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'midia_post' => 'sometimes|nullable|string|max:255',
            'titulo_post' => 'sometimes|required|string|max:200',
            'texto_post' => 'sometimes|required|string',
            'aprovado_post' => 'sometimes|nullable|boolean',
            'bioma_id' => 'sometimes|required|exists:biomas,id_bioma',
            'postador_id' => 'sometimes|required|exists:info_postador,id_postador'
        ];
    }
}
