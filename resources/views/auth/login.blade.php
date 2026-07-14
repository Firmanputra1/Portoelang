@extends('layouts.app')

@section('title', 'Login Admin - ElangDesign')

@section('content')
<section style="padding: 160px 24px 100px; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="contact-form-card animate-on-scroll animated" style="width: 100%; max-width: 450px; margin: 0 auto; box-shadow: var(--shadow-card);">
        <div style="text-align: center; margin-bottom: 32px;">
            <a href="{{ route('home') }}" class="logo" style="justify-content: center; margin-bottom: 16px;">
                <div class="logo-icon">E</div>
                <span class="logo-text">ElangDesign</span>
            </a>
            <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 24px; font-weight: 700; color: var(--text-primary);">Panel Admin</h2>
            <p style="font-size: 14px; color: var(--text-secondary); margin-top: 8px;">Silakan login untuk mengelola konten website Anda.</p>
        </div>

        @if(session('success'))
            <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="admin@elangdesign.com" required autofocus>
                @error('email')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 16px;">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                @error('password')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 32px;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--text-secondary); cursor: pointer; user-select: none;">
                    <input type="checkbox" name="remember" style="accent-color: var(--primary); width: 16px; height: 16px; border-radius: 4px; border: 1px solid var(--border);">
                    Ingatkan Saya
                </label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; padding: 14px 0; font-size: 15px; border-radius: 12px; font-weight: 700;">
                Masuk ke Dashboard
            </button>
        </form>
    </div>
</section>
@endsection
