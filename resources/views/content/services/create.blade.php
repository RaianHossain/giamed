@extends('layouts/contentNavbarLayout')

@section('title', 'Services - Index')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard-analytics') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard-services') }}">Services</a>
        </li>
        <li class="breadcrumb-item active">Create New</li>
    </ol>
</nav>

<div class="row">
    <div class="col-xxl">
        <div class="card mb-6">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Service</h5> <small class="text-muted float-end">New Service Form</small>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard-services-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Short Description --}}
                    <div class="mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <input type="text" name="short_description" class="form-control @error('short_description') is-invalid @enderror" value="{{ old('short_description') }}">
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Content (TinyMCE Editor) --}}
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea id="editor" name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Avatar Upload --}}
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                        @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Active Checkbox --}}
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="active" class="form-check-input" {{ old('active', 1) ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include TinyMCE -->
<script src="https://cdn.tiny.cloud/1/h9idsvxdfbzdcd0d580m2dydcs9cbt9kc0lu79itvtoijnm6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Initialize TinyMCE -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        tinymce.init({
            selector: '#editor', // The ID of the textarea
            height: 300, // Height of the editor
            plugins: 'link image code', // Plugins to enable
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | image code', // Toolbar configuration
            style_formats: [
                { title: 'Heading 1', block: 'h1' },
                { title: 'Heading 2', block: 'h2' },
                { title: 'Heading 3', block: 'h3' }
            ]
        });
    });
</script>

@endsection