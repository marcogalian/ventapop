<x-layout>
    <div class="container mt-5">
        <div class="row">

            <div class="col-12">
                <h1 class="text-center nombre_about mb-5"> {{ __('Les presentamos a...¡Los creadores de Ventapop!')}}</h1>
            </div>

            <div class="col-12 col-md-6 mt-2">                
                    <h2 class="text-center nombre_about mb-5">Marco Antonio Galian</h2>
                    <div class="d-flex justify-content-center">
                       <img src="{{ asset('images/Foto curriculum.jpg')}}" alt="Fotografía creador Marco"
                        class="m-3 fotografia_about"> 
                    </div>                    
                    <p>Marco Antonio Galián. Soy desarrollador junior fullStack, tengo conocimientos en Html, Css, Javascript, Bootstrap, Php y laravel, soy uno de los creadores de la web de articulos de segunda mano VentaPop!</p>
            </div>

            <div class="col-12 col-md-6 mt-2">                
                    <h2 class="text-center nombre_about mb-5">Chechu Giménez</h2>
                    <div class="d-flex justify-content-center">
                       <img src="{{ asset('images/logo_ventapopnegro.png')}}" alt="Fotografía creador Chechu"
                        class="m-3 rounded fotografia_about"> 
                    </div>                    
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque similique adipisci quas facere
                        delectus, fuga tenetur maxime eaque, consequuntur voluptatibus, consequatur quo? A est natus
                        enim velit odio sequi sint.</p>
            </div>

        </div>
    </div>
</x-layout>
