<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sushma Thapa Portfolio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    @stack('styles')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
            transition: background 0.3s, color 0.3s;
        }
        .dark-mode {
            background: #1b1326 !important;
            color: #e6d4ff !important;
        }
        .dark-mode a, .dark-mode .nav-link {
            color: #e6d4ff !important;
        }
        .dark-mode footer {
            background: rgba(50, 40, 70, 0.85) !important;
        }

        /* Chatbox Styles */
        #chat-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }
        #chat-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #6a1b9a;
            color: white;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        #chat-button:hover {
            transform: scale(1.1);
        }
        #chat-window {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 350px;
            height: 500px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            display: none;
            flex-direction: column;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            overflow: hidden;
        }
        .dark-mode #chat-window {
            background: rgba(30, 20, 50, 0.85);
            border-color: rgba(255,255,255,0.1);
            color: #e6d4ff;
        }
        #chat-header {
            padding: 15px;
            background: #6a1b9a;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .message {
            max-width: 80%;
            padding: 8px 15px;
            border-radius: 15px;
            font-size: 14px;
        }
        .message.user {
            align-self: flex-end;
            background: #6a1b9a;
            color: white;
            border-bottom-right-radius: 2px;
        }
        .message.admin {
            align-self: flex-start;
            background: #e9ecef;
            color: #333;
            border-bottom-left-radius: 2px;
        }
        .dark-mode .message.admin {
            background: #3d2b55;
            color: #e6d4ff;
        }
        #chat-input-area {
            padding: 15px;
            border-top: 1px solid rgba(0,0,0,0.1);
            display: flex;
            gap: 10px;
        }
        .dark-mode #chat-input-area {
            border-color: rgba(255,255,255,0.1);
        }
        #chat-input {
            flex: 1;
            border: none;
            background: transparent;
            outline: none;
        }
        .dark-mode #chat-input {
            color: white;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    @include('partials.nav')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Chat Widget -->
    <div id="chat-widget">
        <button id="chat-button">
            <i class="bi bi-chat-dots-fill"></i>
        </button>
        <div id="chat-window">
            <div id="chat-header">
                <span class="fw-bold">Chat with me</span>
                <button class="btn btn-sm text-white" onclick="toggleChat()"><i class="bi bi-x-lg"></i></button>
            </div>
            <div id="chat-messages">
                <!-- Messages will appear here -->
            </div>
            <div id="chat-input-area">
                <input type="text" id="chat-input" placeholder="Type a message..." onkeypress="if(event.key === 'Enter') sendMessage()">
                <button class="btn btn-link p-0 text-purple" onclick="sendMessage()"><i class="bi bi-send-fill"></i></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Dark Mode Toggle
        const darkModeBtn = document.getElementById('darkModeBtn');
        if(darkModeBtn){
            // Load saved preference
            if(localStorage.getItem('darkMode') === 'true'){
                document.body.classList.add('dark-mode');
                darkModeBtn.innerText = 'Light Mode';
            } else {
                darkModeBtn.innerText = 'Dark Mode';
            }

            // Toggle on click
            darkModeBtn.addEventListener('click', () => {
                document.body.classList.toggle('dark-mode');
                darkModeBtn.innerText = document.body.classList.contains('dark-mode') ? 'Light Mode' : 'Dark Mode';
                localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
            });
        }

        // Navbar scroll effect & active link
        const navbar = document.querySelector('.navbar');
        const navLinks = document.querySelectorAll('.nav-link');
        window.addEventListener('scroll', () => {
            if(navbar){
                if(window.scrollY > 50) navbar.classList.add('scrolled');
                else navbar.classList.remove('scrolled');
            }

            const fromTop = window.scrollY + 100;
            navLinks.forEach(link => {
                const section = document.querySelector(link.getAttribute('href'));
                if(section && section.offsetTop <= fromTop && section.offsetTop + section.offsetHeight > fromTop){
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        });
    });

    // Chat Widget Logic
    const chatButton = document.getElementById('chat-button');
    const chatWindow = document.getElementById('chat-window');
    const chatMessages = document.getElementById('chat-messages');
    const chatInput = document.getElementById('chat-input');
    let chatInterval;

    function toggleChat() {
        if (chatWindow.style.display === 'flex') {
            chatWindow.style.display = 'none';
            clearInterval(chatInterval);
        } else {
            chatWindow.style.display = 'flex';
            loadMessages();
            chatInterval = setInterval(loadMessages, 5000);
            setTimeout(() => {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 100);
        }
    }

    chatButton.addEventListener('click', toggleChat);

    async function loadMessages() {
        try {
            const response = await fetch('{{ route('chats.index') }}');
            const messages = await response.json();
            chatMessages.innerHTML = '';
            messages.forEach(msg => {
                const div = document.createElement('div');
                div.className = `message ${msg.is_admin ? 'admin' : 'user'}`;
                div.textContent = msg.message;
                chatMessages.appendChild(div);
            });
            // Scroll if needed (simple check)
            if (chatMessages.dataset.lastCount != messages.length) {
                chatMessages.scrollTop = chatMessages.scrollHeight;
                chatMessages.dataset.lastCount = messages.length;
            }
        } catch (error) {
            console.error('Error loading messages:', error);
        }
    }

    async function sendMessage() {
        const msg = chatInput.value.trim();
        if (!msg) return;

        chatInput.value = '';
        try {
            const response = await fetch('{{ route('chats.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: msg })
            });
            if (response.ok) {
                loadMessages();
            }
        } catch (error) {
            console.error('Error sending message:', error);
        }
    }
    </script>
</body>
</html>