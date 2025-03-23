@extends('layouts/contentNavbarLayout')

@section('title', ' Services - Index')

@section('content')

<style>
  .clickable-td {
    cursor: pointer;
    user-select: none;
    text-align: center;
  }
  .fixed-width {
    width: 90px;
  }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href={{ route('dashboard-analytics') }}>Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Services</li>
    </ol>
</nav>
<div class="row mb-4">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h6>Services</h6>
                <p>{{ $total_services ?? 0 }}</p>
                <p>Total Services</p>
            </div>
        </div>        
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h6>Active Services</h6>
                <p>{{ $active_services ?? 0 }}</p>
                <p>There should strictly 3 active services</p>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Dark Table -->
<div class="card overflow-hidden">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header m-0">Services</h5>
        <a type="button" class="btn btn-success me-3 text-white" href={{ route('dashboard-services-create') }}>
            <span class="tf-icons ri-add-line ri-16px me-1"></span>Add New
        </a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-dark">
        <thead>
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
                <td data-bs-toggle="modal" data-bs-target="#largeModal" class="clickable-td" onclick="openEditModal({{ $service }})">
                  {{ $service->title }}
                </td>
                <!-- Short Description -->
                <td>{{ $service->short_description }}</td>

                <!-- Avatar -->
                <td>
                    @if($service->avatar)
                        <img src="{{ asset('storage/' . $service->avatar) }}" alt="Avatar" class="img-square" style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        <img src="{{ asset('assets/img/avatars/default-avatar.png') }}" alt="Default Avatar" class="img-square" style="width: 50px; height: 50px; object-fit: cover;">
                    @endif
                </td>

                <!-- Status -->
                <td>
                    @if($service->active)
                        <span class="badge rounded-pill bg-label-success me-1">Active</span>
                    @else
                        <span class="badge rounded-pill bg-label-danger me-1">Inactive</span>
                    @endif
                </td>

                <!-- Actions -->
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ri-more-2-line"></i>
                        </button>
                        <div class="dropdown-menu">
                            {{-- <button type="button" class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                              <i class="ri-pencil-line me-1"></i> Edit
                            </button> --}}
                            
                            
                            <a class="dropdown-item">
                                <button class="btn btn-sm btn-warning edit-service-btn fixed-width"
                                    data-id="{{ $service->id }}"
                                    data-title="{{ $service->title }}"
                                    data-short_description="{{ $service->short_description }}"
                                    data-description="{{ $service->description }}"
                                    data-content="{{ $service->content }}"
                                    data-active="{{ $service->active }}"
                                    data-avatar="{{ asset('storage/' . $service->avatar) }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editServiceModal">
                                    <i class="ri-pencil-line me-1"></i> Edit
                                </button>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);">
                              <button class="btn btn-sm btn-danger delete-service-btn fixed-width"
                                data-id="{{ $service->id }}"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteServiceModal">
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
  <!--/ Bootstrap Dark Table -->

<!-- Edit Service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> <!-- Added modal-lg here -->
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editServiceForm" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="modal-body">
                  <input type="hidden" name="service_id" id="editServiceId">

                  <!-- Title -->
                  <div class="mb-3">
                      <label for="editTitle" class="form-label">Title</label>
                      <input type="text" name="title" id="editTitle" class="form-control">
                  </div>

                  <!-- Short Description -->
                  <div class="mb-3">
                      <label for="editShortDescription" class="form-label">Short Description</label>
                      <input type="text" name="short_description" id="editShortDescription" class="form-control">
                  </div>

                  <!-- Description -->
                  <div class="mb-3">
                      <label for="editDescription" class="form-label">Description</label>
                      <textarea name="description" id="editDescription" class="form-control"></textarea>
                  </div>

                  <!-- Content (TinyMCE Editor) -->
                  <div class="mb-3">
                      <label for="editContent" class="form-label">Content</label>
                      <textarea id="editEditor" name="content"></textarea>
                  </div>

                  <!-- Avatar -->
                  <div class="mb-3">
                      <label class="form-label">Current Avatar</label>
                      <div>
                          <img id="editAvatarPreview" src="" alt="Avatar" class="img-fluid" style="max-height: 100px;">
                      </div>
                      <label for="editAvatar" class="form-label mt-2">Change Avatar</label>
                      <input type="file" name="avatar" id="editAvatar" class="form-control">
                  </div>

                  <!-- Active -->
                  <div class="mb-3 form-check">
                      <input type="checkbox" name="active" id="editActive" class="form-check-input">
                      <label class="form-check-label" for="editActive">Active</label>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
          </form>
      </div>
  </div>
</div>


<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteServiceModal" tabindex="-1" aria-labelledby="deleteServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteServiceModalLabel">Delete Service</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="deleteServiceForm" method="POST">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                  Are you sure you want to delete this service?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
              </div>
          </form>
      </div>
  </div>
</div>

<!-- Include TinyMCE -->
<script src="https://cdn.tiny.cloud/1/h9idsvxdfbzdcd0d580m2dydcs9cbt9kc0lu79itvtoijnm6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      tinymce.init({
          selector: '#editEditor',
          height: 300,
          plugins: 'link image code',
          toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | image code'
      });

      // Populate Edit Modal
      document.querySelectorAll('.edit-service-btn').forEach(button => {
          button.addEventListener('click', function () {
              document.getElementById('editServiceId').value = this.dataset.id;
              document.getElementById('editTitle').value = this.dataset.title;
              document.getElementById('editShortDescription').value = this.dataset.short_description;
              document.getElementById('editDescription').value = this.dataset.description;
              tinymce.get('editEditor').setContent(this.dataset.content);
              document.getElementById('editAvatarPreview').src = this.dataset.avatar;
              document.getElementById('editActive').checked = this.dataset.active == "1";

              document.getElementById('editServiceForm').action = `/dashboard/services/${this.dataset.id}`;
          });
      });

      // Populate Delete Modal
      document.querySelectorAll('.delete-service-btn').forEach(button => {
          button.addEventListener('click', function () {
              document.getElementById('deleteServiceForm').action = `/dashboard/services/${this.dataset.id}`;
          });
      });
  });
</script>

@endsection
