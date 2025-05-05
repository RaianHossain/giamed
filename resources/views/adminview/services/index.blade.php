@extends('layouts/newAdminLayout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Services</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Services</li>
        </ol>

        <div class="mb-3">
            <a href="{{ route('dashboard-services-create') }}" class="btn btn-primary">Create Service</a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Services Table (Total: {{ $total_services }}, Active: {{ $active_services }})
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped" id="servicesTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Avatar</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->short_description }}</td>
                                <td>
                                    @if($service->avatar)
                                        <img src="{{ asset('storage/' . $service->avatar) }}" alt="Avatar" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('assets/img/avatars/default-avatar.png') }}" alt="Default Avatar" style="width: 50px; height: 50px; object-fit: cover;">
                                    @endif
                                </td>
                                <td>
                                    @if($service->active)
                                        <span class="badge rounded-pill bg-success">Active</span>
                                    @else
                                        <span class="badge rounded-pill bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard-services-edit', $service->id) }}" class="btn btn-sm btn-warning mb-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard-services-destroy', $service->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this service?');">
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
            $('#servicesTable').DataTable();
        });
    </script>
@endpush
