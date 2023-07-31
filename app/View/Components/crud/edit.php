<?php

namespace App\View\Components\crud;

use Illuminate\View\Component;

class edit extends Component
{
    public function __construct()
    {
    }

    public function render()
    {
        return view('components.crud.edit');
    }
}
