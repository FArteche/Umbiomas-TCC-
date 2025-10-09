<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreHidrografiaRequest extends FormRequest
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
            'nome_hidrogafia' => 'required|string|max:100',
            'descricao_hidrografia' => 'required|string',
            'tipo_hidrografia' => 'required|string|max:100',
            'imagem_hidrografia' => 'nullable|string|max:255',
            'bioma_id' => 'required|exists:biomas,id_bioma',
        ];
    }
}
