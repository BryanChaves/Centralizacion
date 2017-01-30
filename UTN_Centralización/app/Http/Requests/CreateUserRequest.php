<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|min:2|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', 
            'last_name_1'=>'required|min:2|max:150|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'last_name_2'=>'required|min:2|max:150|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'ID_number'=>'required|min:8|numeric|unique:users',
            'telephone_number'=>'required|min:8|numeric|regex:/^[0-9]{8}$/',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required' 
        ];
    }
}
