<x-layout>
    <x-slot name="title">Ventapop - {{ $category->name }}</x-slot>

    <div class="container title-page d-flex justify-content-center align-items-center text-light">
        <h3 class="m-0">Ventapop - {{ __('Categoría')}} : {{ __($category->name) }}</h3>
    </div>
    <div class="container line-title">
    </div>

    <div class="container">
        
        <div class="row mt-5">
            @forelse ($ads as $ad)
            <div class="container col-12 col-md-4 d-flex justify-content-center">
                <x-card
                        img="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150'}}"
                        title="{{ $ad->title }}" price="{{ $ad->price }}" body="" :ad="$ad">
                </x-card>
            </div>
            @empty
            <div class="col-12">
                <h2>{{ __('Parece que no hay nada más de esta categoría...')}}</h2>
                <a href="{{ route('ad.create') }}"><button class="btn btn-success">{{ __('Vende tu primer artículo')}}</button></a>
                <a href="{{ route('home') }}"><button class="btn btn-success">{{ __('Volver a inicio')}}</button></a>
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
