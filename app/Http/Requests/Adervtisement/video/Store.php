<?php

namespace App\Http\Requests\Adervtisement\video;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function rules()
    {
        return [
            'video' => 'file|required',
            'name' => 'required',
        ];
    }
}
