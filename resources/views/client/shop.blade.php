@extends('layouts.clientLayout')
@section('title', 'Products')
@section('content')
    @include('client.partials.inner-hero', ['title' => 'Products', 'subtitle' => 'Our Products', 'breadCrumb' => 'Products'])
    

    <!-- shop-banner-area start -->
    <section class="shop-banner-area pt-120 pb-120">
        <div class="container">
            <!-- Filter Form -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card filter-card shadow-sm">
                        <div class="card-body p-4">
                            <form id="productFilterForm" method="GET" action="{{ route('shop') }}" class="row g-3 align-items-end">
                                <!-- Product Name Search -->
                                <div class="col-md-3">
                                    <label for="name" class="form-label fw-bold">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="{{ request('name') }}" placeholder="Search by name">
                                </div>
                                
                                <!-- Category Dropdown -->
                                <div class="col-md-2">
                                    <label for="category" class="form-label fw-bold">Category</label>
                                    <select class="form-select" id="category" name="category">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <!-- Subcategory Dropdown -->
                                <div class="col-md-2">
                                    <label for="subcategory" class="form-label fw-bold">Subcategory</label>
                                    <select class="form-select" id="subcategory" name="subcategory">
                                        <option value="">All Subcategories</option>
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}" {{ request('subcategory') == $subCategory->id ? 'selected' : '' }}>
                                                {{ $subCategory->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="brand" class="form-label fw-bold">Brands</label>
                                    <select class="form-select" id="brand" name="brand">
                                        <option value="">All Brands</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <!-- Filter Buttons -->
                                <div class="col-md-3 d-flex align-items-end gap-2">
                                    <button type="submit" class="btn btn-primary flex-grow-1">
                                        <i class="fas fa-filter me-2"></i> FILTER
                                    </button>
                                    <a href="{{ route('shop') }}" class="btn btn-outline-secondary flex-grow-1">
                                        <i class="fas fa-undo me-2"></i> RESET
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-20">
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="product-showing mb-40">
                        <p>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-6">
                    <div class="shop-tab f-right">
                        <ul class="nav text-center" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true"><i class="fas fa-th-large"></i> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false"><i class="fas fa-list-ul"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-filter mb-40 f-right">
                        <form action="#">
                            <select name="pro-filter" id="pro-filter" class="form-select">
                                <option value="1">Shop By</option>
                                <option value="2">Top Sales</option>
                                <option value="3">New Product</option>
                                <option value="4">A to Z Product</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            {{-- grid view --}}
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product mb-40">
                                        <div class="product__img">
                                            {{-- prduct image --}}
                                            <img src="{{ asset('storage/' . $product->avatar) }}" alt="{{ $product->title }}">
                                            <div class="product-action text-center">
                                                <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                                <a href="#"><i class="fas fa-heart"></i></a>
                                                <a href="#" class="product-view" data-product-id="{{ $product->id }}">
                                                    <i class="fas fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product__content text-center pt-30">
                                            <span class="pro-cat"><a href="#">{{ $product->category->title ?? 'N/A' }}</a></span>
                                            <h4 class="pro-title">                                                
                                                {{ $product->title }}
                                            </h4>
                                            <div class="price">
                                                <span>${{ $product->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- list view --}}
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            @foreach ($products as $product)
                            <div class="row mb-30">
                                <div class="col-lg-4 col-md-6">
                                    <div class="product">
                                        <div class="product__img">
                                            <img src="{{ asset('storage/' . $product->avatar) }}" alt="{{ $product->title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product-list-content pt-10">
                                        <div class="product__content mb-20">
                                            <span class="pro-cat"><a href="#">{{ $product->category->title ?? 'N/A' }}</a></span>
                                            <h4 class="pro-title">
                                                {{ $product->title }}</a>
                                            </h4>
                                            <div class="price">
                                                <span>${{ $product->price }}</span>
                                            </div>
                                        </div>
                                        <p>{{ Str::limit($product->description, 200) }}</p>
                                        <div class="product-action-list">
                                            <a class="btn btn-theme" href="#">add to cart</a>
                                            <a class="action-btn" href="#"><i class="fas fa-heart"></i></a>
                                            <a class="action-btn product-view" href="#" data-product-id="{{ $product->id }}">
                                                <i class="fas fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="basic-pagination basic-pagination-2 text-center mt-20">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-banner-area end -->
@endsection

@push('styles')
<style>
    /* Product Modal Styles */
    .modal-lg .modal-content {
        border-radius: 10px;
        overflow: hidden;
    }

    .modal-body img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .modal-title {
        font-weight: 700;
        color: #333;
    }

    /* Filter Card Styles */
    .filter-card {
        border: none;
        border-radius: 8px;
        background-color: #fff;
    }

    .filter-card .form-label {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 0.5rem;
    }

    .filter-card .form-control,
    .filter-card .form-select {
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }

    .filter-card .form-control:focus,
    .filter-card .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .filter-card .btn {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .filter-card .col-md-3,
        .filter-card .col-md-2 {
            margin-bottom: 1rem;
        }
    
        .filter-card .d-flex {
            flex-direction: column;
            gap: 0.5rem !important;
        }
        
        .filter-card .btn {
            width: 100%;
        }
    }
    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #f5f5f5;
        color: #333;
        border-radius: 50%;
        margin-left: 10px;
        transition: all 0.3s;
    }

    .action-btn:hover {
        background: #333;
        color: #fff;
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .modal-body .row > div {
            margin-bottom: 20px;
        }
        
        .filter-card .col-md-3 {
            margin-bottom: 15px;
        }
    }
</style>
@endpush
