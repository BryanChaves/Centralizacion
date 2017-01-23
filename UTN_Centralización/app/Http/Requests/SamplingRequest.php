<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SamplingRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'label'=>'required',
            'level'=>'required|in:1,2,3,4',
            'sampling_site_id'=>'required|numeric'
        ];
    }
}
