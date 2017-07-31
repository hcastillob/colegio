<?php

namespace Colegio\Http\Requests;

use Colegio\Http\Requests\Request;

class AdminPabellonFormRequest extends Request
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
            'idpabellon' => 'required|max:3',
            'nombre' => 'required|max:45',
            'cant_amb' => 'required',
        ];
    }
}
