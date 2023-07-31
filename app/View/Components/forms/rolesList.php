<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class rolesList extends Component
{
    public $userRoles;

    public function __construct($userRoles)
    {
        $this->userRoles = $userRoles;
    }

    public function render()
    {
        return view('components.forms.roles-list');
    }
}
