<?php

namespace App\View\Components\forms\urlInput;

use Illuminate\View\Component;

class create extends Component
{
    public $title, $name;

    public function __construct($title,  $name)
    {
        $this->title = $title;
        $this->name = $name;
    }

    public function render()
    {
        return view('components.forms.urlInput.create');
    }
}
