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
            'images.*' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048', // Validate each image
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
        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Define the target directory for saving images on cPanel live server
                $destinationPath = 'product_images';

                // Check if the directory exists and is writable
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true); // Create the directory if it doesn't exist
                }

                // Generate a unique filename for each image
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Move the image to the desired directory
                $image->move($destinationPath, $imageName);

                // Create a new ProductImage instance and save the relative file path
                $productImage = new ProductImage();
                $productImage->product_id = $product->id; // Associate with the product
                $productImage->image_path = 'product_images/' . $imageName; // Save the relative path
                $productImage->save(); // Save the image record
            }
        }


        return response()->json([
            'status' => 'success',
            'product' => $product,
            'msg_data' => ['message' => 'Product added successfully'],
        ]);
        //return redirect()->route('products.create')->with('success', 'Category added successfully');
    }

    // Delete a category by ID
    public function delete($productId): mixed
    {
        // Find the product by ID
        $product = Product::findOrFail($productId);

        // Retrieve and delete associated images from storage and database
        $productImages = ProductImage::where('product_id', $productId)->get();

        foreach ($productImages as $image) {
            // Check if the image file exists before deleting
            if (file_exists(public_path($image->image_path))) {
                unlink(public_path($image->image_path)); // Delete image file from storage
            }
            $image->delete(); // Delete image record from database
        }

        // Delete the product record
        $product->delete();

        return redirect()->route('product.create')->with('success', 'Product deleted successfully');
    }

    // Edit an existing category by ID
    public function edit(Request $request, $productId): mixed
    {
        // Validate input data
        $request->validate([
            'name_ar' => 'required|string',
            'name' => 'nullable|string',
            'des' => 'nullable|string',
            'des_ar' => 'nullable|string',
            'price' => 'required|numeric',
            'images.*' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048', // Validate each image if provided
        ]);

        // Find the product to update
        $product = Product::findOrFail($productId);

        // Update product details
        $product->category_id = $request->input('category_id');
        $product->name_ar = $request->input('name_ar');
        $product->name = $request->input('name');
        $product->des = $request->input('des');
        $product->des_ar = $request->input('des_ar');
        $product->price = $request->input('price');
        $product->save();

        // Handle new image uploads if provided
        if ($request->hasFile('images')) {
            // Remove old images associated with the product
            foreach ($product->images as $oldImage) {
                if (file_exists(public_path($oldImage->image_path))) {
                    unlink(public_path($oldImage->image_path)); // Delete old image file
                }
                $oldImage->delete(); // Remove from database
            }

            // Save new images
            foreach ($request->file('images') as $image) {
                // Define the target directory
                $destinationPath = 'product_images';

                // Ensure the directory exists
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Generate a unique filename
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Move the image to the directory
                $image->move($destinationPath, $imageName);

                // Save the image path to the database
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image_path = 'product_images/' . $imageName;
                $productImage->save();
            }
        }

        return response()->json([
            'status' => 'success',
            'product' => $product,
            'msg_data' => ['message' => 'Product updated successfully'],
        ]);
    }
}
