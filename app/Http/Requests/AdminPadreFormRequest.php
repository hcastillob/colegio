<?php

namespace Colegio\Http\Requests;

use Colegio\Http\Requests\Request;

class AdminPadreFormRequest extends Request
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
            //'dni_padre' => 'required|max:8|min:8',
            'cant_hijos' => 'required'
        ];
    }
}
