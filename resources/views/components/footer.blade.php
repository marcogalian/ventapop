<div>
    <div class="container-fluid p-0">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4">
          <span class="border-footer"></span>
          <p class="col-md-4 mb-0 text-muted ps-5">© {{date('Y')}} Ventapop, Marco & Chechu</p>
      
          <a href="{{ route('welcome') }}" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img src="{{ asset('images/logo_ventapopnegro.png') }}" alt="logo Ventapop" class="logo_footer">
          </a>
      
          <ul class="nav col-md-4 justify-content-end pe-5">
            <li class="nav-item"><a href="{{ route('welcome')}}" class="nav-link px-2 text-muted">Inicio</a></li>            
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Sobre nosotros</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Contacto</a></li>
          </ul>
        </footer>
      </div>
</div>