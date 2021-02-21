<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProducts extends FormRequest
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
        return [
            'name' => "required|min:5|max:255|unique:products,name,{$id},id",
            'price' => 'required|min:4|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:15048',
            'family_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome do produto obrigatório',
            'price.required' => 'Valor do produto obrigatório',
            'family_id.required' => 'Nome da família obrigatório',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome do produto',
            'price' => 'Valor do produto',
            'family_id' => 'Nome da família',
        ];
    }
}
