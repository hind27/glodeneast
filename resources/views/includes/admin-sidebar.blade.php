<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky pt-3">
        <div class="sidebar-header">
            <h3>Admin Menu</h3>
        </div>
        {{-- <h4 class="text-center">Admin Menu</h4> --}}
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('category.create') }}">Add Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('product.create') }}">Add Product</a>
            </li>
         
            <li class="nav-item">
                <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
            </li>
        </ul>

    </div>
</nav>