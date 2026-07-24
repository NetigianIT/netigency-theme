<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JetInput extends Component
{
    public $type;

    /**
     * Create a new component instance.
     *
     * @param  string  $type
     * @return void
     */
    public function __construct($type = 'text')
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.jet-input');
    }
}

