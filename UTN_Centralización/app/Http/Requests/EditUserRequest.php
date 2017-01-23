<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUserRequest extends Request
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
            'ID_number'=>'numeric',
            'telephone_number'=>'numeric|min:8',
            'email'=>'email|max:255'      
        ];
    }
}
