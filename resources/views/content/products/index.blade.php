
@extends('layouts/contentNavbarLayout')

@section('title', 'Products - Index')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard-analytics') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
</nav>

<div class="row mb-4">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h6>Products</h6>
                <p>{{ $total_products ?? 0 }}</p>
                <p>Total Products</p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Dark Table -->
<div class="card overflow-hidden">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header m-0">Products</h5>
        <button type="button" class="btn btn-success me-3 text-white" data-bs-toggle="offcanvas" data-bs-target="#addProductCanvas">
            <span class="tf-icons ri-add-line ri-16px me-1"></span>Add New
        </button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Active</th>
                    <th>Featured</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <!-- Title -->
                        <td>{{ $product->title }}</td>

                        <!-- Price -->
                        <td>{{ $product->price }}</td>

                        <!-- Quantity -->
                        <td>{{ $product->quantity }}</td>

                        <!-- Active -->
                        <td>
                            @if($product->active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>

                        <!-- Featured -->
                        <td>
                            @if($product->featured)
                                <span class="badge bg-primary">Featured</span>
                            @else
                                <span class="badge bg-secondary">Not Featured</span>
                            @endif
                        </td>

                        <!-- Image -->
                        <td>
                            @if($product->avatar)
                                <img src="{{ asset('storage/' . $product->avatar) }}" alt="Product Image" class="img-square" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/img/avatars/default-product.png') }}" alt="Default Product Image" class="img-square" style="width: 50px; height: 50px; object-fit: cover;">
                            @endif
                        </td>

                        <!-- Actions -->
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <!-- View Button -->
                                    <button 
                                        class="dropdown-item view-product-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#viewProductModal"
                                        data-title="{{ $product->title }}"
                                        data-description="{{ $product->description }}"
                                        data-price="{{ $product->price }}"
                                        data-quantity="{{ $product->quantity }}"
                                        data-active="{{ $product->active }}"
                                        data-featured="{{ $product->featured }}"
                                        data-avatar="{{ asset('storage/' . $product->avatar) }}"
                                        data-cover="{{ asset('storage/' . $product->cover) }}"
                                        data-tags='@json($product->tags)'
                                        data-category-title="{{ $product->category_title ?? '' }}"
                                        data-sub-category-title="{{ $product->sub_category_title ?? '' }}"
                                        data-brand="{{ $product->brand->title ?? '' }}"
                                    >
                                        <i class="ri-eye-line me-1"></i> View
                                    </button>
                        
                                    <!-- Edit Button -->
                                    <button type="button" class="dropdown-item edit-product-btn"
                                        data-id="{{ $product->id }}"
                                        data-title="{{ $product->title }}"
                                        data-slug="{{ $product->slug }}"
                                        data-description="{{ $product->description }}"
                                        data-price="{{ $product->price }}"
                                        data-quantity="{{ $product->quantity }}"
                                        data-active="{{ $product->active }}"
                                        data-featured="{{ $product->featured }}"
                                        data-avatar="{{ asset('storage/' . $product->avatar) }}"
                                        data-cover="{{ asset('storage/' . $product->cover) }}"
                                        data-tags='@json($product->tags)'
                                        data-category="{{ $product->category_id }}"
                                        data-sub-category="{{ $product->sub_category_id }}"
                                        data-brand="{{ $product->brand_id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editProductModal">
                                        <i class="ri-pencil-line me-1"></i> Edit
                                    </button>
                        
                                    <!-- Delete Button -->
                                    <button type="button" class="dropdown-item delete-product-btn"
                                        data-id="{{ $product->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteProductModal">
                                        <i class="ri-delete-bin-line me-1"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Product Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addProductCanvas" aria-labelledby="addProductCanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="addProductCanvasLabel">Add New Product</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('dashboard-products-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title Field -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <!-- Description Field -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <!-- Price Field -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>

            <!-- Quantity Field -->
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>

            <!-- Active Field -->
            <div class="mb-3">
                <label for="active" class="form-label">Active</label>
                <select class="form-control" id="active" name="active">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <!-- Featured Field -->
            <div class="mb-3">
                <label for="featured" class="form-label">Featured</label>
                <select class="form-control" id="featured" name="featured">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <!-- Avatar Field -->
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar (Image)</label>
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
            </div>

            <!-- Cover Field -->
            <div class="mb-3">
                <label for="cover" class="form-label">Cover (Image)</label>
                <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
            </div>

            <!-- Tags Field -->
            <div class="mb-3">
                <label for="tags" class="form-label">Tags (Comma Separated)</label>
                <input type="text" class="form-control" id="tags" name="tags">
            </div>

            <!-- Category Field -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Sub Category Field -->
            <div class="mb-3">
                <label for="sub_category_id" class="form-label">Sub Category</label>
                <select class="form-control" id="sub_category_id" name="sub_category_id">
                    <option value="">Select Sub Category</option>
                    @foreach($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}">{{ $subCategory->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Brand Field -->
            <div class="mb-3">
                <label for="brand_id" class="form-label">Brand</label>
                <select class="form-control" id="brand_id" name="brand_id">
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<!-- View Product Modal -->
<div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow-sm">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="viewProductModalLabel">Product Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 py-3">

                <div class="row g-3">
                    <!-- Title -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Title</label>
                        <div class="border rounded p-2 bg-light" id="viewTitle"></div>
                    </div>

                    <!-- Price -->
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Price</label>
                        <div class="border rounded p-2 bg-light" id="viewPrice"></div>
                    </div>

                    <!-- Quantity -->
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Quantity</label>
                        <div class="border rounded p-2 bg-light" id="viewQuantity"></div>
                    </div>

                    <!-- Active -->
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Status</label>
                        <div id="viewActive"></div>
                    </div>

                    <!-- Featured -->
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Featured</label>
                        <div id="viewFeatured"></div>
                    </div>

                    <!-- Category -->
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Category</label>
                        <div class="border rounded p-2 bg-light" id="viewCategory"></div>
                    </div>

                    <!-- Sub Category -->
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Sub Category</label>
                        <div class="border rounded p-2 bg-light" id="viewSubCategory"></div>
                    </div>

                    <!-- Brand -->
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Brand</label>
                        <div class="border rounded p-2 bg-light" id="viewBrand"></div>
                    </div>

                    <!-- Tags -->
                    <div class="col-12">
                        <label class="form-label fw-bold">Tags</label>
                        <div class="border rounded p-2 bg-light" id="viewTags"></div>
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <label class="form-label fw-bold">Description</label>
                        <div class="border rounded p-2 bg-light" id="viewDescription" style="white-space: pre-wrap;"></div>
                    </div>

                    <!-- Avatar Image -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Avatar</label>
                        <div class="border rounded p-2 text-center bg-light">
                            <img id="viewAvatar" src="" alt="Avatar" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    </div>

                    <!-- Cover Image -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Cover</label>
                        <div class="border rounded p-2 text-center bg-light">
                            <img id="viewCover" src="" alt="Cover" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Title Field -->
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>

                    <!-- Description Field -->
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="3"></textarea>
                    </div>

                    <!-- Price Field -->
                    <div class="mb-3">
                        <label for="editPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="editPrice" name="price" step="0.01" required>
                    </div>

                    <!-- Quantity Field -->
                    <div class="mb-3">
                        <label for="editQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="editQuantity" name="quantity" required>
                    </div>

                    <!-- Active Field -->
                    <div class="mb-3">
                        <label for="editActive" class="form-label">Active</label>
                        <select class="form-control" id="editActive" name="active">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <!-- Featured Field -->
                    <div class="mb-3">
                        <label for="editFeatured" class="form-label">Featured</label>
                        <select class="form-control" id="editFeatured" name="featured">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <!-- Avatar Field -->
                    <div class="mb-3">
                        <label for="editAvatar" class="form-label">Avatar (Image)</label>
                        <input type="file" class="form-control" id="editAvatar" name="avatar" accept="image/*">
                        <img id="editAvatarPreview" src="" alt="Avatar Preview" class="img-square mt-2" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>

                    <!-- Cover Field -->
                    <div class="mb-3">
                        <label for="editCover" class="form-label">Cover (Image)</label>
                        <input type="file" class="form-control" id="editCover" name="cover" accept="image/*">
                        <img id="editCoverPreview" src="" alt="Cover Preview" class="img-square mt-2" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>

                    <!-- Tags Field -->
                    <div class="mb-3">
                        <label for="editTags" class="form-label">Tags (Comma Separated)</label>
                        <input type="text" class="form-control" id="editTags" name="tags">
                    </div>

                    <!-- Category Field -->
                    <div class="mb-3">
                        <label for="editCategory" class="form-label">Category</label>
                        <select class="form-control" id="editCategory" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sub Category Field -->
                    <div class="mb-3">
                        <label for="editSubCategory" class="form-label">Sub Category</label>
                        <select class="form-control" id="editSubCategory" name="sub_category_id">
                            <option value="">Select Sub Category</option>
                            @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Brand Field -->
                    <div class="mb-3">
                        <label for="editBrand" class="form-label">Brand</label>
                        <select class="form-control" id="editBrand" name="brand_id">
                            <option value="">Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Product Modal -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteProductForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for View, Edit, and Delete Modals -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // View Modal
        document.querySelectorAll('.view-product-btn').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('viewTitle').textContent = this.dataset.title;
                document.getElementById('viewDescription').textContent = this.dataset.description;
                document.getElementById('viewPrice').textContent = this.dataset.price;
                document.getElementById('viewQuantity').textContent = this.dataset.quantity;
                document.getElementById('viewActive').textContent = this.dataset.active == 1 ? 'Active' : 'Inactive';
                document.getElementById('viewFeatured').textContent = this.dataset.featured == 1 ? 'Featured' : 'Not Featured';
                document.getElementById('viewAvatar').src = this.dataset.avatar;
                document.getElementById('viewCover').src = this.dataset.cover;
    
                try {
                    const tags = JSON.parse(this.dataset.tags);
                    document.getElementById('viewTags').textContent = Array.isArray(tags) ? tags.join(', ') : '';
                } catch (e) {
                    document.getElementById('viewTags').textContent = '';
                }
    
                document.getElementById('viewCategory').textContent = this.dataset.categoryTitle;
                document.getElementById('viewSubCategory').textContent = this.dataset.subCategoryTitle;
                document.getElementById('viewBrand').textContent = this.dataset.brand;
            });
        });
    
        // Edit Modal
        document.querySelectorAll('.edit-product-btn').forEach(button => {
            button.addEventListener('click', function () {
                const form = document.getElementById('editProductForm');
                form.action = `/products/${this.dataset.id}`;
    
                document.getElementById('editTitle').value = this.dataset.title;
                document.getElementById('editDescription').value = this.dataset.description;
                document.getElementById('editPrice').value = this.dataset.price;
                document.getElementById('editQuantity').value = this.dataset.quantity;
                document.getElementById('editActive').value = this.dataset.active;
                document.getElementById('editFeatured').value = this.dataset.featured;
                document.getElementById('editAvatarPreview').src = this.dataset.avatar;
                document.getElementById('editCoverPreview').src = this.dataset.cover;
    
                try {
                    const tags = JSON.parse(this.dataset.tags);
                    document.getElementById('editTags').value = Array.isArray(tags) ? tags.join(', ') : '';
                } catch (e) {
                    document.getElementById('editTags').value = '';
                }
    
                document.getElementById('editCategory').value = this.dataset.category;
                document.getElementById('editSubCategory').value = this.dataset.subCategory;
                document.getElementById('editBrand').value = this.dataset.brand;
            });
        });
    
        // Delete Modal
        document.querySelectorAll('.delete-product-btn').forEach(button => {
            button.addEventListener('click', function () {
                const form = document.getElementById('deleteProductForm');
                form.action = `products/${this.dataset.id}`;
            });
        });
    });
    </script>
    
    

@endsection