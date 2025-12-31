@extends('layouts.app')
@section('title', 'Projects')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold text-center mb-5 fade-in">My Projects</h2>

    <!-- Filter Buttons -->
    <div class="text-center mb-5">
        <button class="btn btn-outline-primary filter-btn mx-1 active" data-filter="all">All</button>
        <button class="btn btn-outline-primary filter-btn mx-1" data-filter="laravel">Laravel</button>
        <button class="btn btn-outline-primary filter-btn mx-1" data-filter="python">Python</button>
        <button class="btn btn-outline-primary filter-btn mx-1" data-filter="js">HTML/CSS/JS</button>
        <button class="btn btn-outline-primary filter-btn mx-1" data-filter="c">C</button>
        <button class="btn btn-outline-primary filter-btn mx-1" data-filter="dotnet">.NET Core</button>
    </div>

    <!-- Projects Grid -->
    <div class="row g-4">
        @php
            $displayProjects = $projects;
            if($displayProjects->isEmpty()) {
                // Fallback to static data if database is empty
                $displayProjects = collect([
                    ['title'=>'Brain Champ','img'=>'brainchamp.jpeg','desc'=>'C-based quiz game with interactive learning features.','category'=>'c','tech_stack'=>['C']],
                    ['title'=>'Traffic Management System','img'=>'trafficmanagementsystem.jpeg','desc'=>'Real-time traffic control system using HTML, CSS, JS, and PHP.','category'=>'js','tech_stack'=>['HTML','CSS','JS','PHP']],
                    ['title'=>'Harati Webpage','img'=>'haratiwebpage.jpeg','desc'=>'Built using HTML, CSS, JS, PHP and Python for digital billing.','category'=>'js','tech_stack'=>['HTML','CSS','JS','PHP','Python']],
                    ['title'=>'.NET Core Website','img'=>'dotnet.png','desc'=>'Full website built using .NET Core framework.','category'=>'dotnet','tech_stack'=>['.NET Core']],
                    ['title'=>'Inventory Management','img'=>'inventory.jpeg','desc'=>'Python + HTML/CSS/JS/PHP system with CRUD and billing.','category'=>'python','tech_stack'=>['Python','HTML','CSS','JS','PHP']],
                    ['title'=>'Gold Shop Chatbot','img'=>'goldshop.jpeg','desc'=>'Python + HTML/CSS/JS/PHP interactive chatbot.','category'=>'python','tech_stack'=>['Python','HTML','CSS','JS','PHP']],
                    ['title'=>'Employee Login System','img'=>'employeelogin.png','desc'=>'Python + HTML/CSS/JS/PHP secure login and dashboard.','category'=>'python','tech_stack'=>['Python','HTML','CSS','JS','PHP']],
                    ['title'=>'Portfolio','img'=>'portfolio.jpeg','desc'=>'Laravel-based portfolio site.','category'=>'laravel','tech_stack'=>['Laravel']],
                    ['title'=>'Harati System','img'=>'haratisystem.jpeg','desc'=>'Laravel-based inventory and billing system.','category'=>'laravel','tech_stack'=>['Laravel']],
                ])->map(function($p) {
                    return (object)[
                        'title' => $p['title'],
                        'image_path' => 'img/project/'.$p['img'],
                        'description' => $p['desc'],
                        'category' => $p['category'],
                        'tech_stack' => $p['tech_stack']
                    ];
                });
            }
        @endphp

        @foreach($displayProjects as $project)
        <div class="col-lg-6 col-md-12 project-item" data-category="{{ $project->category }}">
            <div class="project-card shadow-lg d-flex flex-column h-100">
                <div class="card-img position-relative flex-shrink-0">
                    <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" class="img-fluid">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <button class="btn btn-light btn-lg open-modal" 
                            data-title="{{ $project->title }}" 
                            data-desc="{{ $project->description }}" 
                            data-img="{{ asset($project->image_path) }}">
                            <i class="bi bi-eye me-2"></i>View Details
                        </button>
                    </div>
                </div>
                <div class="card-body flex-grow-1 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold">{{ $project->title }}</h4>
                        <p class="small mb-3">{{ $project->description }}</p>
                    </div>
                    <div class="tech-badges">
                        @foreach($project->tech_stack ?? [] as $tech)
                            <span class="badge bg-primary me-1 mb-1">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Project Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Project Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img src="" id="modalImg" class="img-fluid rounded mb-3" alt="Project Image">
        <p id="modalDesc"></p>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
/* Project Cards */
.project-card {
    border-radius: 20px;
    overflow: hidden;
    background: rgba(255,255,255,0.95);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
}
.project-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
}

/* Image Container */
.card-img {
    position: relative;
    width: 100%;
    height: 250px; /* Fixed height for all images */
    overflow: hidden;
}
.card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Makes image fully cover the box */
    display: block;
}

/* Image Overlay */
.overlay {
    position: absolute;
    top:0; left:0; width:100%; height:100%;
    background: rgba(0,0,0,0.65);
    color:#fff; display:flex; justify-content:center; align-items:center;
    opacity:0; transition: opacity 0.3s ease;
}
.card-img:hover .overlay { opacity:1; }
.overlay button { font-size: 1.1rem; padding: 0.6rem 1rem; }

/* Tech Badges */
.tech-badges { margin-top: 10px; display:flex; flex-wrap: wrap; justify-content-start; }
.tech-badges .badge { font-size:0.75rem; margin-right:4px; margin-bottom:3px; }

/* Fade-in animation */
.project-item { opacity:0; transform: translateY(30px); transition: all 0.6s ease; }
.project-item.show { opacity:1; transform: translateY(0); }

/* Responsive adjustments */
@media(max-width:992px){ .col-lg-6{ flex:0 0 100%; max-width:100%; } }
@media(max-width:576px){ .overlay button{ font-size:0.9rem; padding:0.5rem 0.8rem; } }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){

    const projectItems = document.querySelectorAll('.project-item');
    setTimeout(()=>projectItems.forEach(item=>item.classList.add('show')),100);

    // Filter
    const filterBtns = document.querySelectorAll('.filter-btn');
    filterBtns.forEach(btn=>{
        btn.addEventListener('click', function(){
            filterBtns.forEach(b=>b.classList.remove('active'));
            this.classList.add('active');
            const filter=this.dataset.filter;
            projectItems.forEach(item=>{
                item.classList.remove('show');
                setTimeout(()=>{
                    if(filter==='all'||item.dataset.category===filter){
                        item.style.display='block';
                        setTimeout(()=>item.classList.add('show'),50);
                    } else {
                        item.style.display='none';
                    }
                },100);
            });
        });
    });

    // Modal
    const modal = new bootstrap.Modal(document.getElementById('projectModal'));
    document.querySelectorAll('.open-modal').forEach(btn=>{
        btn.addEventListener('click', function(){
            document.getElementById('modalTitle').innerText = this.dataset.title;
            document.getElementById('modalDesc').innerText = this.dataset.desc;
            document.getElementById('modalImg').src = this.dataset.img;
            modal.show();
        });
    });

});
</script>
@endpush