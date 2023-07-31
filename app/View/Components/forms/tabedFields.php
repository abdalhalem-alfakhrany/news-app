<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class rolesList extends Component
{
    public $tabs;

    public function __construct($tabs)
    {
        $this->tabs = $tabs;
    }

    public function render()
    {
        return view('components.forms.tabedFields');
    }
}
