@extends('layout')
@section('page-title', __('Dashboard'))
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="text-center mb-4 pb-2">
                        <h4 class="title mb-4 fs-3">{{ __('Our Products') }}</h4>
                        <p class="text-muted para-desc mx-auto mb-0 fs-4">{{ __('There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space') }}.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

    </div>




    <!-- Product Section - Start -->
    <div class="container mt-5">

        <div class="row">
            <div class="col-2">
                <!-- Sidebar (Categories, Price, Additional Options) -->
                <div class="col-lg-12">
                    <div class="row g-4">
                        <!-- Categories -->
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <h4>Categories</h4>
                                <ul class="list-unstyled ">
                                    @foreach ($categories as $category)
                                    <li>
                                        <div class="d-flex justify-content-between ">
                                            <a href="#">{{ $category->title_ar }}</a>
                                            <span>{{ $category->products->count() }}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Price Range -->
                        {{-- <div class="col-lg-12">
                            <div class="mb-3">
                                <h4 class="mb-2">Price</h4>
                                <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                                <output id="amount" name="amount" for="rangeInput">0</output>
                            </div>
                        </div> --}}

                        <!-- Additional Filters -->
                        {{-- <div class="col-lg-12">
                            <div class="mb-3">
                                <h4>Additional</h4>
                                <div class="mb-2">
                                    <input type="radio" class="me-2" id="Categories-1" name="Categories" value="organic">
                                    <label for="Categories-1"> Organic</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" class="me-2" id="Categories-2" name="Categories" value="fresh">
                                    <label for="Categories-2"> Fresh</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" class="me-2" id="Categories-3" name="Categories" value="sales">
                                    <label for="Categories-3"> Sales</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" class="me-2" id="Categories-4" name="Categories" value="discount">
                                    <label for="Categories-4"> Discount</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" class="me-2" id="Categories-5" name="Categories" value="expired">
                                    <label for="Categories-5"> Expired</label>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-9">
                <div class="row ">
                    <div class="col-xl-6">
                        <!-- Search Bar -->
                        <div class="input-group w-100 mx-auto d-flex {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }}">
                            <input type="search" class="form-control p-3" placeholder="{{ __('keywords') }}" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                    {{-- <div class="col-6"></div> --}}
                    {{-- <div class="col-xl-3">
                        <!-- Sorting Dropdown -->
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4 {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }}">
                            <label for="sorting">{{ __('default_sorting') }}:</label>
                            <select id="sorting" name="sorting" class="border-0 form-select-sm bg-light me-3">
                                <option value="nothing">{{ __('nothing') }}</option>
                                <option value="popularity">{{ __('popularity') }}</option>
                                <option value="organic">{{ __('organic') }}</option>
                                <option value="fantastic">{{ __('fantastic') }}</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                <div class="row ">
                    @for($i=0; $i<10; $i++)
                    <div class="col-md-3 mb-1">
                        <div class="product-single-card">
                            <div class="product-top-area">
                                <div class="product-discount">10%</div>
                                <div class="product-img">
                                    <div class="first-view">
                                        <img src="./assets/img/placeholder/dummy3.png" alt="Product Image" class="img-fluid" onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                        <img src="./assets/img/placeholder/dummy.jpg" alt="Product Image" class="img-fluid" onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="sideicons">
                                    <button class="sideicons-btn"><i class="fa fa-cart-plus"></i></button>
                                    <button class="sideicons-btn"><i class="fa fa-eye"></i></button>
                                    <button class="sideicons-btn"><i class="fa fa-heart"></i></button>
                                    <button class="sideicons-btn"><i class="fa fa-shuffle"></i></button>
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="product-info">
                                <h6 class="product-category"><a href="#">Gaming</a></h6>
                                <h6 class="product-title text-truncate"><a href="#">VR Glass For Ultimate Gaming</a></h6>
                                <div class="d-flex align-items-center">
                                    <div class="review-star me-1">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star-half-stroke"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <span class="review-count">(13)</span>
                                </div>
                                <div class="d-flex flex-wrap align-items-center py-2">
                                    <div class="old-price">$50.45</div>
                                    <div class="new-price">$35.05</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <!-- Product Section - End -->






@endsection
@push('styles')
    <style>
        .user-select-none {
            user-select: none;
        }

        a {
            text-decoration: none;
            color: unset;
        }

        .review-star {
            color: #fdcc0d;
            font-size: 13px;
        }

        /* =========== Product Single Card - Start ============= */
        .product-single-card {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 1px 1px 15px #cccccc40;
            transition: 0.5s ease-in;
        }

        .product-single-card:hover {
            box-shadow: 1px 1px 28.5px -7px #d6d6d6;
        }

        .product-single-card .product-info {
            padding: 15px 0 0 0;
        }

        .product-single-card .product-top-area {
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            border-radius: 5px;
        }

        .product-single-card .product-top-area .product-discount {
            position: absolute;
            top: 10px;
            left: 10px;
            background: white;
            border-radius: 3px;
            padding: 5px 10px;
            box-shadow: 1px 1px 28.5px -7px #dddddd;
            user-select: none;
            z-index: 999;
        }

        .product-single-card .product-top-area .product-img {
            aspect-ratio: 1/1;
            overflow: hidden;
        }

        .product-single-card .product-top-area .product-img .first-view {
            transition: 0.5s ease-in;
        }

        .product-single-card .product-top-area .product-img .hover-view {
            opacity: 0;
            transition: 0.5s ease-in;
        }

        .product-single-card .product-top-area:hover .product-img .first-view {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .product-single-card .product-top-area:hover .product-img .hover-view {
            opacity: 100%;
            scale: 1.2;
        }

        .product-single-card .product-top-area .sideicons {
            position: absolute;
            right: 15px;
            display: grid;
            gap: 10px;
        }

        .product-single-card .product-top-area .sideicons .sideicons-btn {
            background-color: #fff;
            color: #000;
            border-radius: 50%;
            border: none;
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            transform: translateX(60px);
            transition: 0.3s ease-in;
            box-shadow: 1px 1px 28.5px -7px #dddddd;
        }

        .product-single-card .product-top-area .sideicons .sideicons-btn:hover {
            color: #fff;
            background-color: #000;
        }

        .product-single-card .product-top-area .sideicons .sideicons-btn:nth-child(1) {
            transition-delay: 100ms;
        }

        .product-single-card .product-top-area .sideicons .sideicons-btn:nth-child(2) {
            transition-delay: 200ms;
        }

        .product-single-card .product-top-area .sideicons .sideicons-btn:nth-child(3) {
            transition-delay: 300ms;
        }

        .product-single-card .product-top-area .sideicons .sideicons-btn:nth-child(4) {
            transition-delay: 400ms;
        }

        .product-single-card .product-top-area:hover .sideicons .sideicons-btn {
            opacity: 100%;
            visibility: visible;
            transform: translateX(0);
        }

        .product-single-card .product-info .product-category {
            font-weight: 600;
            opacity: 60%;
        }

        .product-single-card .product-info .product-title {
            font-size: 16px;
            font-weight: 600;
        }

        .product-single-card .product-info .old-price,
        .product-single-card .product-info .new-price {
            padding-right: 15px;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .product-single-card .product-info .old-price {
            text-decoration: line-through;
            opacity: 70%;
        }

        /* =========== Product Single Card - End ============= */
    </style>
@endpush
