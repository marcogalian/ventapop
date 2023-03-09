<nav class="navbar navbar-expand-md navbar-light shadow-sm bg_vpop">
    <div class="container">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo_ventapopnegro.png') }}" alt="logo Ventapop"
                class="logo_footer rounded p-2 me-3 border border-white">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown me-4">
                    <a class="nav-link dropdown-toggle text-white" role="button" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ __('Categorías') }}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item"
                                href="{{ route('category.ads', $category) }}">{{ __($category->name)}}</a></li>
                        @endforeach
                    </ul>
                </li>
                {{-- <li class="nav-item me-4">
                    <a class="nav-link text-white" href="{{ route('revisor.home') }}">Home</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link btn btn-bg rounded-5 px-3" href="{{ route('ad.create') }}">{{ __('Subir productos')}}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-link">
                    <x-locale lang="en" country="gb"/>
                </li>
                <li class="nav-link">
                    <x-locale lang="it" country="it"/>
                </li>
                <li class="nav-link">
                    <x-locale lang="es" country="es"/>
                </li>


                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="{{ route('register') }}">{{ __('Registro') }}</a>
                </li>
                @endif

                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->is_revisor)
                        <a class="dropdown-item" href="{{ route('revisor.home')}}">{{ __('Revisión de artículos') }}
                            <span class="badge rounded-pill bg-danger">
                                {{ \App\Models\Ad::ToBeRevisionedCount() }}
                            </span>
                        </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Cerrar sesión') }}
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
</nav>
