<footer class="position-relative">
    <p style="position: relative; z-index: 10;">&copy; 2025 Sushma Thapa | All Rights Reserved</p>
    <div class="mt-2" style="position: relative; z-index: 10;">
        <a href="https://www.linkedin.com/in/sushma-thapa-015574275" target="_blank"><i class="bi bi-linkedin"></i></a>
        <a href="https://github.com/Sushma0203" target="_blank"><i class="bi bi-github"></i></a>
        <a href="mailto:sushmat952@email.com"><i class="bi bi-envelope-fill"></i></a>
    </div>

    <!-- Glitter stars overlay -->
    <div class="footer-stars"></div>

    <style>
        footer {
            background: rgba(200, 162, 255, 0.8);
            backdrop-filter: blur(10px);
            text-align: center;
            padding: 25px 0;
            margin-top: 50px;
            transition: background 0.3s, color 0.3s;
            overflow: hidden;
        }

        footer a {
            margin: 0 8px;
            font-size: 1.2rem;
            color: white;
            transition: color 0.3s, transform 0.3s;
        }

        footer a:hover {
            color: #5d3ea8;
            transform: translateY(-3px);
        }

        /* Glitter stars behind footer content */
        .footer-stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 200%;
            height: 200%;
            pointer-events: none;
            overflow: visible;
            z-index: 1;
        }

        .footer-star {
            position: absolute;
            width: 2px;
            height: 2px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 0 4px #fff, 0 0 8px #fff;
            animation: twinkle 3s infinite ease-in-out, colorShift 4s infinite alternate;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(2); }
        }

        @keyframes colorShift {
            0% { background: #ff6ec7; box-shadow: 0 0 4px #ff6ec7, 0 0 8px #ff6ec7; }
            25% { background: #ffd700; box-shadow: 0 0 4px #ffd700, 0 0 8px #ffd700; }
            50% { background: #7fff00; box-shadow: 0 0 4px #7fff00, 0 0 8px #7fff00; }
            75% { background: #00ffff; box-shadow: 0 0 4px #00ffff, 0 0 8px #00ffff; }
            100% { background: #ff6ec7; box-shadow: 0 0 4px #ff6ec7, 0 0 8px #ff6ec7; }
        }

        /* Dark Mode Footer */
        .dark-mode footer {
            background: rgba(50, 40, 70, 0.85) !important;
        }
        .dark-mode footer a {
            color: #e6d4ff !important;
        }
        .dark-mode footer a:hover {
            color: #c8a2ff !important;
        }
    </style>
</footer>

<script>
    const footerStarsContainer = document.querySelector('.footer-stars');

    // Create 80 colorful stars for footer
    for(let i=0;i<80;i++){
        const star = document.createElement('div');
        star.classList.add('footer-star');
        star.style.top = Math.random()*100 + '%';
        star.style.left = Math.random()*100 + '%';
        const size = Math.random() * 3 + 1; // 1px to 4px
        star.style.width = star.style.height = size + 'px';
        star.style.animationDuration = (Math.random()*3+2)+'s, '+(Math.random()*4+2)+'s';
        footerStarsContainer.appendChild(star);
    }

    // Optional: slight parallax on mouse move
    document.addEventListener('mousemove', e=>{
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        footerStarsContainer.style.transform = `translate(${x*20}px, ${y*20}px)`;
    });
</script>