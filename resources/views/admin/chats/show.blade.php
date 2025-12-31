@extends('layouts.admin')

@section('title', 'Chat Thread')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <a href="{{ route('admin.chats.index') }}" class="btn btn-sm btn-link text-purple p-0">
            <i class="bi bi-arrow-left"></i> Back to Sessions
        </a>
        <h2 class="fw-bold text-purple mt-2">Chat Thread</h2>
        <p class="text-secondary small">Session: {{ $sessionId }}</p>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="glass-card shadow-lg flex-column d-flex" style="height: 600px;">
                <div id="chat-messages" class="flex-grow-1 p-4 overflow-auto d-flex flex-column gap-3">
                    @foreach($chats as $chat)
                        <div class="message-wrapper {{ $chat->is_admin ? 'admin' : 'user' }}">
                            <div class="message-content p-3 rounded shadow-sm">
                                {{ $chat->message }}
                            </div>
                            <div class="message-time small text-muted mt-1">
                                {{ $chat->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="p-4 border-top">
                    <form action="{{ route('admin.chats.reply', $sessionId) }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <textarea name="message" class="form-control" rows="2" placeholder="Write a reply..." required></textarea>
                            <button type="submit" class="btn btn-purple px-4">
                                <i class="bi bi-send-fill"></i> Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn-purple { background-color: #6a1b9a; color: white; }
    .btn-purple:hover { background-color: #5d1787; color: white; }
    .text-purple { color: #6a1b9a !important; }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .message-wrapper { max-width: 80%; }
    .message-wrapper.user { align-self: flex-start; }
    .message-wrapper.admin { align-self: flex-end; text-align: right; }

    .message-wrapper.user .message-content {
        background: #f1f1f1;
        color: #333;
        border-bottom-left-radius: 2px;
    }
    .message-wrapper.admin .message-content {
        background: #6a1b9a;
        color: white;
        border-bottom-right-radius: 2px;
    }

    #chat-messages::-webkit-scrollbar { width: 6px; }
    #chat-messages::-webkit-scrollbar-thumb { background: #ccc; border-radius: 3px; }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatMessages = document.getElementById('chat-messages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    });
</script>
@endpush
