<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class locale extends Component
{
    public $lang;
    public $country;
    /**
     * Create a new component instance.
     */
    public function __construct($lang, $country)
    {
        $this->lang = $lang;
        $this->country = $country;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.locale');
    }
}
