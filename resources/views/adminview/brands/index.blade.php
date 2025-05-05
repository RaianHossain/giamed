@extends('layouts/newAdminLayout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Brands</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Brands</li>
        </ol>

        <div class="mb-3">
            <a href="{{ route('dashboard-brands-create') }}" class="btn btn-primary">Create Brand</a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Brands Table (Total: {{ $total_brands }})
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped" id="brandsTable">
                    <thead class="table-dark">
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
                                <td>{{ $brand->title }}</td>
                                <td>{{ $brand->description }}</td>
                                <td>
                                    @if($brand->logo)
                                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="Logo" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('assets/img/avatars/default-logo.png') }}" alt="Default Logo" style="width: 50px; height: 50px; object-fit: cover;">
                                    @endif
                                </td>
                                <td>
                                    @if($brand->cover)
                                        <img src="{{ asset('storage/' . $brand->cover) }}" alt="Cover" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('assets/img/avatars/default-cover.png') }}" alt="Default Cover" style="width: 50px; height: 50px; object-fit: cover;">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard-brands-edit', $brand->id) }}" class="btn btn-sm btn-warning mb-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard-brands-destroy', $brand->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this brand?');">
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
            $('#brandsTable').DataTable();
        });
    </script>
@endpush
