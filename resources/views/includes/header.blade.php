<!-- Navbar Start -->
<div class="container-fluid bg-white sticky-top">
    <div class="container">

        <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">

            <div class="d-flex   @if (app()->getLocale() === 'ar') w-50  @else w-50 @endif">
                @if (app()->getLocale() === 'ar')
                    <!-- Logo on the right for Arabic locale -->
                    <div class="ms-auto order-lg-2">
                        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="">
                            <img class="img-fluid" src="/img/goldeneast.png" alt="Logo"
                                style="width: 98px; height: 82px;">
                        </a>
                    </div>
                @else
                    <!-- Logo on the left for other locales -->
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="navbar-brand">
                        <img class="img-fluid" src="img/goldeneast.png" alt="Logo"
                            style="width: 98px; height: 82px;">
                    </a>
                @endif

            </div>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">{{ __('Home') }}</a>
                    <a href="{{ route('about', ['locale' => app()->getLocale()]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">{{ __('About') }}</a>
                    <a href="{{ route('product', ['locale' => app()->getLocale()]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'product' ? 'active' : '' }}">{{ __('Products') }}</a>
                    {{-- <a href="{{ route('store', ['locale' => app()->getLocale()]) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'store' ? 'active' : '' }}">{{ __('Store') }}</a> --}}
                    <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">{{ __('Contact') }}</a>
                    <!-- Assuming you are using Laravel Blade syntax -->

                    <!-- Assuming you are using Laravel Blade syntax -->




                </div>
                <div class="navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link btn  btn-sm dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (app()->getLocale() == 'en')
                                    العربية
                                @else
                                    English
                                @endif
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route(Route::currentRouteName(), ['en']) }}">
                                    English</a>
                                <a class="dropdown-item" style="font-family: Tajawal,sans-serif;"
                                    href="{{ route(Route::currentRouteName(), ['ar']) }}"> العربية </a>
                            </div>
                        </li>
                    </ul>
                </div>

                @if (Auth::check() && Auth::user()->hasRole('admin'))
                    <!-- Check if user is logged in and has the 'admin' role -->
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                        {{ Auth::user()->name }}
                        <i class="fa fa-user @if (app()->getLocale() === 'ar') me-1 @else ms-2 @endif"
                            aria-hidden="true"></i>
                    </a>
                @else
                    <a href="{{ route('login.form') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'login.form' ? 'active' : '' }}">
                        {{ __('Login') }}
                        <i class="fa fa-user @if (app()->getLocale() === 'ar') me-1 @else ms-2 @endif"
                            aria-hidden="true"></i>
                    </a>
                @endif

            </div>

        </nav>
    </div>
</div>
<!-- Navbar End -->
