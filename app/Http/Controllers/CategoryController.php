<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('content.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255', // Title is required and must be a string
            'description' => 'nullable|string', // Description is optional and must be a string
        ]);

        // Create a new category using the validated data
        Category::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'description' => $request->input('description'),
        ]);

        // Redirect back to the categories index page with a success message
        return redirect()->route('dashboard-categories')->with('success', 'Category created successfully!');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255', // Title is required and must be a string
            'description' => 'nullable|string', // Description is optional and must be a string
        ]);

        // Find the category by ID
        $category = Category::findOrFail($id);

        // Update the category with the validated data
        $category->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        // Redirect back to the categories index page with a success message
        return redirect()->route('dashboard-categories')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        // Redirect back to the categories index page with a success message
        return redirect()->route('dashboard-categories')->with('success', 'Category deleted successfully!');
    }
}
