<x-layout>
    <x-slot name='title'>Ventapop - Homepage</x-slot>
    <div class="container my-5">
        <main class="text-center">
            <h1>Ventapop</h1>
            <h2>Vende y compra en un ... ¡Pop!</h2>
        </main>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, aliquid explicabo. Unde maxime
                    magni neque asperiores fugiat consequuntur nihil ullam, accusantium doloribus sed possimus tenetur
                    minus quam exercitationem beatae ipsa.</p>
            </div>
            <div class="col-12 col-md-6 text-center">
                <p class="fs-5">Hay {{ count($total_ads) }} artículos subidos.</p>
                <button class="btn btn-dark bg_vpop text-white border"><a href="#" class="nav-link">¡Echa un ojo!</a></button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-center mb-3">
            <div class="d-flex justify-content-center bg_vpop w-75 p-2 fs-3 text-white rounded">
                <p class="m-0">Últimos artículos subidos a la venta. ¡Corre que vuelan!</p>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center">
                @forelse ($ads as $ad)
                <div class="col-12 col-md-4">
                    <div class="my-card rounded">
                        <div>
                            <h3 class="text-center">{{ $ad->title }}</h3>
                        </div>
                        <div class="position-relative card-container rounded">
                            <div class="rounded card-img">
                                <img src="{{ asset('images/bici.webp')}}" class="img-fluid image rounded">
                                <div class="card-text position-absolute rounded-top">
                                    <h5 class="title">{{ $ad->title }}</h5>
                                    <h6 class="subtitle mb-2 text-muted">{{ $ad->price }} €</h6>
                                    <p class="text">{{ $ad->body }}</p>
                                    <div>
                                        <strong><a
                                                href="{{ route('category.ads',$ad->category) }}">{{ $ad->category->name }}</a></strong>
                                        <i>{{ $ad->created_at->format('d/m/Y') }}</i>
                                        <div class="mb-2">
                                            <small>{{ $ad->user->name }}</small>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-center mt-auto">
                                        <a href="{{ route('ads.show', $ad) }}"
                                            class="btn card-btn btn-success rounded-1 px-5">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <h2>Parece que no hay nada más de esta categoría...</h2>
                    <a href="{{ route('ad.create') }}"><button class="btn btn-success">Vende tu primer
                            artículo</button></a>
                    <a href="{{ route('home') }}"><button class="btn btn-success">Volver al inicio</button></a>
                </div>
                @endforelse
            </div>
        </div>
    </div>


</x-layout>
