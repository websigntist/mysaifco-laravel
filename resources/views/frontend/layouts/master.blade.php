<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$meta_title}}</title>
    <meta name="keywords" content="{{$meta_keywords}}">
    <meta name="description" content="{{$meta_description}}">
    <meta property="og:title" content="">
    <meta property="og:type" content="admin-panel">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="">
    <link rel="canonical" href="">
    {{--<link rel="icon" type="image/x-icon" href="{{asset('assets/images/settings/'.get_setting('favicon'))}}">--}}
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
    @vite(['resources/assets/frontend/css/app.css'])
</head>
<body class="w-full overflow-x-hidden antialiased">
@include('frontend.layouts.header')
@yield('content')
@include('frontend.layouts.footer')
</body>
@vite(['resources/assets/frontend/js/app.js'])
@stack('script')
</html>
