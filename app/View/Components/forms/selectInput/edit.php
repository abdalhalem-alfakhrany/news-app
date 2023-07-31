<?php

namespace App\View\Components\forms\selectInput;

use Illuminate\View\Component;

class edit extends Component
{
    public $title, $options, $selected, $name;

    public function __construct($title, $options, $selected, $name)
    {
        $this->title = $title;
        $this->options = $options;
        $this->selected = $selected;
        $this->name = $name;
    }

    public function render()
    {
        return view('components.forms.selectInput.edit');
    }
}
