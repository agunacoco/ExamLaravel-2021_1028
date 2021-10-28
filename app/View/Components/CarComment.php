<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CarComment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $comments;
    public $car;

    public function __construct($comments, $car)
    {
        $this->comments = $comments;
        $this->car = $car;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.car-comment');
    }
}
