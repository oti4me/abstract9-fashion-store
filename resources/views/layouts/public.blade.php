<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/css/fashion/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/fashion/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/fashion/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/fashion/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/fashion/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/fashion/main.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/fashion/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/fashion/public.css')}}" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/b7ac69b6bb.js"></script>
    @stack('styles')
</head>

<body class="u-border-box">
<header class="u-margin-none u-margin-bottom-lg u-z-top">
    @include('shared._header')
</header>

@yield('content')
@include('shared._footer')
</body>
</html>
