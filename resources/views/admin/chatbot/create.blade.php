@extends('layouts.admin')

@section('page_title', 'Add New Question')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h4 class="fw-bold mb-4">Create Auto-Response</h4>
            
            <form action="{{ route('admin.chatbot.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Question</label>
                    <input type="text" name="question" class="form-control" placeholder="e.g. What services do you provide?" required>
                    <div class="form-text text-muted">The exact question or part of the question to match.</div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Auto-Response Answer</label>
                    <textarea name="answer" rows="5" class="form-control" placeholder="Type the answer here..." required></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-lg me-2"></i> Save Changes
                    </button>
                    <a href="{{ route('admin.chatbot.index') }}" class="btn btn-light px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
