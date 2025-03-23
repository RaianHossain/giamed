
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
                                    <a class="dropdown-item">
                                        <button class="btn btn-sm btn-info view-product-btn fixed-width"
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
                                            data-tags="{{ json_encode($product->tags) }}"
                                            data-category="{{ $product->category_id }}"
                                            data-sub-category="{{ $product->sub_category_id }}"
                                            data-brand="{{ $product->brand_id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#viewProductModal">
                                            <i class="ri-eye-line me-1"></i> View
                                        </button>
                                    </a>

                                    <!-- Edit Button -->
                                    <a class="dropdown-item">
                                        <button class="btn btn-sm btn-warning edit-product-btn fixed-width"
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
                                            data-tags="{{ json_encode($product->tags) }}"
                                            data-category="{{ $product->category_id }}"
                                            data-sub-category="{{ $product->sub_category_id }}"
                                            data-brand="{{ $product->brand_id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editProductModal">
                                            <i class="ri-pencil-line me-1"></i> Edit
                                        </button>
                                    </a>
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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProductModalLabel">View Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Title Field -->
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <p id="viewTitle"></p>
                </div>

                <!-- Description Field -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <p id="viewDescription"></p>
                </div>

                <!-- Price Field -->
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <p id="viewPrice"></p>
                </div>

                <!-- Quantity Field -->
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <p id="viewQuantity"></p>
                </div>

                <!-- Active Field -->
                <div class="mb-3">
                    <label class="form-label">Active</label>
                    <p id="viewActive"></p>
                </div>

                <!-- Featured Field -->
                <div class="mb-3">
                    <label class="form-label">Featured</label>
                    <p id="viewFeatured"></p>
                </div>

                <!-- Avatar Field -->
                <div class="mb-3">
                    <label class="form-label">Avatar (Image)</label>
                    <img id="viewAvatar" src="" alt="Avatar" class="img-square" style="width: 100px; height: 100px; object-fit: cover;">
                </div>

                <!-- Cover Field -->
                <div class="mb-3">
                    <label class="form-label">Cover (Image)</label>
                    <img id="viewCover" src="" alt="Cover" class="img-square" style="width: 100px; height: 100px; object-fit: cover;">
                </div>

                <!-- Tags Field -->
                <div class="mb-3">
                    <label class="form-label">Tags</label>
                    <p id="viewTags"></p>
                </div>

                <!-- Category Field -->
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <p id="viewCategory"></p>
                </div>

                <!-- Sub Category Field -->
                <div class="mb-3">
                    <label class="form-label">Sub Category</label>
                    <p id="viewSubCategory"></p>
                </div>

                <!-- Brand Field -->
                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <p id="viewBrand"></p>
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
    // View Modal
    document.querySelectorAll('.view-product-btn').forEach(button => {
        button.addEventListener('click', () => {
            const title = button.getAttribute('data-title');
            const slug = button.getAttribute('data-slug');
            const description = button.getAttribute('data-description');
            const price = button.getAttribute('data-price');
            const quantity = button.getAttribute('data-quantity');
            const active = button.getAttribute('data-active') === '1' ? 'Active' : 'Inactive';
            const featured = button.getAttribute('data-featured') === '1' ? 'Yes' : 'No';
            const avatar = button.getAttribute('data-avatar');
            const cover = button.getAttribute('data-cover');
            const tags = JSON.parse(button.getAttribute('data-tags')).join(', ');
            const category = button.getAttribute('data-category');
            const subCategory = button.getAttribute('data-sub-category');
            const brand = button.getAttribute('data-brand');

            document.getElementById('viewTitle').textContent = title;
            document.getElementById('viewSlug').textContent = slug;
            document.getElementById('viewDescription').textContent = description;
            document.getElementById('viewPrice').textContent = price;
            document.getElementById('viewQuantity').textContent = quantity;
            document.getElementById('viewActive').textContent = active;
            document.getElementById('viewFeatured').textContent = featured;
            document.getElementById('viewAvatar').src = avatar;
            document.getElementById('viewCover').src = cover;
            document.getElementById('viewTags').textContent = tags;
            document.getElementById('viewCategory').textContent = category;
            document.getElementById('viewSubCategory').textContent = subCategory;
            document.getElementById('viewBrand').textContent = brand;
        });
    });

    // Edit Modal
    document.querySelectorAll('.edit-product-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const title = button.getAttribute('data-title');
            const slug = button.getAttribute('data-slug');
            const description = button.getAttribute('data-description');
            const price = button.getAttribute('data-price');
            const quantity = button.getAttribute('data-quantity');
            const active = button.getAttribute('data-active');
            const featured = button.getAttribute('data-featured');
            const avatar = button.getAttribute('data-avatar');
            const cover = button.getAttribute('data-cover');
            const tags = JSON.parse(button.getAttribute('data-tags')).join(', ');
            const category = button.getAttribute('data-category');
            const subCategory = button.getAttribute('data-sub-category');
            const brand = button.getAttribute('data-brand');

            document.getElementById('editTitle').value = title;
            document.getElementById('editSlug').value = slug;
            document.getElementById('editDescription').value = description;
            document.getElementById('editPrice').value = price;
            document.getElementById('editQuantity').value = quantity;
            document.getElementById('editActive').value = active;
            document.getElementById('editFeatured').value = featured;
            document.getElementById('editAvatarPreview').src = avatar;
            document.getElementById('editCoverPreview').src = cover;
            document.getElementById('editTags').value = tags;
            document.getElementById('editCategory').value = category;
            document.getElementById('editSubCategory').value = subCategory;
            document.getElementById('editBrand').value = brand;
            document.getElementById('editProductForm').action = `/dashboard/products/${id}`;
        });
    });

    // Delete Modal
    document.querySelectorAll('.delete-product-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            document.getElementById('deleteProductForm').action = `/dashboard/products/${id}`;
        });
    });
</script>

@endsection