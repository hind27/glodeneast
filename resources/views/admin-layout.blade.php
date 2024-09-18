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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('includes.head')

</head>
<!--end::Head-->
<!--begin::Body-->

<body>

    @include('includes.header')

    @yield('content')

    <!--end::Content-->
    @include('includes.footer')
    <!--end::Root-->
    @include('includes.footer-js')
</body>

</html>

<div id="page-container" class="main-admin">
    <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
    <a class="navbar-brand" href="#"></a>
    <div id="open-menu" class="menu-bar">
        <div class="bars"></div>
    </div>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown ets-right-0">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="" class="img-fluid rounded-circle border user-profile">
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
  </nav>
    <div class="side-bar">
        <div class="side-bar-links">
            <div class="side-bar-logo text-center py-3">
                <img src="" class="img-fluid rounded-circle border bg-secoundry mb-3">
                <h5>Company Name</h5>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> HOME</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> HOME</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> HOME</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> HOME</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> HOME</a>
                </li>
            </ul>
        </div>
        <div class="side-bar-icons">
            <!-- <div class="side-bar-logo text-center py-3">
                <img src="" class="img-fluid rounded-circle border bg-secoundry mb-3">
                <h5>Company Name</h5>
            </div> -->
            <div class="icons d-flex flex-column align-items-center">
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-home"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-users"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-list"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-sticky-note-o"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-file-text"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-sticky-note-o"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-database"></i></a>
            </div>
        </div>
    </div>
<div class="main-body-content w-100 ets-pt">
    <div class="table-responsive bg-light">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>lorem</th>
                <th>ipssum</th>
                <th>Dollor</th>
            </tr>
            <tr>
                <td>Vinay</td>
                <td>Sharma</td>
                <td>lorem ipssum dollor dummy</td>
                <td>lorem ipssum dollor dummy</td>
                <td>lorem ipssum dollor dummy</td>
            </tr>
            <tr>
                <td>Vinay</td>
                <td>Sharma</td>
                <td>lorem ipssum dollor dummy</td>
                <td>lorem ipssum dollor dummy</td>
                <td>lorem ipssum dollor dummy</td>
            </tr>
            <tr>
                <td>Vinay</td>
                <td>Sharma</td>
                <td>lorem ipssum dollor dummy</td>
                <td>lorem ipssum dollor dummy</td>
                <td>lorem ipssum dollor dummy</td>
            </tr>
            <tr>
                <td>Vinay</td>
                <td>Sharma</td>
                <td>lorem ipssum dollor dummy</td>
                <td>lorem ipssum dollor dummy</td>
                <td>lorem ipssum dollor dummy</td>
            </tr>
        </table>
    </div>
</div>
</div>
