<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



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
        'body'=>'required|min:8',
        'category'=>'required',
        'price'=>'required|numeric',
    ];

    protected $messages = [
        'required'=>'Este valor es necesario, por favor rellenalo',
        'min'=>'El valor debe contener al menos :min',
        'numeric'=>'El valor debe ser un numero',
        'temporary_images.required' => 'La imagen es obligatoria',
        'temporary_images.*.image' => 'Los archivos tienen que ser imagenes',
        'temporary_images.*.max' => 'La imagen no puede superar los :max Kb',
        'images.image' => 'El archivo tiene que ser una imagen',
        'images.max' =>'La imagen supera los :max mb',
    ];

    public function store()
    {
        $validatedData = $this->validate();

        // busco la categoria
        $category = Category::find($this->category);

        // Creo el anuncio a partir de la categoria usando la relacion y pasando los datos validados
        $ad = $category->ads()->create($validatedData);

        // Vuelvo a guardar el anuncio "pasando" por la relacion del usuario
        Auth::user()->ads()->save($ad);

        // Guardo cada imagen en el db y en el storage
        if (count($this->images)) {
            $newFileName = "ads/$ad->id";
            foreach($this->images as $image){
                $newImage = $ad->images()->create([
                    'path'=>$image->store($newFileName,'public')
                ]);
                dispatch(new ResizeImage($newImage->path,300,400));

            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
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
        if (in_array($key,array_keys($this->images))) {
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
