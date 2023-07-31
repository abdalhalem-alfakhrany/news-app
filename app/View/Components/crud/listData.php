<?php

namespace App\View\Components\crud;

use Illuminate\View\Component;

class listData extends Component
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('components.crud.listData');
    }
}
