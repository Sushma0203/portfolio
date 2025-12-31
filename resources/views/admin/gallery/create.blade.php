@extends('layouts.admin')

@section('page_title', 'Upload Image')

@section('content')
<div class="card col-md-8 mx-auto">
    <div class="card-body">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label fw-bold">Image</label>
                <input type="file" name="image" class="form-control" required>
                <div class="form-text">Supported formats: JPG, PNG, GIF. Max 2MB.</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Title (Optional)</label>
                <input type="text" name="title" class="form-control" placeholder="Short description or title">
            </div>

            <div class="text-end mt-4">
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-light me-2">Cancel</a>
                <button type="submit" class="btn btn-primary px-4">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection
