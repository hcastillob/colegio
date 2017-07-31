<?php

namespace Colegio\Http\Requests;

use Colegio\Http\Requests\Request;

class AdminUserFormRequest extends Request
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
            //validacion para user
            'username' => 'required|max:8|min:8',
            'email' =>'required|email',
            'password' =>'required',
        ];
    }
}
