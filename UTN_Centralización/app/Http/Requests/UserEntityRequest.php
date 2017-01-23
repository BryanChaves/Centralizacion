<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEntityRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id'=>'required|numeric|unique:user_entity',
            'entity_id'=>'required|numeric'  
        ];
    }
}
