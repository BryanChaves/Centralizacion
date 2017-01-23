<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditConcessionRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'agent_id'=>'required|numeric',
            'agent_number'=>'required',
            'resolution_id'=>'required|numeric',
            'file_id'=>'required|numeric',
            'fileType_id'=>'required|numeric',
            'conferment_date'=>'date',
            'due_date'=>'date',
            'owner'=>'required|alpha',
            'property_number'=>'required',
            'water_tapping_point'=>'required',
            'authorized_use'=>'required|alpha',
            'assigned_flow'=>'required|numeric',
            'capacity_flow'=>'required|numeric',
            'viability_id'=>'required|numeric',
            'path'=>'mimes:pdf'  
        ];
    }
}
