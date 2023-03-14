<x-layout>
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-12 col-md-6">
                <div class="carousel slide" id="adImages" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @for($i = 0; $i < $ad->images()->count(); $i++)
                            <button type="button" data-bs-target="#adImages" data-bs-slide-to="{{$i}}" class="@if($i == 0) active @endif" aria-current="ture" aria-label="Slide {{$i + 1}}"></button>
                        @endfor
                    </div>
                    <div class="carousel-inner">
                        @foreach ($ad->images as $image )
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img src="{{ Storage::url($image->path) }}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <button class="carousel-contol-prev bg-primary btn-prev border-0" type="buttom" data-bs-target="#adImages"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-contol-next bg-primary btn-next border-0" type="buttom" data-bs-target="#adImages"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
            <div class="row my-4 justify-content-center">
                <div class="col-12 col-md-6">
                    <div><b>{{ __('Título')}}: </b> {{$ad->title}}</div>
                    <div><b>{{ __('Precio')}}: </b> {{$ad->price}}</div>
                    <div><b>{{ __('Descripción')}}: </b> {{$ad->body}}</div>
                    <div><b>{{ __('Publicado el')}}: </b> {{ $ad->created_at->format('d/m/Y') }}</div>
                    <div><b>{{ __('Por')}}: </b> {{ $ad->user->name }}</div>
                    <div><a class="text-decoration-none" href="{{ route('category.ads', $ad->category) }}">#{{ __($ad->category->name)}}</a></div>
                    <div><a href="#" class="btn bg-primary rounded-5 text-light">{{ __('Comprar')}}</a></div>
                </div>
                
            </div>
        </div>
    </div>
</x-layout>
