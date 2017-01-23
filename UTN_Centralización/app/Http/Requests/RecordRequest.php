<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RecordRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'sampling_id'=>'required|numeric',
            'parameter_id'=>'required|numeric',
            'value'=>'required'
        ];
    }
}
