<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function rules()
    {
        return [
            'ar.title' => 'required',
            'fr.title' => 'required'
        ];
    }
}
