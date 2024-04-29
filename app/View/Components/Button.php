<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $target;
    public $type;
    public $text;

    public function __construct($target, $type, $text)
    {
        $this->target = $target;
        $this->type = $type;
        $this->text = $text;
    }
    

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.button');
    }
}
