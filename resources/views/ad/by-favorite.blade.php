<x-layout>
    <x-slot name="title">Ventapop - {{ __('Anuncios por usuario')}}</x-slot>

    <div class="container title-page d-flex justify-content-center align-items-center text-light titulo_barra">
        <h3 class="m-0">{{ __('Anuncios favoritos de')}}: {{ __(Auth::user()->name) }}</h3>
    </div>
    <div class="container line-title">
    </div>

    <div class="container">

        <div class="row mt-5">
            @forelse ($ads_user as $ad)
            <div class="container col-12 col-md-4 d-flex justify-content-center">
                <x-card
                    img="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150'}}"
                    title="{{ $ad->title }}" price="{{ $ad->price }}" body="" :ad="$ad">
                </x-card>
            </div>
            @empty
            <div class="col-12">
                <h2>{{ __('No tienes ningún artículo favorito añadido a la lista')}}</h2>
            </div>
            @endforelse
        </div>

    </div>
</x-layout>
