<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $title;
    public $type;
    public $required;
    public $name;
    
    public function __construct($id, $name, $title, $type, $required = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->type = $type;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
