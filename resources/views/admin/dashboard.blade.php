@extends('admin-layout')
@section('page-title', __('Dashboard'))
@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('includes.admin-sidebar')


            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-2">
               <h1 class="text-center">Welcome</h1>
            </main>
        </div>
    </div>

@endsection
