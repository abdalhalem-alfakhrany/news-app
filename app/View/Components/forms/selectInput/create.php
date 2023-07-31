<?php

namespace App\View\Components\forms\selectInput;

use Illuminate\View\Component;

class create extends Component
{
    public $title, $options, $name;

    public function __construct($title, $options,  $name)
    {
        $this->title = $title;
        $this->options = $options;
        $this->name = $name;
    }

    public function render()
    {
        return view('components.forms.selectInput.create');
    }
}
