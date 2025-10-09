<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreRelevoRequest extends FormRequest
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
            'nome_relevo' => 'required|string|max:100',
            'descricao_relevo' => 'required|string',
            'tipo_relevo' => 'required|string|max:100',
            'imagem_relevo' => 'nullable|string|max:255',
            'bioma_id' => 'required|exists:biomas,id_bioma',
        ];
    }
}
