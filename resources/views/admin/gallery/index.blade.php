@extends('layouts.admin')

@section('page_title', 'Manage Gallery')

@section('content')
<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Upload New Image
    </a>
</div>

<div class="row g-4">
    @forelse($images as $image)
        <div class="col-md-3">
            <div class="card h-100">
                <img src="{{ asset($image->image_path) }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                <div class="card-body">
                    <p class="card-text small text-muted text-truncate">{{ $image->title ?? 'Untitled' }}</p>
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">No images found in gallery.</p>
        </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $images->links() }}
</div>
@endsection
