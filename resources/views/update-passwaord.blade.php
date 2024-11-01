@extends('layout-login')
@section('page-title', __('Login'))
@section('content')
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-5">
                <div class="card border-0">
                    <div class="card-header bg-white border-0 text-center">
                        <img class="img-fluid" src="img/goldeneast.png" alt="Logo" style="width: 150px; height: 120px;">
                    </div>
                    <div class="card-body">
                        <form method="POST" id="updatePasswordForm" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT') <!-- For updating an existing resource -->

                            <!-- Current Password -->
                            <div class="form-group">
                                <label for="current_password" class="col-form-label text-md-right my-2">Current
                                    Password</label>
                                <input type="password" id="current_password" class="form-control" name="current_password"
                                    required>
                            </div>

                            <!-- New Password -->
                            <div class="form-group">
                                <label for="new_password" class="col-form-label text-md-right my-2">New Password</label>
                                <input type="password" id="new_password" class="form-control" name="new_password" required>
                            </div>

                            <!-- Confirm New Password -->
                            <div class="form-group">
                                <label for="new_password_confirmation" class="col-form-label text-md-right my-2">Confirm New
                                    Password</label>
                                <input type="password" id="new_password_confirmation" class="form-control"
                                    name="new_password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-lg btn-primary  mt-5 w-100">Update Password</button>
                        </form>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById("updatePasswordForm").addEventListener("submit", function(e) {
                                    e.preventDefault(); // Prevent default form submission

                                    var form = this;
                                    var actionUrl = form.action;

                                    $.ajax({
                                        type: "POST",
                                        url: actionUrl,
                                        data: $(form).serialize(), // Serialize form data
                                        success: function(response) {
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'Password updated successfully',
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        },
                                        error: function(xhr) {
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'error',
                                                title: 'Update Failed',
                                                text: 'An error occurred while updating the password. Please try again.',
                                                showConfirmButton: true
                                            });
                                            console.error('Error:', xhr.responseText);
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
