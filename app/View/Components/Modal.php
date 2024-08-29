<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $title;
    public $buttonText;
    public $method;
    public $route;

    public function __construct($id, $title, $buttonText, $method, $route)
    {
        $this->id = $id;
        $this->title = $title;
        $this->buttonText = $buttonText;
        $this->method = $method;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
