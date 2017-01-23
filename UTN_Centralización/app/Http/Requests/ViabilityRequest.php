<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ViabilityRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'project_name'=>'required|alpha',
            'setena_administrative_record'=>'required',
            'cadrastal_plane_number'=>'required',
            'property_number'=>'required',
            'province'=>'required|numeric',
            'canton'=>'required|numeric',
            'district'=>'required|numeric',
            'coordinate'=>'required',
            'path'=>'mimes:pdf'
        ];
    }
}
