<nav class="navbar navbar-expand-lg">
    <div class="container position-relative">
        <a class="navbar-brand fw-bold position-relative" style="z-index: 10; top: 10px;" href="{{ route('frontend.home') }}">
            <img src="{{ asset('img/sushmalogo.png') }}" width="50" class="me-2"> Sushma Thapa
        </a>
        <button class="navbar-toggler position-relative" style="z-index: 10; top: 10px;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse position-relative" style="z-index: 10; top: 10px;" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.projects') }}">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.gallery') }}">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.contact') }}">Contact</a></li>

                <!-- Dark Mode Button -->
                <li class="nav-item ms-3">
                    <button id="darkModeBtn" class="btn btn-outline-light btn-sm">Dark Mode</button>
                </li>

                <!-- Admin Login Button -->
                <li class="nav-item ms-3">
                    <a href="{{ route('auth.login') }}" class="btn btn-outline-light btn-sm">Admin Login</a>
                </li>
            </ul>

        </div>
        <!-- Glitter stars overlay -->
        <div class="stars"></div>
    </div>

    <style>
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1050;
            height: 150px; /* smaller */
            background: #9a81e4ff; /* soft purple */
            overflow: hidden;
            transition: background 0.3s, box-shadow 0.3s;
        }

        .navbar.scrolled {
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: color 0.3s, transform 0.3s;
        }

        .nav-link:hover {
            color: #e0c0ff !important;
            transform: translateY(-2px);
        }

        .nav-link.active {
            color: #5d3ea8 !important;
            font-weight: 600;
        }

        /* Glitter stars behind text */
        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 200%;
            height: 200%;
            pointer-events: none;
            overflow: visible;
            z-index: 1; /* behind navbar content */
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 0 5px #fff, 0 0 10px #fff;
            animation: twinkle 3s infinite ease-in-out;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(2); }
        }

        /* Mouse parallax */
        .stars {
            transform: translate3d(0,0,0);
        }

        /* Dark Mode */
        .dark-mode .navbar { background: #442f70 !important; }
        .dark-mode .nav-link { color: #e6d4ff !important; }
        .dark-mode .nav-link.active { color: #c8a2ff !important; }
        .dark-mode #darkModeBtn { border-color: #e6d4ff !important; color: #e6d4ff !important; }
    </style>
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