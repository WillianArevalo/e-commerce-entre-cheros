<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{

    public string $type;
    public string $name;
    public string $id;
    public string $label;
    public string $placeholder;
    public string $value;
    public string $class;
    public string $required;
    public string $icon;
    public bool $error;

    /**
     * Create a new component instance.
     */
    public function __construct($type = "text", $name = "", $id = "", $placeholder = "", $value = "", $class = "", $label = "", $required = "", $icon = "", $error = true)
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->class = $class;
        $this->label = $label;
        $this->required = $required;
        $this->icon = $icon;
        $this->error = $error;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
