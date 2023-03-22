<div class="row justify-content-center">
    <div class="bg-light p-4 shadow rounded col-10">
        @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
        @endif
        <form wire:submit.prevent="store">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('¡Pon un título a tu anuncio!')}}: </label>
                <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">{{ __('¿A que precio quieres venderlo?')}} </label>
                <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">{{ __('Añade el producto en una categoría')}}</label>
                <select wire:model.defer="category" class="form-control">
                    <option value="">{{ __('Selecciona una categoría')}}</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ __($category->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="temporary_images" class="form-label">{{ __('Añadir imagenes')}}</label>
                <input wire:model="temporary_images" type="file" name="images" multiple
                    class="form-control @error('temporary_images.*') is-invalid @enderror">
                @error('temporary_images.*')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            @if(!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>{{ __('Vista previa')}}:</p>
                    <div class="row">
                        @foreach ($images as $key=>$image)
                        <div class="col-12 col-md-4">
                            <img src="{{ $image->temporaryUrl()}}" alt="" class="img-fluid">
                            <button type="button" class="btn btn-danger"
                                wire:click="removeImage({{ $key }})">{{ __('Eliminar')}}</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <div class="mb-3">
                <label for="body" class="form-label">{{ __('Añade una descripción')}}: </label>
                <textarea wire:model="body" class="form-control @error('body') is-invalid @enderror" cols="30"
                    rows="15"></textarea>
                @error('body')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mt-2 d-flex justify-content-around">
                <button class="btn btn-primary text-light" type="submit">{{ __('Subir artículo')}}</button>
                <a href="{{ route('home') }}" class="btn btn-primary text-light">{{ __('Volver a inicio')}}</a>
            </div>

        </form>
    </div>
</div>
