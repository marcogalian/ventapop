<x-layout>
    <x-slot name="title">Ventapop - {{ __('Anuncios aceptados en revision')}}</x-slot>

    <div class="container title-page d-flex justify-content-center align-items-center text-light titulo_barra">
        <h4 class="m-0 p-3">{{ __('Anuncios aceptados en revisión por:')}} {{ __($user->name) }}</h4>
    </div>
    <div class="container line-title">
    </div>

    <div class="container">
        
        <table class="table text-center tabla_revisores">
            <thead>
                <tr>
                    <th scope="col">{{ __('Id')}}</th>
                    <th scope="col">{{ __('Nombre')}}</th>
                    <th scope="col">{{ __('Número de anuncios revisados')}} </th>
                    <th scope="col">{{ __('Fecha inicio como revisor')}} </th>
                    <th scope="col">{{ __('Fecha último anuncio revisado')}}</th>
                    <th scope="col">{{ __('Desactivar revisor')}}</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ count($ads)}}</td>
                    <td>{{ $user->updated_at}}</td>
                    <td>{{ $last_date}}</td>
                    <td>
                        <button class="btn bg-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">{{ __('Eliminar Revisor')}}</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">{{ __('Eliminar Revisor')}}</h5>                              
                                </div>
                                <div class="modal-body">
                                  {{ __('¿Desea retirar definitivamente la función de revisor?')}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar')}}</button>
                                    <form action="{{ route('deleteRevisor', $user)}}" method="POST" class="text-center">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">{{ __('Eliminar Revisor')}}</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        
                    </td>
                    
                </tr>

            </tbody>
        </table>

        <div class="row mt-5">
            @forelse ($ads as $ad)
            <div class="container col-12 col-md-4 d-flex justify-content-center my-2">
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
