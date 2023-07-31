<?php

namespace App\View\Components\web;

use Illuminate\View\Component;

class articleCard extends Component
{

    public $image, $title, $section1, $id;

    public function __construct($image, $title, $section1, $id)
    {
        $this->image = $image;
        $this->title = $title;
        $this->section1 = $section1;
        $this->id = $id;
    }

    public function render()
    {
        return view('components.web.articleCard');
    }
}
