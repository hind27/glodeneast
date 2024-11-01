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
                    <form id="productForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name_ar" class="form-label">Product Name (Arabic)</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Short Description</label>
                            <textarea class="form-control" id="des" name="des"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="des_ar" class="form-label">Short Description (Arabic)</label>
                            <textarea class="form-control" id="des_ar" name="des_ar"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="des_long" class="form-label">Long Description</label>
                            <textarea class="form-control" id="des_long" name="des_long" rows="5"></textarea>
                            <small class="form-text text-muted">You can use HTML tags for formatting.</small>
                        </div>
                        <div class="mb-3">
                            <label for="des_ar_long" class="form-label">Long Description (Arabic)</label>
                            <textarea class="form-control" id="des_ar_long" name="des_ar_long" rows="5"></textarea>
                            <small class="form-text text-muted">You can use HTML tags for formatting.</small>
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
                                    <option value="{{ $category->id }}">{{ $category->title }} - {{ $category->title_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sizes" class="form-label">Sizes</label>
                            <div class="row mx-2">
                                @foreach ($sizes as $size)
                                    <div class="form-check col-2">
                                        <input class="form-check-input" type="checkbox" id="size{{ $size->id }}" name="sizes[]" value="{{ $size->id }}">
                                        <label class="form-check-label" for="size{{ $size->id }}">{{ $size->size_liter }} Liters</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Product Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" accept="image/png, image/jpeg, image/jpg, image/gif" multiple required>
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
                                <th class="w-100px">Description</th>
                                <th>Sizes</th>
                                <th>Images</th>
                                <th>Actions</th>
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
                                        @if ($product->productSizes)
                                            @foreach ($product->productSizes as $size)
                                                {{ $size->size?->size_liter }} Liters<br>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->images->isNotEmpty())
                                            @foreach ($product->images as $image)
                                                <img src="{{ asset($image->image_path) }}" alt="{{ $product->name }}" width="100" class="img-thumbnail">
                                            @endforeach
                                        @else
                                            No Images
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Edit button -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $product->id }}">Edit</button>

                                        <!-- Modal for editing -->
                                        <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $product->id }}">Edit Product</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="editproduct{{ $product->id }}" action="{{ route('product.edit', ['productId' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="mb-3">
                                                                <label for="name_ar" class="form-label">Product Name (Arabic)</label>
                                                                <input type="text" class="form-control" id="name_ar{{ $product->id }}" name="name_ar" value="{{ $product->name_ar }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Product Name</label>
                                                                <input type="text" class="form-control" id="name{{ $product->id }}" name="name" value="{{ $product->name }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="des_ar" class="form-label">Description (Arabic)</label>
                                                                <textarea class="form-control" id="des_ar" name="des_ar">{{ $product->des_ar }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="des_long" class="form-label">Long Description</label>
                                                                <textarea class="form-control" id="des_long" name="des_long" rows="5">{{ $product->des_long }}</textarea>
                                                                <small class="form-text text-muted">You can use HTML tags for formatting.</small>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="price" class="form-label">Price</label>
                                                                <input type="number" class="form-control" id="price{{ $product->id }}" name="price" value="{{ $product->price }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="images" class="form-label">Product Images</label>
                                                                <input type="file" class="form-control" id="images{{ $product->id }}" name="images[]" accept="image/png, image/jpeg" multiple>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="category" class="form-label">Category</label>
                                                                <select class="form-control" id="category" name="category_id" required>
                                                                    <option value="">Select a category</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            @if ($product->category_id === $category->id) selected @endif>
                                                                            {{ $category->title }} - {{ $category->title_ar }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="sizes" class="form-label">Sizes</label>
                                                                <div class="row mx-2">
                                                                    @foreach ($sizes as $size)
                                                                        <div class="form-check col-2">
                                                                            <input class="form-check-input" type="checkbox" id="size{{ $size->id }}" name="sizes[]" value="{{ $size->id }}"
                                                                                @if ($product->productSizes->contains($size->id)) checked @endif>
                                                                            <label class="form-check-label" for="size{{ $size->id }}">{{ $size->size_liter }} Liters</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Update Product</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete button -->
                                        <form action="{{ route('product.delete', ['productId' => $product->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>

        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Set up global CSRF for all AJAX requests
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $('#productForm').on('submit', function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);

                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            // Handle successful response
                            location.reload(); // Reload page to see the new product
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(error);
                        }
                    });
                });

                @foreach ($products as $product)
                    $('#editproduct{{ $product->id }}').on('submit', function(e) {
                        e.preventDefault();
                        let formData = new FormData(this);

                        $.ajax({
                            url: $(this).attr('action'),
                            type: $(this).attr('method'),
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                // Handle successful response
                                location.reload(); // Reload page to see the changes
                            },
                            error: function(xhr, status, error) {
                                // Handle errors
                                console.error(error);
                            }
                        });
                    });
                @endforeach
            });
        </script>
    </div>

@endsection
