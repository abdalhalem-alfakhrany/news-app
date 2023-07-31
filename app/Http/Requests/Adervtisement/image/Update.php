<?php

namespace App\Http\Requests\Adervtisement\image;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
