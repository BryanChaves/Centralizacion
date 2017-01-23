<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WatersourceRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'watersource_name'=>'required|alpha', 
            'address'=>'required',
            'coordinate_CRTM05'=>'required',
            'observations'=>'required'  
        ];
    }
}
