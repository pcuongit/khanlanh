<!DOCTYPE html>
<html>
<head>
    <title>Giao diện web mẫu, template website bán hàng đẹp | Sapo Web</title>
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
    <meta property="og:title" content="Giao diện web mẫu, template website bán hàng đẹp | Sapo Web">
    <meta property="og:description" content="">
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/custom/css/custom.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('home/fontawesome/css/all.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
    @yield('css')
</head>
<body>
    @include('layouts.home.header')
    @yield('content')
    @include('layouts.home.footer')
    <script src="{{ asset('home/custom/js/custom.js') }}"></script>
    @yield('scripts')
</body>
</html>