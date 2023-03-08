<div class="container-fluid p-0">
    <footer class="d-flex flex-wrap justify-content-between align-items-center pt-4 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted ps-5 text-light">© 2023 Ventapop, Marco & Chechu</p>

        {{-- <a href="{{ route('home')}}" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none"> --}}
            <a class="navbar-brand logo text-light" href="{{ route('home')}}">VentaPop!</a>
            {{-- <img src="{{ asset('images/logo_ventapopnegro.png') }}" alt="logo Ventapop" class="logo_footer"> --}}
        {{-- </a> --}}

        <ul class="nav col-md-4 justify-content-end pe-5">
            <li class="nav-item"><a href="{{ route('home')}}" class="nav-link px-2 text-light">Inicio</a></li>
            <li class="nav-item"><a href="{{ route('about')}}" class="nav-link px-2 text-light">Sobre los creadores</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">FAQs</a></li>
            <li class="nav-item"><a href="{{ route('revisor.become') }}" class="nav-link px-2 text-light">Trabaja con nosotros</a></li>
        </ul>
    </footer>
</div>
