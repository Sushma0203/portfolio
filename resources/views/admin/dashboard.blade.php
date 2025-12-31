@extends('layouts.admin')

@section('page_title', 'Dashboard')

@section('content')
<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted mb-1 fw-medium small">Gallery Images</p>
                        <h2 class="fw-bold mb-0">{{ $galleryCount }}</h2>
                    </div>
                    <div class="icon-shape bg-primary-subtle text-primary rounded-4 p-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-images fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="bg-primary opacity-10 position-absolute bottom-0 start-0 w-100" style="height: 4px;"></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted mb-1 fw-medium small">Total Projects</p>
                        <h2 class="fw-bold mb-0">{{ $projectCount }}</h2>
                    </div>
                    <div class="icon-shape bg-success-subtle text-success rounded-4 p-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-briefcase fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="bg-success opacity-10 position-absolute bottom-0 start-0 w-100" style="height: 4px;"></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted mb-1 fw-medium small">New Messages</p>
                        <h2 class="fw-bold mb-0">{{ $messageCount }}</h2>
                    </div>
                    <div class="icon-shape bg-info-subtle text-info rounded-4 p-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-chat-dots fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="bg-info opacity-10 position-absolute bottom-0 start-0 w-100" style="height: 4px;"></div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card p-5 border-0 bg-white position-relative overflow-hidden shadow-sm">
            <div class="row align-items-center position-relative z-1">
                <div class="col-lg-8">
                    <h1 class="fw-bold mb-3 display-6">Welcome back, <span class="text-primary text-gradient">Sushma!</span></h1>
                    <p class="text-muted lead mb-4">You have complete control over your portfolio. Update your bio, showcase new projects, or manage your gallery with just a few clicks.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('admin.home.edit') }}" class="btn btn-primary btn-lg px-5 shadow-lg">Edit Home Info</a>
                        <a href="{{ route('frontend.home') }}" target="_blank" class="btn btn-outline-secondary btn-lg px-4 border-2">View Live Site</a>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block text-end">
                    <img src="{{ asset('img/admin-welcome.svg') }}" onerror="this.src='https://illustrations.popsy.co/purple/working-at-home.svg'" alt="Welcome" class="img-fluid" style="max-height: 250px;">
                </div>
            </div>
            <div class="position-absolute top-0 end-0 p-5 mt-n5 me-n5 bg-primary opacity-5 rounded-circle" style="width: 300px; height: 300px;"></div>
        </div>
    </div>
</div>

<style>
    .text-gradient {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .icon-shape {
        transition: transform 0.3s ease;
    }
    .card:hover .icon-shape {
        transform: rotate(10deg);
    }
</style>
@endsection
