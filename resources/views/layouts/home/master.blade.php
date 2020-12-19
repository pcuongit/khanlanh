<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Khăn Lạnh Toàn Phát')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <link rel="canonical" href="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta property="og:image" content="">
    <meta property="og:image:secure_url" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('home/custom/favicon.ico')}}">
    <meta property="og:url">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Khăn lạnh toàn phát">
    <meta property="og:description" content="">
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/custom/css/custom.css')}}" />
    <link rel="stylesheet" href="{{asset('home/custom/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('home/custom/css/fontawesome_461.css')}}" />

    <link rel='preload' id='flatsome-googlefonts-css'
        href='http://fonts.googleapis.com/css?family=Roboto%3Aregular%2C500%2Cregular%2C500%7CDancing+Script%3Aregular%2Cdefault&amp;display=swap&amp;ver=3.9'
        as="style" onload="this.onload=null;this.rel='stylesheet'" type='text/css' media='all' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('home/fontawesome/css/all.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
    @yield('css')
</head>
<body>
    @include('layouts.home.header')
    @yield('breadcrumb')
    <main id="main">
        <div class="content" role="main" class="content-area">
            @yield('slider')
            @yield('content')
        </div>
    </main>
    @include('layouts.home.footer')
    <script src="{{ asset('home/custom/js/custom.js') }}"></script>
    <script src=""></script>
    @yield('scripts')
</body>
</html>