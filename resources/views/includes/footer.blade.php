<!--begin::Footer-->
    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 {{ app()->getLocale() == 'ar' ? 'text-md-end' : 'text-md-start' }}  text-center">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-primary mb-4">{{ __('Our Office') }}</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary  {{ app()->getLocale() == 'ar' ? 'ms-3' : 'me-3' }}"></i>{{ __('Beni Suef, Egypt') }}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary  {{ app()->getLocale() == 'ar' ? 'ms-3' : 'me-3' }} "></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary  {{ app()->getLocale() == 'ar' ? 'ms-3' : 'me-3' }}"></i>info@example.com</p>
                    <div class="d-flex justify-content-md-start justify-content-center pt-3">
                        <a class="btn btn-square btn-primary rounded-circle ms-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle ms-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle ms-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle ms-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 {{ app()->getLocale() == 'ar' ? 'text-end' : 'text-start' }}">
                    <h4 class="text-primary mb-4">{{ __('Quick Links') }}</h4>
                    <a class="btn btn-link d-block {{ app()->getLocale() == 'ar' ? 'text-end  ' : 'text-start' }}" href="">{{ __('About Us') }}</a>
                    <a class="btn btn-link d-block {{ app()->getLocale() == 'ar' ? 'text-end' : 'text-start' }}" href="">{{ __('Contact Us') }}</a>
                    <a class="btn btn-link d-block {{ app()->getLocale() == 'ar' ? 'text-end' : 'text-start' }}" href="">{{ __('Our Services') }}</a>
                    <a class="btn btn-link d-block {{ app()->getLocale() == 'ar' ? 'text-end' : 'text-start' }}" href="">{{ __('Terms & Condition') }}</a>
                    <a class="btn btn-link d-block {{ app()->getLocale() == 'ar' ? 'text-end' : 'text-start' }}" href="">{{ __('Support') }}</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-primary mb-4">{{ __('Business Hours') }}</h4>
                    <p class="mb-1">{{ __('Monday - Friday') }}</p>
                    <h6 class="text-light">{{ __('09:00 am - 07:00 pm') }}</h6>
                    <p class="mb-1">{{ __('Saturday') }}</p>
                    <h6 class="text-light">{{ __('09:00 am - 12:00 pm') }}</h6>
                    <p class="mb-1">{{ __('Sunday') }}</p>
                    <h6 class="text-light">{{ __('Closed') }}</h6>
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">{{ __('Newsletter') }}</h4>
                    <p>{{ __('Dolor amet sit justo amet elitr clita ipsum elitr est.') }}</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="{{ __('Your email') }}">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 {{ app()->getLocale() == 'ar' ? 'start-0 ms-2' : 'end-0 me-2' }} mt-2 ">{{ __('SignUp') }}</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

        <!-- Copyright Start -->
        <div class="container-fluid copyright py-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="fw-medium" href="#"> Glodeneast</a>, All Right Reserved. {{date('Y')}} ©
                    </div>

                </div>
            </div>
        </div>
        <!-- Copyright End -->

