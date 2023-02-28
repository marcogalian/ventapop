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
    @vite(['resources/sass/app.scss','resources/css/app.css'])
    {{$style ?? ''}}
</head>
<body>
    <div class="container-fluid">
        <x-navbar/>
    </div>


    <div class="main">
        <main class="py-4">
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