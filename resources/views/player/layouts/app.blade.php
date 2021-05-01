<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Main CSS-->
        <link href="{{asset('/')}}player_assets/css/theme.css" rel="stylesheet" media="all">

        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Top King">
        <meta name="author" content="Ab">
        <meta name="keywords" content="satta matta">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} :: Player</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="shortcut icon" type="image/png" href="{{asset('/')}}player_assets/images/favicon.ico">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('/')}}player_assets/css/style.css" rel="stylesheet">

        <!-- Fontfaces CSS-->
        <link href="{{asset('/')}}player_assets/css/font-face.css" rel="stylesheet" media="all">
        <link href="{{asset('/')}}player_assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="{{asset('/')}}player_assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="{{asset('/')}}player_assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="{{asset('/')}}player_assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="{{asset('/')}}player_assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="{{asset('/')}}player_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="{{asset('/')}}player_assets/vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="{{asset('/')}}player_assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="{{asset('/')}}player_assets/vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="{{asset('/')}}player_assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="{{asset('/')}}player_assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
        <link rel="manifest" href="{{asset('/')}}homescreen_popup/manifest.json">
    </head>
    <body class="animsition">
        <div id="app">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
