<?php

namespace App\View\Components\forms\passwordInput;

use Illuminate\View\Component;

class edit extends Component
{
    public $title, $value,  $name;

    public function __construct($title, $value, $name)
    {
        $this->title = $title;
        $this->value = $value;
        $this->name = $name;
    }

    public function render()
    {
        return view('components.forms.passwordInput.edit');
    }
}
