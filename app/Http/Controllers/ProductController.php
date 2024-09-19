<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all categories and the create form
    public function index(): mixed
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products', ['products' => $products, 'categories' => $categories]);
    }

    // Add a new category
    public function add(Request $request): mixed
    {
        // Validate input data
        $request->validate([
            'name_ar' => 'required|string',
            'name' => 'nullable|string',
            'des' => 'nullable|string',
            'des_ar' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Create new product
        $product = new Product();
        $product->category_id = $request->input('category_id');
        $product->name_ar = $request->input('name_ar');
        $product->name = $request->input('name');
        $product->des = $request->input('des');
        $product->des_ar = $request->input('des_ar');
        $product->price = $request->input('price');
        $product->save();
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public'); // Store in 'public/product_images'

            // Create a new ProductImage instance
            $productImage = new ProductImage();
            $productImage->product_id = $product->id; // Associate with the product
            $productImage->image_path = $imagePath; // Save the image path
            $productImage->save(); // Save the image record
        }

        return response()->json([
            'status' => 'success',
            'product' => $product,
            'msg_data' => ['message' => 'Product added successfully'],
        ]);
        //return redirect()->route('products.create')->with('success', 'Category added successfully');
    }

    // Delete a category by ID
    public function delete($categoryId): mixed
    {
        $category = Product::findOrFail($categoryId);
        $category->delete();

        return redirect()->route('products.create')->with('success', 'Category deleted successfully');
    }

    // Edit an existing category by ID
    public function edit(Request $request, $categoryId): mixed
    {
        // Validate input data
        $request->validate([
            'title_ar' => 'required|string',
            'title' => 'nullable|string',
            'des' => 'nullable|string',
        ]);

        $category = Product::findOrFail($categoryId);
        $category->title_ar = $request->input('title_ar');
        $category->title = $request->input('title');
        $category->des = $request->input('des');
        $category->save();

        return redirect()->route('products.create')->with('success', 'Category updated successfully');
    }
}
