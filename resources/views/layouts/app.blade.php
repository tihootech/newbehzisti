<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/gif">

    @yield('title')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pdp.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>

    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pdp.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
