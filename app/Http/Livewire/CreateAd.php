<?php

namespace App\Http\Livewire;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Image;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreateAd extends Component
{
    use WithFileUploads;

    
    public $title;
    public $body;
    public $price;
    public $category;
    public $images = [];
    public $temporary_images;
    // public $image;

    protected $rules = [
        'title'=>'required|min:4',
        'category'=>'required',
        'price'=>'required|numeric',
        'body'=>'required|min:8|max:250',
    ];

    protected $messages = [
        'required'=>'Por favor rellena este campo, es obligatorio',
        'min'=>'Field :attribute should be longer than :min',
        'numeric'=>'Field :attribute must be a number',
        'temporary_images.required' => 'La imagen es obligatoria',
        'temporary_images.*.image' => 'Los archivos tienen que ser imagenes',
        'temporary_images.*.max' => 'La imagen supera los :max mb',
        'images.image' => 'El archivo tiene que ser una imagen',
        'images.max' =>'La imagen supera los :max mb',
    ];

    public function store()
    {

        // datos validados
        $validateData = $this->validate();

        // busco la categoria
        $category = Category::find($this->category);

        // Creo el anuncio a partir de la categoria usando la relacion y pasando los datos validados
        $ad = $category->ads()->create($validateData);
        
        // Vuelvo a guardar el anuncio "pasando" por la relacion del usuario
        Auth::user()->ads()->save($ad); 

        // Guardo cada imagen en el db y en el storage
        if (count($this->images)) {
            foreach($this->images as $image){
                $ad->images()->create([
                        'path'=>$image->store("images/$ad->id", 'public')
                    ]);
            }
        }

        session()->flash('message','Anuncio creado con éxito');
        $this->cleanForm();
    }

    public function updatedTemporaryImages(){

        if($this->validate([
            'temporary_images.*'=>'image|max:2048'
        ])){
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
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
        $this->images = [];
    }

    public function render()
    {
        return view('livewire.create-ad');
    }


}
