<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
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
    public function submitOrder()
    {
        $cartItems = CartItem::where('user_id', auth()->id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Create the Order
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $cartItems->sum(fn($item) => $item->price * $item->quantity),
        ]);

        // Move items from cart to order
        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Clear cart
        CartItem::where('user_id', auth()->id())->delete();

        return redirect()->route('order.success', ['order' => $order->id])
            ->with('success', 'Order submitted successfully.');
    }
}
