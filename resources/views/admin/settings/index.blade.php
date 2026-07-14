@extends('layouts.admin')

@section('title', 'Pengaturan Umum - Admin Panel')

@section('content')
<div class="animate-on-scroll animated">
    <div style="margin-bottom: 32px;">
        <div class="section-badge" style="margin-bottom: 8px;">Konfigurasi</div>
        <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
            Pengaturan <span class="gradient-text">Umum</span>
        </h2>
        <p style="color: var(--text-secondary); margin-top: 4px;">Kelola informasi dasar, nomor WhatsApp, statistik, dan media sosial website Anda di satu tempat.</p>
    </div>

    @if(session('success'))
        <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 16px 24px; border-radius: 12px; margin-bottom: 32px; font-size: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="contact-form-card" style="max-width: 950px; padding: 48px;">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            
            <!-- SECTION 1: WHATSAPP INTEGRATION -->
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 20px; font-weight: 700; color: var(--text-primary); border-bottom: 1px solid var(--border); padding-bottom: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
                💬 Integrasi WhatsApp
            </h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap; margin-bottom: 32px;">
                <div class="form-group">
                    <label for="whatsapp_number" class="form-label">Nomor WhatsApp *</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" class="form-control" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '') }}" placeholder="Contoh: 6281234567890" required>
                    <span style="color: var(--text-muted); font-size: 12px; margin-top: 4px; display: block;">Format nomor wajib diawali kode negara tanpa tanda + (contoh: 62 untuk Indonesia).</span>
                    @error('whatsapp_number')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="whatsapp_default_text" class="form-label">Pesan Default Chat</label>
                    <input type="text" name="whatsapp_default_text" id="whatsapp_default_text" class="form-control" value="{{ old('whatsapp_default_text', $settings['whatsapp_default_text'] ?? '') }}" placeholder="Contoh: Halo ElangDesign, saya ingin bertanya...">
                    @error('whatsapp_default_text')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- SECTION 2: HERO BANNER -->
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 20px; font-weight: 700; color: var(--text-primary); border-bottom: 1px solid var(--border); padding-bottom: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
                ✨ Bagian Hero Banner (Halaman Depan)
            </h3>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="hero_title" class="form-label">Judul Utama (Hero Title)</label>
                <input type="text" name="hero_title" id="hero_title" class="form-control" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" placeholder="Contoh: Wujudkan Brand Impian Anda">
                @error('hero_title')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" style="margin-bottom: 32px;">
                <label for="hero_subtitle" class="form-label">Subjudul (Hero Subtitle)</label>
                <textarea name="hero_subtitle" id="hero_subtitle" class="form-control" placeholder="Contoh: Jasa desain grafis profesional..." style="min-height: 80px;">{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
                @error('hero_subtitle')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <!-- SECTION 3: GENERAL INFO -->
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 20px; font-weight: 700; color: var(--text-primary); border-bottom: 1px solid var(--border); padding-bottom: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
                🏢 Informasi Perusahaan
            </h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
                <div class="form-group">
                    <label for="company_name" class="form-label">Nama Perusahaan / Brand *</label>
                    <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $settings['company_name'] ?? 'ElangDesign') }}" placeholder="Contoh: ElangDesign" required>
                    @error('company_name')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="company_tagline" class="form-label">Tagline Perusahaan</label>
                    <input type="text" name="company_tagline" id="company_tagline" class="form-control" value="{{ old('company_tagline', $settings['company_tagline'] ?? '') }}" placeholder="Contoh: Desain Profesional, Harga Terjangkau">
                    @error('company_tagline')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
                <div class="form-group">
                    <label for="company_email" class="form-label">Email Kontak</label>
                    <input type="email" name="company_email" id="company_email" class="form-control" value="{{ old('company_email', $settings['company_email'] ?? ($settings['email'] ?? '')) }}" placeholder="Contoh: hello@elangdesign.com">
                    @error('company_email')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="company_phone" class="form-label">Telepon Kontak</label>
                    <input type="text" name="company_phone" id="company_phone" class="form-control" value="{{ old('company_phone', $settings['company_phone'] ?? '') }}" placeholder="Contoh: 0812-3456-7890">
                    @error('company_phone')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="company_address" class="form-label">Alamat Kantor</label>
                <input type="text" name="company_address" id="company_address" class="form-control" value="{{ old('company_address', $settings['company_address'] ?? '') }}" placeholder="Contoh: Yogyakarta, Indonesia">
                @error('company_address')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 32px;">
                <label for="footer_description" class="form-label">Deskripsi Footer (Muncul di bagian bawah web)</label>
                <textarea name="footer_description" id="footer_description" class="form-control" placeholder="Contoh: ElangDesign hadir untuk membantu bisnis Anda..." style="min-height: 80px;">{{ old('footer_description', $settings['footer_description'] ?? ($settings['description'] ?? '')) }}</textarea>
                @error('footer_description')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <!-- SECTION 4: COUNTER STATISTICS -->
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 20px; font-weight: 700; color: var(--text-primary); border-bottom: 1px solid var(--border); padding-bottom: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
                📊 Angka Statistik Konversi (Hero Section)
            </h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
                <div class="form-group">
                    <label for="stats_clients" class="form-label">Statistik Klien Puas (Target Angka)</label>
                    <input type="text" name="stats_clients" id="stats_clients" class="form-control" value="{{ old('stats_clients', $settings['stats_clients'] ?? '500') }}" placeholder="Contoh: 500">
                    @error('stats_clients')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stats_projects" class="form-label">Statistik Proyek Selesai (Target Angka)</label>
                    <input type="text" name="stats_projects" id="stats_projects" class="form-control" value="{{ old('stats_projects', $settings['stats_projects'] ?? '1200') }}" placeholder="Contoh: 1200">
                    @error('stats_projects')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap; margin-bottom: 32px;">
                <div class="form-group">
                    <label for="stats_years" class="form-label">Statistik Tahun Pengalaman</label>
                    <input type="text" name="stats_years" id="stats_years" class="form-control" value="{{ old('stats_years', $settings['stats_years'] ?? '5') }}" placeholder="Contoh: 5">
                    @error('stats_years')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stats_satisfaction" class="form-label">Statistik Persentase Kepuasan (%)</label>
                    <input type="text" name="stats_satisfaction" id="stats_satisfaction" class="form-control" value="{{ old('stats_satisfaction', $settings['stats_satisfaction'] ?? '98') }}" placeholder="Contoh: 98">
                    @error('stats_satisfaction')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- SECTION 5: SOCIAL MEDIA LINKS -->
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 20px; font-weight: 700; color: var(--text-primary); border-bottom: 1px solid var(--border); padding-bottom: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
                🔗 Sosial Media Resmi
            </h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
                <div class="form-group">
                    <label for="instagram_url" class="form-label">Tautan Instagram</label>
                    <input type="url" name="instagram_url" id="instagram_url" class="form-control" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" placeholder="Contoh: https://instagram.com/username">
                    @error('instagram_url')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="facebook_url" class="form-label">Tautan Facebook</label>
                    <input type="url" name="facebook_url" id="facebook_url" class="form-control" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" placeholder="Contoh: https://facebook.com/username">
                    @error('facebook_url')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 32px;">
                <label for="youtube_url" class="form-label">Tautan Youtube Channel</label>
                <input type="url" name="youtube_url" id="youtube_url" class="form-control" value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}" placeholder="Contoh: https://youtube.com/channel">
                @error('youtube_url')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <!-- SECTION 6: SEO SETTINGS -->
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 20px; font-weight: 700; color: var(--text-primary); border-bottom: 1px solid var(--border); padding-bottom: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
                🔍 Pengaturan SEO & Meta
            </h3>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="meta_title" class="form-label">Meta Judul Website (Meta Title)</label>
                <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title', $settings['meta_title'] ?? '') }}" placeholder="Contoh: ElangDesign | Jasa Desain Grafis Terbaik">
                @error('meta_title')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" style="margin-bottom: 40px;">
                <label for="meta_description" class="form-label">Meta Deskripsi Website (Meta Description)</label>
                <textarea name="meta_description" id="meta_description" class="form-control" placeholder="Contoh: Jasa desain grafis profesional..." style="min-height: 80px;">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                @error('meta_description')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-primary" style="padding: 14px 28px; font-size: 15px; border-radius: 12px; width: 100%; justify-content: center;">
                💾 Simpan Seluruh Pengaturan Umum
            </button>
        </form>
    </div>
</div>
@endsection
