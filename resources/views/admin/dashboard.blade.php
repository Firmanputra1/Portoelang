@extends('layouts.admin')

@section('title', 'Dashboard Admin - ElangDesign')

@section('content')
<div class="animate-on-scroll animated">
    <div style="margin-bottom: 40px;">
        <div class="section-badge" style="margin-bottom: 8px;">Panel Kontrol</div>
        <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
            Selamat Datang, <span class="gradient-text">Admin!</span>
        </h2>
        <p style="color: var(--text-secondary); margin-top: 4px;">Kelola seluruh konten halaman utama website ElangDesign Anda di sini.</p>
    </div>

    @if(session('success'))
        <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 16px 24px; border-radius: 12px; margin-bottom: 32px; font-size: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Metrik Statistik -->
    <div class="services-grid" style="margin-bottom: 48px;">
        <div class="service-card" style="cursor: default;">
            <div class="service-icon" style="background: rgba(99, 102, 241, 0.1); color: var(--primary-light);">💼</div>
            <h3 class="service-name" style="margin-top: 12px;">Layanan</h3>
            <div style="font-family: 'Space Grotesk', sans-serif; font-size: 48px; font-weight: 800; color: var(--text-primary); line-height: 1.2;">
                {{ $stats['services'] ?? 0 }}
            </div>
            <p class="service-desc" style="margin-bottom: 0; margin-top: 8px;">Jenis jasa yang ditawarkan.</p>
        </div>

        <div class="service-card" style="cursor: default;">
            <div class="service-icon" style="background: rgba(245, 158, 11, 0.1); color: var(--accent);">📦</div>
            <h3 class="service-name" style="margin-top: 12px;">Paket Harga</h3>
            <div style="font-family: 'Space Grotesk', sans-serif; font-size: 48px; font-weight: 800; color: var(--text-primary); line-height: 1.2;">
                {{ $stats['packages'] ?? 0 }}
            </div>
            <p class="service-desc" style="margin-bottom: 0; margin-top: 8px;">Paket bundel harga transparan.</p>
        </div>

        <div class="service-card" style="cursor: default;">
            <div class="service-icon" style="background: rgba(139, 92, 246, 0.1); color: #a78bfa;">🖼️</div>
            <h3 class="service-name" style="margin-top: 12px;">Portfolio</h3>
            <div style="font-family: 'Space Grotesk', sans-serif; font-size: 48px; font-weight: 800; color: var(--text-primary); line-height: 1.2;">
                {{ $stats['portfolios'] ?? 0 }}
            </div>
            <p class="service-desc" style="margin-bottom: 0; margin-top: 8px;">Katalog karya yang ditampilkan.</p>
        </div>

        <div class="service-card" style="cursor: default;">
            <div class="service-icon" style="background: rgba(34, 197, 94, 0.1); color: #22c55e;">⭐</div>
            <h3 class="service-name" style="margin-top: 12px;">Testimoni</h3>
            <div style="font-family: 'Space Grotesk', sans-serif; font-size: 48px; font-weight: 800; color: var(--text-primary); line-height: 1.2;">
                {{ $stats['testimonials'] ?? 0 }}
            </div>
            <p class="service-desc" style="margin-bottom: 0; margin-top: 8px;">Review kepuasan dari klien.</p>
        </div>
    </div>

    <!-- Kelola Konten & Settings -->
    <div style="background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 40px;">
        <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 22px; font-weight: 700; color: var(--text-primary); margin-bottom: 12px;">
            Menu Cepat Pengelolaan
        </h3>
        <p style="color: var(--text-secondary); margin-bottom: 32px; font-size: 15px;">Pilih bagian konten yang ingin Anda buat, edit, atau hapus di database.</p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 16px;">
            <a href="{{ route('admin.services.index') }}" class="btn-secondary" style="justify-content: center; text-decoration: none; border-radius: 12px; padding: 16px;">
                🔧 Kelola Layanan
            </a>
            <a href="{{ route('admin.portfolios.index') }}" class="btn-secondary" style="justify-content: center; text-decoration: none; border-radius: 12px; padding: 16px;">
                🖼️ Kelola Portfolio
            </a>
            <a href="{{ route('admin.packages.index') }}" class="btn-secondary" style="justify-content: center; text-decoration: none; border-radius: 12px; padding: 16px;">
                💰 Kelola Paket Harga
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="btn-secondary" style="justify-content: center; text-decoration: none; border-radius: 12px; padding: 16px;">
                ⭐ Kelola Testimoni
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="btn-secondary" style="justify-content: center; text-decoration: none; border-radius: 12px; padding: 16px;">
                ❓ Kelola FAQ
            </a>
            <a href="{{ route('admin.settings.index') }}" class="btn-secondary" style="justify-content: center; text-decoration: none; border-radius: 12px; padding: 16px;">
                ⚙️ Pengaturan Umum
            </a>
        </div>
    </div>
</div>
@endsection
