<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditEntityRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required', 
            'address'=>'required',
            'email'=>'required|email|max:255',
            'telephone_number'=>'required|min:8',
            'description'=>'required',
            'rol_id'=>'required|numeric' 
        ];
    }
}
