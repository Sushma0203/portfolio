@extends('layouts.app')
@section('title', 'About Me')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold text-center mb-5 fade-in">About Me</h2>

    <div class="row g-5 align-items-center">
        <!-- Profile Image -->
        <div class="col-md-4 fade-in">
            <div class="profile-card p-3 shadow-lg text-center">
                <img src="{{ asset('img/profile.jpg') }}" alt="Sushma Thapa" class="img-fluid rounded-circle mb-3">
                <h4 class="fw-bold">Sushma Thapa</h4>
                <p class="text-muted">BIM Student & Developer</p>
                <div class="social-icons mt-3">
                    <a href="https://www.linkedin.com/in/sushma-thapa-015574275" target="_blank"><i class="bi bi-linkedin"></i></a>
                    <a href="https://github.com/Sushma0203" target="_blank"><i class="bi bi-github"></i></a>
                    <a href="mailto:sushmat952@email.com"><i class="bi bi-envelope-fill"></i></a>
                </div>
            </div>
        </div>

        <!-- Bio & Details -->
        <div class="col-md-8 fade-in">
            <div class="bio-card p-4 shadow-lg glass-card">
                <h4 class="fw-bold mb-3">Career Objective</h4>
                <p>{{ $info->career_objective }}</p>

                <h4 class="fw-bold mt-4 mb-3">Education</h4>
                <ul class="list-unstyled">
                    <li><strong>Bachelor in Information Management</strong>, St. Xavier’s College — Present<br>Major: Computer Science, Management<br>Achievements: Scholarships, GPA, Honors</li>
                    <li class="mt-2"><strong>Schooling till Grade 12</strong>, St. Mary’s High School — 2009–2021<br>Major: Management<br>Achievements: Scholarships, GPA</li>
                </ul>

                <h4 class="fw-bold mt-4 mb-3">Skills</h4>
                <div class="row">
                    <div class="col-md-6">
                        <h6>Technical</h6>
                        <p>
                            @foreach($info->technical_skills ?? ['Programming', 'Tools', 'Software'] as $skill)
                                {{ $skill }}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6>Soft Skills</h6>
                        <p>
                            @foreach($info->soft_skills ?? ['Communication', 'Teamwork'] as $skill)
                                {{ $skill }}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </p>
                    </div>
                </div>

                <h4 class="fw-bold mt-4 mb-3">Achievements</h4>
                <ul>
                    @forelse($info->achievements ?? ['Scholarships & GPA honors', 'Volunteer work', 'Leadership roles'] as $ach)
                        <li>{{ $ach }}</li>
                    @empty
                        <li>Scholarships & GPA honors</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection

@push('styles')
<style>
.profile-card {
    border-radius: 20px;
    background: rgba(200, 162, 255, 0.25);
    backdrop-filter: blur(15px);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.profile-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}
.bio-card {
    border-radius: 20px;
    background: rgba(245, 240, 255, 0.25);
    backdrop-filter: blur(15px);
}
.social-icons a {
    font-size: 1.5rem;
    margin: 0 8px;
    color: #5d3ea8;
    transition: transform 0.3s ease, color 0.3s ease;
}
.social-icons a:hover {
    transform: translateY(-4px);
    color: #c8a2ff;
}
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 1s forwards;
}
@keyframes fadeInUp {
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endpush
