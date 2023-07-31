<?php

namespace App\Http\Requests\Adervtisement\video;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function rules()
    {
        return [
            'video' => 'nullable',
            'name' => 'required',
        ];
    }
}
