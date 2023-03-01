<nav class="navbar navbar-expand-md navbar-light shadow-sm bg_vpop">
    <div class="container">
        <img src="{{ asset('images/logo_ventapopnegro.png') }}" alt="logo Ventapop" class="logo_footer  rounded p-2 me-2 border border-white">
        <a class="navbar-brand text-white fs-3" href="{{ route('home') }}">
            Ventapop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="#">Artículos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fs-5" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">Categorías</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('category.ads', $category) }}">{{ $category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest                
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link text-white fs-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-white fs-4" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif

                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-4" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('ad.create') }}">Poner un anuncio</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>                
                @endguest
            </ul>
        </div>
    </div>
</nav>
