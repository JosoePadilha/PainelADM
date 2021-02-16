<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:8|max:80|confirmed',
            'password_confirmation' => 'required|min:8|max:80|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Senha com no mímio 8 caracteres',
            'password_confirmation.required' => 'Senhas não são iguais',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Senha',
            'password_confirmation' => 'Repita a senha',
        ];
    }
}
