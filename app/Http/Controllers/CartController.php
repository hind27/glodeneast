<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart; // Include this if you have a Cart model, adjust as needed

class CartController extends Controller
{

    public function view()
    {
        // Add your logic to load cart details, e.g., fetching cart items from the database
        // $cartItems = auth()->user()->cartItems ?? [];
        return view('cart.view-cart', []);
    }
    public function getCartCount()
    {
        // Assuming the cart count is stored in a 'Cart' model and linked to the user
        $count = auth()->check() ? auth()->user()->cart->count() : 0; // Adjust as needed

        return response()->json(['count' => $count]);
    }
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        // Retrieve existing cart data from session or initialize an empty array
        $cart = session()->get('cart', []);

        // If product already in cart, increment the quantity
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            // Add product to cart with initial quantity of 1
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        // Save updated cart to session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
