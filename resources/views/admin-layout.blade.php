<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" @if (app()->getLocale() == 'ar') dir="rtl" direction="rtl" @endif>
<!--begin::Head-->

<head>
    <base href="">
    <title>@yield('page-title') | Goldeneast - Vegetable Website Template</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('includes.head')

</head>
<!--end::Head-->
<!--begin::Body-->

<body>

    @include('includes.admin-header')

    @yield('content')

    @include('includes.footer-js')
</body>

</html>
