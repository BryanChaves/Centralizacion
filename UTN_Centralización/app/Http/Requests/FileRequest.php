<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FileRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'num_file'=>'required'
        ];
    }
}
