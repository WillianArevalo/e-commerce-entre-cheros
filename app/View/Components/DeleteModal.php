<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteModal extends Component
{

    public $modalId;
    public $title;
    public $message;

    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $title, $message)
    {
        $this->modalId = $modalId;
        $this->title = $title;
        $this->message = $message;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-modal');
    }
}
