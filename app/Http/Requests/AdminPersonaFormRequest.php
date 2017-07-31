<?php

namespace Colegio\Http\Requests;

use Colegio\Http\Requests\Request;

class AdminPersonaFormRequest extends Request
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
            'dni' => 'required|max:8|min:8',
            'nombres' => 'required|max:30',
            'apellido_paterno' => 'required|max:20',
            'apellido_materno' => 'required|max:20',
            'direccion'=> 'required|max:100',
            'fecha_nac' => 'required',
            'sexo' => 'required',
            
        ];
    }
}
