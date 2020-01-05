<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/atomic@4.0.0/dist/atomic.polyfills.min.js"></script>
    @yield('styles')
    @yield('top_scripts')
</head>

<body>
    @yield('content')
    @yield('scripts')
</body>

</html>