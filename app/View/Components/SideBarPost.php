<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideBarPost extends Component
{

    public $sidebarpost;
    public $sidebarpostheader;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sidebarpost, $sidebarpostheader)
    {
        $this->sidebarpost = $sidebarpost;
        $this->sidebarpostheader = $sidebarpostheader;
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
