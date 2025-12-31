@extends('layouts.app')
@section('title', 'Gallery')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5 fade-in">Gallery</h2>

    <!-- Masonry Gallery Grid -->
    <div class="gallery-grid">
        @forelse($images as $img)
            <div class="gallery-item fade-in">
                <a href="{{ asset($img->image_path) }}" data-lightbox="gallery" data-title="{{ $img->title ?? 'Gallery Image' }}">
                    <img src="{{ asset($img->image_path) }}" loading="lazy" class="img-fluid rounded shadow-sm" alt="{{ $img->title ?? 'Gallery Image' }}">
                </a>
            </div>
        @empty
            @php
                // Fallback to local images if database is empty (to maintain content during migration)
                $localImages = glob(public_path('img/gallery/*.{jpg,png,jpeg,gif}'), GLOB_BRACE);
            @endphp
            @foreach($localImages as $img)
                @php
                    $imgUrl = str_replace(public_path(), '', $img);
                    $imgUrl = asset($imgUrl);
                @endphp
                <div class="gallery-item fade-in">
                    <a href="{{ $imgUrl }}" data-lightbox="gallery" data-title="Gallery Image">
                        <img src="{{ $imgUrl }}" loading="lazy" class="img-fluid rounded shadow-sm" alt="Gallery Image">
                    </a>
                </div>
            @endforeach
        @endforelse
    </div>
</div>
@endsection

@push('styles')
<style>
/* Masonry Grid */
.gallery-grid {
    column-count: 3;
    column-gap: 1rem;
}
.gallery-item {
    break-inside: avoid;
    margin-bottom: 1rem;
    overflow: hidden;
    border-radius: 12px;
    position: relative;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.gallery-item img {
    width: 100%;
    border-radius: 12px;
    transition: transform 0.3s ease;
}
.gallery-item:hover img {
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

/* Fade-in animation */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 1s forwards;
}
@keyframes fadeInUp {
    to { opacity: 1; transform: translateY(0); }
}

/* Responsive columns */
@media (max-width: 992px) {
    .gallery-grid { column-count: 2; }
}
@media (max-width: 576px) {
    .gallery-grid { column-count: 1; }
}
</style>
@endpush

@push('scripts')
<!-- Lightbox.js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'fadeDuration': 300,
        'imageFadeDuration': 300
    });
});
</script>
@endpush