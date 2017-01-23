<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ParameterlevelRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'level'=>'required|in:1,2,3,4',
            'parameter_id'=>'required|numeric'
        ];
    }
}
