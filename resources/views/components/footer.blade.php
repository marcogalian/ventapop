<div class="container-fluid">
    <footer class="footer-container pt-4 my-4 border-top row align-items-center">
        <p class="col-4 col-md-4 col-sm-4 mb-0 text-muted text-light ps">© 2023 Ventapop, Marco & Chechu</p>

        <a class="col-4 col-md-4 col-sm-4 navbar-brand logo text-light text-center" href="{{ route('home')}}">VentaPop!</a>

        <ul class="nav col-4 col-md-4 col-sm-4 justify-content-end pe-4">
            <li class="nav-item"><a href="{{ route('home')}}" class="nav-link px-2 text-light">{{ __('Inicio')}}</a></li>
            <li class="nav-item"><a href="{{ route('about')}}" class="nav-link px-2 text-light">{{ __('Sobre los creadores')}}</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">FAQs</a></li>
            <li class="nav-item"><a href="{{ route('revisor.become') }}" class="nav-link px-2 text-light">{{ __('Trabaja con nosotros')}}</a></li>
        </ul>
    </footer>
</div>
