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
                       <img src="{{ asset('images/Foto_Chechu.png')}}" alt="Fotografía creador Chechu"
                        class="m-3 rounded fotografia_about"> 
                    </div>                    
                    <p>¡Hola! Soy Jesús Giménez, pero todos me conocen como Chechu. Soy ingeniero químico, pero decidí iniciar mi carrera como programador Full Stack Developer junior en septiembre de 2022 en el Botcamp de Aulab. Cuento con conocimientos de front y backend: HTML5, CSS3, JavaScript, PHP y Laravel 10. </p>
            </div>

        </div>
    </div>
</x-layout>
