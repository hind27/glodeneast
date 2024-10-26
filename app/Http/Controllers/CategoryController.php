<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class CategoryController extends Controller
{
    // Show all categories and the create form
    public function index(): View|Factory|Application
    {
        $categories = Category::all(); // Fixed spelling to "categories"
        return view('admin.category', ['categories' => $categories]); // Use correct syntax
    }


    // Add a new category
    public function add(Request $request): mixed
    {
        // Validate input data
        $request->validate([
            'title_ar' => 'required|string',
            'title' => 'nullable|string',
            'des' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Create new category
        $category = new Category();
        $category->title_ar = $request->input('title_ar');
        $category->title = $request->input('title');
        $category->des = $request->input('des');
        $category->save();

        // Handle image upload if an image is uploaded
        if ($request->hasFile('image')) {
            $destinationPath = 'category_images'; // Live server path

            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0755, true); // Create directory if not exists
            }

            // Generate a unique filename
            $imageName = time() . '-' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

            // Move the image to the directory
            $request->file('image')->move($destinationPath, $imageName);

            // Save the image path to the category
            $category->image_path = 'category_images/' . $imageName;
            $category->save();
        }

        return redirect()->route('category.create')->with('success', 'Category added successfully');
    }

    public function delete($categoryId): mixed
    {
        $category = Category::findOrFail($categoryId);

        // Remove the image from the directory (if exists)
        if ($category->image_path) {
            $imagePath = '/home/goldeneasteg/public_html/public/' . $category->image_path;
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete image
            }
        }

        // Delete the category
        $category->delete();

        return redirect()->route('category.create')->with('success', 'Category deleted successfully');
    }

    public function edit(Request $request, $categoryId): mixed
    {
        // Validate input data
        $request->validate([
            'title_ar' => 'required|string',
            'title' => 'nullable|string',
            'des' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Find the category to update
        $category = Category::findOrFail($categoryId);
        $category->title_ar = $request->input('title_ar');
        $category->title = $request->input('title');
        $category->des = $request->input('des');
        $category->save();

        // Handle image upload if an image is uploaded
        // Handle image upload if an image is uploaded
        if ($request->hasFile('image')) {
            $destinationPath = 'category_images'; // Live server path

            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0755, true); // Create directory if not exists
            }

            // Generate a unique filename
            $imageName = time() . '-' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

            // Move the image to the directory
            $request->file('image')->move($destinationPath, $imageName);

            // Save the image path to the category
            $category->image_path = 'category_images/' . $imageName;
            $category->save();
        }


        return redirect()->route('category.create')->with('success', 'Category updated successfully');
    }
}
