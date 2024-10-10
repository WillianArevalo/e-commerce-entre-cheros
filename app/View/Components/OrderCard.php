<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderCard extends Component
{
    public $order;
    public $styles;
    public $statusIcon;
    public $statusBorder;

    public function __construct($order)
    {
        $this->order = $order;

        // Define styles and icons based on order status
        switch ($order->status) {
            case 'pending':
                $this->styles = 'bg-yellow-100 text-yellow-700 border-yellow-200 bg-opacity-70 shadow-yellow-200';
                $this->statusIcon = 'clock';
                $this->statusBorder = 'border-yellow-200 bg-yellow-400';
                break;
            case 'sent':
                $this->styles = 'bg-blue-100 text-blue-700 border-blue-200 bg-opacity-70 shadow-blue-200';
                $this->statusIcon = 'truck-delivery';
                $this->statusBorder = 'border-blue-200 bg-blue-500';
                break;
            case 'completed':
                $this->styles = 'bg-green-100 text-green-700 border-green-200 bg-opacity-70 shadow-green-200';
                $this->statusIcon = 'checkmark-circle';
                $this->statusBorder = 'border-green-200 bg-green-400';
                break;
            case 'canceled':
                $this->styles = 'bg-red-100 text-red-700 border-red-200 bg-opacity-70 shadow-red-200';
                $this->statusIcon = 'cancel-circle';
                $this->statusBorder = 'border-red-200 bg-red-500';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.order-card');
    }
}
