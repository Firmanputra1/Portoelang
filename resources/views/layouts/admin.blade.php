<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - ElangDesign')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.add('light-mode');
        }
    </script>

    <style>
        /* ===== RESET & VARIABLES ===== */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #a5b4fc;
            --accent: #f59e0b;
            --accent-dark: #d97706;
            --bg-dark: #0a0a0f;
            --bg-card: #13131a;
            --bg-card2: #1a1a24;
            --border: rgba(255,255,255,0.08);
            --border-light: rgba(255,255,255,0.12);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --gradient: linear-gradient(135deg, #6366f1, #8b5cf6, #a78bfa);
            --shadow-glow: 0 0 60px rgba(99, 102, 241, 0.15);
            --shadow-card: 0 4px 24px rgba(0,0,0,0.4);
            --radius: 16px;
            --radius-sm: 8px;
            --radius-lg: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --particle-opacity: 0.3;
            --sidebar-width: 280px;
            --header-height: 70px;
            --nav-bg-scrolled: rgba(10, 10, 15, 0.8);
            --dropdown-bg: rgba(10, 10, 15, 0.95);
        }

        html.light-mode {
            --bg-dark: #f8fafc;
            --bg-card: #ffffff;
            --bg-card2: #f1f5f9;
            --border: rgba(0,0,0,0.08);
            --border-light: rgba(0,0,0,0.12);
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #64748b;
            --shadow-card: 0 4px 24px rgba(0,0,0,0.05);
            --shadow-glow: 0 0 60px rgba(99, 102, 241, 0.1);
            --particle-opacity: 0.4;
            --primary-light: #4f46e5;
            --nav-bg-scrolled: rgba(255, 255, 255, 0.8);
            --dropdown-bg: rgba(255, 255, 255, 0.95);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* ===== PARTICLES BACKGROUND ===== */
        #particles-canvas {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            pointer-events: none;
            z-index: 0;
            opacity: var(--particle-opacity);
        }

        /* ===== LAYOUT SYSTEM ===== */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        .admin-sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--bg-card);
            border-right: 1px solid var(--border);
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            padding: 24px;
            transition: var(--transition);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            margin-bottom: 40px;
        }

        .sidebar-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex-grow: 1;
            overflow-y: auto;
            margin-bottom: 24px;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-menu::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 4px;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 15px;
            transition: var(--transition);
        }

        .menu-item a:hover {
            background: rgba(99, 102, 241, 0.05);
            color: var(--primary-light);
        }

        .menu-item.active a {
            background: var(--gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(99,102,241,0.3);
        }

        .sidebar-footer {
            border-top: 1px solid var(--border);
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* ===== HEADER / TOPBAR ===== */
        .admin-header {
            position: fixed;
            top: 0; left: var(--sidebar-width);
            right: 0;
            height: var(--header-height);
            background: var(--nav-bg-scrolled);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            z-index: 99;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            transition: var(--transition);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 15px;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
        }

        .profile-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .profile-role {
            font-size: 11px;
            color: var(--text-muted);
        }

        /* ===== MAIN CONTENT CONTAINER ===== */
        .admin-main {
            margin-left: var(--sidebar-width);
            padding-top: var(--header-height);
            flex-grow: 1;
            min-height: 100vh;
            position: relative;
            z-index: 1;
            transition: var(--transition);
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }

        /* ===== SIDEBAR HAMBURGER TOGGLE ===== */
        .admin-hamburger {
            display: none;
            background: none;
            border: none;
            color: var(--text-primary);
            font-size: 24px;
            cursor: pointer;
            padding: 4px;
        }

        /* ===== MOBILE OVERLAYS ===== */
        .admin-overlay {
            position: fixed;
            inset: 0;
            background: rgba(10, 10, 15, 0.4);
            backdrop-filter: blur(4px);
            z-index: 98;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        /* ===== COMPONENTS FROM BASE VISUAL SYSTEM ===== */
        .section-badge {
            display: inline-block;
            background: rgba(99,102,241,0.1);
            border: 1px solid rgba(99,102,241,0.3);
            border-radius: 50px;
            padding: 6px 18px;
            font-size: 12px;
            font-weight: 600;
            color: var(--primary-light);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .gradient-text {
            background: linear-gradient(to right, var(--primary), #a855f7, var(--primary));
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 24px;
        }

        .service-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 32px;
            transition: var(--transition);
        }
        .service-card:hover {
            border-color: rgba(99,102,241,0.3);
            box-shadow: var(--shadow-glow);
            transform: translateY(-4px);
        }

        .service-icon {
            width: 48px; height: 48px;
            background: rgba(99,102,241,0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .service-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 18px;
            font-weight: 600;
            margin-top: 16px;
        }

        .service-desc {
            font-size: 13px;
            color: var(--text-secondary);
            margin-top: 8px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(99,102,241,0.3);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99,102,241,0.5);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            background: transparent;
            color: var(--text-primary);
            border: 1px solid var(--border-light);
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
        }
        .btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary-light);
            background: rgba(99,102,241,0.05);
        }

        /* ===== TABLE STYLING ===== */
        .admin-table-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            margin-top: 24px;
        }
        .admin-table-header {
            padding: 24px 32px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }
        .admin-table-wrapper {
            width: 100%;
            overflow-x: auto;
        }
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        .admin-table th {
            padding: 18px 32px;
            background: rgba(255,255,255,0.02);
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border);
        }
        html.light-mode .admin-table th {
            background: rgba(0,0,0,0.01);
        }
        .admin-table td {
            padding: 20px 32px;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
            color: var(--text-primary);
            vertical-align: middle;
        }
        .admin-table tr:last-child td {
            border-bottom: none;
        }
        .admin-table tr:hover td {
            background: rgba(255,255,255,0.01);
        }
        html.light-mode .admin-table tr:hover td {
            background: rgba(0,0,0,0.005);
        }

        /* ===== RESPONSIVE OVERRIDES ===== */
        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(calc(-1 * var(--sidebar-width)));
            }
            .admin-sidebar.open {
                transform: translateX(0);
            }
            .admin-header {
                left: 0;
                padding: 0 24px;
            }
            .admin-main {
                margin-left: 0;
            }
            .admin-hamburger {
                display: block;
            }
            .admin-container {
                padding: 24px;
            }
            .admin-overlay.show {
                opacity: 1;
                visibility: visible;
            }
            .services-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<!-- Particles Canvas -->
