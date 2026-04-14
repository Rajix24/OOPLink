<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class bar_input extends Component
{

    public $name;
    public $placholder;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $placeholder)
    {
        $this->name = $name;
        $this->placholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bar_input');
    }
}
