@extends('layout-login')
@section('page-title', __('Login'))
@section('content')


    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center b">
        <div class="row justify-content-center w-100">
            <div class="col-md-5 ">
                <div class="card border-0">
                    <div class="card-header bg-white border-0 text-center"><img class="img-fluid" src="img/goldeneast.png"
                            alt="Logo" style="width: 150px; height: 120px;"></div>
                    <div class="card-body ">

                        <form method="POST" id="loginform" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group ">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right my-2">E-Mail
                                    Address</label>

                                <input type="text" id="email_address" class="form-control" name="email" required
                                    autofocus>

                            </div>

                            <div class="form-group ">
                                <label for="password" class="col-md-4 col-form-label text-md-right my-2">Password</label>

                                <input type="password" id="password" class="form-control"name="password" required>

                            </div>

                            <div class="form-group  my-1">

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>

                            </div>


                            <button type="submit" class="btn  btn-lg btn-primary w-100">Register</button>
                            <a href="{{ route('password.request') }}" class="btn btn-link">Forgot Your Password?</a>

                            <!-- Add "Don't have an account?" link -->
                            <div class="text-center mt-3">
                                <span>Don't have an account?</span>
                                <a href="{{ route('register') }}" class="btn btn-link">Sign up here</a>
                            </div>
                        </form>
                        <script>
                            // In your JavaScript file or script tag


                            // document.addEventListener("DOMContentLoaded", function() {
                            //     $.ajaxSetup({
                            //         headers: {
                            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            //         }
                            //     });
                            //     $("#loginform").submit(function(e) {
                            //         e.preventDefault(); // avoid to execute the actual submit of the form.

                            //         var form = $(this);
                            //         var actionUrl = form.attr('action');

                            //         $.ajax({
                            //             type: "POST",
                            //             url: actionUrl,
                            //             data: form.serialize(), // serializes the form's elements.
                            //             success: function(response) {
                            //                 // if (response.errors) {
                            //                 //     // Handle validation errors
                            //                 //     Swal.fire({
                            //                 //         position: 'center',
                            //                 //         icon: 'error',
                            //                 //         title: 'Validation Error',
                            //                 //         text: 'Please check your inputs and try again.',
                            //                 //         showConfirmButton: true
                            //                 //     });
                            //                 //     console.log(response.errors);
                            //                 // } else {
                            //                 //     // Handle successful registration
                            //                 //     Swal.fire({
                            //                 //         position: 'center',
                            //                 //         icon: 'success',
                            //                 //         title: 'Registration successful',
                            //                 //         showConfirmButton: false,
                            //                 //         timer: 1500
                            //                 //     });
                            //                 //     console.log(response);
                            //                 // }
                            //             },
                            //             error: function(xhr) {
                            //                 console.error('Error:', xhr.responseText);
                            //                 Swal.fire({
                            //                     position: 'center',
                            //                     icon: 'error',
                            //                     title: 'Registration Failed',
                            //                     text: 'An error occurred during registration. Please try again.',
                            //                     showConfirmButton: true
                            //                 });
                            //             }
                            //         });
                            //     });
                            // });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('style')
    <style>
        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }

        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
@endpush
