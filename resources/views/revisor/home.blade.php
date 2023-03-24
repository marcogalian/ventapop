<x-layout>
    <x-slot name='title'> Ventapop - Revisor Home</x-slot>
    @if ($ad)
    <div class="container my-5 py-5 register-container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 m-0 offset-md-2">
                <div class="card bg-light shadow">
                    <div class="card-header bg-primary text-light">
                        {{ __('Anuncio')}} #{{ $ad->id}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <b>{{ __('Imágenes')}}</b>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    @forelse($ad->images as $image)
                                    <div class="col-md-4 mb-4">
                                        <img src="{{ $image->getUrl(400,300) }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <b>Adult:</b>  <i class="bi bi-circle-fill {{ $image->adult }}"></i> [{{ $image->adult}}] <br>
                                        <b>Spoof:</b>  <i class="bi bi-circle-fill {{ $image->spoof }}"></i> [{{ $image->spoof}}] <br>
                                        <b>Medical:</b>  <i class="bi bi-circle-fill {{ $image->medical }}"></i> [{{ $image->medical}}] <br>
                                        <b>Violence:</b>  <i class="bi bi-circle-fill {{ $image->violence }}"></i> [{{ $image->violence}}] <br>
                                        <b>Racy:</b>  <i class="bi bi-circle-fill {{ $image->racy }}"></i> [{{ $image->racy}}] <br>

                                        <b>{{ __('Etiquetas/labels')}}</b>
                                        @forelse ($image->getLabels() as $label)
                                            <a href="#" class="btn btn-info btn-sm m-1">{{ $label }}</a>
                                        @empty
                                            <p>{{ __('No hay etiquetas')}}</p>
                                        @endforelse

                                            id: {{ $image->id}} <br>
                                            path: {{ $image->path}} <br>
                                            url: {{ Storage:: url($image->path)}} <br>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12">
                                        <b>{{ __('No hay imágenes') }}</b>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-ad p-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{ __('Usuario')}}</b>
                                </div>
                                <div class="col-md-9">
                                    #{{ $ad->user?->id}} - {{ $ad->user?->name }} - {{ $ad->user?->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{ __('Título')}}</b>
                                </div>
                                <div class="col-md-9">
                                    {{ $ad->title }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{ __('Precio')}}</b>
                                </div>
                                <div class="col-md-9">
                                    {{ $ad->price }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{ __('Descripción')}}</b>
                                </div>
                                <div class="col-md-9">
                                    {{ $ad->body}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{ __('Categoría')}}</b>
                                </div>
                                <div class="col-md-9">
                                    {{ $ad->category->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{ __('Fecha de creación')}}</b>
                                </div>
                                <div class="col-md-9">
                                    {{ $ad->created_at }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row my-4">
                        <form action="{{ route('revisor.ad.reject', $ad)}}" method="POST" class="col-6 d-flex justify-content-end">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-danger">{{ __('Rechazar')}}</button>
                        </form>
                        <form action="{{ route('revisor.ad.accept', $ad)}}" method="POST" class="col-6 d-flex justify-content-star">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-success">{{ __('Aceptar')}}</button>
                        </form>
                </div>
            </div>

        </div>
    </div>
    @else
    <h3 class="text-center mt-5">{{ __('No hay anuncios para revisar, vuelve mas tarde, gracias')}}</h3>
    @endif

</x-layout>
