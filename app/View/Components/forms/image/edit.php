<?php

namespace App\View\Components\forms\image;

use Illuminate\View\Component;

class edit extends Component
{
    protected $name, $title, $imageSrc;

    public function __construct($name, $title, $imageSrc)
    {
        $this->name = $name;
        $this->title = $title;
        $this->imageSrc = $imageSrc;
    }

    public function render()
    {
        return view('components.forms.image.edit');
    }
}
