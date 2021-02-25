<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImage extends FormRequest
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
            'name' => 'required|min:5|max:255|',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:15048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome da imagem obrigatório',
            'avatar.required' => 'Imagem obrigatória',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome da imagem',
            'avatar' => 'Imagem',
        ];
    }
}
