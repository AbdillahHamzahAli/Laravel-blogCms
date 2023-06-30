<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('vendor/my-blog/css/blog.css') }}" rel="stylesheet">
    <!-- fontawesome -->
    <script src="{{ asset('vendor/fontawesome-free/js/all.min.js') }}"></script>
    <!-- icon flag -->
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon-css/css/flag-icon.min.css') }}">
    @stack('css-internal')

</head>

<body class="p-0 d-flex flex-column min-vh-100">

    <!-- Navigation:start -->
    @include('layouts._blog._navbar')
    <!-- Navigation:end -->

    <!-- Page Content -->
    <div class="container">
        <!-- content:start -->
        @yield('content')
        <!-- content:end -->
    </div>
    <!-- /.container -->

    <!-- Footer:start -->
    @include('layouts._blog.footer')
    <!-- Footer:end -->

    <!-- jquery -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- bootstrap bundle -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
