<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;
use App\Models\Cart; // Include this if you have a Cart model, adjust as needed

class CartController extends Controller
{

    public function viewCart()
    {
        // Add your logic to load cart details, e.g., fetching cart items from the database
        // $cartItems = auth()->user()->cartItems ?? [];
        $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();

        return view('cart.view-cart', ['cartItems' => $cartItems]);
    }
    public function getCartCount()
    {

        $count = auth()->check() ? CartItem::where('user_id', auth()->id())->count() : 0; // Adjust as needed

        return response()->json(['count' => $count]);
    }

    public function addToCart(Request $request)
    {

        $product = Product::findOrFail($request->product_id);
        $cart = new CartItem();
        $cart->user_id = Auth::id();
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->product_qty;
        $cart->size = $request->size;

        $cart->save();
        return redirect()->back()->with('success', 'Item added to cart.');
    }
    public function removeFromCart(string $locale ,$productId)
    {

        // Find the cart item by product ID and remove it
        $cartItem = CartItem::where('user_id',Auth::id())->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->delete();
            //return redirect()->back()->with('success', 'Product removed successfully.');
            return response()->json(['success' => true, 'message' => 'Product removed successfully']);
        }else{
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }


    }
}
