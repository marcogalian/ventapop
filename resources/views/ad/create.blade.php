<x-layout>
    <x-slot name="title">Hola caracola</x-slot>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if($errors -> any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="#" method="POST" enctype="multipart/form-data"
                    class="card p-5 shadow">
                    @method('POST')
                    @csrf

                    
                    <div class="mb-3">
                        <label for="title" class="form-label">¡Pon un título a tu anuncio!: </label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Sube una imagen del producto: </label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="category" class="form-label">Categoría: </label>
                        <select class="form-control" id="category" name="category">
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="mb-3">
                        <label for="text" class="form-label">Añade una descripción: </label>
                        <textarea class="form-control" id="text" name="text" cols="30"
                            rows="10">{{old('text')}}</textarea>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-info text-white" type="submit">Subir articulo</button>
                        <a href="{{ route('welcome') }}" class="btn btn-outline-info">Volver a inicio</a>
                    </div>

                </form>

                @if(session('message'))
                <div class="alert alert-success text-center">
                    {{session('message')}}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>