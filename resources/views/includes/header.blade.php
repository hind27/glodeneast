<!-- Navbar Start -->
<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0 ">
            <div class="d-flex w-50">
                @if (app()->getLocale() === 'ar')
                    <!-- Logo on the right for Arabic locale -->
                    <div class="ms-auto order-lg-2">
                        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                            <img class="img-fluid" src="/img/goldeneast.png" alt="Logo"
                                style="width: 98px; height: 82px;">
                        </a>
                    </div>
                @else

                    <!-- Logo on the left for other locales -->
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" >
                        <img class="img-fluid" src="/img/goldeneast.png" alt="Logo"
                            style="width: 98px; height: 82px;">
                    </a>
                @endif
            </div>

            <!-- Navbar Toggler for Mobile View -->
            <button class="navbar-toggler ms-auto me-0 " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible Navbar Menu -->
            <div class="collapse navbar-collapse w-100" id="navbarCollapse">
                <div class="navbar-nav w-100 me-auto">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">{{ __('Home') }}</a>
                    <a href="{{ route('about', ['locale' => app()->getLocale()]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">{{ __('About') }}</a>
                    <a href="{{ route('product', ['locale' => app()->getLocale()]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'product' ? 'active' : '' }}">{{ __('Products') }}</a>
                    <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">{{ __('Contact') }}</a>
                </div>

                <!-- Language Switcher and Authentication Links -->
                <div class="d-flex align-items-center justify-content-between w-50">
                    <div class="p-2">
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-green dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @if (app()->getLocale() == 'en')
                                    العربية
                                @else
                                    English
                                @endif
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route(Route::currentRouteName(), ['en']) }}">English</a></li>
                                <li> <a class="dropdown-item" href="{{ route(Route::currentRouteName(), ['ar']) }}"
                                        style="font-family: Tajawal,sans-serif;">العربية</a></li>

                            </ul>
                        </div>
                        {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link btn btn-sm dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (app()->getLocale() == 'en')
                                    العربية
                                @else
                                    English
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route(Route::currentRouteName(), ['en']) }}">English</a>
                                <a class="dropdown-item" href="{{ route(Route::currentRouteName(), ['ar']) }}"
                                    style="font-family: Tajawal,sans-serif;">العربية</a>
                            </div>
                        </li> --}}
                    </div>
                    <!-- User Authentication Links -->
                    <div class="p-2">
                        @if (Auth::check() && Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-item nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                                {{ Auth::user()->name }}
                                <i class="fa fa-user @if (app()->getLocale() === 'ar') me-1 @else ms-2 @endif"></i>
                            </a>
                        @else
                            <a href="{{ route('login.form') }}"
                                class="nav-item nav-link {{ Route::currentRouteName() == 'login.form' ? 'active' : '' }}">
                                {{ __('Login') }}
                                <i class="fa fa-user @if (app()->getLocale() === 'ar') me-1 @else ms-2 @endif"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

    </div>

</div>
<!-- Navbar End -->
