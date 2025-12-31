@extends('layouts.admin')

@section('page_title', 'View Message')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">{{ $message->subject }}</h5>
                <span class="badge bg-light text-dark border">{{ $message->created_at->format('F d, Y h:i A') }}</span>
            </div>
            <div class="card-body p-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="text-muted small">From</label>
                        <p class="fw-bold mb-0">{{ $message->name }}</p>
                        <p class="text-info small mb-0">{{ $message->email }}</p>
                    </div>
                </div>
                <div class="message-content bg-light p-4 rounded border">
                    <p class="mb-0" style="white-space: pre-wrap;">{{ $message->message }}</p>
                </div>
            </div>
            <div class="card-footer bg-white text-end py-3">
                <a href="{{ route('admin.messages.index') }}" class="btn btn-light me-2">Back to Inbox</a>
                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4">Delete Message</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
