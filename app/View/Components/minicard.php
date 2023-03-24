<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Minicard extends Component
{
    /**
     * Create a new component instance.
     */

     public $title;
     public $price;     
     public $img;
     public $ad;
    
    public function __construct($title, $price, $img, $ad)
    {
        $this->title = $title;
        $this->price = $price;        
        $this->img = $img;
        $this->ad = $ad;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.minicard');
    }
}
