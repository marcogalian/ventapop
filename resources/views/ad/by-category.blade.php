<x-layout>
    <x-slot name="title">Ventapop - {{ $category->name }}</x-slot>
    <div class="container">
        <div class="">
            <p class="text-primary my-4 text-center fs-3">Ventapop -  {{ $category->name }}</p>
        </div>
        <div class="row">
            @forelse ($ads as $ad)
            <div class="container col-12 d-flex justify-content-center">
                <x-card 
                    title="{{ $ad->title }}" 
                    price="{{ $ad->price }}" 
                    body="{{ $ad->body }}" 
                    :ad="$ad">
                </x-card>
            </div>
            @empty
            <div class="col-12">
                <h2>Parece que no hay nada más de esta categoría...</h2>
                <a href="{{ route('ad.create') }}"><button class="btn btn-success">Vende tu primer artículo</button></a>
                <a href="{{ route('home') }}"><button class="btn btn-success">Volver al inicio</button></a>
            </div>
            @endforelse
        </div>
    </div>

    <div class="container paginacion">
        <div>
            {{$ads->links()}}
        </div>
    </div>




</x-layout>
