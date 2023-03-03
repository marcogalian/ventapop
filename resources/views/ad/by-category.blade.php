<x-layout>
    <x-slot name="title">Ventapop - {{ $category->name }}</x-slot>
    <div class="container">
        <div class="bg_vpop w-75 p-2 fs-3 text-white text-center rounded">
            <p class="align-bottom m-0">Ventapop - Anuncios de la categoría: {{ $category->name }}</p>
        </div>
        <div class="row">
            @forelse ($ads as $ad)
            <div class="col-12 col-md-6 d-flex justify-content-around mt-5">
                <div class="my-card rounded">
                    <div class="position-relative card-container rounded">
                        <div class="card-img rounded">
                            <img src="{{ asset('images/bici.webp')}}" class="img-fluid image rounded">
                            <div class="card-text position-absolute rounded-top">
                                <h5 class="title">{{ $ad->title }}</h5>
                                <h6 class="subtitle mb-2 text-muted">{{ $ad->price }} &#8364</h6>
                                {{-- <p class="text">{{ $ad->body }}</p> --}}
                                <div class="subtitle mb-2">
                                    <strong><a class="text-decoration-none"
                                            href="{{ route('category.ads', $ad->category) }}">#{{ $ad->category->name }}</a></strong>
                                    <i>{{ $ad->created_at->format('d/m/Y') }}</i>
                                </div>
                                <div class="subtitle mb-2">
                                    <small>{{ $ad->user->name }}</small>
                                </div>
                                <div class="d-flex justify-content-center mt-auto">
                                    <a href="{{ route('ads.show', $ad )}}"
                                        class="btn card-btn btn-success rounded-1 px-5">Mostrar Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
