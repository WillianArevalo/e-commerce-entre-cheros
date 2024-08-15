<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectStore extends Component
{
    public  $label;
    public  $id;
    public  $name;
    public  $value;
    public  $options;
    public  $selected;
    public  $text;
    public  $required;

    /**
     * Create a new component instance.
     */
    public function __construct($label = "", $id, $name, $value = "", $options = [], $selected = "", $text = "", $required = "")
    {
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->options = $options;
        $this->selected = $selected;
        $this->text = $text;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-store');
    }
}
