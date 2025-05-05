@extends('layouts/newAdminLayout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Brand</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-brands') }}">Brands</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Brand Form
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard-brands-update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $brand->title) }}" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $brand->description) }}</textarea>
                    </div>

                    <!-- Logo Upload -->
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        @if($brand->logo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $brand->logo) }}" alt="Current Logo" style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                    </div>

                    <!-- Cover Upload -->
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        @if($brand->cover)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $brand->cover) }}" alt="Current Cover" style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">Update Brand</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
