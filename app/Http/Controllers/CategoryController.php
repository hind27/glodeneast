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
        ]);

        $category = new Category();
        $category->title_ar = $request->input('title_ar');
        $category->title = $request->input('title');
        $category->des = $request->input('des');
        $category->save();

        return redirect()->route('category.create')->with('success', 'Category added successfully');
    }

    // Delete a category by ID
    public function delete($categoryId): mixed
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        return redirect()->route('category.create')->with('success', 'Category deleted successfully');
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

        $category = Category::findOrFail($categoryId);
        $category->title_ar = $request->input('title_ar');
        $category->title = $request->input('title');
        $category->des = $request->input('des');
        $category->save();

        return redirect()->route('category.create')->with('success', 'Category updated successfully');
    }
}
