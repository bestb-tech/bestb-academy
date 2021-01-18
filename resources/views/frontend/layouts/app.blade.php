<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Bestb Academy
    </title>
    {{--    style resource--}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="/frontend/img/logo.png" type="image/gif" sizes="16x8">
    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset(mix('frontend/css/style.css'))}}">
    <link rel="stylesheet" href="{{asset('/bower_components/Font-Awesome/css/all.min.css')}}">

    {{--    script resource--}}
    <script src="{{asset('/bower_components/jquery/dist/jquery.js')}}" ></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>--}}
{{--    <script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}" ></script>--}}
    <script src="{{ asset('/frontend/js/app.js') }}" defer></script>


</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    <script src="{{asset('/frontend/js/main.js')}}" ></script>

</body>
</html>
