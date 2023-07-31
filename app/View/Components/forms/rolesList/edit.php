<?php

namespace App\View\Components\forms\rolesList;

use Illuminate\View\Component;

class edit extends Component
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('components.forms.rolesList.edit');
    }
}
