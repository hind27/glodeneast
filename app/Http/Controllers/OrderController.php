<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): mixed
    {
        $orders = Order::all(); // Fixed spelling to "categories"
        return view('admin.order-list', ['orders' => $orders]); // Use correct syntax
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function updateStatus(Request $request, $orderId)
{
    $request->validate([
        'status_id' => 'required|exists:order_statuses,id',
    ]);

    $order = Order::findOrFail($orderId);
    $order->status_id = $request->status_id;
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
}

}
