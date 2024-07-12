<?php

namespace App\View\Components;

use Illuminate\View\Component;

class textarea extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $label;
    public $labelid;
    public $placeholder;
    public function __construct($name,$label,$labelid,$placeholder=null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->labelid = $labelid;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.textarea');
    }
}
