<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBiomaRequest extends FormRequest
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
        $biomaId = $this->route('biomas')->id_bioma;
        return [
            'nome_bioma' => [
                'sometimes',
                'string',
                'max:100',
                Rule::unique('biomas', 'nome_bioma')->ignore($biomaId, 'id_bioma')
            ],
            'descricao_bioma' => 'sometimes|required|string',
            'imagem_bioma' => 'sometimes|nullable|string|max:255',
            'populacao_bioma' => 'sometimes|required|integer|min:0',
        ];
    }
}
