<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_categories = SubCategory::all();
        return view('adminview.subcategories.index', compact('sub_categories'));
    }

    public function create()
    {
        return view('adminview.subcategories.create');
    }

    public function edit($id)
    {
        // Find the category by ID
        $category = SubCategory::findOrFail($id);

        // Return the edit view with the category data
        return view('adminview.subcategories.edit', compact('category'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255', // Title is required and must be a string
            'description' => 'nullable|string', // Description is optional and must be a string
        ]);

        // Create a new category using the validated data
        SubCategory::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'description' => $request->input('description'),
        ]);

        // Redirect back to the sub-categories index page with a success message
        return redirect()->route('dashboard-sub-categories')->with('success', 'Sub-Category created successfully!');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255', // Title is required and must be a string
            'description' => 'nullable|string', // Description is optional and must be a string
        ]);

        // Find the category by ID
        $category = SubCategory::findOrFail($id);

        // Update the category with the validated data
        $category->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        // Redirect back to the sub-categories index page with a success message
        return redirect()->route('dashboard-sub-categories')->with('success', 'SubCategory updated successfully!');
    }

    public function destroy($id)
    {
        // Find the category by ID
        $category = SubCategory::findOrFail($id);

        // Delete the category
        $category->delete();

        // Redirect back to the sub-categories index page with a success message
        return redirect()->route('dashboard-sub-categories')->with('success', 'SubCategory deleted successfully!');
    }
}