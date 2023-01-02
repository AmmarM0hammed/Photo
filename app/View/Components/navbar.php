<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request;

class navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (request()->is('auth/*'))
          return view('components.navbar',['loginBtn'=>false]);
        
        return view('components.navbar',['loginBtn'=>true]);
    }
}
