<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class CartDropdown extends Component
{
    public $addcart = [];


    public function render()
    {
        if(Auth::check()){
            $this->addcart = Auth::user()->cartAds;
        }
        return view('livewire.cart-dropdown');
    }
   
}
