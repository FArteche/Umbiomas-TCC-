<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreArea_PreservacaoRequest extends FormRequest
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
            'nome_ap' => 'required|string|max:100',
            'descricao_ap' => 'required|string',
            'bioma_id' => 'required|exists:biomas,id_bioma',
            'tipoap_id' => 'required|exists:tipo_area_preservacao,id_tipoap',
        ];
    }
}
