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
            'name'=>'required|alpha', 
            'last_name_1'=>'required|alpha',
            'last_name_2'=>'required|alpha',
            'ID_number'=>'required|min:8|numeric|unique:users',
            'telephone_number'=>'min:8|numeric',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required' 
        ];
    }
}
