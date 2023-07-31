<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function rules()
    {
        return [
            'ar.title' => 'required',
            'ar.section1' => 'required',

            'fr.title' => 'required',
            'fr.section1' => 'required',

            'category' => 'required',
        ];
    }
}
