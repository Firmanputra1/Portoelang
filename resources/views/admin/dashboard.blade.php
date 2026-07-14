@extends('admin.layout')

@section('title', 'Dashboard')

@section('header_title', 'Dashboard')
@section('header_subtitle', 'Tinjauan cepat statistik dan aktivitas data website Anda.')

@section('content')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 24px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: var(--shadow);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 3px;
        background: var(--gradient);
        opacity: 0.7;
    }

    .stat-icon {
        width: 54px;
        height: 54px;
        background: rgba(99, 102, 241, 0.1);
        border: 1px solid rgba(99, 102, 241, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: var(--primary-light);
    }

    .stat-info {
        flex-grow: 1;
    }

    .stat-val {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 28px;
        font-weight: 700;
        line-height: 1.2;
    }

    .stat-label {
        font-size: 13px;
        color: var(--text-secondary);
        font-weight: 500;
    }

    /* Shortcut section */
    .shortcuts-section {
        margin-top: 40px;
    }

    .shortcuts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
    }

    .shortcut-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 28px;
        text-decoration: none;
        color: inherit;
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .shortcut-card:hover {
        border-color: rgba(99, 102, 241, 0.3);
        transform: translateY(-4px);
        box-shadow: var(--shadow-glow);
    }

    .shortcut-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }

    .shortcut-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 18px;
        font-weight: 600;
    }

    .shortcut-desc {
        font-size: 13px;
        color: var(--text-secondary);
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .shortcut-action {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--primary-light);
        font-size: 13px;
        font-weight: 700;
    }

    .shortcut-card:hover .shortcut-action {
        color: white;
    }
</style>

<div class="stats-grid">
    <!-- Stat Card 1 -->
    <div class="stat-card">
        <div class="stat-icon">🎨</div>
        <div class="stat-info">
            <div class="stat-val">{{ $stats['services'] }}</div>
            <div class="stat-label">Layanan Desain</div>
        </div>
    </div>
    
    <!-- Stat Card 2 -->
    <div class="stat-card">
        <div class="stat-icon">🏷️</div>
        <div class="stat-info">
            <div class="stat-val">{{ $stats['packages'] }}</div>
            <div class="stat-label">Paket Harga</div>
        </div>
    </div>

    <!-- Stat Card 3 -->
    <div class="stat-card">
        <div class="stat-icon">💼</div>
        <div class="stat-info">
            <div class="stat-val">{{ $stats['portfolios'] }}</div>
            <div class="stat-label">Karya Portofolio</div>
        </div>
    </div>

    <!-- Stat Card 4 -->
    <div class="stat-card">
        <div class="stat-icon">💬</div>
        <div class="stat-info">
            <div class="stat-val">{{ $stats['testimonials'] }}</div>
            <div class="stat-label">Ulasan Testimoni</div>
        </div>
    </div>
</div>

<div class="shortcuts-section">
    <h2 class="shortcut-title" style="margin-bottom: 24px; font-size: 20px;">Kelola Data Cepat</h2>
    <div class="shortcuts-grid">
        
        <a href="{{ route('admin.services.index') }}" class="shortcut-card">
            <div>
                <div class="shortcut-header">
                    <span class="shortcut-title">Layanan & Jasa</span>
                    <span style="font-size: 20px;">🎨</span>
                </div>
                <p class="shortcut-desc">Tambah, ubah, atau hapus kategori jasa desain yang ditawarkan seperti logo, brosur, atau website.</p>
            </div>
            <span class="shortcut-action">Kelola Layanan →</span>
        </a>

        <a href="{{ route('admin.portfolios.index') }}" class="shortcut-card">
            <div>
                <div class="shortcut-header">
                    <span class="shortcut-title">Karya Portofolio</span>
                    <span style="font-size: 20px;">💼</span>
                </div>
                <p class="shortcut-desc">Unggah hasil karya desain terbaru Anda untuk dipamerkan kepada calon klien di galeri website.</p>
            </div>
            <span class="shortcut-action">Kelola Portofolio →</span>
        </a>

        <a href="{{ route('admin.settings.index') }}" class="shortcut-card">
            <div>
                <div class="shortcut-header">
                    <span class="shortcut-title">Pengaturan Website</span>
                    <span style="font-size: 20px;">⚙️</span>
                </div>
                <p class="shortcut-desc">Ubah kontak WhatsApp, tautan sosial media, deskripsi website, serta slogan pada halaman utama.</p>
            </div>
            <span class="shortcut-action">Konfigurasi Pengaturan →</span>
        </a>

    </div>
</div>
@endsection
