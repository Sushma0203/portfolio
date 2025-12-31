@extends('layouts.app')
@section('title', 'Contact')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold text-center mb-5 fade-in">Contact Me</h2>

    <div class="row g-4">
        <!-- Contact Form -->
        <div class="col-md-6 fade-in">
            <div class="card p-4 shadow-lg glass-card">
                <form id="contactForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Name</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label fw-semibold">Message</label>
                        <textarea class="form-control form-control-lg" id="message" name="message" rows="5" placeholder="Write your message..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
                </form>
            </div>
        </div>

        <!-- Google Map -->
      <div class="col-md-6 fade-in">
        <div class="card shadow-lg glass-card p-0 overflow-hidden">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.123456789!2d85.287!3d27.742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb123456789%3A0xabcdef123456!2sBishankhu%20Narayan%20Mandir!5e0!3m2!1sen!2snp!4v1234567890" 
                width="100%" height="100%" style="border:0; min-height:400px;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>


</div>

<!-- Toast Notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050">
    <div id="contactToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Message sent successfully!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Glass card style */
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
/* Fade-in */
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){

    const form = document.getElementById('contactForm');
    const toastEl = document.getElementById('contactToast');
    const toast = new bootstrap.Toast(toastEl);

    form.addEventListener('submit', function(e){
        e.preventDefault();

        const formData = new FormData(form);

        fetch("{{ route('contact.submit') }}", {
            method: 'POST',
            headers: {'X-CSRF-TOKEN': formData.get('_token')},
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                toastEl.classList.remove('bg-danger');
                toastEl.classList.add('bg-success');
                toastEl.querySelector('.toast-body').innerText = 'Message sent successfully!';
                toast.show();
                form.reset();
            } else {
                toastEl.classList.remove('bg-success');
                toastEl.classList.add('bg-danger');
                toastEl.querySelector('.toast-body').innerText = 'Error sending message!';
                toast.show();
            }
        })
        .catch(err => {
            toastEl.classList.remove('bg-success');
            toastEl.classList.add('bg-danger');
            toastEl.querySelector('.toast-body').innerText = 'Error sending message!';
            toast.show();
        });

    });

});
</script>
@endpush