@extends('layouts/contentNavbarLayout')

@section('title', 'Brands - Index')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard-analytics') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Brands</li>
    </ol>
</nav>

<div class="row mb-4">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h6>Brands</h6>
                <p>{{ $total_brands ?? 0 }}</p>
                <p>Total Brands</p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Dark Table -->
<div class="card overflow-hidden">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header m-0">Brands</h5>
        <button type="button" class="btn btn-success me-3 text-white" data-bs-toggle="offcanvas" data-bs-target="#addBrandCanvas">
            <span class="tf-icons ri-add-line ri-16px me-1"></span>Add New
        </button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Logo</th>
                    <th>Cover</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <!-- Title -->
                        <td>{{ $brand->title }}</td>

                        <!-- Description -->
                        <td>{{ $brand->description }}</td>

                        <!-- Logo -->
                        <td>
                            @if($brand->logo)
                                <img src="{{ asset('storage/' . $brand->logo) }}" alt="Logo" class="img-square" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/img/avatars/default-logo.png') }}" alt="Default Logo" class="img-square" style="width: 50px; height: 50px; object-fit: cover;">
                            @endif
                        </td>

                        <!-- Cover -->
                        <td>
                            @if($brand->cover)
                                <img src="{{ asset('storage/' . $brand->cover) }}" alt="Cover" class="img-square" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/img/avatars/default-cover.png') }}" alt="Default Cover" class="img-square" style="width: 50px; height: 50px; object-fit: cover;">
                            @endif
                        </td>

                        <!-- Actions -->
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <!-- Edit Button -->
                                    <a class="dropdown-item">
                                        <button class="btn btn-sm btn-warning edit-brand-btn fixed-width"
                                            data-id="{{ $brand->id }}"
                                            data-title="{{ $brand->title }}"
                                            data-description="{{ $brand->description }}"
                                            data-logo="{{ asset('storage/' . $brand->logo) }}"
                                            data-cover="{{ asset('storage/' . $brand->cover) }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editBrandModal">
                                            <i class="ri-pencil-line me-1"></i> Edit
                                        </button>
                                    </a>

                                    <!-- Delete Button -->
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <button class="btn btn-sm btn-danger delete-brand-btn fixed-width"
                                            data-id="{{ $brand->id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteBrandModal">
                                            <i class="ri-delete-bin-6-line me-1"></i>Delete
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

<!-- Add Brand Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addBrandCanvas" aria-labelledby="addBrandCanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="addBrandCanvasLabel">Add New Brand</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('dashboard-brands-store') }}" method="POST" enctype="multipart/form-data">
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

            <!-- Logo Field -->
            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
            </div>

            <!-- Cover Field -->
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<!-- Edit Brand Modal -->
<div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBrandModalLabel">Edit Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editBrandForm" method="POST" enctype="multipart/form-data">
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

                    <!-- Logo Field -->
                    <div class="mb-3">
                        <label for="editLogo" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="editLogo" name="logo" accept="image/*">
                        <img id="editLogoPreview" src="" alt="Logo Preview" class="img-square mt-2" style="width: 50px; height: 50px; object-fit: cover;">
                    </div>

                    <!-- Cover Field -->
                    <div class="mb-3">
                        <label for="editCover" class="form-label">Cover</label>
                        <input type="file" class="form-control" id="editCover" name="cover" accept="image/*">
                        <img id="editCoverPreview" src="" alt="Cover Preview" class="img-square mt-2" style="width: 50px; height: 50px; object-fit: cover;">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Brand Modal -->
<div class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="deleteBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBrandModalLabel">Delete Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this brand?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteBrandForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Edit and Delete Modals -->
<script>
    // Edit Modal
    document.querySelectorAll('.edit-brand-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const title = button.getAttribute('data-title');
            const description = button.getAttribute('data-description');
            const logo = button.getAttribute('data-logo');
            const cover = button.getAttribute('data-cover');

            document.getElementById('editTitle').value = title;
            document.getElementById('editDescription').value = description;
            document.getElementById('editLogoPreview').src = logo;
            document.getElementById('editCoverPreview').src = cover;
            document.getElementById('editBrandForm').action = `/dashboard/brands/${id}`;
        });
    });

    // Delete Modal
    document.querySelectorAll('.delete-brand-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            document.getElementById('deleteBrandForm').action = `/dashboard/brands/${id}`;
        });
    });
</script>

@endsection