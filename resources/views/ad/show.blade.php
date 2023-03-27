<x-layout>
    {{-- Codigo Carusel Imagenes anuncio --------------------------------------------------------------------}}
    <div class="container p-3 carousel-container">
        <div class="row my-5 justify-content-around">
            <div class="col-12 col-md-7">
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
                        @if (auth()->user()->cartAds->contains($ad->id))
                            <form action="{{ route('cart.ad.reject', $ad->id ) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-danger rounded-5 text-light">{{ __('Eliminar del carrito')}}</button>
                            </form>
                        @else
                            <form action="{{ route('cart.ad.add', $ad) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-primary rounded-5 text-light">{{ __('Añadir al carrito')}}</button>
                            </form>
                        @endif
                    </div>
                </div>

                {{-- Funciones eliminar anuncio como admin ---------------------------------------------------------------------}}
                @guest
                @else
                @if (Auth::user()->id == $ad->user->id || Auth::user()->is_admin)
                @if (!Auth::user()->is_admin)
                <h4>{{ __('Anuncio creado por ti.')}}</h4>
                @else
                <h4>{{ __('Acciones de administrador')}}</h4>
                @endif
                
                    <button class="btn bg-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">{{ __('Eliminar anuncio')}}</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{ __('Eliminar anuncio')}}</h5>                              
                            </div>
                            <div class="modal-body">
                              {{ __('¿Desea eliminar definitivamente su anuncio:')}} {{$ad->title}} ?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar')}}</button>
                              <a href="{{ route('ad.destroy', $ad) }}"><button type="button" class="btn btn-primary">{{ __('Si, eliminar')}}</button></a>
                            </div>
                          </div>
                        </div>
                    </div>
                @else
                {{-- Meter aqui --}}

                @endif
                @endguest

                {{-- Funciones Favoritos --------------------------------------------------------------------------------------}}
                @if (Auth::user()->id != $ad->user->id)
                @forelse (Auth::user()->favoriteAds as $favorite_ad)
                @if ($favorite_ad->id == $ad->id)
                <p class="d-flex justify-content-end text-danger"><i class="bi bi-heart-fill me-1"></i>
                    {{ __('Anuncio marcado como favorito')}} <i class="bi bi-heart-fill ms-1"></i></p>
                <form action="{{ route('favorite.ad.reject', $ad)}}" method="POST" class="d-flex justify-content-end">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-danger">{{ __('Eliminar de tu lista de favoritos')}}</button>
                </form>
                @break
                @else
                @if ($favorite_ad == Auth::user()->favoriteAds[(count(Auth::user()->favoriteAds)-1)])
                <form action="{{ route('favorite.ad.accept', $ad)}}" method="POST" class="d-flex justify-content-end">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-white text-danger border-danger rounded"><i
                            class="bi bi-heart"></i> {{ __('Marcar como favorito')}} <i
                            class="bi bi-heart"></i></button>
                </form>
                @break
                @endif
                @endif

                @empty
                <form action="{{ route('favorite.ad.accept', $ad)}}" method="POST" class="d-flex justify-content-end">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-white text-danger border-danger rounded"><i
                            class="bi bi-heart-fill"></i> {{ __('Marcar como favorito')}} <i
                            class="bi bi-heart-fill"></i></button>
                </form>
                @endforelse
                @endif
            </div>

            {{-- Codigo de otros articulos relacionados ---------------------------------------------------------------------------------}}
            <div class="mt-5 related_ads_show p-1 row justify-content-center">
                <h5 class="col-12 text-center my-4">{{ __('Otros articulos relacionados por categoría')}}</h5>
                <div class="mini-card col-12 d-flex">
                    @forelse ($ads_category_random as $ad)
                    <div class="col-3 container d-flex justify-content-center content-mini-card">
                        <x-minicard
                            img="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150'}}"
                            title="{{ $ad->title }}" price="{{ $ad->price }}" body="" :ad="$ad">
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
