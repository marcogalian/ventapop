<?php

namespace App\View\Components;

use App\Models\Ad;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class Card extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $price;
    public $body;
    public $img;
    public $ad;


    public function __construct($title, $price, $body, $img, $ad)
    {
        $this->title = $title;
        $this->price = $price;
        $this->body = $body;
        $this->img = $img;
        $this->ad = $ad;
        

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
