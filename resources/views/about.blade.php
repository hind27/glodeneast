@extends('layout')
@section('page-title', __('Dashboard'))
@section('content')

    <!-- About Start -->
  <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="/img/about-1.jpg" alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="img/about-3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="/img/about-4.jpg" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="/img/about-2.jpg" alt="">
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
                    </div>
                   <div class="border-top mb-4"></div>
                    <div class="row g-3">
                        <div class="col-sm-8">
                            <h5>{{ __('Daily use of a cup of tea is good for your health')}}</h5>
                            <p class="mb-0">{{ __('Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit')}}</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="img/about-6.jpg" alt="">
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
