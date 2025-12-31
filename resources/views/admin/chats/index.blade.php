@extends('layouts.admin')

@section('title', 'Chat Sessions')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-purple shadow-sm p-2 rounded bg-white d-inline-block">Chat Sessions</h2>
    </div>

    <div class="glass-card shadow-lg p-0 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-purple text-white">
                    <tr>
                        <th class="ps-4">Session ID</th>
                        <th>Last Message</th>
                        <th>Unread</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sessions as $session)
                    <tr>
                        <td class="ps-4">
                            <span class="text-secondary small">{{ $session->session_id }}</span>
                        </td>
                        <td>{{ $session->last_message_at }}</td>
                        <td>
                            @if($session->unread_count > 0)
                                <span class="badge bg-danger">{{ $session->unread_count }}</span>
                            @else
                                <span class="text-muted small">Read</span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.chats.show', $session->session_id) }}" class="btn btn-sm btn-outline-purple">
                                <i class="bi bi-chat-fill me-1"></i> Open Chat
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">No chat sessions found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-purple { background-color: #6a1b9a !important; }
    .text-purple { color: #6a1b9a !important; }
    .btn-outline-purple {
        color: #6a1b9a;
        border-color: #6a1b9a;
    }
    .btn-outline-purple:hover {
        background-color: #6a1b9a;
        color: white;
    }
    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
</style>
@endpush
