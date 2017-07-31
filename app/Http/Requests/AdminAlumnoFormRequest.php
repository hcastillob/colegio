<?php

namespace Colegio\Http\Requests;

use Colegio\Http\Requests\Request;

class AdminAlumnoFormRequest extends Request
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idalumno' => 'required|max:10|min:10',
            'idgrado' => 'required',
            'idseccion' => 'required',
            'idpadre' => 'required',
        ];
    }
}