<canvas id="particles-canvas"></canvas>

<!-- Overlay for Mobile Sidebar -->
<div class="admin-overlay" id="adminOverlay"></div>

<div class="admin-wrapper">
    <!-- SIDEBAR -->
    <aside class="admin-sidebar" id="adminSidebar">
        <a href="{{ route('home') }}" class="sidebar-brand">
            <div class="logo-icon">E</div>
            <span class="logo-text">ElangDesign</span>
        </a>

        <ul class="sidebar-menu">
            @php
                $current = Route::currentRouteName();
            @endphp
            <li class="menu-item {{ str_contains($current, 'dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <span>📊</span> Dashboard
                </a>
            </li>
            <li class="menu-item {{ str_contains($current, 'services') ? 'active' : '' }}">
                <a href="{{ route('admin.services.index') }}">
                    <span>🔧</span> Layanan
                </a>
            </li>
            <li class="menu-item {{ str_contains($current, 'portfolios') ? 'active' : '' }}">
                <a href="{{ route('admin.portfolios.index') }}">
                    <span>🖼️</span> Portfolio
                </a>
            </li>
            <li class="menu-item {{ str_contains($current, 'packages') ? 'active' : '' }}">
                <a href="{{ route('admin.packages.index') }}">
                    <span>💰</span> Paket Harga
                </a>
            </li>
            <li class="menu-item {{ str_contains($current, 'testimonials') ? 'active' : '' }}">
                <a href="{{ route('admin.testimonials.index') }}">
                    <span>⭐</span> Testimoni
                </a>
            </li>
            <li class="menu-item {{ str_contains($current, 'faqs') ? 'active' : '' }}">
                <a href="{{ route('admin.faqs.index') }}">
                    <span>❓</span> FAQ
                </a>
            </li>
            <li class="menu-item {{ str_contains($current, 'clients') ? 'active' : '' }}">
                <a href="{{ route('admin.clients.index') }}">
                    <span>🤝</span> Klien
                </a>
            </li>
            <li class="menu-item {{ str_contains($current, 'settings') ? 'active' : '' }}">
                <a href="{{ route('admin.settings.index') }}">
                    <span>⚙️</span> Pengaturan
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <a href="{{ route('home') }}" class="btn-secondary" style="justify-content: center; font-size: 13px; padding: 10px 0; border-radius: 8px;">
                🏠 Lihat Website
            </a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();" class="btn-primary" style="justify-content: center; font-size: 13px; padding: 10px 0; border-radius: 8px; background: #ef4444; box-shadow: none;">
                🚪 Logout
            </a>
            <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </aside>

    <!-- MAIN VIEW WRAPPER -->
    <div class="admin-main">
        <!-- TOP HEADER -->
        <header class="admin-header">
            <div class="header-left">
                <button class="admin-hamburger" id="adminHamburger" aria-label="Toggle Sidebar">
                    ☰
                </button>
                <h1 style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 700; display: flex; align-items: center; gap: 8px;">
                    💻 Panel <span class="gradient-text">Administrasi</span>
                </h1>
            </div>

            <div class="header-right">
                <!-- Theme Toggle -->
                <button id="themeToggle" class="theme-toggle" aria-label="Toggle Theme" style="background: none; border: none; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--text-primary);">
                    <svg class="sun-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                    <svg class="moon-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </button>

                <!-- Profile Info -->
                <div class="admin-profile">
                    <div class="profile-avatar">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="profile-info desktop-only">
                        <span class="profile-name">{{ Auth::user()->name ?? 'Administrator' }}</span>
                        <span class="profile-role">Admin Owner</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTAINER YIELD -->
        <main class="admin-container">
            @yield('content')
        </main>
    </div>
