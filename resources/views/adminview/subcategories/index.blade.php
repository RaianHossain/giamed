@extends('layouts/newAdminLayout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sub-Categories</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Sub-Categories</li>
        </ol>

        <div class="mb-3">
            <a href="{{ route('dashboard-sub-categories-create') }}" class="btn btn-primary">Create Sub-Category</a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Sub-Categories Table
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped" id="subCategoriesTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub_categories as $sub_category)
                            <tr>
                                <td>{{ $sub_category->title }}</td>
                                <td>{{ $sub_category->description }}</td>
                                <td>
                                    <a href="{{ route('dashboard-sub-categories-edit', $sub_category->id) }}" class="btn btn-sm btn-warning mb-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard-sub-categories-destroy', $sub_category->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this sub-category?');">
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#subCategoriesTable').DataTable();
        });
    </script>
@endpush
