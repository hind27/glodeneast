@extends('layout')
@section('page-title', __('Dashboard'))
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3">
                <h4>Filter by Category</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#fertilizers">أسمدة</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#pesticides">مبيدات</a>
                    </li>
                </ul>

                <h4 class="mt-4">Filter by Price</h4>
                <input type="range" min="0" max="500" step="10" value="100" id="priceRange"
                    class="form-control">
                <p>Price: <span id="priceValue">100</span> ر.س</p>
            </div>

            <!-- Products Section -->
            <div class="col-lg-9">
                <!-- Sorting Options -->
                <div class="d-flex justify-content-between mb-4">
                    <h2>Products</h2>
                    <select class="form-select w-auto">
                        <option value="default">Sort by Default</option>
                        <option value="price-low-high">Price: Low to High</option>
                        <option value="price-high-low">Price: High to Low</option>
                    </select>
                </div>

                <!-- Products Grid -->
                <div class="row" id="productsGrid">
                    <!-- Sample Product Item -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="img/fertilizer1.jpg" class="card-img-top" alt="Fertilizer">
                            <div class="card-body">
                                <h5 class="card-title">سماد يوريا</h5>
                                <p class="card-text">سعر: 130 ر.س</p>
                                <a href="#" class="btn btn-primary">إضافة إلى السلة</a>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat product items as needed -->
                </div>
            </div>
        </div>
    </div>

    <!-- Page Header End -->
    <section class="section-products">
        <div class="container-fluid my-4 p-3">
            <div class="row">
                <!-- Side Menu (Categories) -->
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                    <div class="position-sticky pt-3">
                        <h4 class="text-center">Categories</h4>
                        <ul class="nav flex-column category-list">
                            <li class="nav-item" onclick="showCategory('electronics')">
                                <span class="nav-link">Electronics</span>
                            </li>
                            <li class="nav-item" onclick="showCategory('fashion')">
                                <span class="nav-link">Fashion</span>
                            </li>
                            <li class="nav-item" onclick="showCategory('home-appliances')">
                                <span class="nav-link">Home Appliances</span>
                            </li>
                            <li class="nav-item" onclick="showCategory('books')">
                                <span class="nav-link">Books</span>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main Content (Products) -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div id="product-list" class="row">
                        <!-- Products will be loaded here -->
                    </div>
                </main>
            </div>
        </div>

        <script>
            // Product data (you can replace this with dynamic data from your backend)
            const products = {
                electronics: [{
                        name: 'Smartphone',
                        price: '$699'
                    },
                    {
                        name: 'Laptop',
                        price: '$999'
                    },
                    {
                        name: 'Headphones',
                        price: '$199'
                    }
                ],
                fashion: [{
                        name: 'T-Shirt',
                        price: '$29'
                    },
                    {
                        name: 'Jeans',
                        price: '$59'
                    },
                    {
                        name: 'Jacket',
                        price: '$89'
                    }
                ],
                'home-appliances': [{
                        name: 'Vacuum Cleaner',
                        price: '$199'
                    },
                    {
                        name: 'Air Conditioner',
                        price: '$499'
                    },
                    {
                        name: 'Refrigerator',
                        price: '$799'
                    }
                ],
                books: [{
                        name: 'The Great Gatsby',
                        price: '$19'
                    },
                    {
                        name: '1984',
                        price: '$25'
                    },
                    {
                        name: 'To Kill a Mockingbird',
                        price: '$30'
                    }
                ]
            };

            // Function to display products based on selected category
            function showCategory(category) {
                const productList = document.getElementById('product-list');
                productList.innerHTML = ''; // Clear previous products

                const categoryProducts = products[category];
                if (categoryProducts) {
                    categoryProducts.forEach(product => {
                        const productCard = `
                         <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="img/fertilizer1.jpg" class="card-img-top" alt="Fertilizer">
                            <div class="card-body">
                               <h5 class="card-title">${product.name}</h5>
                                 <p class="card-text">${product.price}</p>
                                <a href="#" class="btn btn-primary">إضافة إلى السلة</a>
                            </div>
                        </div>
                    </div>
                      `;
                        productList.innerHTML += productCard;
                    });
                }
            }

            // Default category
            showCategory('electronics');
        </script>


    </section>

@endsection
@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        @import url("https://use.fontawesome.com/releases/v5.13.0/css/all.css");

        .container {
            max-width: 1200px;
        }

        .list-group-item a {
            text-decoration: none;
            color: #333;
        }

        .list-group-item a:hover {
            color: #007bff;
        }

        .card {
            border: none;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .category-list {
            cursor: pointer;
        }

        .category-list li {
            padding: 10px;
        }

        .category-list li:hover {
            background-color: #f8f9fa;
        }
    </style>
@endpush
