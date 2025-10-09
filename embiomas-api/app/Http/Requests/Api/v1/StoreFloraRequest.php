<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreFloraRequest extends FormRequest
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
            'nome_flora' => 'required|string|max:50',
            'nome_cientifico_flora' => 'required|string|max:100',
            'familia_flora' => 'required|string|max:100',
            'imagem_flora' => 'nullable|string|max:255',
            'descricao_flora' => 'required|string',
        ];
    }
}
