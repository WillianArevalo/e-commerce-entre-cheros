<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $text;
    public $icon;
    public $typeButton;
    public $class;

    /**
     * Create a new component instance.
     */
    public function __construct($type = 'primary', $text = '', $icon = '', $typeButton = '', $class = '')
    {
        $this->type = $type;
        $this->text = $text;
        $this->icon = $icon;
        $this->typeButton = $typeButton;
        $this->class = $class;
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
