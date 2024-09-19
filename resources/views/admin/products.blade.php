@extends('admin-layout')
@section('page-title', __('Dashboard'))
@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('includes.admin-sidebar')


            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-2">
                <div class="form-section">
                    <h2>Add New Product</h2>
                    <form id="productForm" enctype="multipart/form-data"> <!-- Add enctype -->
                        <div class="mb-3">
                            <label for="name_ar" class="form-label">Product Name (Arabic)</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Description</label>
                            <textarea class="form-control" id="des" name="des"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="des_ar" class="form-label">Description (Arabic)</label>
                            <textarea class="form-control" id="des_ar" name="des_ar"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" id="category" name="category_id" required>
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>

                <!-- Table to display products -->
                <div class="mt-5">
                    <h2>Product List</h2>
                    <table class="table table-striped" id="productTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Image</th> <!-- Added column for image -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category?->title }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->des }}</td>
                                    <td>
                                        @if ($product->image_path)
                                            <img src="{{ asset('storage/' . $product->image_path) }}"
                                                alt="{{ $product->name }}" width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </main>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    $('#productForm').on('submit', function(e) {
                        e.preventDefault();

                        // Create a FormData object to send form data, including the image
                        let formData = new FormData(this); // 'this' refers to the form element

                        // Add the CSRF token manually if not included
                        formData.append('_token', '{{ csrf_token() }}');

                        $.ajax({
                            url: "{{ route('product.add') }}", // Adjust this route to match your actual endpoint
                            method: 'POST',
                            data: formData,
                            contentType: false, // Important for FormData
                            processData: false, // Important for FormData
                            success: function(response) {
                                if (response.status === 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: response.msg_data.message,
                                        confirmButtonText: 'OK',
                                    }).then((result) => {
                                        // reload the current page
                                        window.location.reload();
                                    });
                                    $('#productForm')[0].reset(); // Reset form
                                } else if (response.status === 'error') {
                                    $('#ErrorMsg').show();
                                    $('#ErrorMessageSpan').html(response.msg_data.message);
                                }
                            },
                            error: function(response) {
                                Swal.fire({
                                    title: 'Error!!',
                                    text: response.responseJSON.message,
                                    icon: 'error',
                                });
                            }
                        });
                    });
                });
            </script>
        @endsection
