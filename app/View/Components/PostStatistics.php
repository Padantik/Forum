<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostStatistics extends Component
{

    public $poststatistics;
    public $action;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($poststatistics, $action, $type)
    {
        $this->poststatistics = $poststatistics;
        $this->action = $action;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-statistics');
    }
}
