@extends('layouts/newAdminLayout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Sub-Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard-sub-categories') }}">Sub-Categories</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Sub-Category Form
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard-sub-categories-update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $category->description }}</textarea>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">Update Sub-Category</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
