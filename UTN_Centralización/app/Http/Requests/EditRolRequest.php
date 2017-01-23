<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditRolRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rol_value'=>'required|alpha'
        ];
    }
}
