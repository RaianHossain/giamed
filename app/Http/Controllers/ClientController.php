<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Category;

class ClientController extends Controller
{
    public function home() {
        $services = Service::where('active', 1)->get();
        return view('client.home', compact('services'));
    }

    public function aboutUs() {
        return view('client.about');
    }


    public function serviceDetails($slug) {
        $service = Service::where('slug', $slug)->first();
        $otherServices = Service::where('id', '!=', $service->id)->take(5)->get();
        return view('client.service-details', compact('service', 'otherServices'));
    }

    public function requestAdvice(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $request->all();
        return redirect()->route('client.home')->with('success', 'Your message has been sent successfully!');
    }

    public function allServices() {
        $services = Service::paginate(10);
        return view('client.all-services', compact('services'));
    }

    public function shop(Request $request)
    {
        $query = Product::query();

        // Filters
        if ($request->filled('name')) {
            $query->where('title', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('subcategory')) {
            $query->where('sub_category_id', $request->subcategory);
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        // Eager load relationships
        $products = $query->with(['category', 'subCategory', 'brand'])->paginate(9);

        // For filter dropdowns
        $categories = \App\Models\Category::all();
        $subCategories = \App\Models\SubCategory::all();
        $brands = \App\Models\Brand::all();

        // dd($products[0]->category->title);

        return view('client.shop', compact('products', 'categories', 'subCategories', 'brands'));
    }

    public function shop_api(Request $request)
    {
        $query = Product::query();

        // Apply filters (AND logic)
        if ($request->filled('name')) {
            $query->where('title', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Match frontend's camelCase 'subCategory' or lowercase 'subcategory' (choose one)
        if ($request->filled('subCategory')) {  // Frontend sends 'subCategory'
            $query->where('sub_category_id', $request->subCategory);
        }
        // OR if frontend sends 'subcategory':
        // if ($request->filled('subcategory')) {
        //     $query->where('sub_category_id', $request->subcategory);
        // }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        // Pagination
        $page = $request->input('page', 1);
        $perPage = 9;
        $paginator = $query->with(['category', 'subCategory', 'brand'])->paginate($perPage, ['*'], 'page', $page);

        // Calculate displayed range
        $from = (($paginator->currentPage() - 1) * $paginator->perPage()) + 1;
        $to = min($paginator->currentPage() * $paginator->perPage(), $paginator->total());

        // Response structure
        $response = [
            'data' => $paginator->items(),
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
                'from' => $from,
                'to' => $to,
                'showing' => "$from-$to of {$paginator->total()}",
                'has_more_pages' => $paginator->hasMorePages(),
                'last_page' => $paginator->lastPage(),
                'next_page_url' => $paginator->nextPageUrl(),
                'prev_page_url' => $paginator->previousPageUrl(),
            ]
        ];

        return response()->json($response);
    }

    
    public function productDetails($id)
    {
        $product = Product::with(['category', 'subCategory', 'brand'])
                    ->findOrFail($id);
        
        return response()->json([
            'title' => $product->title,
            'price' => $product->price,
            'description' => $product->description,
            'avatar' => $product->avatar,
            'category' => $product->category,
            'sub_category' => $product->subCategory,
            'brand' => $product->brand,
        ]);
    }

    public function getSubcategoriesByCategory(Category $category)
    {
        return response()->json($category->subCategories);
    }

    public function makeAppointmentPage() {
        return view('client.make-appointment');
    }

    public function check() {
        return view('adminview.check');
    }

}
