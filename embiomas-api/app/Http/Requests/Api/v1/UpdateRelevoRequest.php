<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRelevoRequest extends FormRequest
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
            'nome_relevo' => 'sometimes|required|string|max:100',
            'descricao_relevo' => 'sometimes|required|string',
            'tipo_relevo' => 'sometimes|required|string|max:100',
            'imagem_relevo' => 'sometimes|nullable|string|max:255',
            'bioma_id' => 'sometimes|required|exists:biomas,id_bioma',
        ];
    }
}
