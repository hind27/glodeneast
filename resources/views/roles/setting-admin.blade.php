@extends('admin-layout')
@section('page-title', __('Add Role'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->

            @include('includes.admin-sidebar')
            <main class="col-md-8  col-lg-9 px-md-4 my-2">
                <h1>Manage Role Permissions</h1>

                <!-- Display success message if permissions are updated -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Assign New Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <!-- Display existing permissions for the role -->
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge bg-primary">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <!-- Form for assigning permissions to the role -->
                                    <form action="{{ route('roles.updatePermissions', $role->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <!-- Multi-select input for assigning permissions -->
                                        <div class="input-group">
                                            <select name="permissions[]" class="form-select" multiple>
                                                @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->name }}"
                                                        {{ $role->permissions->contains('name', $permission->name) ? 'selected' : '' }}>
                                                        {{ $permission->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-success">Update Permissions</button>
                                        </div>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-start w-100 ">
                    <!-- Form to create a new permission -->
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter permission name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Permission</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

@endsection
