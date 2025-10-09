<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdministradorRequest extends FormRequest
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
        $adminId = $this->route('administrador')->id_admin;
        return [
            'nome_admin' => 'sometimes|required|string|max:100',
            'login' => [
                'sometimes',
                'required',
                'string',
                'max:50',
                Rule::unique('administrador', 'login')->ignore($adminId, 'id_admin'),
            ],
            'senha' => 'sometimes|required|string|min:6',
        ];
    }
}
