<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }} - @yield('title')</title>
    @stack('css-internal')
    <!-- icon flag -->
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- fontawesome -->
    <script src="{{ asset('vendor/fontawesome-free/js/all.min.js') }}"></script>
</head>

<body class="min-h-screen flex flex-col">
    @include('layouts._newblog.navbar')
    <div class="pt-36 flex-grow">
        @yield('content')
    </div>
    @include('layouts._newblog.footer')
    <!-- jquery -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    @stack('javascript-internal')
</body>

</html>
