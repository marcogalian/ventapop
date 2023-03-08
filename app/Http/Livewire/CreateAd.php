<?php

namespace App\Http\Livewire;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class CreateAd extends Component
{
    public $title;
    public $body;
    public $price;
    public $category;

    protected $rules = [
        'title'=>'required|min:4',
        'category'=>'required',
        'price'=>'required|numeric',
        'body'=>'required|min:8',
    ];

    protected $messages = [
        'required'=>'Por favor rellena este campo, es obligatorio',
        'min'=>'Field :attribute should be longer than :min',
        'numeric'=>'Field :attribute must be a number'
    ];

    public function store()
    {
        $validateField = $this->validate([
            'title'=>'required|min:4',
            'category'=>'required',
            'price'=>'required|numeric',
            'body'=>'required|min:8',
        ]);

        $category = Category::find($this->category);
        $ad = $category->ads()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,           
        ]);

        Auth::user()->ads()->save($ad); 

        session()->flash('message','Anuncio creado con éxito');
        $this->cleanForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanForm()
    {
        $this->title = "";
        $this->body = "";
        $this->category = "";
        $this->price = "";
    }

    public function render()
    {
        return view('livewire.create-ad');
    }
}
