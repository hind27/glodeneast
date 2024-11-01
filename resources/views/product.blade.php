@extends('layout')
@section('page-title', __('Products'))
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-center mb-4 pb-2">
                    <h4 class="title mb-4 fs-3">{{ __('Our Products') }}</h4>
                    {{-- <p class="text-muted para-desc mx-auto mb-0 fs-4">
                        {{ __('There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space') }}.
                    </p>ظ --}}
                </div>
            </div><!--end col-->
        </div><!--end row-->

    </div>




    <!-- Product Section - Start -->
    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar (Categories) -->
            {{-- <div class="col-2">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <h4>{{ __('Categories') }}</h4>
                                <ul class="list-unstyled">
                                    @foreach ($categories as $category)
                                        <li>
                                            <div class="d-flex justify-content-between">
                                                <a href="">{{ app()->getLocale() === 'ar' ? $category->title_ar : $category->title }}</a>
                                                <span>{{ $category->products->count() }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Products Grid -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Search Bar -->
                    <div class="col-xl-6 mb-4">
                        <div
                            class="input-group w-100 mx-auto d-flex {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }}">
                            <input type="search" class="form-control p-3" placeholder="{{ __('keywords') }}"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                <div class="row">
                    @foreach ($categories as $category)
                        {{-- <h3 class="mt-4 text-center">
                            {{ app()->getLocale() === 'ar' ? $category->title_ar : $category->title }}</h3> --}}
                        <!-- Category name -->
                        <div class="row">
                            @foreach ($category->products as $product)
                                <div class="col-12 col-sm-6 col-md-4 mb-4">
                                    <div class="card shadow-sm" style="width: 100%;">
                                        <!-- Product Image -->
                                        @php
                                            $firstImage = $product->images->first();
                                        @endphp
                                        <img src="{{ asset($firstImage->image_path) }}"
                                            alt="{{ app()->getLocale() == 'en' ? $product->name : $product->name_ar }}"
                                            class="img-fluid rounded">

                                        <div class="card-body text-center">
                                            <h5 class="card-title mb-2">
                                                {{ app()->getLocale() == 'en' ? $product->name : $product->name_ar }}
                                            </h5>
                                            <p class="card-text mb-2">
                                                {{ app()->getLocale() == 'en' ? $product->des : $product->des_ar }}
                                            </p>
                                            {{-- <p class="card-text font-weight-bold text-success">
                                                <strong>{{ $product->price }} {{ __('EGP') }}</strong>
                                            </p> --}}
                                            <a href="{{ route('product.details', ['locale' => app()->getLocale() ,'id'=> $product->id]) }}" class="btn btn-primary btn-sm">{{ __('view') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
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
