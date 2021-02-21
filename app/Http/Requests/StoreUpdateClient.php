<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreUpdateClient extends FormRequest
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

        if (Route::currentRouteName() == 'clientEdit') {
            return [
                'name' => 'required|min:5|max:255',
                'socialReason' => "required|min:10|max:255|unique:clients,socialReason,{$id},id",
                'cnpj' => "required|min:18|max:18|cnpj|formato_cnpj|unique:clients,cnpj,{$id},id",
                'phone' => "required|min:14|max:15|telefone_com_ddd|unique:clients,phone,{$id},id",
                'celPhone' => "nullable|min:14|max:15|celular_com_ddd|unique:clients,phone,{$id},id",
                'email' => "required|unique:clients,email,{$id},id|email:rfc,filter|min:10|max:255",
                'city' => 'required|min:5|max:255',
                'neighborhood' => 'required|min:5|max:50',
                'number' => 'nullable',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:15048',
            ];
        } else {
            return [
                'name' => 'required|min:5|max:255',
                'socialReason' => "required|min:10|max:255|unique:clients,socialReason,{$id},id",
                'cnpj' => "required|min:18|max:18|cnpj|formato_cnpj|unique:clients,cnpj,{$id},id",
                'phone' => "required|min:14|max:15|telefone_com_ddd|unique:clients,phone,{$id},id",
                'celPhone' => "nullable|min:14|max:15|celular_com_ddd|unique:clients,phone,{$id},id",
                'email' => "required|unique:clients,email,{$id},id|email:rfc,filter|min:10|max:255",
                'city' => 'required|min:5|max:255',
                'neighborhood' => 'required|min:5|max:50',
                'number' => 'nullable',
                'password' => 'required|min:8|max:80|confirmed',
                'password_confirmation' => 'required|min:8|max:80|same:password',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:15048',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome Obrigatório',
            'socialReason.required' => 'Razão Social Obrigatória',
            'cnpj.required' => 'CNPJ obrigatório',
            'phone.required' => 'Telefone obrigatório',
            'email.required' => 'E-mail Obrigatório',
            'city.required' => 'Cidade Obrigatório',
            'neighborhood.required' => 'Bairro Obrigatório',
            'password.required' => 'Senha com no mímio 8 caracteres',
            'password_confirmation.required' => 'Senhas não são iguais',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'socialReason' => 'Razão Social',
            'cnpj' => 'CNPJ',
            'phone' => 'Telefone',
            'celPhone' => 'Celular',
            'email' => 'E-mail',
            'city' => 'Cidade',
            'neighborhood' => 'Bairro',
            'number' => 'Número',
            'avatar' => 'Imagem',
            'password' => 'Senha',
            'password_confirmation' => 'Repita a senha',
        ];
    }
}
