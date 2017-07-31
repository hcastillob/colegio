<?php

namespace Colegio\Http\Requests;

use Colegio\Http\Requests\Request;

class CursoFormRequest extends Request
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

    public function rules()
    {
        return [
            'idcurso' => 'required|max:5|min:5',
            'nombre' => 'required|max:80',
            'nombre_corto' => 'required|max:3',
            //'estado' => 'required',
            //'idgrado' => 'required'
        ];
    }
}
