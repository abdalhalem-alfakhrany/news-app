<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function rules()
    {
        return [
            'image' => 'file|nullable|max:5000',

            'ar.title' => 'required',
            'ar.section1' => 'required',

            'fr.title' => 'required',
            'fr.section1' => 'required',

            'category' => 'required',
        ];
    }
}
