<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AnalysisEditRequest extends Request
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
            'laboratory_name'=>'required|alpha',
            'analysis_type'=>'required|in:Microbiológicos,Físico-químicos',
            'date'=>'date',
            'report_number'=>'required',
            'path'=>'mimes:pdf'
        ];
    }
}
