@extends('admin-layout')
@section('page-title', __('Dashboard'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('includes.admin-sidebar')
            <!-- Table to display orders -->
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-2">
                <h2>Order List</h2>
                <table class="table table-striped" id="orderTable">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th >Product</th>
                            <th >Price</th>
                            <th >Quantity</th>
                            <th  class="text-center">Subtotal</th>
                            <th  class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->user->name ?? 'N/A' }}</td>
                                <td>{{ $order->product->name ?? 'N/A' }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td class="text-center">{{ $order->price * $order->quantity }}</td>
                                <td class="text-center">
                                    <form action="{{ route('order.updateStatus', ['orderId' => $order->id]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="form-select">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}" {{ $order->status_id == $status->id ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

