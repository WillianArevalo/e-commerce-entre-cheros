<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardProduct extends Component
{

    public $product;
    public $slide;
    /**
     * Create a new component instance.
     */
    public function __construct($product, $slide = false)
    {
        $this->product = $product;
        $this->slide = $slide;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-product');
    }
}
