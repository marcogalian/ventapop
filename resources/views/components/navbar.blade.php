<nav class="navbar navbar-expand-md navbar-light my-navbar">

    <div class="container-fluid mx-3 nav-container">
        <a class="navbar-brand logo text-primary me-5" href="{{ route('home')}}">VentaPop!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            {{-- Desplegable categories ---------------------------------------------------}}
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="btn btn-bg rounded-5" href="{{ route('ad.create') }}">{{ __('Subir productos')}}</a>
                </li>
                <li class="nav-item dropdown nav-categories">
                    <a class="nav-link dropdown-toggle text-primary" role="button" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ __('Categorías')}}</a>
                    <ul class="dropdown-menu  bg-light m-0" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item text-primary"
                                href="{{ route('category.ads', $category) }}">{{ __($category->name)}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->

            <div class="navbar-nav ms-auto">

                {{-- Carrito de la compra -----------------------------------------------------------------------}}

                <div class="dropdown dropstart d-flex align-items-center m-0 p-0">
                    <button wire:click="showInNavbar()" class="boton_idioma me-4" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @if (\App\Models\Ad::itemToCartCount() == 0)
                        <img src="{{ Vite::asset('/public/images/shopping-cart.png') }}" style="height: 2em">
                        <span class="d-none"></span>
                        @else
                        <span class="position-absolute cart-count-item text-dark">
                            {{ \App\Models\Ad::itemToCartCount() }}
                        </span>
                        <img class="ms-2" src="{{ Vite::asset('/public/images/shopping-cart.png') }}" style="height: 2em">
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-end m-0 p-0" aria-labelledby="dropdownMenuButton">
                        <livewire:cart-dropdown/>
                    </div>
                </div>

            </div>
        </div>
        <ul class="dropdown-menu dropdown-menu-end menu_idioma_ul bg-light">
            <li>
                <div class="dropdown-item d-flex">
                    <x-locale lang="en" country="gb" />
                    {{-- <p class="mt-2 ms-3"> - EN - </p> --}}
                </div>
            </li>
            <li>
                <div class="dropdown-item d-flex">
                    <x-locale lang="it" country="it" />
                    {{-- <p class="mt-2 ms-3"> - IT - </p> --}}
                </div>
            </li>
            <li>
                <div class="dropdown-item d-flex">
                    <x-locale lang="es" country="es" />
                    {{-- <p class="mt-2 ms-3"> - ES - </p> --}}
                </div>
            </li>
        </ul>
        </li>

        {{-- Banderas ------------------------------------------------------------------------------------}}
        <li class="nav-item dropdown d-flex align-items-center">
            <button class="dropdown-toggle boton_idioma me-4" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{-- {{ __('Idioma')}} --}}
                @switch(App::currentLocale())
                @case('en')
                <span class="flag-icon flag-icon-gb"></span>
                @break
                @case('it')
                <span class="flag-icon flag-icon-it"></span>
                @break
                @case('es')
                <span class="flag-icon flag-icon-es"></span>
                @break
                @default
                @endswitch
            </button>
            <ul class="dropdown-menu dropdown-menu-end menu_idioma_ul bg-light">
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

        <hr class="hr-line">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link text-white text-primary py-0" href="{{ route('login') }}">{{ __('Entrar') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link text-white text-primary py-0" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
        </li>
        @endif

        @else
        <li class="nav-item dropdown d-flex align-items-center">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-primary p-0 me-4" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light m-0" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-primary" href="{{ route('favorite.ad')}}">{{ __('Listado de favoritos')}}
                    <span class="badge rounded-pill bg-success">
                        {{ \App\Models\Ad::favoritedCount() }}
                    </span>
                </a>
                @if(Auth::user()->is_revisor)
                <a class="dropdown-item text-primary" href="{{ route('revisor.home')}}">{{ __('Revisión de artículos')}}
                    <span class="badge rounded-pill bg-danger">
                        {{ \App\Models\Ad::ToBeRevisionedCount() }}
                    </span>
                </a>
                @endif
                @if(Auth::user()->is_admin)
                <a class="dropdown-item text-primary" href="{{ route('admin.home')}}">{{ __('Panel de administrador')}}
                </a>
                @endif
                <a class="dropdown-item text-primary text-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <a class="dropdown-item text-primary" href="{{ route('ad.create') }}">{{ __('Subir productos')}}</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </div>

    <hr class="hr-line">

    {{-- Search ------------------------------------------------------------------------------------------}}

    <div class="search-container">
        <div class="container-fluid search-bar mt-4 p-0 ">
            <form action="{{ route('search')}}" method="GET" role="search" class="search-container-input d-flex">
                <input class="form-control search-input" type="search" name="q" placeholder="{{ __('Buscar')}}">
                <button class="btn bg-primary text-light search-input btn-search mx-2">{{ __('Buscar')}}</button>
            </form>
        </div>
    </div>
    </div>
    </div>

</nav>
