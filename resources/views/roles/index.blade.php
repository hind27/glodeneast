
@extends('admin-layout')
@section('page-title', __('user'))



@section('content')
<div class="container">
    <h1>Assign Roles to Users</h1>

    <!-- Display success message if role is updated -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Role</th>
                <th>Current Permissions</th>
                <th>Assign New Permissions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>
                        <!-- Loop through roles for each user -->
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">Role Name: {{ $role->name }}</span>

                            <!-- Loop through permissions for each role -->
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-secondary">{{ $permission->name }}</span>
                            @endforeach
                        @endforeach
                    </td>
                    <td>
                        <!-- Form for assigning a role to the user -->
                        <form action="{{ route('roles.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Select input for assigning a role -->
                            <div class="input-group">
                                <select name="role" class="form-select">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success">Update Role</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection

