<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarSolicitud extends FormRequest
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
            'tipoDeSolicitud' => 'required|regex:/[DiaLibre][Vacacion][DiaAdministrativo][InformarLicencia][InformarAusencia]/',
            'tipoDeSolicitud' => 'required|regex:/[Vacacion]/',
            'tipoDeSolicitud' => 'required|regex:/[DiaAdministrativo]/',
            'tipoDeSolicitud' => 'required|regex:/[InformarLicencia]/',
            'tipoDeSolicitud' => 'required|regex:/[InformarAusencia]/',
            'desdeSolicitud' => 'date',
            'hastaSolicitud' => 'date',
            'Comentario' => 'max:200',

        ];
    }
}
