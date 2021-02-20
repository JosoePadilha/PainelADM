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

        // if (Route::currentRouteName() == 'familyEdit') {
        //     return [
        //         'name' => "required|min:5|max:255,unique:familys,name,{$id},id",
        //     ];
        // } else {
        //     return [
        //         'name' => "required|min:5|max:255,unique:familys,name,{$id},id",
        //     ];
        // }

        return [
            'name' => "required|min:5|max:255,unique:familys,name,{$id},id",
        ];
    }

    public function messages()
    {
        // if (Route::currentRouteName() == 'familyEdit') {
        //     return [
        //         'name.required' => 'Nome da família obrigatório',
        //     ];
        // } else {
        //     return [
        //         'name.required' => 'Nome da família obrigatório',
        //     ];
        // }

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
