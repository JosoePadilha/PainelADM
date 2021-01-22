<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
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
            'name'=> 'required|min:10|max:255',
            'email'=> 'required|email:rfc,filter|min:10|max:255',
            'phone'=> 'nullable|min:14|max:15',
            'password'=> 'required|min:8|max:80',
            'passwordRepit'=> 'required|min:8|max:80|same:password',
            'avatar'=> 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome Obrigatório',
            'email.required' => 'E-mail Obrigatório',
            'password.required' => 'Senha com no mímio 8 caracteres',
            'passwordRepit.required' => 'Senhas não são iguais',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'E-mail',
            'phone' => 'Telefone',
            'password' => 'Senha',
            'passwordRepit' => 'Repita a senha',
        ];
    }
}
