<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarDocumento extends FormRequest
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
            'Descripcion' => 'required|max:180' ,
            'NombreDocumento' => 'required|max:45',
            'userfile' => 'required|mimes:pdf|max:2048' ,           
        ];
    }
}
