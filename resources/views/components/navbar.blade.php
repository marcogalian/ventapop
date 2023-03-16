<nav class="navbar navbar-expand-md navbar-light shadow-sm bg_vpop my-navbar pt-4 pb-4 position-relative">
    <div class="container-fluid mx-5">
        <a class="navbar-brand logo text-primary me-4" href="{{ route('home')}}">VentaPop!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="btn-up-item btn btn-bg rounded-5 bg-primary text-bg-light me-4"
                        href="{{ route('ad.create') }}">{{ __('Subir productos')}}</a>
                </li>
                <li class="nav-item dropdown me-4 mb-2">
                    <a class="nav-link dropdown-toggle text-primary" role="button" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ __('Categorías')}}</a>
                    <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item text-primary"
                                href="{{ route('category.ads', $category) }}">{{ __($category->name)}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->

            <ul class="navbar-nav ms-auto">
                <li class="dropdown me-3">
                    <button class="dropdown-toggle boton_idioma me-1" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('Idioma')}}
                        @switch(App::currentLocale())
                        @case('en')
                        <span class="flag-icon flag-icon-gb ms-2"></span>
                        @break
                        @case('it')
                        <span class="flag-icon flag-icon-it ms-2"></span>
                        @break
                        @case('es')
                        <span class="flag-icon flag-icon-es ms-2"></span>
                        @break
                        @default
                        @endswitch
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end menu_idioma_ul p-0 m-0">
                        <li class="menu_idioma_li">
                            <div class="dropdown-item d-flex">
                                <x-locale lang="en" country="gb" />
                                {{-- <p class="mt-2 ms-3"> - EN - </p> --}}
                            </div>
                        </li>
                        <li class="menu_idioma">
                            <div class="dropdown-item d-flex">
                                <x-locale lang="it" country="it" />
                                {{-- <p class="mt-2 ms-3"> - IT - </p> --}}
                            </div>
                        </li>
                        <li class="menu_idioma">
                            <div class="dropdown-item d-flex">
                                <x-locale lang="es" country="es" />
                                {{-- <p class="mt-2 ms-3"> - ES - </p> --}}
                            </div>
                        </li>
                    </ul>
                </li>


                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link text-white text-primary" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-white text-primary"
                        href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                </li>
                @endif

                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5 text-primary" href="#"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->is_revisor)
                        <a class="dropdown-item" href="{{ route('revisor.home')}}">{{ __('Revisión de artículos')}}
                            <span class="badge rounded-pill bg-danger">
                                {{ \App\Models\Ad::ToBeRevisionedCount() }}
                            </span>
                        </a>
                        @endif
                        <a class="dropdown-item text-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('ad.create') }}">{{ __('Subir productos')}}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
    <div class="search-container search-bar position-absolute">
        <div class="container-fluid d-flex justify-content-center">
            <form action="" class="search-container-input d-flex">
                <input class="form-control search-input me-4" type="search" placeholder="{{ __('Buscar')}}">
                <button class="btn bg-primary search-input btn-search">{{ __('Buscar')}}</button>
            </form>
        </div>
    </div>

</nav>
