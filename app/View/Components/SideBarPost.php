<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideBarPost extends Component
{

    public $sidebarpost;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sidebarpost)
    {
        $this->sidebarpost = $sidebarpost;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-bar-post');
    }
}
