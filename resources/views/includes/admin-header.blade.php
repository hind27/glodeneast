<!-- Navbar Start -->


<nav class="navbar navbar-expand-md navbar-dark  bg-dark">
    <div class="d-flex align-items-center justify-content-between w-50">
        <a class="navbar-brand fw-bold" href="{{ route('home', ['locale' => 'ar']) }}">Glodneast</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class="d-flex align-items-center justify-content-between w-50 text-white">

        <!-- User Authentication Links -->
        <div class="p-2">
            @if (Auth::check())
                <!-- User Profile and Dropdown Menu -->
                <div class="dropdown">
                    <a href="#" class="nav-item nav-link dropdown-toggle" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        {{ Auth::user()->name }}
                        <i class="fas fa-user ms-2 "></i>


                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
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
                    @if (app()->getLocale() === 'ar')
                        <i class="fas fa-user  me-1 "></i>
                        {{ __('Login') }}
                    @else
                        {{ __('Login') }}
                        <i class="fas fa-user  ms-2 "></i>
                    @endif

                </a>
            @endif
        </div>

    </div>
</nav>




<!-- Navbar End -->
