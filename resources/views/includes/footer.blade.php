<!--begin::Footer-->
@php
    $locale = app()->getLocale() ?? config('app.locale', 'ar'); // Default to 'en' if no locale is set
@endphp
    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-3 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-2">
            <div class="row g-5 {{ $locale == 'ar' ? 'text-md-end' : 'text-md-start' }}  text-center">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-primary mb-4">{{ __('Our factory') }}</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary  {{ $locale == 'ar' ? 'ms-3' : 'me-3' }}"></i>{{ __('Plot 89 - Industrial Zone - Beni Suef Governorate') }}</p>
                    <p class="mb-2" ><i class="fa fa-phone-alt text-primary  {{ $locale == 'ar' ? 'ms-3' : 'me-3' }} "></i> <span dir="{{ $locale == 'ar' ? 'ltr' : '' }}">+012 345 67890</span></p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary  {{ $locale == 'ar' ? 'ms-3' : 'me-3' }}"></i>info@goldeneasteg.com</p>
                    <div class="d-flex justify-content-md-start justify-content-center pt-3">
                        <a class="btn btn-square btn-primary rounded-circle ms-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle ms-2" href="https://www.facebook.com/profile.php?id=61565981021577&mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                        {{-- <a class="btn btn-square btn-primary rounded-circle ms-2" href=""><i class="fab fa-youtube"></i></a> --}}
                        {{-- <a class="btn btn-square btn-primary rounded-circle ms-2" href=""><i class="fab fa-linkedin-in"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 {{ $locale == 'ar' ? 'text-end' : 'text-start' }}">
                    <h4 class="text-primary mb-4">{{ __('Quick Links') }}</h4>
                    <a class="btn btn-link d-block text-decoration-none {{ $locale == 'ar' ? 'text-end  ' : 'text-start' }}" href="{{ route('about', ['locale' => $locale]) }}">  {{ __('About Us') }}</a>
                    <a class="btn btn-link d-block  text-decoration-none {{ $locale == 'ar' ? 'text-end' : 'text-start' }}" href="{{ route('contact', ['locale' => $locale]) }}">  {{ __('Contact Us') }}</a>
                    <a class="btn btn-link d-block text-decoration-none {{ $locale == 'ar' ? 'text-end' : 'text-start' }}" href="">  {{ __('Our Services') }}</a>
                    <a class="btn btn-link d-block text-decoration-none {{ $locale == 'ar' ? 'text-end' : 'text-start' }}" href=""> {{ __('Terms & Condition') }}</a>
                    <a class="btn btn-link d-block  text-decoration-none {{ $locale == 'ar' ? 'text-end' : 'text-start' }}" href=""> {{ __('Support') }}</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-primary mb-4">{{ __('Business Hours') }}</h4>
                    <p class="mb-1">{{ __('Saturday to Thursday') }}</p>
                    <h6 class="text-light">{{ __('09:00 am - 05:00 pm') }}</h6>
                    <p class="mb-1">{{ __('Friday') }}</p>
                    <h6 class="text-light">{{ __('Closed') }}</h6>
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">{{ __('Newsletter') }}</h4>
                    <p>{{ __('Dolor amet sit justo amet elitr clita ipsum elitr est.') }}</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="{{ __('Your email') }}">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 {{ $locale == 'ar' ? 'start-0 ms-2' : 'end-0 me-2' }} mt-2 ">{{ __('SignUp') }}</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

        <!-- Copyright Start -->

        <div class="container-fluid py-2 copyright">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 text-center">
                        &copy; <a class="fw-medium text-primary" href="#">Glodeneast</a>, All Rights Reserved. {{ date('Y') }} ©
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright End -->

