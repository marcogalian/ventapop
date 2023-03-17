<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Ventapop.es'}}</title>

    <!-- Fonts & icons -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
    {{$style ?? ''}}
</head>
<body class="body">
    <div class="container-fluid p-0 position-sticky top-0 navbar-container ">
        <x-navbar/>
    </div>
    
    @if (session()->has('message'))
        <x-alert :type="session('message')['type']" :message="session('message')['text']"/>
    @endif    
    
    <div class="main container-fluid p-0 bg-white">
        <main class="">
            {{ $slot }}   
        </main>
    </div>


    <div class="footer bg-primary">
        <x-footer/>
    </div>


    <!-- Scripts -->
    @livewireScripts
    @vite(['resources/js/app.js'])
</body>
</html>