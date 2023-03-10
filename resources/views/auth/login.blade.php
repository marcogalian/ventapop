<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 main_welcome mt-5">
                <div class="blur">
                    <h1 class="text-center m-3"> {{ __('Inicia sesión para')}}:</h1>
                    <ul>
                        <li class="mb-3 fs-3">{{ __('Vender y comprar productos')}}</li>
                        <li class="mb-3 fs-3">{{ __('Contactar con los vendedores')}}</li>
                        <li class="mb-3 fs-3">{{ __('Trabajar como revisor')}}</li>
                        <li class="mb-3 fs-3">... {{ __('¡Y mucho mas!')}}</li>
                    </ul>
                    <h4 class="text-center mt-5 mb-3"> {{ __('¿Aun no estás registrado?')}} {{ __('¡Únete a nuestra comunidad!')}}</h4>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-warning text-center"><a class="text-center nav-link text-primary fs-3" href="{{ route('register') }}">{{ __('Regístrate') }}</a></button>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Iniciar sesión') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Dirección de correo') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordar usuario') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-dark border bg_vpop text-white">
                                        {{ __('Iniciar sesión') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿Has olvidado la contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>


