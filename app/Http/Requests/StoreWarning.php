<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarning extends FormRequest
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
            'title' => 'required|min:5|max:255|',
            'content' => 'required|min:5|',
            'class' => 'required|min:4|max:20|',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Título obrigatório',
            'content.required' => 'Descrição obrigatória',
            'class.required' => 'Cor obrigatória',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Título do aviso',
            'content' => 'Descrição do aviso',
            'class' => 'Cor do aviso',
        ];
    }
}
