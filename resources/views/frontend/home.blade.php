@extends('layouts.app')
@section('title', 'Home')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section py-5 text-center">
    <img src="{{ asset($info->profile_image ?? 'img/profile.jpg') }}" alt="Sushma Thapa" class="profile-img mb-4 shadow-lg">
    <h1 class="fw-bold text-purple glow mb-2">{{ $info->hero_title }}</h1>
    <h3 class="mb-3 text-secondary">
        <span id="typed-text"></span>
    </h3>
    <a href="{{ route('frontend.contact') }}" class="btn btn-primary btn-lg shadow-sm">Hire Me / Contact</a>
</section>

<!-- ABOUT / CARDS SECTION -->
<section class="container py-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="glass-card p-4 h-100 shadow-lg fade-in">
                <h3 class="fw-bold mb-3">Education</h3>
                <p><strong>Bachelors in Information Management</strong><br>St. Xavier’s College — Present</p>
                <p><strong>Schooling till Grade 12</strong><br>St. Mary’s High School — 2009–2021</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="glass-card p-4 h-100 shadow-lg fade-in">
                <h3 class="fw-bold mb-3">Skills</h3>
                <ul class="mb-0">
                    <li>Programming, Tools & Software</li>
                    <li>Communication, Teamwork</li>
                    <li>Languages: English, Nepali, Hindi</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="glass-card p-4 h-100 shadow-lg fade-in">
                <h3 class="fw-bold mb-3">Achievements</h3>
                <p>Scholarships, GPA honors, Volunteer work, Leadership roles</p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
    {{-- Styles moved to public/css/custom.css --}}
@endpush

@push('scripts')
<!-- Typed.js -->
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
document.addEventListener("DOMContentLoaded", function(){
    var typed = new Typed('#typed-text', {
        strings: {!! json_encode($info->typed_strings ?? ["Laravel Developer", "Frontend Designer", "Tech Enthusiast"]) !!},
        typeSpeed: 60,
        backSpeed: 40,
        loop: true
    });
});
</script>
@endpush