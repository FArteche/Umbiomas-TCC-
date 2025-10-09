<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHist_Alteracao_BiomaRequest extends FormRequest
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
            'bioma_id' => 'sometimes|required|exists: biomas,id_bioma',
            'admin_id' => 'sometimes|required|exists: administrador,id_admin',
            'tipo_alteracao' => 'sometimes|required|in:criacao, edicao, exclusao',
            'dados_antigos' => 'sometimes|nullable|json',
            'dados_novos' => 'sometimes|nullable|json'
        ];
    }
}
