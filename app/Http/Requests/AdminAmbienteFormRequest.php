<?php

namespace Colegio\Http\Requests;

use Colegio\Http\Requests\Request;

class AdminAmbienteFormRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'idambiente' => 'required|max:5',
            'nombre' => 'required|max:45',
            'capacidad' => 'required',
            'idpabellon' => 'required',
        ];
    }
}
