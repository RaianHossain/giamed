<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        // Fetch all brands
        $brands = Brand::all();

        // Count total brands
        $total_brands = $brands->count();

        return view('content.brands.index', compact('brands', 'total_brands'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            // Validate the request
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Process Logo Upload
            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('brands/logo', 'public');
            }

            // Process Cover Upload
            $coverPath = null;
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('brands/cover', 'public');
            }

            // Save Brand
            Brand::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'slug' => Str::slug($request->input('title')),
                'logo' => $logoPath,
                'cover' => $coverPath,
            ]);

            return redirect()->route('dashboard-brands')->with('success', 'Brand created successfully.');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the brand.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Find the brand by ID
            $brand = Brand::findOrFail($id);

            // Process Logo Upload
            if ($request->hasFile('logo')) {
                // Delete the old logo if it exists
                if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
                    Storage::disk('public')->delete($brand->logo);
                }
                // Store the new logo
                $logoPath = $request->file('logo')->store('brands/logo', 'public');
                $brand->logo = $logoPath;
            }

            // Process Cover Upload
            if ($request->hasFile('cover')) {
                // Delete the old cover if it exists
                if ($brand->cover && Storage::disk('public')->exists($brand->cover)) {
                    Storage::disk('public')->delete($brand->cover);
                }
                // Store the new cover
                $coverPath = $request->file('cover')->store('brands/cover', 'public');
                $brand->cover = $coverPath;
            }

            // Update the brand
            $brand->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
            ]);

            return redirect()->route('dashboard-brands')->with('success', 'Brand updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the brand.');
        }
    }

    public function destroy($id)
    {
        try {
            // Find the brand by ID
            $brand = Brand::findOrFail($id);

            // Delete the logo if it exists
            if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
                Storage::disk('public')->delete($brand->logo);
            }

            // Delete the cover if it exists
            if ($brand->cover && Storage::disk('public')->exists($brand->cover)) {
                Storage::disk('public')->delete($brand->cover);
            }

            // Delete the brand
            $brand->delete();

            return redirect()->route('dashboard-brands')->with('success', 'Brand deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the brand.');
        }
    }
}
