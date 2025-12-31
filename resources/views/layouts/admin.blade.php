<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sushma Thapa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 280px;
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --sidebar-bg: #1e1b4b;
            --body-bg: #f5f7fb;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--body-bg);
            color: #1e293b;
            overflow-x: hidden;
        }
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--sidebar-bg);
            color: white;
            transition: var(--transition);
            z-index: 1000;
            border-right: 1px solid rgba(255,255,255,0.05);
        }
        #content {
            margin-left: var(--sidebar-width);
            padding: 2.5rem;
            min-height: 100vh;
            transition: var(--transition);
        }
        .sidebar-brand {
            padding: 2.5rem 2rem;
            background: rgba(255,255,255,0.02);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .nav-link {
            color: rgba(255,255,255,0.6);
            padding: 1rem 2rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 4px solid transparent;
            transition: var(--transition);
        }
        .nav-link:hover {
            color: white;
            background: rgba(255,255,255,0.05);
        }
        .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
            border-left-color: #a855f7;
        }
        .nav-link i {
            font-size: 1.25rem;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            background: white;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .navbar-top {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            padding: 1.25rem 2.5rem;
            border-radius: 20px;
            border: 1px solid rgba(0,0,0,0.05);
            margin-bottom: 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 4px 14px 0 rgba(99, 102, 241, 0.39);
        }
        .btn-primary:hover {
            transform: scale(1.02);
            background: var(--primary-gradient);
            opacity: 0.9;
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        @media (max-width: 992px) {
            #sidebar { left: calc(-1 * var(--sidebar-width)); }
            #content { margin-left: 0; padding: 1.5rem; }
            #sidebar.active { left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

    <div id="sidebar">
        <div class="sidebar-brand text-center">
            <h4 class="fw-bold mb-0 text-white">Sushma<span class="text-purple-accent">Admin</span></h4>
            <small class="text-white-50">Portfolio Manager</small>
        </div>
        <nav class="nav flex-column mt-3">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('admin.home.edit') }}" class="nav-link {{ request()->is('admin/home*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i> Home Page
            </a>
            <a href="{{ route('admin.about.edit') }}" class="nav-link {{ request()->is('admin/about*') ? 'active' : '' }}">
                <i class="bi bi-person"></i> About Page
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->is('admin/gallery*') ? 'active' : '' }}">
                <i class="bi bi-images"></i> Gallery
            </a>
            <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->is('admin/projects*') ? 'active' : '' }}">
                <i class="bi bi-briefcase"></i> Projects
            </a>
            <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->is('admin/messages*') ? 'active' : '' }}">
                <i class="bi bi-chat-dots"></i> Messages
            </a>
            <a href="{{ route('admin.chats.index') }}" class="nav-link {{ request()->is('admin/chats*') ? 'active' : '' }}">
                <i class="bi bi-chat-left-text"></i> Chats
            </a>
            <div class="mt-auto">
                <a href="{{ route('logout') }}" class="nav-link text-white-50">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </a>
            </div>
        </nav>
    </div>

    <div id="content">
        <div class="navbar-top">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h5 class="mb-0 fw-bold d-none d-sm-block">@yield('page_title', 'Dashboard')</h5>
            </div>
            <div class="d-flex align-items-center">
                <span class="me-3 text-muted small d-none d-md-inline">Welcome, {{ session('admin_username') }}</span>
                <a href="{{ route('frontend.home') }}" target="_blank" class="btn btn-sm btn-outline-primary border-2 px-3">View Site</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
    @stack('scripts')
</body>
</html>
