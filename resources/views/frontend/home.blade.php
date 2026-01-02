@extends('layouts.app')
@section('title', 'Home')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section py-5 text-center" style="min-height: 80vh; display:flex; flex-direction:column; justify-content:center; align-items:center;">
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
<style>
/* --------------------------------------------------
   HERO SECTION
-------------------------------------------------- */
.hero-section {
    padding: 80px 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg,#f4e6ff,#e6d4ff);
    transition: background 0.3s ease, color 0.3s ease;
    backdrop-filter: blur(18px);
}

/* Profile Image */
.hero-section .profile-img {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #c8a2ff;
    transition: box-shadow 0.3s ease;
}

/* Hero H1 */
.hero-section h1 {
    font-size: 3.2rem;
    font-weight: bold;
    color: #5d3ea8; /* purple text in light mode */
    transition: color 0.3s ease, text-shadow 0.3s ease;
}

/* Glow class for dark mode effect */
.hero-section h1.glow {
    text-shadow: 0 0 8px #bb86fc, 0 0 15px #bb86fc, 0 0 25px #bb86fc;
}

/* Hero H3 */
.hero-section h3 {
    font-size: 1.8rem;
    color: #555555;
    margin-bottom: 20px;
    transition: color 0.3s ease, text-shadow 0.3s ease;
}

/* Typed text span */
.hero-section #typed-text {
    color: inherit;
    font-weight: 500;
}

/* Hero button */
.hero-section .btn-primary {
    background-color: #6a1b9a;
    border-color: #6a1b9a;
    color: #fff;
    font-size: 1.2rem;
    padding: 12px 30px;
    transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
}

/* --------------------------------------------------
   DARK MODE HERO SECTION
-------------------------------------------------- */
body.dark-mode .hero-section {
    background: linear-gradient(135deg, #1b1326, #3a1f4d) !important;
}

/* Override H1 and Bootstrap text-purple for dark mode */
body.dark-mode .hero-section h1.text-purple {
    color: #000000 !important; /* black text in dark mode */
    text-shadow: none !important; /* remove glow if not desired */
}

/* H1 glow in dark mode (optional) */
body.dark-mode .hero-section h1.text-purple.glow {
    color: #ffffff !important;
    text-shadow: 0 0 8px #bb86fc, 0 0 15px #bb86fc, 0 0 25px #bb86fc;
}

/* H3 and typed-text in dark mode */
body.dark-mode .hero-section h3,
body.dark-mode .hero-section #typed-text {
    color: #e6d4ff !important;
    text-shadow: 0 0 5px #bb86fc;
}

/* Hero button in dark mode */
body.dark-mode .hero-section .btn-primary {
    background-color: #bb86fc !important;
    border-color: #bb86fc !important;
    color: #1b1326 !important;
    box-shadow: 0 0 15px #bb86fc;
}

/* Profile image shadow in dark mode */
body.dark-mode .hero-section .profile-img {
    box-shadow: 0 4px 12px rgba(255,255,255,0.2);
}

/* Glass cards */
.glass-card {
    border-radius: 20px;
    background: rgba(200, 162, 255, 0.25);
    backdrop-filter: blur(15px);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.glass-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

/* Fade-in animation */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 1s forwards;
    animation-delay: 0.2s;
}
@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
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