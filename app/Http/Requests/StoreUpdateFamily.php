<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class StoreUpdateFamily extends FormRequest
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
            'name' => "required|min:5|max:255|unique:familys,name,{$id},id",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome da família obrigatório',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome da família',
        ];
    }
}
