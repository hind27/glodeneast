<!-- Navbar Start -->
@php
    $locale = app()->getLocale() ?? config('app.locale', 'ar'); // Default to 'en' if no locale is set
@endphp
<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0 ">
            <div class="d-flex w-50">
                @if ($locale === 'ar')
                    <!-- Logo on the right for Arabic locale -->
                    <div class="ms-auto order-lg-2 ">
                        <a href="{{ route('home', ['locale' => $locale]) }}" class="text-decoration-none">
                            <img class="img-fluid" src="/img/logo.jpg" alt="Logo" style="width: 98px; height: 82px;">
                            <span class="text-primary fw-bolder"
                                style="font-family: 'M PLUS Rounded 1c', sans-serif;font-weight: 400;font-style: normal;">{{ _('Golden East') }}</span>
                        </a>
                    </div>
                @else
                    <!-- Logo on the left for other locales -->
                    <a href="{{ route('home', ['locale' => $locale]) }}" class="text-decoration-none">
                        <img class="img-fluid" src="/img/logo.jpg" alt="Logo" style="width: 98px; height: 82px;">
                        <span class="text-primary">{{ _('Golden East') }}</span>
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
                    <a href="{{ route('home', ['locale' => $locale]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">{{ __('Home') }}</a>
                    <a href="{{ route('about', ['locale' => $locale]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">{{ __('About') }}</a>
                    <a href="{{ route('product', ['locale' => $locale]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'product' ? 'active' : '' }}">{{ __('Products') }}</a>
                    <a href="{{ route('contact', ['locale' => $locale]) }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">{{ __('Contact') }}</a>
                </div>

                <!-- Language Switcher and Authentication Links -->
                <div class="d-flex align-items-center justify-content-between w-50">
                    <div class="p-2">
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-green dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @if ($locale == 'en')
                                    العربية
                                @else
                                    English
                                @endif
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale' => 'en'])) }}">
                                        English
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale' => 'ar'])) }}"
                                        style="font-family: Tajawal, sans-serif;">
                                        العربية
                                    </a>
                                </li>
                            </ul>

                        </div>
                        {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link btn btn-sm dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if ($locale == 'en')
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
                        @if (Auth::check())
                            <!-- User Profile and Dropdown Menu -->
                            <div class="dropdown">
                                <a href="#" class="nav-item nav-link dropdown-toggle" id="userDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if ($locale === 'ar')
                                        <i class="fas fa-user me-1"></i>
                                        {{ Auth::user()->name }}
                                    @else
                                        {{ Auth::user()->name }}
                                        <i class="fas fa-user ms-2 "></i>
                                    @endif

                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                {{ __('Logout') }}
                                                <i class="fas fa-sign-out-alt ms-1"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <!-- Login Link if not logged in -->
                            <a href="{{ route('login.form') }}"
                                class="nav-item nav-link {{ Route::currentRouteName() == 'login.form' ? 'active' : '' }}">
                                @if ($locale === 'ar')
                                    <i class="fas fa-user  me-1 "></i>
                                    {{ __('Login') }}
                                @else
                                    {{ __('Login') }}
                                    <i class="fas fa-user  ms-2 "></i>
                                @endif

                            </a>
                        @endif
                    </div>

                    <div class="p-1">
                        <a href="{{ route('cart.view', ['locale' => $locale]) }}"
                            class="nav-item nav-link position-relative">
                            <i class="fas fa-shopping-cart fs-6"></i>
                            <span id="cart-count"
                                class="badge bg-danger position-absolute top-0 start-100 translate-middle p-1 rounded-circle">
                                0
                            </span>
                        </a>
                    </div>
                </div>

            </div>
        </nav>

    </div>

</div>
<!-- Navbar End -->
<script>
    // Function to update cart count
    function updateCartCount() {
        $.ajax({
            url: "{{ route('cart.count', ['locale' => $locale]) }}", // Route that returns cart count
            method: "GET",
            success: function(response) {
                $('#cart-count').text(response.count); // Update cart count badge
            },
            error: function() {
                console.error("Unable to retrieve cart count.");
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        // Initial call to set the cart count on page load
        $(document).ready(function() {
            updateCartCount();
        });
    });
    // Optionally, set an interval to periodically update the cart count
    setInterval(updateCartCount, 5000); // Update every 5 seconds
</script>
