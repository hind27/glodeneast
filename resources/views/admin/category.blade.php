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
                    <form id="categoryForm">
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
                                     <!-- Edit button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                            Edit
                        </button>

                        <!-- Modal for editing -->
                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $category->id }}">Edit Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="categoryForm{{ $category->id }}" action="{{ route('category.edit', ['categoryId' => $category->id]) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="mb-3">
                                                <label for="title_ar" class="form-label">Category Name (Arabic)</label>
                                                <input type="text" class="form-control" id="title_ar{{ $category->id }}" name="title_ar" value="{{ $category->title_ar }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="title{{ $category->id }}" name="title" value="{{ $category->title }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="des" class="form-label">Description</label>
                                                <textarea class="form-control" id="des{{ $category->id }}" name="des" rows="3" required>{{ $category->des }}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete button -->
                        <form action="{{ route('category.delete', ['categoryId' => $category->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
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
            $('#categoryForm').on('submit', function(e) {
                e.preventDefault();

                let formData = {
                    _token: '{{ csrf_token() }}',
                    title_ar: $('#title_ar').val(),
                    title: $('#title').val(),
                    des: $('#des').val(),
                };

                $.ajax({
                    url: "{{ route('category.add') }}",
                    method: 'POST',
                    data: formData,
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
        });
    </script>
@endsection
