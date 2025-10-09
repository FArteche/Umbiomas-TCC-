<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfo_PostadorRequest extends FormRequest
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
            'nome_postador' => 'sometimes|required|string|max:100',
            'email_postador' => 'sometimes|required|string|max:150',
            'telefone_postador' => 'sometimes|required|string|max:30',
            'instituicao_postador' => 'sometimes|required|string|max:150',
            'ocupacao_postador' => 'sometimes|required|string|max:100',
        ];
    }
}
