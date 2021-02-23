<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreUpdateDocument extends FormRequest
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
            'title' => 'required|min:5|max:255',
            'document' => 'required|file|max:5000|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Título Obrigatório',
            'document.required' => 'Documento Obrigatório',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Título',
            'dueDate' => 'Data de vencimento',
            'document' => 'Documento',
        ];
    }
}
