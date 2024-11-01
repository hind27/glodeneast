@extends('layout')
@section('page-title', __('Home'))
@section('content')

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <div class="container-fluid mb-5 px-0">
        <div class="header-intro position-relative wow fadeInUp" data-wow-delay="0.1s" style="max-height: 695px;">
            <img class="w-100" src="img/cover02.jpg" alt="Image" style="max-height: 695px; object-fit: cover;">
            <div class=" d-flex flex-column align-items-center justify-content-center w-100 h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 text-center">
                            <h1 class="display-4 text-white mb-4 animated zoomIn">{{ __('Golden East for agriculture development') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Products Start -->


    <div class="container-fluid">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="">
                <p class="fs-5 fw-medium fst-italic text-primary">{{ __('Our Products') }}</p>
                <h1 class="fs-4 fw-lighter"> {{ __('High quality products with effective results') }}</h1>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                @foreach ($products as $product)
                    <a href="#" class="d-block product-item rounded text-decoration-none">
                        @php
                            $firstImage = $product->images->first(); // Assuming $product->images returns a collection of images
                        @endphp

                        <!-- Product Image Wrapper -->
                        <div class="product-image-wrapper w-100">
                            <img src="{{ asset($firstImage->image_path) }}"
                                alt="{{ app()->getLocale() == 'en' ? $product->name : $product->name_ar }}"
                                class="img-fluid rounded">
                        </div>

                        <!-- Product Details -->
                        <div class="bg-white shadow-sm text-center p-4 position-relative mt-3 mx-3">
                            <h4 class="text-primary">
                                @if (app()->getLocale() == 'en')
                                    {{ $product->name }}
                                @else
                                    {{ $product->name_ar }}
                                @endif
                            </h4>
                            <span class="text-body">
                                @if (app()->getLocale() == 'en')
                                    {{ $product->des }}
                                @else
                                    {{ $product->des_ar }}
                                @endif
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Products End -->

    <!-- Categories Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">{{ __('Our Categories') }}</h2>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        <img src="{{ $category->image_path }}" class="card-img-top" alt="{{ $category->title_ar }}"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->title_ar }}</h5>
                            <p class="card-text">{{ $category->des }}</p>
                            <a href="{{ route('product', ['locale' => app()->getLocale()]) }}" class="btn btn-primary">{{ __('تعرف على المزيد') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    <!-- Store Start -->
    {{-- <div class="container-xxl ">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">{{ __('Online Store') }}</p>
                <h1 class="display-6">{{ __('Want to stay healthy? Choose tea taste') }}</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-1.jpg" alt="">
                        <div class="p-4">
                            {{-- <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">{{ __('BestCal') }}</h4>
                            {{-- <p>{{ __('Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed') }}</p> --}}
                            {{-- <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">{{ __('More Detail') }}<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                            {{-- <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">{{ __('Add to Cart') }} <i class="fa fa-cart-plus ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-2.jpg" alt="">
                        <div class="p-4">
                            {{-- <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">{{ __('ELSaher') }}</h4>
                            {{-- <p>{{ __('Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed') }}</p> --}}
                            {{-- <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">{{ __('More Detail') }}<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                            {{-- <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">{{ __('Add to Cart') }} <i class="fa fa-cart-plus ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-3.jpg" alt="">
                        <div class="p-4">
                            {{-- <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">{{ __('AL Nesr') }}</h4>
                            {{-- <p>{{ __('Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed') }}</p>
                            {{-- <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">{{ __('More Detail') }}<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                            {{-- <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">{{ __('Add to Cart') }} <i class="fa fa-cart-plus ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('product', ['locale' => app()->getLocale()]) }}"
                        class="btn btn-primary rounded-pill py-3 px-5">{{ __('View More Products') }}</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Store End -->

    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">{{ __('Contact Us') }}</p>
                <h1 class="display-6"> {{ __('Contact us right now') }}</h1>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8">

                    <div class="row g-5">
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">info@goldeneasteg.com</p>

                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>


                            <div dir="{{ app()->getLocale() == 'ar' ? 'ltr' : '' }}">
                                <p class="mb-1">0110 10 20 582</p>
                                <p class="mb-1">011 40 270 215</p>
                                <p class="mb-1">0128 1800 804</p>
                            </div>


                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-2"></p>
                            <p class="mb-0">{{ __('Plot 89 - Industrial Zone - Beni Suef Governorate') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Start -->

@endsection
