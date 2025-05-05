@extends('layouts/contentNavbarLayout')

@section('title', 'Appointments - Index')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href={{ route('dashboard-analytics') }}>Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Appointments</li>
    </ol>
</nav>

<div class="row mb-4">
  <div class="col-4">
      <div class="card">
          <div class="card-body">
              <h6>Appointments</h6>
              <p>{{ $total_appointments ?? 0 }}</p>
              <p>Total Appointments</p>
          </div>
      </div>        
  </div>  
</div>

<!-- Appointments Table -->
<div class="card overflow-hidden">
  <div class="d-flex justify-content-between align-items-center">
      <h5 class="card-header m-0">Appointments</h5>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-dark">
        <thead>
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
                <tr data-id="{{ $appointment->id }}">
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->phone }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>{{ $appointment->special_request }}</td>
                    <td>
                        <select class="form-select status-select" data-original="{{ $appointment->status }}" style="width: 120px; color: #d6d2d2;">
                            <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="canceled" {{ $appointment->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                    </td>
                    <td>{{ $appointment->ip_address }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning update-status-btn" disabled>
                            <i class="ri-pencil-line me-1"></i> Update
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('tbody tr').forEach(row => {
        const select = row.querySelector('.status-select');
        const updateBtn = row.querySelector('.update-status-btn');

        // Enable update button on change
        select.addEventListener('change', () => {
            updateBtn.disabled = select.value === select.getAttribute('data-original');
        });

        // Handle update button click
        updateBtn.addEventListener('click', () => {
            const appointmentId = row.getAttribute('data-id');
            const newStatus = select.value;

            fetch(`/dashboard/appointments/${appointmentId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => {
                if (!response.ok) throw new Error('Request failed');
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    select.setAttribute('data-original', newStatus);
                    updateBtn.disabled = true;
                    alert(data.message || 'Status updated successfully');
                } else {
                    alert('Update failed');
                }
            })
            .catch(error => {
                console.error(error);
                alert('Error updating status.');
            });
        });
    });
});
</script>

@endsection
