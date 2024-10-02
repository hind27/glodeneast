<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" @if (app()->getLocale() == 'ar') dir="rtl" direction="rtl" @endif>
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title') | Goldeneast</title>
    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('includes.head')
    @stack('styles')

</head>
<!--end::Head-->
<!--begin::Body-->

<body>

    @include('includes.header')

    @yield('content')
    @stack('styles')

    <!--end::Content-->
    @include('includes.footer')



    <!--end::Root-->
    @include('includes.footer-js')

    @stack('scripts')
</body>

</html>
