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
                    <h2>Add Category</h2>
                    <form id="addCategory" action="{{ route('category.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Add CSRF token -->
                        <div class="mb-3">
                            <label for="title_ar" class="form-label">Category Name (Arabic)</label>
                            <input type="text" class="form-control" id="title_ar" name="title_ar" required>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Description</label>
                            <textarea class="form-control" id="des" name="des" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Category Image</label>
                            <input type="file" class="form-control" id="image" name="image"
                                accept="image/png, image/jpeg">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>

                <!-- Table to display categories -->
                <div class="mt-5">
                    <h2>Category List</h2>
                    <table class="table table-striped" id="categoryTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name (Arabic)</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->title_ar }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->des }}</td>
                                    <td>
                                        @if ($category->image_path)
                                            <img src="{{ asset($category->image_path) }}" alt="{{ $category->name }}"
                                                width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Edit button -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $category->id }}">
                                            Edit
                                        </button>

                                        <!-- Modal for editing -->
                                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $category->id }}">Edit
                                                            Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="editCategory{{ $category->id }}"
                                                            action="{{ route('category.edit', ['categoryId' => $category->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="mb-3">
                                                                <label for="title_ar" class="form-label">Category Name
                                                                    (Arabic)
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    id="title_ar{{ $category->id }}" name="title_ar"
                                                                    value="{{ $category->title_ar }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Category
                                                                    Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="title{{ $category->id }}" name="title"
                                                                    value="{{ $category->title }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="des" class="form-label">Description</label>
                                                                <textarea class="form-control" id="des{{ $category->id }}" name="des" rows="3" required>{{ $category->des }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="image" class="form-label">Category
                                                                    Image</label>
                                                                <input type="file" class="form-control" id="image"
                                                                    name="image" accept="image/png, image/jpeg">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <!-- Delete button -->
                                        <form action="{{ route('category.delete', ['categoryId' => $category->id]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#addCategory').on('submit', function(e) {
                e.preventDefault();

                // Create a FormData object to handle file uploads
                let formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('title_ar', $('#title_ar').val());
                formData.append('title', $('#title').val());
                formData.append('des', $('#des').val());

                // Get the image file
                let imageFile = $('#image')[0].files[0];
                if (imageFile) {
                    formData.append('image', imageFile); // Append the file to the FormData
                }

                $.ajax({
                    url: "{{ route('category.add') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false, // Important for file uploads
                    processData: false, // Important for file uploads
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
                            $('#categoryForm')[0].reset();
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

            @foreach ($categories as $category)
                $('#editCategory{{ $category->id }}').on('submit', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this); // Using 'this' to refer to the form being submitted

                    $.ajax({
                        url: "{{ route('category.edit', ['categoryId' => $category->id]) }}",
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.msg_data.message,
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    window.location.reload();
                                });
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
            @endforeach
        });
    </script>

    <style>
        .img {
            max-width: 100px;
            height: auto;
        }
    </style>
@endsection
