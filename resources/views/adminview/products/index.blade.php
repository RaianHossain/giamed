@extends('layouts/newAdminLayout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Products</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>
        </ol>

        <div class="mb-3">
            <a href="{{ route('dashboard-products-create') }}" class="btn btn-primary">Create Product</a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Product Table
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Active</th>
                            <th>Featured</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Brand</th>
                            <th>Tags</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
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
                                    <img src="{{ $product->avatar ? asset('storage/' . $product->avatar) : asset('assets/img/avatars/default-product.png') }}"
                                        alt="Product Image"
                                        class="img-thumbnail"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                </td>

                                <td>{{ $product->category_title ?? '-' }}</td>
                                <td>{{ $product->sub_category_title ?? '-' }}</td>
                                <td>{{ $product->brand->title ?? '-' }}</td>
                                <td>
                                    {{-- @foreach ($product->tags as $tag)
                                        <span class="badge bg-info text-dark">{{ $tag }}</span>
                                    @endforeach --}}
                                </td>

                                <!-- Actions -->
                                <td>
                                    <a href="{{ route('dashboard-products-edit', $product->id) }}" class="btn btn-sm btn-warning mb-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard-products-destroy', $product->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection