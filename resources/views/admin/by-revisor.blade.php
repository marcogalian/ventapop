<x-layout>
    <x-slot name="title">Ventapop - {{ __('Anuncios aceptados en revision')}}</x-slot>

    <div class="container title-page d-flex justify-content-center align-items-center text-light">
        <h4 class="m-0 p-3">{{ __('Anuncios aceptados en revisión por:')}} {{ __($user->name) }}</h4>
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
                <h2>{{ __('No hay artículos revisados')}}</h2>                
            </div>
            @endforelse
        </div>
    </div>

    {{-- <div class="container paginacion">
        <div>
            {{$ads_user->links()}}
        </div>
    </div> --}}




</x-layout>
