@extends('layouts/contentNavbarLayout')

@section('title', ' Services - Index')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href={{ route('dashboard-analytics') }}>Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Sub-Categories</li>
    </ol>
</nav>

<div class="row mb-4">
  <div class="col-4">
      <div class="card">
          <div class="card-body">
              <h6>Sub-Categories</h6>
              <p>{{ $total_sub_categories ?? 0 }}</p>
              <p>Total Sub-Categories</p>
          </div>
      </div>        
  </div>  
</div>

<!-- Bootstrap Dark Table -->
<div class="card overflow-hidden">
  <div class="d-flex justify-content-between align-items-center">
      <h5 class="card-header m-0">Sub-Categories</h5>
      <button type="button" class="btn btn-success me-3 text-white" data-bs-toggle="offcanvas" data-bs-target="#addCategoryCanvas">
          <span class="tf-icons ri-add-line ri-16px me-1"></span>Add New
      </button>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-dark">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sub_categories as $sub_category)
          <tr>
              <!-- Title -->
              <td>{{ $sub_category->title }}</td>

              <!-- Description -->
              <td>{{ $sub_category->description }}</td>

              <!-- Actions -->
              <td>
                  <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="ri-more-2-line"></i>
                      </button>
                      <div class="dropdown-menu">
                          <!-- Edit Button -->
                          <a class="dropdown-item">
                              <button class="btn btn-sm btn-warning edit-category-btn fixed-width"
                                  data-id="{{ $sub_category->id }}"
                                  data-title="{{ $sub_category->title }}"
                                  data-description="{{ $sub_category->description }}"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editCategoryModal">
                                  <i class="ri-pencil-line me-1"></i> Edit
                              </button>
                          </a>

                          <!-- Delete Button -->
                          <a class="dropdown-item" href="javascript:void(0);">
                              <button class="btn btn-sm btn-danger delete-category-btn fixed-width"
                                  data-id="{{ $sub_category->id }}"
                                  data-bs-toggle="modal"
                                  data-bs-target="#deleteCategoryModal">
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

<!-- Add Category Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addCategoryCanvas" aria-labelledby="addCategoryCanvasLabel">
  <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="addCategoryCanvasLabel">Add New Sub-Category</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
      <form action="{{ route('dashboard-sub-categories-store') }}" method="POST">
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

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form id="editCategoryForm" method="POST">
                  @csrf
                  @method('PUT') <!-- Hidden field to override the method to PUT -->
                  
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

                  <!-- Submit Button -->
                  <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div>
      </div>
  </div>
</div>

<!-- Delete Category Modal -->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Sub-Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p>Are you sure you want to delete this sub-category?</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <form id="deleteCategoryForm" method="POST">
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
document.querySelectorAll('.edit-category-btn').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const title = button.getAttribute('data-title');
        const description = button.getAttribute('data-description');

        document.getElementById('editTitle').value = title;
        document.getElementById('editDescription').value = description;
        document.getElementById('editCategoryForm').action = `/dashboard/sub-categories/${id}`;
    });
});

// Delete Modal
document.querySelectorAll('.delete-category-btn').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        document.getElementById('deleteCategoryForm').action = `/dashboard/sub-categories/${id}`;
    });
});

</script>

@endsection