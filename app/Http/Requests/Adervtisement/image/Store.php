<?php

namespace App\Http\Requests\Adervtisement\image;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function rules()
    {
        return [
            'image' => 'file|required|max:5000',
            'name' => 'required',
        ];
    }
}
