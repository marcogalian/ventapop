<div>
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
    <form wire:submit.prevent="store">
        @csrf


        <div class="mb-3">
            <label for="title" class="form-label">¡Pon un título a tu anuncio!: </label>
            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror" >
            @error('title')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">¿A que precio quieres venderlo? </label>
            <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror" >
            @error('price')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Añade el producto en una categoría</label>
            <select wire:model.defer="category" class="form-control">
                <option value="">Selecciona una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Añade una descripción: </label>
            <textarea wire:model="body" class="form-control @error('body') is-invalid @enderror" cols="30" rows="15" ></textarea>
            @error('body')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="mt-2">
            <button class="btn btn-info text-white" type="submit">Subir articulo</button>
            <a href="{{ route('home') }}" class="btn btn-outline-info">Volver a inicio</a>
        </div>

    </form>
</div>
