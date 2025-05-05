<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();

        // Optionally eager load category relationship
        foreach ($products as $product) {
            $category = $categories->firstWhere('id', $product->category_id);
            $product->category_title = $category ? $category->title : 'Unknown';

            $subCategory = $subCategories->firstWhere('id', $product->sub_category_id);
            $product->sub_category_title = $subCategory ? $subCategory->title : 'Unknown';

            $brand = $brands->firstWhere('id', $product->brand_id);
            $product->brand_title = $brand ? $brand->title : 'Unknown';
        }

        // dd($products);
        return view('adminview.products.index', compact('products', 'categories', 'subCategories', 'brands'));
    }

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();


        return view('adminview.products.create', compact('categories', 'subCategories', 'brands'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();

        // dd($product);
        return view('adminview.products.edit', compact('product', 'categories', 'subCategories', 'brands'));
    }



    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:0',
                'active' => 'required|boolean',
                'featured' => 'required|boolean',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tags' => 'nullable|string',
                'category_id' => 'nullable|exists:categories,id',
                'sub_category_id' => 'nullable|exists:sub_categories,id',
                'brand_id' => 'nullable|exists:brands,id',
            ]);

            // Process Tags (convert comma-separated string to JSON array)
            $tags = $request->tags ? json_encode(explode(',', $request->tags)) : null;

            // Process Avatar Upload
            $avatarPath = null;
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('products/avatars', 'public');
            }

            // Process Cover Upload
            $coverPath = null;
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('products/covers', 'public');
            }

            // Save Product
            Product::create([
                'title' => $validated['title'],
                'slug' => Str::slug($request->input('title')),
                'description' => $validated['description'],
                'price' => $validated['price'],
                'quantity' => $validated['quantity'],
                'active' => $validated['active'],
                'featured' => $validated['featured'],
                'avatar' => $avatarPath,
                'cover' => $coverPath,
                'tags' => $tags,
                'category_id' => $validated['category_id'],
                'sub_category_id' => $validated['sub_category_id'],
                'brand_id' => $validated['brand_id'],
                // 'created_by' => auth()->id(), // Assuming you have authentication
            ]);

            return redirect()->route('dashboard-products')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the product: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the product by ID
            $product = Product::findOrFail($id);

            // Validate the request
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:0',
                'active' => 'required|boolean',
                'featured' => 'required|boolean',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tags' => 'nullable|string',
                'category_id' => 'nullable|exists:categories,id',
                'sub_category_id' => 'nullable|exists:sub_categories,id',
                'brand_id' => 'nullable|exists:brands,id',
            ]);

            // Process Tags (convert comma-separated string to JSON array)
            $tags = $request->tags ? json_encode(explode(',', $request->tags)) : null;

            // Process Avatar Upload
            if ($request->hasFile('avatar')) {
                // Delete the old avatar if it exists
                if ($product->avatar && Storage::disk('public')->exists($product->avatar)) {
                    Storage::disk('public')->delete($product->avatar);
                }
                // Store the new avatar
                $avatarPath = $request->file('avatar')->store('products/avatars', 'public');
                $product->avatar = $avatarPath;
            }

            // Process Cover Upload
            if ($request->hasFile('cover')) {
                // Delete the old cover if it exists
                if ($product->cover && Storage::disk('public')->exists($product->cover)) {
                    Storage::disk('public')->delete($product->cover);
                }
                // Store the new cover
                $coverPath = $request->file('cover')->store('products/covers', 'public');
                $product->cover = $coverPath;
            }

            // Update the product
            $product->update([
                'title' => $validated['title'],
                'slug' => $validated['slug'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'quantity' => $validated['quantity'],
                'active' => $validated['active'],
                'featured' => $validated['featured'],
                'tags' => $tags,
                'category_id' => $validated['category_id'],
                'sub_category_id' => $validated['sub_category_id'],
                'brand_id' => $validated['brand_id'],
                // 'updated_by' => auth()->id(), // Assuming you have authentication
            ]);

            return redirect()->route('dashboard-products')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the product: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            // Find the product by ID
            $product = Product::findOrFail($id);

            // Delete the avatar if it exists
            if ($product->avatar && Storage::disk('public')->exists($product->avatar)) {
                Storage::disk('public')->delete($product->avatar);
            }

            // Delete the cover if it exists
            if ($product->cover && Storage::disk('public')->exists($product->cover)) {
                Storage::disk('public')->delete($product->cover);
            }

            // Delete the product
            $product->delete();

            return redirect()->route('dashboard-products')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the product: ' . $e->getMessage());
        }
    }
}
