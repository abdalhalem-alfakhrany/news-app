<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Updata extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
        ];
    }
}