</div>

<script>
    // ===== PARTICLES =====
    const canvas = document.getElementById('particles-canvas');
    const ctx = canvas.getContext('2d');
    let particles = [];

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    class Particle {
        constructor() {
            this.reset();
        }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2 + 0.5;
            this.speedX = (Math.random() - 0.5) * 0.25;
            this.speedY = (Math.random() - 0.5) * 0.25;
            this.opacity = Math.random() * 0.4 + 0.1;
            this.color = Math.random() > 0.5 ? '#6366f1' : '#a78bfa';
        }
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) {
                this.reset();
            }
        }
        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fillStyle = this.color;
            ctx.globalAlpha = this.opacity;
            ctx.fill();
        }
    }

    for (let i = 0; i < 60; i++) particles.push(new Particle());

    function animateParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => { p.update(); p.draw(); });
        ctx.globalAlpha = 1;
        requestAnimationFrame(animateParticles);
    }
    animateParticles();

    // ===== THEME TOGGLE =====
    const themeToggle = document.getElementById('themeToggle');
    if(themeToggle) {
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('light-mode');
            localStorage.setItem('theme', document.documentElement.classList.contains('light-mode') ? 'light' : 'dark');
        });
    }

    // ===== SIDEBAR HAMBURGER TOGGLE =====
    const adminHamburger = document.getElementById('adminHamburger');
    const adminSidebar = document.getElementById('adminSidebar');
    const adminOverlay = document.getElementById('adminOverlay');

    if(adminHamburger && adminSidebar) {
        adminHamburger.addEventListener('click', () => {
            adminSidebar.classList.toggle('open');
            if(adminOverlay) adminOverlay.classList.toggle('show');
        });
    }

    if(adminOverlay) {
        adminOverlay.addEventListener('click', () => {
            adminSidebar.classList.remove('open');
            adminOverlay.classList.remove('show');
        });
    }

    // ===== ANIMATIONS =====
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animated');
                }, 50);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.05, rootMargin: '0px 0px -20px 0px' });

    document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
</script>
@yield('scripts')
</body>
</html>
