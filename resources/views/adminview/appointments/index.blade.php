@extends('layouts/newAdminLayout')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Appointments</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Appointments</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Appointments Table (Total: {{ $total_appointments }})
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped" id="appointmentsTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Special Request</th>
                            <th>Status</th>
                            <th>IP Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->time }}</td>
                                <td>{{ $appointment->special_request }}</td>
                                <td>{{ ucfirst($appointment->status) }}</td>
                                <td>{{ $appointment->ip_address }}</td>
                                <td>
                                    <a href="{{ route('dashboard-appointments-edit', $appointment->id) }}" class="btn btn-sm btn-warning mb-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('dashboard-appointments-destroy', $appointment->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i> Delete
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
        $('#appointmentsTable').DataTable();
    });
</script>
@endpush
