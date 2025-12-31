@extends('layouts.admin')

@section('page_title', 'Add New Project')

@section('content')
<div class="card col-md-10 mx-auto">
    <div class="card-body">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Project Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. Brain Champ">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category" class="form-select" required>
                            <option value="laravel">Laravel</option>
                            <option value="python">Python</option>
                            <option value="js">HTML/CSS/JS</option>
                            <option value="c">C</option>
                            <option value="dotnet">.NET Core</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Project Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Tech Stack</label>
                    <div id="tech-stack-container">
                        <div class="input-group mb-2">
                            <input type="text" name="tech_stack[]" class="form-control" placeholder="e.g. PHP">
                            <button type="button" class="btn btn-outline-danger remove-input">Remove</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-tech">Add Tech</button>
                </div>
            </div>

            <div class="text-end mt-4">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-light me-2">Cancel</a>
                <button type="submit" class="btn btn-primary px-4">Create Project</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('add-tech').addEventListener('click', function() {
        const container = document.getElementById('tech-stack-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="tech_stack[]" class="form-control">
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
