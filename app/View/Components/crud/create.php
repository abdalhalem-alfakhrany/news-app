<?php

namespace App\View\Components\crud;

use Illuminate\View\Component;

class create extends Component
{
    public function __construct($create_route)
    {
    }

    public function render()
    {
        return view('components.crud.create');
    }
}
