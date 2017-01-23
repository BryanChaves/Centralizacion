<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEntityRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|alpha|unique:entity', 
            'address'=>'required',
            'email'=>'required|email|max:255|unique:entity',
            'telephone_number'=>'required|min:8|numeric',
            'description'=>'required',
            'rol_id'=>'required|numeric' 
        ];
    }
}
