<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;


class Navbar extends Component
{
    /**
     * Create a new component instance.
     */

    


    public function __construct()
    {
        
    }

    public function render()
    {
        return view('components.navbar');
    }
}
