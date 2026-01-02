@extends('layouts.admin')

@section('page_title', 'Chat Bot Management')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Auto-Response Questions</h4>
        <a href="{{ route('admin.chatbot.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i> Add New Question
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 30%">Question</th>
                    <th style="width: 50%">Answer</th>
                    <th style="width: 20%" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($questions as $q)
                <tr>
                    <td class="fw-medium">{{ $q->question }}</td>
                    <td class="text-muted">{{ Str::limit($q->answer, 100) }}</td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.chatbot.edit', $q->id) }}" class="btn btn-sm btn-outline-primary shadow-none">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.chatbot.destroy', $q->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger shadow-none">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-5 text-muted">
                        <i class="bi bi-chat-dots fs-1 d-block mb-3"></i>
                        No auto-response questions found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
