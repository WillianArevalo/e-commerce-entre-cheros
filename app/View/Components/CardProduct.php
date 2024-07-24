<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardProduct extends Component
{

    public $product;
    public $slide;
    public $width;
    /**
     * Create a new component instance.
     */
    public function __construct($product, $slide = false, $width = "")
    {
        $this->product = $product;
        $this->slide = $slide;
        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-product');
    }
}
