<?php

namespace App\View\Components\forms\video;

use Illuminate\View\Component;

class create extends Component
{
    protected $name, $title;

    public function __construct($name, $title)
    {
        $this->name = $name;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.forms.video.create');
    }
}
