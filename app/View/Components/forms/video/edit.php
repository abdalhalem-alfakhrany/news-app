<?php

namespace App\View\Components\forms\video;

use Illuminate\View\Component;

class edit extends Component
{
    protected $name, $title, $videoSrc;

    public function __construct($name, $title, $videoSrc)
    {
        $this->name = $name;
        $this->title = $title;
        $this->videoSrc = $videoSrc;
    }

    public function render()
    {
        return view('components.forms.video.edit');
    }
}
