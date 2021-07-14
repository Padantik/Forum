<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sideBarUser extends Component
{
    public $requestingUser;
    public $selectedUser;
    public $allUsers;
    public $posts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($requestingUser, $selectedUser, $allUsers, $posts)
    {
        $this->requestingUser = $requestingUser;
        $this->selectedUser = $selectedUser;
        $this->allUsers = $allUsers;
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-bar-user');
    }
}
