<div class="container-fluid p-0">
    <footer class="footer-container pt-4 my-4 border-top row">
        <p class="col-sm-12 mb-0 text-muted text-light">© 2023 Ventapop, Marco & Chechu</p>

        <a class="col-sm-12 navbar-brand logo text-light" href="{{ route('home')}}">VentaPop!</a>

        <ul class="nav col-md-4 justify-content-end pe-5">
            <li class="nav-item"><a href="{{ route('home')}}" class="nav-link px-2 text-muted">{{ __('Inicio')}}</a></li>
            <li class="nav-item"><a href="{{ route('about')}}" class="nav-link px-2 text-muted">{{ __('Sobre los creadores')}}</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="{{ route('revisor.become') }}" class="nav-link px-2 text-muted">{{ __('Trabaja con nosotros')}}</a></li>
        </ul>
    </footer>
</div>
