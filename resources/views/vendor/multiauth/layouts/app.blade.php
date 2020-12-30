<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }} {{ ucfirst(config('multiauth.prefix')) }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link rel="shortcut icon" type="image/png" href="{{asset('/')}}admin_assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('/')}}admin_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}admin_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/')}}admin_assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('/')}}admin_assets/css/metisMenu.css">
    <link rel="stylesheet" href="{{asset('/')}}admin_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}admin_assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('/')}}admin_assets/css/typography.css">
    <link rel="stylesheet" href="{{asset('/')}}admin_assets/css/default-css.css">
    <link rel="stylesheet" href="{{asset('/')}}admin_assets/css/styles.css">
    <link rel="stylesheet" href="{{asset('/')}}admin_assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{asset('/')}}admin_assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
         CKEDITOR.replace( 'messageArea',
         {
          customConfig : 'config.js',
          toolbar : 'simple'
          })
</script> 
</head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
