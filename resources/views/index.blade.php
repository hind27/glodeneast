@extends('layout')
@section('page-title', __('Dashboard'))
@section('content')

    {{-- <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End --> --}}

    <!-- Carousel Start -->
    {{-- <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                  <p class="fs-4 text-white animated zoomIn">{{ __('Golden East') }} <strong class="text-dark"> {{ __('Gloden East') }}</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn"> {{ __('Golden East for agriculture development') }}</h1>
                                    <a href="" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn"> {{ __('Explore More') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div> --}}
    <div class="container-fluid px-0 ">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image" style="max-height: 400px; object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
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
        </div>
    </div>
    >

    <!-- Carousel End -->


    <!-- About Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="img/about-1.jpg" alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="img/about-3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="img/about-4.jpg" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="img/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title text-center mx-auto ">
                        <p class="fs-5 fw-medium fst-italic  text-primary">{{ __('About Us')}}</p>
                        <h1 class="display-6">{{ __('the company was create in 2004 and The success history of agriculture you will found the best')}}</h1>
                    </div>
                    {{-- <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="img/about-5.jpg" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h5>{{ __('Our tea is one of the most popular drinks in the world')}}</h5>
                            <p class="mb-0">{{ __('Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit')}}</p>
                        </div>
                    </div> --}}
                    {{-- <div class="border-top mb-4"></div>
                    <div class="row g-3">
                        <div class="col-sm-8">
                            <h5>{{ __('Daily use of a cup of tea is good for your health')}}</h5>
                            <p class="mb-0">{{ __('Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit')}}</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="img/about-6.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- About End -->


    <!-- Products Start -->
    <div class="container-fluid  ">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">{{ __('Our Products')}}</p>
                <h1 class="display-6"> {{ __('High quality products with effective results')}}</h1>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                <a href="" class="d-block product-item rounded">
                    <img src="img/product-1.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Green Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="img/product-2.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Black Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="img/product-3.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Spiced Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="img/product-4.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Organic Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="img/product-1.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Green Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="img/product-2.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Black Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="img/product-3.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Spiced Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="img/product-4.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Organic Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Products End -->



<!-- Categories Section -->
<!-- Categories Section (أسمدة ومبيدات) -->
<div class="container my-5">
    <h2 class="text-center mb-4">{{ __('Our Categories') }}</h2>
    <div class="row">
        @foreach ($categories as  $category)
        <div class="col-md-6 mb-4">
            <div class="card h-100 text-center">
                <img src="/img/{{ $category->im }}" class="card-img-top" alt="{{ $category->title_ar }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->title_ar }}</h5>
                    <p class="card-text">{{ $category->des }}</p>
                    <a href="#" class="btn btn-primary">{{ __('تعرف على المزيد') }}</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>





    <!-- Store Start -->
    <div class="container-xxl ">
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
                            </div> --}}
                            <h4 class="mb-3">{{ __('BestCal') }}</h4>
                            {{-- <p>{{ __('Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed') }}</p> --}}
                            {{-- <h4 class="text-primary">$19.00</h4> --}}
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">{{ __('More Detail') }}<i class="fa fa-arrow-right ms-2"></i></a>
                            {{-- <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">{{ __('Add to Cart') }} <i class="fa fa-cart-plus ms-2"></i></a> --}}
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
                            </div> --}}
                            <h4 class="mb-3">{{ __('ELSaher') }}</h4>
                            {{-- <p>{{ __('Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed') }}</p> --}}
                            {{-- <h4 class="text-primary">$19.00</h4> --}}
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">{{ __('More Detail') }}<i class="fa fa-arrow-right ms-2"></i></a>
                            {{-- <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">{{ __('Add to Cart') }} <i class="fa fa-cart-plus ms-2"></i></a> --}}
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
                            </div> --}}
                            <h4 class="mb-3">{{ __('AL Nesr') }}</h4>
                            {{-- <p>{{ __('Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed') }}</p> --}}
                            {{-- <h4 class="text-primary">$19.00</h4> --}}
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">{{ __('More Detail') }}<i class="fa fa-arrow-right ms-2"></i></a>
                            {{-- <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">{{ __('Add to Cart') }} <i class="fa fa-cart-plus ms-2"></i></a> --}}
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('product', ['locale' => app()->getLocale()]) }}" class="btn btn-primary rounded-pill py-3 px-5">{{ __('View More Products') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Store End -->



    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">{{ __('Contact Us')}}</p>
                <h1 class="display-6"> {{ __('Contact us right now')}}</h1>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8">

                    <div class="row g-5">
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">info@example.com</p>
                            <p class="mb-0">support@example.com</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">+012 345 67890</p>
                            <p class="mb-0">+012 345 67890</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-2"></p>
                            <p class="mb-0">{{ __('Beni Suef, Egypt') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Start -->






@endsection

