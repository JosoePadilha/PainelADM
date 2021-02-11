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
        $id = $this->segment(2);

        if (Route::currentRouteName() == 'documentEdit') {
            return [
                'title' => 'required|min:10|max:255',
                'dueDate' => 'required|min:10|max:255',
                'document' => 'required|file|max:5000|mimes:pdf',
            ];
        } else {
            return [
                'title' => 'required|min:5|max:255',
                'dueDate' => "required|min:8|max:10",
                'document' => 'required|file|max:5000|mimes:pdf',
            ];
        }
    }

    public function messages()
    {
        if (Route::currentRouteName() == 'documentEdit') {
            return [
                'title.required' => 'Título Obrigatório',
                'dueDate.required' => 'Data de vencimento Obrigatória',
                'document.required' => 'Documento Obrigatório',
            ];
        } else {
            return [
                'title.required' => 'Título Obrigatório',
                'dueDate.required' => 'Data de vencimento Obrigatória',
                'document.required' => 'Documento Obrigatório',
            ];
        }
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
