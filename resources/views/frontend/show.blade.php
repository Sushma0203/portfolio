@extends('layouts.app')
@section('title', $project['title'])

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded p-4">
                <h2 class="fw-bold mb-3 text-center">{{ $project['title'] }}</h2>
                <img src="{{ asset('img/gallery/'.$project['image']) }}" class="img-fluid rounded mb-3" alt="{{ $project['title'] }}">
                <p class="lead text-center">{{ $project['description'] ?? 'This project showcases my skills in '.$project['techString'] }}</p>
                <div class="text-center mt-3">
                    @foreach($project['tech'] as $tech)
                        <span class="badge bg-secondary me-1">{{ $tech }}</span>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('gallery') }}" class="btn btn-lavender btn-lg">
                        <i class="bi bi-arrow-left me-2"></i>Back to Gallery
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection