<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function rules()
    {
        return [
            'image' => 'required',
            'ar.title' => 'required',
            'fr.title' => 'required'
        ];
    }
}
