<nav class="navbar navbar-expand-md navbar-light shadow-sm bg_vpop my-navbar pt-4 pb-5">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown me-4">
                    <a class="nav-link dropdown-toggle text-primary fs-5" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">Categorías</a>
                    <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item text-primary" href="{{ route('category.ads', $category) }}">{{ $category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-bg rounded-5 px-3 bg-primary text-light" href="{{ route('ad.create') }}">Subir productos</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest                
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link text-white fs-5 text-primary" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-white fs-5 text-primary" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                </li>
                @endif

                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5 text-primary" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->is_revisor)
                        <a class="dropdown-item" href="{{ route('revisor.home')}}">Revisión de artículos
                            <span class="badge rounded-pill bg-danger">
                                {{ \App\Models\Ad::ToBeRevisionedCount() }}
                            </span>
                        </a>
                        @endif
                        <a class="dropdown-item text-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Salir') }}
                        </a>

                        <a class="dropdown-item text-primary" href="{{ route('ad.create') }}">Poner un anuncio</a>

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
