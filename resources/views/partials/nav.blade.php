<nav class="navbar navbar-expand-lg">
    <div class="container position-relative">
        <a class="navbar-brand fw-bold position-relative ps-3" href="{{ route('frontend.home') }}">
            <img src="{{ asset('img/sushmalogo.png') }}" width="50" class="me-2"> Sushma Thapa
        </a>
        <button class="navbar-toggler position-relative me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.projects') }}">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.gallery') }}">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.contact') }}">Contact</a></li>

                <!-- Dark Mode Button -->
                <li class="nav-item">
                    <button id="darkModeBtn" class="nav-link bg-transparent border-0">Dark Mode</button>
                </li>
            </ul>

        </div>
        <!-- Glitter stars overlay -->
        <div class="stars"></div>
    </div>
</nav>

<script>
    const starsContainer = document.querySelector('.stars');

    // Create 100 stars
    for(let i=0;i<100;i++){
        const star = document.createElement('div');
        star.classList.add('star');
        star.style.top = Math.random()*100 + '%';
        star.style.left = Math.random()*100 + '%';
        const size = Math.random() * 2 + 1; // 1px to 3px
        star.style.width = star.style.height = size + 'px';
        star.style.animationDuration = (Math.random()*3+2)+'s';
        starsContainer.appendChild(star);
    }

    // Mouse parallax
    document.addEventListener('mousemove', e=>{
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        starsContainer.style.transform = `translate(${x*30}px, ${y*30}px)`; 
    });
</script>