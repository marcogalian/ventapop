<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Ventapop.es'}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
    {{$style ?? ''}}
</head>
<body class="body">
    <div class="container-fluid p-0 position-sticky top-0 navbar-container">
        <x-navbar/>
    </div>
    
    @if (session()->has('message'))
        <x-alert :type="session('message')['type']" :message="session('message')['text']"/>
    @endif    

    <div class="main container-fluid p-0">
        <main class="">
            {{ $slot }}
        </main>
    </div>


    <div class="footer">
        <x-footer/>
    </div>


    <!-- Scripts -->
    @livewireScripts
    @vite(['resources/js/app.js'])
</body>
</html>