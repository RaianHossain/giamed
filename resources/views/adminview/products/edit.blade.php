@extends('layouts/newAdminLayout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-products') }}">Products</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Product Form
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard-products-update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}" required>
                    </div>

                    <!-- Slug -->
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
                    </div>

                    <!-- Active -->
                    <div class="mb-3">
                        <label for="active" class="form-label">Active</label>
                        <select class="form-select" id="active" name="active">
                            <option value="1" {{ $product->active ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$product->active ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Featured -->
                    <div class="mb-3">
                        <label for="featured" class="form-label">Featured</label>
                        <select class="form-select" id="featured" name="featured">
                            <option value="1" {{ $product->featured ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$product->featured ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <!-- Avatar -->
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar (Image)</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                        @if($product->avatar)
                            <img src="{{ asset('storage/' . $product->avatar) }}" alt="Current Avatar" class="img-thumbnail mt-2" width="120">
                        @endif
                    </div>

                    <!-- Cover -->
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover (Image)</label>
                        <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                        @if($product->cover)
                            <img src="{{ asset('storage/' . $product->cover) }}" alt="Current Cover" class="img-thumbnail mt-2" width="120">
                        @endif
                    </div>

                    <!-- Tags -->
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags (Comma Separated)</label>
                        <input type="text" class="form-control" id="tags" name="tags" value="{{ $product->tags ? implode(',', json_decode($product->tags, true)) : '' }}">
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sub Category -->
                    <div class="mb-3">
                        <label for="sub_category_id" class="form-label">Sub Category</label>
                        <select class="form-select" id="sub_category_id" name="sub_category_id">
                            <option value="">Select Sub Category</option>
                            @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" {{ $product->sub_category_id == $subCategory->id ? 'selected' : '' }}>
                                    {{ $subCategory->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Brand -->
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Brand</label>
                        <select class="form-select" id="brand_id" name="brand_id">
                            <option value="">Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-success">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
