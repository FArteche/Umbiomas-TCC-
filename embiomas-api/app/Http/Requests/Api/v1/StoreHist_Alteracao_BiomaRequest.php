<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreHist_Alteracao_BiomaRequest extends FormRequest
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
            'bioma_id' => 'required|exists: biomas,id_bioma',
            'admin_id' => 'required|exists: administrador,id_admin',
            'tipo_alteracao' => 'required|in:criacao, edicao, exclusao',
            'dados_antigos' => 'nullable|json',
            'dados_novos' => 'nullable|json'
        ];
    }
}
