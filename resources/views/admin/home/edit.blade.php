@extends('layouts.admin')

@section('page_title', 'Manage Home Page')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom py-3">
                <h6 class="mb-0 fw-bold">General Information</h6>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Profile Image</label>
                        <div class="d-flex align-items-center gap-4 p-3 border rounded-4 bg-light">
                            @if($info->profile_image)
                                <img src="{{ asset($info->profile_image) }}" alt="Profile" class="rounded-circle shadow-sm" style="width: 80px; height: 80px; object-fit: cover;">
                            @else
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px;">
                                    <i class="bi bi-person text-muted fs-2"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <input type="file" name="profile_image" class="form-control form-control-sm border-0 shadow-none">
                                <small class="text-muted mt-1 d-block">Recommended: Square image, 500x500px</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Hero Title</label>
                        <input type="text" name="hero_title" class="form-control form-control-lg border-2 shadow-none" value="{{ $info->hero_title }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Hero Subtitle</label>
                        <input type="text" name="hero_subtitle" class="form-control border-2 shadow-none" value="{{ $info->hero_subtitle }}" required>
                    </div>

                    <hr class="my-5 opacity-5">

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted mb-0">Rotation Strings (Typing Animation)</label>
                            <button type="button" class="btn btn-sm btn-soft-primary" id="add-typed-string">
                                <i class="bi bi-plus-circle me-1"></i> Add New
                            </button>
                        </div>
                        <div id="typed-strings-container">
                            @forelse($info->typed_strings ?? [] as $string)
                                <div class="input-group mb-3 bg-light p-2 rounded-3 border">
                                    <input type="text" name="typed_strings[]" class="form-control border-0 bg-transparent shadow-none" value="{{ $string }}">
                                    <button type="button" class="btn btn-link text-danger remove-input shadow-none">
                                        <i class="bi bi-trash3 fs-5"></i>
                                    </button>
                                </div>
                            @empty
                                <div class="input-group mb-3 bg-light p-2 rounded-3 border">
                                    <input type="text" name="typed_strings[]" class="form-control border-0 bg-transparent shadow-none" placeholder="e.g. Laravel Developer">
                                    <button type="button" class="btn btn-link text-danger remove-input shadow-none">
                                        <i class="bi bi-trash3 fs-5"></i>
                                    </button>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="text-end pt-3 border-top mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5 shadow-lg">
                            Save Site Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm bg-primary text-white p-4 overflow-hidden position-relative">
            <div class="position-relative z-1">
                <h5 class="fw-bold mb-3">Live Preview Hint</h5>
                <p class="small opacity-75 mb-0">Changes saved here will reflect immediately on the main portfolio page's hero section. Make sure your title and strings are catchy!</p>
            </div>
            <div class="position-absolute bottom-0 end-0 p-3 mb-n4 me-n4 bg-white opacity-10 rounded-circle" style="width: 150px; height: 150px;"></div>
        </div>
    </div>
</div>

<style>
    .btn-soft-primary {
        background-color: #eef2ff;
        color: #4f46e5;
        border: none;
    }
    .btn-soft-primary:hover {
        background-color: #e0e7ff;
        color: #4338ca;
    }
    .input-group:focus-within {
        border-color: #4f46e5 !important;
        background: white !important;
    }
</style>

@push('scripts')
<script>
    document.getElementById('add-typed-string').addEventListener('click', function() {
        const container = document.getElementById('typed-strings-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="typed_strings[]" class="form-control">
            <button type="button" class="btn btn-outline-danger remove-input">Remove</button>
        `;
        container.appendChild(div);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-input')) {
            e.target.closest('.input-group').remove();
        }
    });
</script>
@endpush
@endsection
