<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateFlow_MeasurementRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'capacity'=>'required|numeric',
            'method'=>'required|in:Volumétrico,Dinámica de fluidos',
            'observations'=>'required',
            'date'=>'required|date',
            'weather'=>'required|in:Soleado,Lluvioso,Nublado', 
            'watersource_id'=>'required|numeric'    
        ];
    }
}
