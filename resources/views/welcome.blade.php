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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, aliquid explicabo. Unde maxime magni neque asperiores fugiat consequuntur nihil ullam, accusantium doloribus sed possimus tenetur minus quam exercitationem beatae ipsa.</p>
            </div>
            <div class="col-12 col-md-6">
                <p class="fs-5">Hoy se han subido ______ artículos</p>
                <button class="btn bg_vpop text-white border">¡Echa un ojo!</button>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center">        
            <div class="bg_vpop w-75 p-2 fs-3 text-white text-center rounded">
                <p class="align-bottom m-0">Últimos artículos subidos a la venta. ¡Corre que vuelan!</p>
            </div>
            <div class="row">
                @forelse ($ads as $ad)
                    
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
    
    
</x-layout>