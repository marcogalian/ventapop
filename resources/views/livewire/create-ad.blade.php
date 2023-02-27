<div>
    <form wire:submit.prevent="store">
        @csrf


        <div class="mb-3">
            <label for="title" class="form-label">¡Pon un título a tu anuncio!: </label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Sube una imagen del producto: </label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Añade una descripción: </label>
            <textarea class="form-control" id="text" name="text" cols="30" rows="10">{{old('text')}}</textarea>
        </div>

        <div class="mt-2">
            <button class="btn btn-info text-white" type="submit">Subir articulo</button>
            <a href="{{ route('welcome') }}" class="btn btn-outline-info">Volver a inicio</a>
        </div>

    </form>
</div>
