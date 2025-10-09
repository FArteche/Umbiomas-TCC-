<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreBiomaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome_bioma' => 'required|string|max:100|unique:bioma,nome_bioma',
            'descricao_bioma' => 'required|string',
            'imagem_bioma' => 'nullable|string|max:255',
            'populacao_bioma' => 'integer|min:0',
        ];
    }
}
