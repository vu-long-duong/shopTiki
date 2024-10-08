<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $collection;
    public $attribute;
    public function __construct($title, $collection, $attribute)
    {
        $this->title = $title;
        $this->collection = $collection;
        $this->attribute = $attribute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select-input');
    }
}
