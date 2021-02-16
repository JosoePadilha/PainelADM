<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

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
        $id = $this->segment(2);

        if (Route::currentRouteName() == 'collaboratorEdit') {
            return [
                'name' => 'required|min:10|max:255',
                'email' => "required|unique:users,email,{$id},id|email:rfc,filter|min:10|max:255",
                'phone' => "nullable|min:14|max:15|celular_com_ddd|unique:users,phone,{$id},id",
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:15048',
            ];
        } else {
            return [
                'name' => 'required|min:10|max:255',
                'email' => "required|unique:users,email,{$id},id|email:rfc,filter|min:10|max:255",
                'phone' => "nullable|min:14|max:15|celular_com_ddd|unique:users,phone,{$id},id",
                'password' => 'required|min:8|max:80|confirmed',
                'password_confirmation' => 'required|min:8|max:80|same:password',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:15048',
            ];
        }
    }

    public function messages()
    {
        if (Route::currentRouteName() == 'collaboratorEdit') {
            return [
                'name.required' => 'Nome Obrigatório',
                'email.required' => 'E-mail Obrigatório',
            ];
        } else {
            return [
                'name.required' => 'Nome Obrigatório',
                'email.required' => 'E-mail Obrigatório',
                'password.required' => 'Senha com no mímio 8 caracteres',
                'password_confirmation.required' => 'Senhas não são iguais',
            ];
        }
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'email' => 'E-mail',
            'phone' => 'Telefone',
            'avatar' => 'Imagem',
            'password' => 'Senha',
            'password_confirmation' => 'Repita a senha',
        ];
    }
}
