<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon.png">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;600&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
    </script>
    <link rel="stylesheet" href="/backend/css/style.css" />
    <script src="{{asset('/bower_components/jquery/dist/jquery.js')}}" ></script>
    <title>{{env('APP_NAME')}}</title>
    @yield('css')
</head>
<body>
<div id="app">
    @yield('content')
</div>
<script src="{{ asset('backend/js/app.js') }}" defer></script>
<script src="/backend/js/main.js" ></script>
</body>
</html>
