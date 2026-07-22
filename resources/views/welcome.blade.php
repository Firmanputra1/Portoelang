<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ElangDesign - Jasa desain grafis profesional: logo, brosur, company profile, dan website. Hasil premium, harga terjangkau.">
    <title>ElangDesign - Jasa Desain Grafis </title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    
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
            transition: background-color 0.4s ease-out, background 0.4s ease-out, color 0.4s ease-out, border-color 0.4s ease-out, fill 0.4s ease-out;
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
            --gradient-gold: linear-gradient(135deg, #f59e0b, #f97316);
            --shadow-glow: 0 0 60px rgba(99, 102, 241, 0.2);
            --shadow-card: 0 4px 24px rgba(0,0,0,0.4);
            --radius: 16px;
            --radius-sm: 8px;
            --radius-lg: 24px;
            --transition: all 0.4s ease;
            --nav-bg: transparent;
            --nav-bg-scrolled: rgba(10, 10, 15, 0.9);
            --dropdown-bg: rgba(10, 10, 15, 0.95);
            --overlay-bg: rgba(10, 10, 15, 0.2);
            --particle-opacity: 0.4;
            --portfolio-img-bg: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
            --package-popular-bg: linear-gradient(135deg, #13131a, #1a1a30);
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
            --nav-bg-scrolled: rgba(255, 255, 255, 0.9);
            --dropdown-bg: rgba(255, 255, 255, 0.95);
            --overlay-bg: rgba(255, 255, 255, 0.2);
            --shadow-card: 0 4px 24px rgba(0,0,0,0.05);
            --shadow-glow: 0 0 60px rgba(99, 102, 241, 0.15);
            --particle-opacity: 0.6;
            --primary-light: #4f46e5;
            --portfolio-img-bg: linear-gradient(135deg, #f1f5f9, #e2e8f0, #cbd5e1);
            --package-popular-bg: linear-gradient(135deg, #eef2ff, #e0e7ff);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            overflow-x: hidden;
            line-height: 1.6;
            transition: background-color 0.4s ease, background 0.4s ease, color 0.4s ease;
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-dark); }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 3px; }

        /* ===== PARTICLES BACKGROUND ===== */
        #particles-canvas {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            pointer-events: none;
            z-index: 0;
            opacity: var(--particle-opacity);
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 16px 0;
            transition: var(--transition);
        }

        .navbar.scrolled {
            background: var(--nav-bg-scrolled);
            backdrop-filter: blur(20px);
            padding: 12px 0;
            /* box-shadow: 0 10px 30px -10px rgba(99,102,241,0.1); */
        }
        
        .navbar::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 1px;
            background: var(--gradient);
            transform: scaleX(0);
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
            box-shadow: 0 1px 6px rgba(99,102,241,0.4);
        }

        .navbar.scrolled::after {
            transform: scaleX(1);
        }

        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 4px;
            text-decoration: none;
            margin-left: 16px;
        }

        .logo-icon {
            width: 40px; height: 40px;
            background: var(--gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 800;
            color: white;
            box-shadow: 0 4px 20px rgba(99,102,241,0.4);
        }

        .logo-text {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 700;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: var(--transition);
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0; right: 0;
            height: 2px;
            background: var(--gradient);
            transform: scaleX(0);
            transition: var(--transition);
            border-radius: 2px;
        }

        .nav-links a:hover {
            color: var(--text-primary);
        }

        .nav-links a:hover::after { transform: scaleX(1); }

        .nav-links .btn-nav::after { display: none; }
        .nav-links a.btn-nav { color: white !important; }

        .desktop-only { display: inline-flex; }
        .mobile-only { display: none; }

        .btn-nav {
            padding: 10px 24px;
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 4px 20px rgba(99,102,241,0.4);
        }
        
        .theme-toggle {
            background: none;
            border: none;
            color: var(--text-primary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: var(--transition);
        }
        .theme-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        html.light-mode .theme-toggle:hover {
            background: rgba(0, 0, 0, 0.05);
        }
        .theme-toggle .moon-icon { display: none; }
        html.light-mode .theme-toggle .sun-icon { display: none; }
        html.light-mode .theme-toggle .moon-icon { display: block; }

        .btn-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99,102,241,0.6);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            background: none;
            border: none;
            padding: 8px;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            transition: background 0.3s ease;
            z-index: 1100;
        }

        .hamburger:hover { background: rgba(99,102,241,0.1); }

        /* Ripple saat klik */
        .hamburger::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 10px;
            background: rgba(99,102,241,0.25);
            transform: scale(0);
            opacity: 1;
            transition: transform 0.4s ease, opacity 0.4s ease;
        }
        .hamburger.ripple::after { transform: scale(1); opacity: 0; }

        .hamburger span {
            display: block;
            height: 2px;
            background: var(--text-primary);
            border-radius: 2px;
            transform-origin: center;
            transition:
                transform  0.4s cubic-bezier(0.4, 0, 0.2, 1),
                opacity    0.25s ease,
                width      0.3s  ease,
                background 0.3s  ease;
        }
        .hamburger span:nth-child(1) { width: 22px; }
        .hamburger span:nth-child(2) { width: 15px; }
        .hamburger span:nth-child(3) { width: 22px; }

        .hamburger:hover span { background: var(--primary-light); }
        .hamburger:hover span:nth-child(2) { width: 22px; }

        /* Pop saat toggle */
        .hamburger.active {
            position: fixed;
            top: 16px;
            right: 24px;
            z-index: 1100;
            background: rgba(99,102,241,0.12);
            animation: hamPop 0.35s cubic-bezier(0.34,1.56,0.64,1) both;
        }
        @keyframes hamPop {
            0%   { transform: scale(1); }
            40%  { transform: scale(1.18); }
            100% { transform: scale(1); }
        }

        /* Morph ke X */
        .hamburger.active span               { background: var(--primary-light); }
        .hamburger.active span:nth-child(1)  { width: 22px; transform: translateY(7px) rotate(45deg); }
        .hamburger.active span:nth-child(2)  { opacity: 0;  transform: scaleX(0); }
        .hamburger.active span:nth-child(3)  { width: 22px; transform: translateY(-7px) rotate(-45deg); }

        /* ===== HERO ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 120px 24px 24px;
            position: relative;
            z-index: 1;
        }

        .hero-content {
            max-width: 900px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(99,102,241,0.1);
            border: 1px solid rgba(99,102,241,0.3);
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 13px;
            font-weight: 600;
            color: var(--primary-light);
            margin-bottom: 32px;
            animation: fadeInUp 0.6s ease both;
        }

        .hero-badge .dot {
            width: 8px; height: 8px;
            background: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 8px #22c55e;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .hero h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(42px, 7vw, 88px);
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 24px;
            animation: fadeInUp 0.6s 0.1s ease both;
        }

        .hero h1 .gradient-text {
            background: linear-gradient(to right, var(--primary), #a855f7, var(--primary));
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: textShine 4s linear infinite;
        }

        @keyframes textShine {
            to { background-position: 200% center; }
        }

        .hero p {
            font-size: clamp(16px, 2.5vw, 20px);
            color: var(--text-secondary);
            margin-bottom: 40px;
            max-width: 650px;
            margin-left: auto;
            margin-right: auto;
            animation: fadeInUp 0.6s 0.2s ease both;
        }

        .hero-cta {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.6s 0.3s ease both;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 16px 36px;
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 8px 30px rgba(99,102,241,0.5);
        }

        .btn-primary svg {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 40px rgba(99,102,241,0.7);
        }
        
        .btn-primary:hover svg {
            transform: translateX(4px);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 16px 36px;
            background: transparent;
            color: var(--text-primary);
            border: 1px solid var(--border-light);
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
        }

        .btn-secondary svg {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary-light);
            background: rgba(99,102,241,0.05);
            transform: translateY(-2px);
        }
        
        .btn-secondary:hover svg {
            transform: scale(1.1) rotate(5deg);
        }

        .hero-stats {
            display: flex;
            gap: 48px;
            justify-content: center;
            margin-top: 64px;
            flex-wrap: wrap;
            animation: fadeInUp 0.6s 0.4s ease both;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 36px;
            font-weight: 700;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* ===== SCROLL INDICATOR ===== */
        .scroll-indicator {
            margin-top: 64px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            animation: bounce 2s infinite;
        }

        .scroll-indicator span {
            font-size: 12px;
            color: var(--text-muted);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .scroll-indicator svg {
            color: var(--text-muted);
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(8px); }
        }

        /* ===== SECTION BASE ===== */
        section {
            position: relative;
            z-index: 1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 64px;
        }

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
            margin-bottom: 16px;
        }

        .section-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 700;
            margin-bottom: 16px;
            color: var(--text-primary);
        }

        .section-title .gradient-text {
            background: linear-gradient(to right, var(--primary), #a855f7, var(--primary));
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: textShine 4s linear infinite;
        }

        .section-desc {
            font-size: 17px;
            color: var(--text-secondary);
            max-width: 580px;
            margin: 0 auto;
        }

        /* ===== SERVICES ===== */
        .services {
            padding: 24px 0 100px 0;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 24px;
        }

        .service-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 32px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: var(--gradient);
            transform: scaleX(0);
            transition: var(--transition);
            transform-origin: left;
        }

        .service-card:hover {
            border-color: rgba(99,102,241,0.4);
            transform: translateY(-6px);
            box-shadow: var(--shadow-glow);
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-icon {
            width: 56px; height: 56px;
            background: rgba(99,102,241,0.1);
            border: 1px solid rgba(99,102,241,0.2);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 24px;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .service-card:hover .service-icon {
            background: rgba(99,102,241,0.2);
            box-shadow: 0 0 20px rgba(99,102,241,0.3);
            transform: scale(1.1) rotate(5deg) translateY(-4px);
        }

        .service-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-primary);
        }

        .service-desc {
            font-size: 14px;
            color: var(--text-secondary);
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .service-price {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 20px;
        }

        .service-price strong {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 22px;
            color: var(--accent);
            font-weight: 700;
        }

        .service-features {
            list-style: none;
            margin-bottom: 24px;
        }

        .service-features li {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .service-features li::before {
            content: '✓';
            color: #22c55e;
            font-weight: 700;
            font-size: 12px;
        }

        .btn-service {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: rgba(99,102,241,0.1);
            border: 1px solid rgba(99,102,241,0.3);
            color: var(--primary-light);
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            width: 100%;
            justify-content: center;
        }

        .btn-service:hover {
            background: var(--gradient);
            border-color: transparent;
            color: white;
        }

        /* ===== PORTFOLIO ===== */
        .portfolio {
            padding: 24px 0 100px 0;
            background: rgba(99,102,241,0.02);
        }

        .portfolio-filter {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 48px;
        }

        .filter-btn {
            padding: 8px 20px;
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 50px;
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-btn.active, .filter-btn:hover {
            background: var(--gradient);
            border-color: transparent;
            color: white;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }

        .portfolio-item {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            transition: var(--transition);
            cursor: pointer;
        }

        .portfolio-item:hover {
            border-color: rgba(99,102,241,0.4);
            transform: translateY(-4px);
            box-shadow: var(--shadow-card);
        }

        .portfolio-img {
            width: 100%;
            height: 220px;
            background: var(--portfolio-img-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .portfolio-item:hover .portfolio-img {
            transform: scale(1.05);
        }

        .portfolio-placeholder {
            font-size: 48px;
            opacity: 0.3;
        }

        .portfolio-overlay {
            position: absolute;
            inset: 0;
            background: rgba(99,102,241,0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-overlay-text {
            color: white;
            font-weight: 600;
            font-size: 15px;
        }

        .portfolio-info {
            padding: 20px;
        }

        .portfolio-category {
            display: inline-block;
            background: rgba(99,102,241,0.1);
            color: var(--primary-light);
            font-size: 11px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 50px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .portfolio-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 6px;
            color: var(--text-primary);
        }

        .portfolio-desc {
            font-size: 13px;
            color: var(--text-secondary);
        }

        /* ===== PACKAGES ===== */
        .packages {
            padding: 24px 0 100px 0;
        }

        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .package-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 36px 32px;
            position: relative;
            transition: var(--transition);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .package-card.popular {
            border-color: rgba(99,102,241,0.5);
            background: var(--package-popular-bg);
        }

        .package-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-glow);
        }

        .popular-badge {
            position: absolute;
            top: 20px; right: 20px;
            background: var(--gradient);
            color: white;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 14px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .package-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 6px;
            color: var(--text-primary);
        }

        .package-subtitle {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 28px;
        }

        .package-price {
            margin-bottom: 28px;
        }

        .price-label {
            font-size: 13px;
            color: var(--text-muted);
        }

        .price-amount {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 40px;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.2;
        }

        .price-amount span {
            font-size: 18px;
            font-weight: 500;
            color: var(--text-secondary);
        }

        .package-divider {
            height: 1px;
            background: var(--border);
            margin: 24px 0;
        }

        .package-features {
            list-style: none;
            margin-bottom: 32px;
        }

        .package-features li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 14px;
            color: var(--text-secondary);
            margin-bottom: 12px;
        }

        .package-features .check {
            color: #22c55e;
            font-size: 16px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .btn-package {
            display: block;
            width: 100%;
            padding: 16px;
            text-align: center;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
            margin-top: auto;
        }

        .btn-package.primary {
            background: var(--gradient);
            color: white;
            border: none;
            box-shadow: 0 4px 20px rgba(99,102,241,0.4);
        }

        .btn-package.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99,102,241,0.6);
        }

        .btn-package.outline {
            background: transparent;
            color: var(--text-primary);
            border: 1px solid var(--border-light);
        }

        .btn-package.outline:hover {
            border-color: var(--primary);
            color: var(--primary-light);
            background: rgba(99,102,241,0.05);
        }

        /* ===== TESTIMONIALS ===== */
        .testimonials {
            padding: 24px 0 100px 0;
            background: rgba(99,102,241,0.02);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }

        .testimonial-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 28px;
            transition: var(--transition);
        }

        .testimonial-card:hover {
            border-color: rgba(99,102,241,0.3);
            transform: translateY(-4px);
        }

        .testimonial-stars {
            display: flex;
            gap: 4px;
            margin-bottom: 16px;
        }

        .star {
            color: var(--accent);
            font-size: 16px;
        }

        .testimonial-text {
            font-size: 15px;
            color: var(--text-secondary);
            line-height: 1.75;
            margin-bottom: 24px;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .author-avatar {
            width: 48px; height: 48px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            color: white;
            flex-shrink: 0;
        }

        .author-name {
            font-weight: 600;
            font-size: 15px;
            color: var(--text-primary);
        }

        .author-position {
            font-size: 12px;
            color: var(--text-muted);
        }

        /* ===== FAQ ===== */
        .faq {
            padding: 24px 0 100px 0;
        }

        .faq-list {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            margin-bottom: 12px;
            overflow: hidden;
            transition: var(--transition);
        }

        .faq-item:hover {
            border-color: rgba(99,102,241,0.3);
        }

        .faq-question {
            padding: 24px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            font-weight: 600;
            font-size: 16px;
            color: var(--text-primary);
            gap: 16px;
            user-select: none;
        }

        .faq-icon {
            width: 32px; height: 32px;
            background: rgba(99,102,241,0.1);
            border: 1px solid rgba(99,102,241,0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: var(--transition);
            font-size: 18px;
            color: var(--primary-light);
        }

        .faq-item.open .faq-icon {
            background: var(--gradient);
            border-color: transparent;
            color: white;
            transform: rotate(45deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.3s ease;
        }

        .faq-item.open .faq-answer {
            max-height: 300px;
        }

        .faq-answer-inner {
            padding: 0 28px 24px;
            font-size: 15px;
            color: var(--text-secondary);
            line-height: 1.75;
        }

        /* ===== CTA SECTION ===== */
        .cta-section {
            padding: 24px 24px 100px 24px;
            text-align: center;
        }

        .cta-box {
            max-width: 800px;
            margin: 0 auto;
            background: linear-gradient(135deg, rgba(99,102,241,0.15), rgba(139,92,246,0.1));
            border: 1px solid rgba(99,102,241,0.3);
            border-radius: 32px;
            padding: 64px 48px;
            position: relative;
            overflow: hidden;
        }

        .cta-box::before {
            content: '';
            position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(circle, rgba(99,102,241,0.1) 0%, transparent 60%);
        }

        .cta-box h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 700;
            margin-bottom: 16px;
            position: relative;
        }

        .cta-box p {
            font-size: 17px;
            color: var(--text-secondary);
            margin-bottom: 40px;
            position: relative;
        }

        .cta-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            position: relative;
        }

        .btn-whatsapp {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 36px;
            background: #22c55e;
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 8px 30px rgba(34,197,94,0.4);
        }

        .btn-whatsapp:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 40px rgba(34,197,94,0.6);
            background: #16a34a;
        }

        /* ===== FOOTER ===== */
        footer {
            background: var(--bg-card);
            border-top: 1px solid var(--border);
            padding: 60px 24px 32px;
            position: relative;
            z-index: 1;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 48px;
        }

        .footer-brand p {
            font-size: 14px;
            color: var(--text-muted);
            margin-top: 16px;
            line-height: 1.7;
            max-width: 300px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .social-btn {
            width: 40px; height: 40px;
            background: rgba(99,102,241,0.1);
            border: 1px solid rgba(99,102,241,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-light);
            text-decoration: none;
            font-size: 16px;
            transition: var(--transition);
        }

        .social-btn:hover {
            background: var(--gradient);
            border-color: transparent;
            color: white;
        }

        .footer-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 16px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-links a {
            font-size: 14px;
            color: var(--text-muted);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--primary-light);
        }

        .footer-bottom {
            border-top: 1px solid var(--border);
            padding-top: 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: gap;
            gap: 16px;
        }

        .footer-copy {
            font-size: 13px;
            color: var(--text-muted);
        }

        .footer-copy a {
            color: var(--primary-light);
            text-decoration: none;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== MOBILE & TABLET ===== */
        @media (max-width: 1024px) {
            .hamburger { display: flex; }
            .desktop-only { display: none !important; }
            .mobile-only { display: block; width: 100%; margin-top: 10px; }

            /* Base state: tersembunyi tapi di DOM agar bisa dianimasikan */
            .nav-links {
                display: flex;
                flex-direction: column;
                position: fixed;
                top: 0; right: 0; bottom: 0;
                width: min(230px, 60vw);
                height: 100vh;
                background: var(--dropdown-bg);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                padding: 70px 16px 40px;
                border: none;
                border-left: 1px solid var(--border);
                border-top-left-radius: 24px;
                border-bottom-left-radius: 24px;
                gap: 8px;
                max-height: none;
                overflow-y: auto;
                box-shadow: none;
                z-index: 1000;
                /* Animasi: tersembunyi ke kanan */
                opacity: 0;
                visibility: hidden;
                transform: translateX(100%);
                transform-origin: right center;
                transition:
                    opacity    0.35s ease,
                    transform  0.35s cubic-bezier(0.16, 1, 0.3, 1),
                    visibility 0s    0.35s;
                pointer-events: none;
            }

            /* State terbuka */
            .nav-links.open {
                opacity: 1;
                visibility: visible;
                transform: translateX(0);
                pointer-events: auto;
                box-shadow: -10px 0 40px rgba(0, 0, 0, 0.25);
                transition:
                    opacity    0.35s ease,
                    transform  0.35s cubic-bezier(0.16, 1, 0.3, 1),
                    visibility 0s    0s;
            }

            /* Premium Link Style di Sidebar */
            .nav-links a {
                padding: 12px 18px;
                width: 100%;
                border-radius: 12px;
                display: inline-flex;
                align-items: center;
                font-size: 16px;
                color: var(--text-secondary);
                transition: var(--transition);
                border: 1px solid transparent;
            }

            .nav-links a::after {
                display: none;
            }

            .nav-links a:hover {
                background: rgba(99, 102, 241, 0.08);
                color: var(--primary-light);
                border-color: rgba(99, 102, 241, 0.15);
                transform: translateX(-4px);
            }

            /* Stagger tiap item saat muncul */
            .nav-links > li {
                opacity: 0;
                transform: translateX(20px);
                transition: opacity 0.3s ease, transform 0.3s ease;
            }
            .nav-links.open > li:nth-child(1) { opacity:1; transform:none; transition-delay: 0.1s; }
            .nav-links.open > li:nth-child(2) { opacity:1; transform:none; transition-delay: 0.15s; }
            .nav-links.open > li:nth-child(3) { opacity:1; transform:none; transition-delay: 0.2s; }
            .nav-links.open > li:nth-child(4) { opacity:1; transform:none; transition-delay: 0.25s; }
            .nav-links.open > li:nth-child(5) { opacity:1; transform:none; transition-delay: 0.3s; }
            .nav-links.open > li:nth-child(6) { opacity:1; transform:none; transition-delay: 0.35s; }

            /* Overlay dengan fade in/out */
            .menu-overlay {
                position: fixed;
                top: 0; left: 0; right: 0; bottom: 0;
                background: rgba(10, 10, 15, 0.4);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.25s ease, visibility 0s 0.25s;
                pointer-events: none;
            }

            html.light-mode .menu-overlay {
                background: rgba(255, 255, 255, 0.4);
            }

            .menu-overlay.show {
                opacity: 1;
                visibility: visible;
                pointer-events: auto;
                transition: opacity 0.25s ease, visibility 0s 0s;
                backdrop-filter: blur(4px);
                -webkit-backdrop-filter: blur(4px);
            }

            .services-grid,
            .portfolio-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .packages-grid {
                grid-template-columns: 1fr;
            }

            .footer-top {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .hero-stats {
                gap: 32px;
            }

            .hero {
                min-height: auto;
                padding: 120px 24px 60px;
            }

            .cta-box {
                padding: 40px 24px;
            }
        }

        .admin-login-btn {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
        }

        .admin-login-btn:hover {
            background: var(--gradient);
            border-color: transparent;
            color: white;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
            transform: translateY(-2px);
        }

        html.light-mode .admin-login-btn {
            background: rgba(0, 0, 0, 0.02);
        }

        /* ===== STRICT MOBILE (Phones) ===== */
        @media (max-width: 767px) {
            .logo img {
                width: 32px !important;
                height: 32px !important;
            }
            .logo-text {
                font-size: 16px;
            }
            .logo {
                margin-left: 0; /* Reset margin on mobile to align properly */
            }
        }

    </style>
</head>
<body>

<!-- Particles Canvas -->
<canvas id="particles-canvas"></canvas>


<!-- Navbar -->
<nav class="navbar" id="navbar">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logoelang.svg') }}" alt="ElangDesign Logo" width="40" height="40">
            <span class="logo-text">ElangDesign</span>
        </a>
        <ul class="nav-links" id="navLinks">
            <li><a href="#services">Layanan</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#packages">Paket Harga</a></li>
            <li><a href="#testimonials">Testimoni</a></li>
            <li><a href="#faq">FAQ</a></li>
            <li class="mobile-only">
                <a href="https://wa.me/6285385794598" target="_blank" class="btn-nav" style="display: flex; justify-content: center; align-items: center;">
                    Konsultasi Gratis
                </a>
            </li>
        </ul>
        <div style="display: flex; align-items: center; gap: 16px;">
            <a href="https://wa.me/6285385794598" target="_blank" class="btn-nav desktop-only">
                Konsultasi Gratis
            </a>
            <button id="themeToggle" class="theme-toggle" aria-label="Toggle Theme">
                <svg class="sun-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                <svg class="moon-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
            </button>
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</nav>

<!-- Menu Overlay -->
<div class="menu-overlay" id="menuOverlay"></div>

<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-content">
        <div class="hero-badge">
            <span class="dot"></span>
            Dipercaya 500+ klien di seluruh Indonesia
        </div>
        <h1>
            Wujudkan Brand<br>
            <span class="gradient-text">Impian Anda</span>
        </h1>
        <p>Jasa desain grafis profesional untuk logo, brosur, company profile & website yang memukau.</p>
        <div class="hero-cta">
            <a href="#services" class="btn-primary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                Lihat Layanan
            </a>
            <a href="#portfolio" class="btn-secondary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                Lihat Portfolio
            </a>
        </div>
        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-number" data-target="500">0</div>
                <div class="stat-label">Klien Puas</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="1200">0</div>
                <div class="stat-label">Proyek Selesai</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="5">0</div>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="98">0</div>
                <div class="stat-label">% Kepuasan</div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <span>SCROLL</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 5v14M5 12l7 7 7-7"/>
        </svg>
    </div>
</section>

<!-- SERVICES -->
<section class="services" id="services">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <div class="section-badge">Layanan Kami</div>
            <h2 class="section-title">Apa yang Kami <span class="gradient-text">Tawarkan</span></h2>
            <p class="section-desc">Dari desain logo hingga website profesional, kami siap mewujudkan visi brand Anda</p>
        </div>
        <div class="services-grid">
            @forelse($services as $index => $service)
            <div class="service-card animate-on-scroll" style="transition-delay: {{ $index * 0.1 }}s">
                <div class="service-icon">
                    @switch($service->icon)
                        @case('pen-tool') ✏️ @break
                        @case('layout') 📄 @break
                        @case('briefcase') 💼 @break
                        @case('monitor') 💻 @break
                        @case('instagram') 📱 @break
                        @case('star') ⭐ @break
                        @default 🎨
                    @endswitch
                </div>
                <h3 class="service-name">{{ $service->name }}</h3>
                <p class="service-desc">{{ $service->description }}</p>
                <div class="service-price">
                    Mulai dari <strong>{{ $service->formatted_price }}</strong>
                </div>
                @if($service->features)
                <ul class="service-features">
                    @foreach(array_slice($service->features, 0, 4) as $feature)
                    <li>{{ $feature }}</li>
                    @endforeach
                </ul>
                @endif
                <a href="https://wa.me/6285385794598?text={{ urlencode($service->whatsapp_text ?? 'Halo, saya ingin memesan ' . $service->name) }}" 
                   target="_blank" 
                   class="btn-service">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Pesan Sekarang
                </a>
            </div>
            @empty
            <div class="service-card">
                <div class="service-icon">🎨</div>
                <h3 class="service-name">Desain Logo</h3>
                <p class="service-desc">Logo profesional yang mencerminkan identitas brand Anda.</p>
                <div class="service-price">Mulai dari <strong>Rp 150.000</strong></div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- PORTFOLIO -->
<section class="portfolio" id="portfolio">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <div class="section-badge">Portfolio</div>
            <h2 class="section-title">Karya <span class="gradient-text">Terbaik</span> Kami</h2>
            <p class="section-desc">Lihat hasil karya kami yang telah membantu ratusan bisnis tampil profesional</p>
        </div>
        
        <div class="portfolio-filter animate-on-scroll">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="Logo">Logo</button>
            <button class="filter-btn" data-filter="Brosur">Brosur</button>
            <button class="filter-btn" data-filter="Company Profile">Company Profile</button>
            <button class="filter-btn" data-filter="Website">Website</button>
            <button class="filter-btn" data-filter="Brand Identity">Brand Identity</button>
            <button class="filter-btn" data-filter="Social Media">Social Media</button>
        </div>

        <div class="portfolio-grid" id="portfolioGrid">
            @php
                $colors = [
                    '#1a1a2e, #16213e, #0f3460',
                    '#0d1117, #161b22, #21262d',
                    '#1a0a2e, #16073e, #2a0f60',
                    '#0a1f2e, #0a2f3e, #0a3f60',
                    '#1a2e0a, #1a3e10, #1a5016',
                    '#2e1a0a, #3e250a, #4f300a',
                    '#2e0a1a, #3e0a25, #500a30',
                    '#0a2e2e, #0a3e3e, #0a5050',
                    '#1a1a0a, #2e2e10, #404010',
                ];
                $emojis = ['🎨', '✏️', '💼', '💻', '📱', '⭐', '🖼️', '🎯', '🚀'];
            @endphp
            @forelse($portfolios as $index => $item)
            <div class="portfolio-item animate-on-scroll {{ $index > 2 ? 'portfolio-hidden' : '' }}" 
                 data-category="{{ $item->category }}"
                 style="transition-delay: {{ ($index % 3) * 0.1 }}s; {{ $index > 2 ? 'display: none;' : '' }}">
                <div class="portfolio-img" style="background: linear-gradient(135deg, {{ $colors[$index % count($colors)] }})">
                    @if($item->image)
                        <img src="{{ Storage::disk(config('filesystems.default') === 'local' ? 'public' : config('filesystems.default'))->url($item->image) }}" alt="{{ $item->title }}" style="width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0;">
                    @else
                        <div class="portfolio-placeholder">{{ $emojis[$index % count($emojis)] }}</div>
                    @endif
                    <div class="portfolio-overlay">
                        <span class="portfolio-overlay-text">Lihat Detail →</span>
                    </div>
                </div>
                <div class="portfolio-info">
                    <span class="portfolio-category">{{ $item->category }}</span>
                    <h3 class="portfolio-title">{{ $item->title }}</h3>
                    <p class="portfolio-desc">{{ $item->description }}</p>
                </div>
            </div>
            @empty
            <div class="portfolio-item">
                <div class="portfolio-img">
                    <div class="portfolio-placeholder">🎨</div>
                </div>
                <div class="portfolio-info">
                    <span class="portfolio-category">Logo</span>
                    <h3 class="portfolio-title">Karya Terbaru</h3>
                    <p class="portfolio-desc">Portfolio akan segera ditampilkan</p>
                </div>
            </div>
            @endforelse
        </div>

        <div id="portfolioToggleContainer" style="text-align:center; margin-top: 48px;" class="animate-on-scroll">
            <button id="togglePortfolioBtn" class="btn-secondary" style="border: none; cursor: pointer; font-family: inherit;">
                <span id="togglePortfolioText">Lihat Semua Portfolio</span>
                <svg id="togglePortfolioIcon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="transition: transform 0.3s ease;">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>
</section>

<!-- PACKAGES -->
<section class="packages" id="packages">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <div class="section-badge">Harga Paket</div>
            <h2 class="section-title">Pilih <span class="gradient-text">Paket</span> Terbaik</h2>
            <p class="section-desc">Paket harga transparan, tanpa biaya tersembunyi. Pilih sesuai kebutuhan bisnis Anda</p>
        </div>
        <div class="packages-grid">
            @forelse($packages as $index => $package)
            <div class="package-card {{ $package->is_popular ? 'popular' : '' }} animate-on-scroll" style="transition-delay: {{ $index * 0.15 }}s">
                @if($package->is_popular)
                <span class="popular-badge">⭐ Terpopuler</span>
                @endif
                <div class="package-name">{{ $package->name }}</div>
                <div class="package-subtitle">{{ $package->subtitle }}</div>
                <div class="package-price">
                    <div class="price-label">Mulai dari</div>
                    <div class="price-amount">
                        <span>Rp</span> {{ number_format($package->price, 0, ',', '.') }}
                    </div>
                </div>
                <div class="package-divider"></div>
                @if($package->features)
                <ul class="package-features">
                    @foreach($package->features as $feature)
                    <li>
                        <span class="check">✓</span>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                @endif
                <a href="https://wa.me/6285385794598?text={{ urlencode($package->whatsapp_text ?? 'Halo, saya ingin paket ' . $package->name) }}" 
                   target="_blank"
                   class="btn-package {{ $package->is_popular ? 'primary' : 'outline' }}">
                    Pilih Paket {{ $package->name }}
                </a>
            </div>
            @empty
            <div class="package-card">
                <div class="package-name">Starter</div>
                <div class="package-price">
                    <div class="price-amount"><span>Rp</span> 299.000</div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <div class="section-badge">Testimoni</div>
            <h2 class="section-title">Kata Mereka tentang <span class="gradient-text">Kami</span></h2>
            <p class="section-desc">Kepuasan klien adalah prioritas utama kami. Ini cerita sukses mereka bersama ElangDesign</p>
        </div>
        <div class="testimonials-grid">
            @forelse($testimonials as $index => $testimonial)
            <div class="testimonial-card animate-on-scroll" style="transition-delay: {{ ($index % 3) * 0.1 }}s">
                <div class="testimonial-stars">
                    @for($i = 0; $i < $testimonial->rating; $i++)
                    <span class="star">★</span>
                    @endfor
                </div>
                <p class="testimonial-text">"{{ $testimonial->content }}"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">{{ substr($testimonial->name, 0, 1) }}</div>
                    <div>
                        <div class="author-name">{{ $testimonial->name }}</div>
                        <div class="author-position">{{ $testimonial->position }}</div>
                    </div>
                </div>
            </div>
            @empty
            <div class="testimonial-card">
                <div class="testimonial-stars"><span class="star">★★★★★</span></div>
                <p class="testimonial-text">"Layanan luar biasa, hasil memuaskan!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">B</div>
                    <div>
                        <div class="author-name">Budi Santoso</div>
                        <div class="author-position">Owner - Toko Berkah</div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq" id="faq">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <div class="section-badge">FAQ</div>
            <h2 class="section-title">Pertanyaan yang <span class="gradient-text">Sering Ditanya</span></h2>
            <p class="section-desc">Jawaban untuk pertanyaan umum seputar layanan ElangDesign</p>
        </div>
        <div class="faq-list">
            @forelse($faqs as $index => $faq)
            <div class="faq-item animate-on-scroll" style="transition-delay: {{ $index * 0.05 }}s">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>{{ $faq->question }}</span>
                    <div class="faq-icon">+</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">{{ $faq->answer }}</div>
                </div>
            </div>
            @empty
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Berapa lama proses pengerjaan?</span>
                    <div class="faq-icon">+</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">Tergantung jenis layanan, umumnya 1-7 hari kerja.</div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section" id="contact">
    <div class="cta-box animate-on-scroll">
        <h2>Siap Mulai <span class="gradient-text">Proyek Anda?</span></h2>
        <p>Konsultasi GRATIS! Kami siap membantu mewujudkan brand impian Anda. Hubungi kami sekarang dan dapatkan penawaran terbaik.</p>
        <div class="cta-buttons">
            <a href="https://wa.me/6285385794598?text={{ urlencode('Halo ElangDesign, saya ingin konsultasi desain GRATIS') }}" 
               target="_blank" 
               class="btn-whatsapp">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Chat WhatsApp Sekarang
            </a>
            <a href="#portfolio" class="btn-secondary">
                Lihat Portfolio Dulu
            </a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-inner">
        <div class="footer-top">
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="logo" style="margin-left: 0;">
                    <span class="logo-text">ElangDesign</span>
                </a>
                <p>ElangDesign hadir untuk membantu bisnis Anda tampil profesional dengan desain menarik dan tentunya berkualitas tinggi.</p>
                <div class="footer-social">
                    <a href="{{ $settings['instagram_url'] ?? '#' }}" class="social-btn" target="_blank" aria-label="Instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="https://wa.me/6285385794598" class="social-btn" target="_blank" aria-label="WhatsApp">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=elangdesign@gmail.com" target="_blank" class="social-btn" aria-label="Email">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </a>
                </div>
            </div>
            <div>
                <div class="footer-title">Layanan</div>
                <ul class="footer-links">
                    <li><a href="#services">Desain Logo</a></li>
                    <li><a href="#services">Desain Brosur</a></li>
                    <li><a href="#services">Company Profile</a></li>
                    <li><a href="#services">Desain Website</a></li>
                    <li><a href="#services">Konten Medsos</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-title">Informasi</div>
                <ul class="footer-links">
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#packages">Paket Harga</a></li>
                    <li><a href="#testimonials">Testimoni</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div>
                <p class="footer-copy">© {{ date('Y') }} ElangDesign. Dibuat dengan hati dan profesionalitas tinggi.</p>
                <p class="footer-copy">Email: elangdesign@gmail.com</p>
            </div>
            <div>
                <a href="{{ route('login') }}" class="admin-login-btn" title="Login Admin">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 6px; vertical-align: middle;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Login Admin
                </a>
            </div>
        </div>
    </div>
</footer> 

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
            this.speedX = (Math.random() - 0.5) * 0.3;
            this.speedY = (Math.random() - 0.5) * 0.3;
            this.opacity = Math.random() * 0.5 + 0.1;
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

    for (let i = 0; i < 80; i++) particles.push(new Particle());

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

    // ===== NAVBAR =====
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // ===== HAMBURGER =====
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');
    const menuOverlay = document.getElementById('menuOverlay');

    function closeNav() {
        navLinks.classList.remove('open');
        hamburger.classList.remove('active');
        if (menuOverlay) menuOverlay.classList.remove('show');
    }

    hamburger.addEventListener('click', () => {
        // Ripple + active class
        hamburger.classList.add('ripple');
        setTimeout(() => hamburger.classList.remove('ripple'), 420);
        hamburger.classList.toggle('active');

        navLinks.classList.toggle('open');
        if(menuOverlay) menuOverlay.classList.toggle('show');
    });

    // Close mobile menu on link click
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', closeNav);
    });

    // Klik overlay → tutup nav
    if (menuOverlay) {
        menuOverlay.addEventListener('click', closeNav);

        // Forward scroll agar background tetap bisa discroll
        menuOverlay.addEventListener('wheel', (e) => {
            window.scrollBy({ top: e.deltaY, left: e.deltaX, behavior: 'instant' });
        }, { passive: true });

        let _touchY = 0;
        menuOverlay.addEventListener('touchstart', (e) => {
            _touchY = e.touches[0].clientY;
        }, { passive: true });
        menuOverlay.addEventListener('touchmove', (e) => {
            const dy = _touchY - e.touches[0].clientY;
            _touchY = e.touches[0].clientY;
            window.scrollBy({ top: dy, behavior: 'instant' });
        }, { passive: true });
    }

    // Klik di luar nav & hamburger juga tutup
    document.addEventListener('click', (e) => {
        if (navLinks.classList.contains('open') && !navLinks.contains(e.target) && !hamburger.contains(e.target)) {
            closeNav();
        }
    });

    // ===== COUNTER ANIMATION =====
    function animateCounter(el, target, duration = 2000) {
        let start = 0;
        const step = target / (duration / 16);
        const timer = setInterval(() => {
            start += step;
            if (start >= target) {
                el.textContent = target + (target === 98 ? '%' : '+');
                clearInterval(timer);
            } else {
                el.textContent = Math.floor(start) + (target === 98 ? '%' : '+');
            }
        }, 16);
    }

    const statNumbers = document.querySelectorAll('.stat-number');
    let countersStarted = false;

    function startCounters() {
        if (countersStarted) return;
        const heroSection = document.querySelector('.hero');
        const rect = heroSection.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            countersStarted = true;
            statNumbers.forEach(el => {
                const target = parseInt(el.dataset.target);
                animateCounter(el, target);
            });
        }
    }

    window.addEventListener('scroll', startCounters);
    setTimeout(startCounters, 500);

    // ===== SCROLL ANIMATIONS =====
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animated');
                }, 50);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));

    // ===== FAQ TOGGLE =====
    function toggleFaq(el) {
        const item = el.parentElement;
        const isOpen = item.classList.contains('open');
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
        if (!isOpen) item.classList.add('open');
    }

    // ===== PORTFOLIO FILTER =====
    // ===== PORTFOLIO TOGGLE & FILTER =====
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    const toggleBtn = document.getElementById('togglePortfolioBtn');
    const toggleText = document.getElementById('togglePortfolioText');
    const toggleIcon = document.getElementById('togglePortfolioIcon');
    const toggleContainer = document.getElementById('portfolioToggleContainer');
    let isExpanded = false;

    if(toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            isExpanded = !isExpanded;
            document.querySelectorAll('.portfolio-hidden').forEach(item => {
                if (isExpanded) {
                    item.style.display = '';
                    setTimeout(() => { item.style.opacity = '1'; item.style.transform = 'scale(1)'; }, 50);
                } else {
                    item.style.display = 'none';
                }
            });
            
            if (isExpanded) {
                toggleText.textContent = 'Tampilkan Lebih Sedikit';
                toggleIcon.style.transform = 'rotate(180deg)';
            } else {
                toggleText.textContent = 'Lihat Semua Portfolio';
                toggleIcon.style.transform = 'rotate(0deg)';
                const portfolioSec = document.getElementById('portfolio');
                const top = portfolioSec.getBoundingClientRect().top + window.pageYOffset - 80;
                window.scrollTo({ top, behavior: 'smooth' });
            }
        });
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const filter = btn.dataset.filter;
            
            portfolioItems.forEach(item => {
                const isHiddenByCollapse = !isExpanded && item.classList.contains('portfolio-hidden');
                
                if (filter === 'all' || item.dataset.category === filter) {
                    if (filter === 'all' && isHiddenByCollapse) {
                        item.style.display = 'none';
                    } else {
                        item.style.display = '';
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.9)';
                        setTimeout(() => {
                            item.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 50);
                    }
                } else {
                    item.style.display = 'none';
                }
            });

            if (toggleContainer) {
                toggleContainer.style.display = filter === 'all' ? 'block' : 'none';
            }
        });
    });

    // ===== SMOOTH SCROLL =====
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const offset = 80;
                const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({ top, behavior: 'smooth' });
            }
        });
    });
</script>
</body>
</html>
