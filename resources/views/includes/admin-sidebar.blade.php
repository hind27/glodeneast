<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky pt-3">
        <div class="sidebar-header">
            <h3>Admin Menu</h3>
        </div>
        {{-- <h4 class="text-center">Admin Menu</h4> --}}
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'category.create' ? 'active bg-primary text-white' : '' }}"
                    href="{{ route('category.create') }}">Add Category</a>
            </li>
            @can('edit_product')
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'product.create' ? 'active bg-primary text-white' : '' }}"
                        href="{{ route('product.create') }}">Add Product</a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'users-list' ? 'active bg-primary text-white' : '' }}"
                    href="{{ route('users-list') }}">User List</a>
            </li>
            @can('edit_user_role')
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'roles.permissions' ? 'active bg-primary text-white' : '' }}"
                        href="{{ route('roles.permissions') }}">rolea</a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'orders.index' ? 'active bg-primary text-white' : '' }}"
                    href="{{ route('orders.index') }}">Orders</a>
            </li>
        </ul>

    </div>
</nav>
