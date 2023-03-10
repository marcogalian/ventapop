<x-layout>
    <x-slot name='title'>Ventapop - Homepage</x-slot>

    <div class="container-fluid main-hero m-0 p-0 position-relative row">
        <div class="text-slogan row">
            <div class="container col-12 col-lg-12 d-flex flex-column justify-content-center align-items-center">
                <h1 class="slogan container text-end">{{ __('messages.logo')}}</h1>
                <h3 class="slogan-bottom container text-end">{{ __('Tu web de compraventa')}}</h3>
            </div>
        </div>

        <div class="categories position-absolute">
            <ul class="container d-flex justify-content-around align-items-center list-categories">
                @foreach ($categories as $category)
                <li class="nav-link">
                    <a class="nav-link text-primary categories-link"
                        href="{{ route('category.ads', $category) }}">{{ __($category->name)}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container title-page d-flex justify-content-center align-items-center text-light">
        <h3 class="m-0">{{ __('Últimos artículos a la venta')}}</h3>
    </div>
    <div class="container line-title">
    </div>

    <div class="container d-flex justify-content-center p-0">
        <div class="row m-0">
            @forelse ($ads as $ad)
            <div class="card-xs col-12 col-md-4 mt-5">
                <div class="my-card rounded position-relative">
                    @if ($ad->created_at > $time->subMinute(15))
                    <span class="nuevo_articulo rounded text-white bg-danger p-2"><span
                            class="visually-hidden"></span>{{ __('¡Nuevo!')}} {{-- creado a las {{ $ad->created_at }} ; {{ $time }}
                        --}}</span>
                    @endif
                    <x-card 
                        title="{{ $ad->title }}"
                        price="{{ $ad->price }}"
                        body="{{ $ad->body }}"
                        :ad="$ad"
                    ></x-card>
                </div>
            </div>
            @empty
            <div class="col-12">
                <h2>{{ __('Parece que no hay nada más de esta categoría...')}}</h2>
                <a href="{{ route('ad.create') }}"><button class="btn btn-success">Vende tu primer artículo</button></a>
                <a href="{{ route('home') }}"><button class="btn btn-success">Volver al inicio</button></a>
            </div>
            @endforelse
        </div>
    </div>
    </div>


</x-layout>









{{-- Antiguo layout --}}

{{-- <div class="container text-center my-5 main_welcome">
        <div class="row" style="backdrop-filter: blur(4px); height:320px">
            <div class="col">
                <h1 style="font-size: 100px;">Ventapop</h1>
                <h2 style="font-size: 40px;" class="mt-5">Vende y compra en un ... ¡Pop!</h2>
            </div>
        </div>
    </div> --}}

{{-- <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, aliquid explicabo. Unde maxime
                    magni neque asperiores fugiat consequuntur nihil ullam, accusantium doloribus sed possimus tenetur
                    minus quam exercitationem beatae ipsa.</p>
            </div>
            <div class="col-12 col-md-6 text-center">
                <p class="fs-5">Hay {{ count($total_ads) }} artículos subidos.</p>
<button class="btn btn-dark bg_vpop text-white border"><a href="#" class="nav-link">Ver más</a></button>
</div>
</div>
</div> --}}

{{-- <div class="container mb-5">
        <div class="row">
            <div class="col-12 mb-1">
                <h2>Echa un ojo a nuestras categorías</h2>
            </div>
            <table class="text-center mt-3" style="table-layout: fixed">
                <tr>
                    <th><i class="bi bi-car-front-fill mb-2 fs-2"></i></th>
                    <th><i class="bi bi-cpu-fill mb-2 fs-2"></i></th>
                    <th><i class="bi bi-image-fill mb-2 fs-2"></i></th>
                    <th><i class="bi bi-joystick mb-2 fs-2"></i></th>
                    <th><i class="bi bi-bicycle mb-2 fs-1"></i></th>
                    <th><i class="bi bi-tools mb-2 fs-2"></i></th>
                    <th><i class="bi bi-book mb-2 fs-2"></i></th>
                    <th><i class="bi bi-house-fill mb-2 fs-2"></i></th>
                    <th><i class="bi bi-bug mb-2 fs-2"></i></th>
                    <th><i class="bi bi-box-fill mb-2 fs-2"></i></th>
                </tr>
                <tr>
                    @foreach ($categories as $category)
                        <th><a class="nav-link" href="{{ route('category.ads', $category->name) }}">{{ $category->name }}</a>
</th>
@endforeach
</tr>
</table>
</div>
</div> --}}

{{-- <div class="container d-flex justify-content-center align-items-center">
        <div class="bg_vpop w-75 p-2 fs-3 text-white text-center rounded">
            <p class="align-bottom m-0">Últimos artículos subidos a la venta. ¡Corre que vuelan!</p>
        </div>
    </div> --}}
