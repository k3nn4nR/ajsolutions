<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvaluacionCompletada extends FormRequest
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
            'id'                    =>'required|exists:evaluaciones_cabeceras',
            'detalles'              =>'required',
            'detalles.*.id'         =>'required|exists:evaluaciones_detalles,id',
            'detalles.*.puntaje'    =>'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required'                   =>'Se requiere el id de la evaluacion.',
            'id.exists'                     =>'El id no existe.',
            'detalles.required'             =>'Se requieren las respuestas.',
            'detalles.*.id.required'        =>'Se requiere la respuesta.',
            'detalles.*.id.exists'          =>'La respuesta no existe.',
            'detalles.*.puntaje.required'   =>'Se requiere el puntaje.',
        ];
    }
}
