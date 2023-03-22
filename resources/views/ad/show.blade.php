<x-layout>
    <div class="container p-3 carousel-container">
        <div class="row my-5 justify-content-around">
            <div class="col-12 col-md-8">
                <div class="carousel slide" id="adImages" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @for($i = 0; $i < $ad->images()->count(); $i++)
                            <button type="button" data-bs-target="#adImages" data-bs-slide-to="{{$i}}"
                                class="@if($i == 0) active @endif" aria-current="ture"
                                aria-label="Slide {{$i + 1}}"></button>
                            @endfor
                    </div>
                    <div class="carousel-inner rounded">
                        @foreach ($ad->images as $image )
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img src="{{$image->getUrl(400,300)}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <button class="carousel-contol-prev bg-primary btn-prev border-0" type="buttom"
                            data-bs-target="#adImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-contol-next bg-primary btn-next border-0" type="buttom"
                            data-bs-target="#adImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="row my-4 justify-content-center">
                    <div class="col-12">
                        <div class="mb-1"><b>{{ __('Título')}}: </b> {{$ad->title}}</div>
                        <div class="mb-1"><b>{{ __('Precio')}}: </b> {{$ad->price}}</div>
                        <div class="mb-1"><b>{{ __('Descripción')}}: </b> {{$ad->body}}</div>
                        <div class="mb-1"><b>{{ __('Publicado el')}}: </b> {{ $ad->created_at->format('d/m/Y') }}</div>
                        <div class="mb-1"><b>{{ __('Por')}}: </b> {{ $ad->user->name }}</div>
                        <div class="mb-3"><a class="text-decoration-none text-primary"
                                href="{{ route('category.ads', $ad->category) }}">#{{ __($ad->category->name)}}</a>
                        </div>
                        <div><a href="#" class="btn btn-primary rounded-5 text-light">{{ __('Comprar')}}</a></div>
                    </div>

                </div>
            </div>

            <div class="mt-5 related_ads_show p-1 row justify-content-center">
                    <h5 class="col-12 text-center my-4">{{ __('Otros articulos relacionados por categoría')}}</h5>
                <div class="mini-card col-12 d-flex">
                    @forelse ($ads_category_random as $ad)
                    <div class="col-3 container d-flex justify-content-center content-mini-card">
                        <x-minicard
                            img="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150'}}"
                            title="{{ $ad->title }}" 
                            price="{{ $ad->price }}" 
                            body="" 
                            :ad="$ad">
                        </x-minicard>
                    </div>
                    @empty
                        <h5>{{ __('Parece que no hay nada más de esta categoría...')}}</h5>
                    @endforelse
                </div>
                
            </div>

        </div>
    </div>
</x-layout>
