@extends('layouts.admin')

@section('page_title', 'Manage Projects')

@section('content')
<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add New Project
    </a>
</div>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light border-bottom">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">Project</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Category</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Tech Stack</th>
                        <th class="text-end pe-4 py-3 text-uppercase small fw-bold text-muted">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        @if($project->image_path)
                                            <img src="{{ asset($project->image_path) }}" class="rounded-3 shadow-sm" style="width: 48px; height: 48px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center border" style="width: 48px; height: 48px;">
                                                <i class="bi bi-image text-muted fs-5"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-bold">{{ $project->title }}</h6>
                                        <p class="text-muted small mb-0">{{ Str::limit($project->description, 40) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-light text-dark border px-3 py-2 fw-medium">
                                    {{ strtoupper($project->category) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach($project->tech_stack ?? [] as $tech)
                                        <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle small px-2 py-1">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm rounded-3 overflow-hidden">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-white border-end px-3" title="Edit">
                                        <i class="bi bi-pencil-square text-primary"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-white px-3" title="Delete">
                                            <i class="bi bi-trash3 text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-folder2-open display-4 mb-3 d-block opacity-25"></i>
                                No projects found. Start by adding one!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .bg-indigo-subtle { background-color: #eef2ff; color: #4f46e5; }
    .text-indigo { color: #4f46e5; }
    .border-indigo-subtle { border-color: #e0e7ff !important; }
    .btn-white { background: white; border: 1px solid #edf2f7; }
    .btn-white:hover { background: #f8fafc; }
</style>

<div class="mt-4">
    {{ $projects->links() }}
</div>
@endsection
