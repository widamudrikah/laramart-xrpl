<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- fontawesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset ('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/frontend.css')}}">
    <!-- css livewire -->
    @livewireStyles
</head>
<body>
    <div id="app">
        
        @include('layouts.include.frontend.navbar')

        <main>
            @yield('content')
        </main>
    </div>


    <!-- Scripts -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    @livewireScripts
</body>
</html>
