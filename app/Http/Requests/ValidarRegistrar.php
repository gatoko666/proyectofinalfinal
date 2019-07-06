<?php

namespace App\Http\Requests;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class ValidarRegistrar extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required|max:50',
            'password' => 'required|min:8',
             'rut' => 'required|cl_rut',
      
        ];
    }
}
