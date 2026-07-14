<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - ElangDesign</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styling -->
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            transition: all 0.3s ease;
        }

        :root {
            --primary: #6366f1;
            --primary-light: #a5b4fc;
            --bg-dark: #07070a;
            --bg-card: rgba(15, 15, 25, 0.7);
            --border: rgba(255, 255, 255, 0.08);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --gradient: linear-gradient(135deg, #6366f1, #8b5cf6);
            --shadow-glow: 0 0 50px rgba(99, 102, 241, 0.15);
            --radius: 16px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            overflow: hidden;
            position: relative;
        }

        /* Ambient Glow Backgrounds */
        .ambient-glow {
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(99, 102, 241, 0.15);
            filter: blur(100px);
            z-index: 0;
            pointer-events: none;
        }
        .glow-1 {
            top: 20%;
            left: 25%;
        }
        .glow-2 {
            bottom: 20%;
            right: 25%;
            background: rgba(139, 92, 246, 0.15);
        }

        /* Login Card */
        .login-card {
            width: 100%;
            max-width: 420px;
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            z-index: 10;
            animation: slideUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) both;
            position: relative;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: var(--gradient);
            border-top-left-radius: var(--radius);
            border-top-right-radius: var(--radius);
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-logo {
            width: 50px;
            height: 50px;
            background: var(--gradient);
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
            color: white;
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.4);
            margin-bottom: 16px;
        }

        .login-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .login-subtitle {
            font-size: 13px;
            color: var(--text-secondary);
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 14px;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.25);
            background: rgba(0, 0, 0, 0.5);
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 13px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: var(--text-secondary);
        }

        .remember-me input {
            cursor: pointer;
            accent-color: var(--primary);
            width: 16px;
            height: 16px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: var(--gradient);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .back-link {
            text-align: center;
            margin-top: 24px;
        }

        .back-link a {
            font-size: 13px;
            color: var(--text-secondary);
            text-decoration: none;
        }

        .back-link a:hover {
            color: var(--primary-light);
        }

        /* Error alert */
        .error-alert {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #ef4444;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="ambient-glow glow-1"></div>
    <div class="ambient-glow glow-2"></div>

    <div class="login-card">
        <div class="login-header">
            <div class="login-logo">E</div>
            <h1 class="login-title">Admin Login</h1>
            <p class="login-subtitle">Masuk untuk mengelola data website ElangDesign</p>
        </div>

        @if($errors->any())
            <div class="error-alert">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="admin@elangdesign.com" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <div class="form-footer">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" class="btn-submit">Masuk</button>
        </form>

        <div class="back-link">
            <a href="{{ route('home') }}">← Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>
