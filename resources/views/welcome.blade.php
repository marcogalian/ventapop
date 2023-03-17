<x-layout>
    <x-slot name='title'>Ventapop - Homepage</x-slot>

    <div class="container-fluid main-hero m-0 p-0 position-relative row">
        <div class="text-slogan">
            <div class="container row">
                <h1 class="slogan container text-end col-12">{{ __('messages.logo')}}</h1>
                <h3 class="slogan-bottom container text-end col-12">{{ __('Tu web de compraventa')}}</h3>
            </div>
        </div>

        <div class="categories position-absolute bg-white">
            <ul class="container d-flex justify-content-around align-items-center list-categories">
                @foreach ($categories as $category)
                <li class="nav-link categories-link mx-2 px-2">
                    <a class="nav-link text-primary text-center" href="{{ route('category.ads', $category) }}">
                        @switch( __($category->name))
                            @case( __('Motor'))
                            <i class="bi bi-car-front-fill mb-2 fs-2"></i>
                            @break
                            @case( __('Electrónica e informática'))
                            <i class="bi bi-cpu-fill mb-2 fs-2"></i>
                            @break
                            @case( __('Decoración'))
                            <i class="bi bi-image-fill mb-2 fs-2"></i>
                            @break
                            @case( __('Juguetes'))
                            <i class="bi bi-joystick mb-2 fs-2"></i>
                            @break
                            @case( __('Deporte'))
                            <i class="bi bi-bicycle mb-2 fs-2"></i>
                            @break
                            @case( __('Herramientas'))
                            <i class="bi bi-tools mb-2 fs-2"></i>
                            @break
                            @case( __('Mascotas'))
                            <span class="material-symbols-outlined fs-2 mt-2">
                                pets
                            </span>
                            @break
                            @case( __('Muebles'))
                            <i class="bi bi-house-fill mb-2 fs-2"></i>
                            @break
                            @case( __('Música y libros'))
                            <i class="bi bi-book mb-2 fs-2"></i>
                            @break
                            @case( __('Otros'))
                            <i class="bi bi-box-fill mb-2 fs-2"></i>
                            @break
                            @default
                        @endswitch
                        <p class="p-category-name m-0">{{ __($category->name)}}</p>
                    </a>

                </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    <div class="container title-page d-flex justify-content-center align-items-center text-light">
        <h3 class="m-0">{{ __('Últimos artículos a la venta')}}</h3>
    </div>
    <div class="container-fluid line-title">
    </div>

    <div class="container-fluid p-0 bg-light mb-5 d-flex justify-content-center">
        <div class="container row m-0 justify-content-center">
            @forelse ($ads as $ad)
            <div class="card-xs col-12 col-sm-3 col-md-5 col-lg-4 mt-5 mb-5 d-flex justify-content-center align-items-center">
                <div class="my-card rounded position-relative">
                    @if ($ad->created_at > $time)
                    <span class="nuevo_articulo rounded text-white bg-danger p-2"><span
                            class="visually-hidden"></span>{{ __('¡Nuevo!')}}</span>
                    @endif
                    <x-card
                        img="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150'}}"
                        title="{{ $ad->title }}" price="{{ $ad->price }}" body="" :ad="$ad">
                    </x-card>
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

    {{-- Carrusel y banner --------------------}}

    <article class="container p-0">
        <div class="row">
            <div class="d-flex justify-content-center align-items-center col-12 col-md-6">
                <div id="carouselExampleCaptions" class="carousel slide carousel_welcome">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active bg-primary" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            class=" bg-primary" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            class=" bg-primary" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner carousel_welcome">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/trastero.jpg')}}" class="d-block imagen_carousel"
                                alt="Vende tus productos">
                            <div class="carousel-caption d-none d-md-block carousel_container_text rounded m-0 p-2">
                                <h5>{{ __('¡Vende todo aquello que no uses!')}}</h5>
                                <p class="m-0 p-0">{{ __('Haz limpieza en casa y de paso gana algún dinero extra haciendo')}} <a
                                        class="text-white" href="{{ route('ad.create')}}"> {{ __('click aquí') }}.</a>
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/correos.jpg')}}" class="d-block imagen_carousel" alt="Correos">
                            <div class="carousel-caption d-none d-md-block carousel_container_text rounded m-0 p-2">
                                <h5>{{ __('Envía tus productos por Correos')}}</h5>
                                <p class="m-0 p-0">{{ __('VentaPop y Correos aunan fuerzas para que tus productos lleguen rápido y fácilmente.')}}
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/banner_deporte.jpg')}}" class="d-block imagen_carousel"
                                alt="Deportes">
                            <div class="carousel-caption d-none d-md-block carousel_container_text rounded m-0 p-2">
                                <h5>{{ __('¡Ponte en forma con el buen tiempo!')}}</h5>
                                <p class="m-0 p-0">{{ __('Llega la primavera y es tiempo de coger la bici, salir a correr y echar unas canastas. Visita nuestra')}}
                                    <a class="text-white"
                                        href="{{ route('category.ads','deporte')}}">{{ __('sección de deporte')}}.</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
            <div class="col-12 col-md-6">
                @guest
                <div class="m-3 text-center text-primary">
                    <h2 class="logo">{{ __('¿Aún no eres miembro de la comunidad VentaPop?')}}</h2>
                    <h3 class="logo fs-2">{{ __('Regístrate y comienza a vender y comprar')}}</h3>
                    <p>{{ __('¡Tenemos')}} {{ count($total_ads) }} {{ __(' artículos listos para ser comprados!')}}</p>
                    <button class="btn btn-primary"><a class="nav-link"
                            href="{{ route('ad.create') }}">{{ __('¡Regístrate y vende tu primer artículo!')}}</a></button>
                </div>
                @else
                <div class="m-3 rounded text-center text-primary">
                    <h2 class="logo fs-1">{{ __(Auth::user()->name)}} {{ __(' tienes')}} {{ count(Auth::user()->ads)}}
                        {{ __('artículos subidos en VentaPop!')}}</h2>
                    <button class="btn btn-primary"><a class="nav-link"
                            href="#">{{ __('Revisar tus artículos a la venta')}}</a></button>
                    <h3 class="logo fs-1 mt-5">{{ __('¿Hay algo mas que desées vender?')}}</h3>
                    <button class="btn btn-primary"><a class="nav-link"
                            href="{{ route('ad.create') }}">{{ __('¡Crear un nuevo anuncio!')}}</a></button>
                </div>
                @endguest
            </div>
        </div>
    </article>

    {{-- Categoría random ---------------------------------}}

    <div class="container title-page-bottom d-flex justify-content-center align-items-center text-light">
        <h3 class="m-0">{{ __('Echa un ojo a los últimos artículos de la categoría')}} {{ __($category_random) }}</h3>
    </div>
    <div class="container-fluid line-title">
    </div>

    <div class="container-fluid p-0 bg-light card-random">
        <div class="row m-0 justify-content-center">
            @forelse ($ads_category_random as $ad)
            <div
                class="card-xs col-12 col-sm-3 col-md-5 col-lg-4 mt-5 mb-5 d-flex justify-content-center align-items-center">
                <div class="my-card rounded position-relative">
                    @if ($ad->created_at > $time)
                    <span class="nuevo_articulo rounded text-white bg-danger p-2"><span
                            class="visually-hidden"></span>{{ __('¡Nuevo!')}}</span>
                    @endif
                    <x-card
                        img="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150'}}"
                        title="{{ $ad->title }}" price="{{ $ad->price }}" body="" :ad="$ad">
                    </x-card>
                </div>
            </div>
            @empty
            <div class="col-12">
                <h2>{{ __('Parece que no hay nada más de esta categoría...')}}</h2>
                <a href="{{ route('ad.create') }}"><button
                        class="btn btn-success">{{ __('Vende tu primer artículo')}}</button></a>
                <a href="{{ route('home') }}"><button class="btn btn-success">{{ __('Volver al inicio')}}</button></a>
            </div>
            @endforelse
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
