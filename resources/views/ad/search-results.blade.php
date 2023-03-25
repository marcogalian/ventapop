<x-layout>
    <x-slot name="title">Ventapop - búsqueda por {{ $q }}</x-slot>

    <div class="container title-page d-flex justify-content-center align-items-center text-light titulo_barra">
        <p class="m-0">Ventapop - {{ __('Búsqueda por')}} : {{ $q }}</p>
    </div>
    <div class="container line-title">
    </div>

    <div class="container">
        <div class="row mt-5">
            @forelse ($ads as $ad)
            <div class="container col-8 col-sm-6 d-flex justify-content-center">
                <x-card
                    img="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150'}}"
                    title="{{ $ad->title }}" 
                    price="{{ $ad->price }}" 
                    body="" 
                    :ad="$ad">
                </x-card>
            </div>
            @empty
            <div class="col-12">
                <h2>{{ __('Parece que no hay nada con esa descripción...')}}</h2>
                
                <a href="{{ route('home') }}"><button class="btn btn-success">{{ __('Volver a inicio')}}</button></a>
            </div>
            @endforelse
        </div>
    </div>

    {{-- <div class="container paginacion">
        <div>
            {{$ads->links()}}
        </div>
    </div> --}}




</x-layout>