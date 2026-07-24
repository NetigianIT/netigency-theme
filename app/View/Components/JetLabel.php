<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JetLabel extends Component
{
    public $value;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $value
     * @return void
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.jet-label');
    }
}

