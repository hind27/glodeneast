<!-- Navbar Start -->
<nav class="navbar navbar-expand-md navbar-dark  bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">Glodneast</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="p-2">
      @if (Auth::check() && Auth::user()->hasRole('Super Admin'))
          <a href="{{ route('admin.dashboard') }}"
              class="nav-item nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
              {{ Auth::user()->name }}
              <i class="fa fa-user  ms-2 "></i>
          </a>

      @endif
  </div>
    </div>
  </nav>


<!-- Navbar End -->

