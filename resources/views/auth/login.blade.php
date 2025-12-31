@extends('layouts.app')

@section('content')
<div class="login-wrapper d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="login-card shadow-lg p-4 rounded-4 bg-white" style="width: 100%; max-width: 400px; border-top: 5px solid #6f42c1;">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark">Admin Login</h2>
            <p class="text-muted small">Please enter your credentials to continue.</p>
        </div>

        {{-- Display errors --}}
        @if ($errors->any())
            <div class="alert alert-danger py-2 px-3 mb-4 rounded-3 small">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-bold">Username</label>
                <input type="text" name="username" class="form-control form-control-lg border-2 shadow-none" placeholder="Enter username" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label small fw-bold">Password</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg border-2 shadow-none" placeholder="Enter password" required>
            </div>

            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="togglePassword">
                    <label class="form-check-label small text-muted" for="togglePassword">
                        Show Password
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-purple btn-lg w-100 fw-bold shadow-sm">
                Sign In
            </button>
        </form>
    </div>
</div>

<style>
    .login-wrapper {
        background-color: #f8f9fa;
        padding: 50px 0;
    }
    .btn-purple {
        background-color: #6f42c1;
        border-color: #6f42c1;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-purple:hover {
        background-color: #59359a;
        border-color: #59359a;
        color: white;
        transform: translateY(-2px);
    }
    .form-control:focus {
        border-color: #6f42c1;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        toggle.addEventListener('change', () => {
            password.type = toggle.checked ? 'text' : 'password';
        });
    });
</script>
@endsection
