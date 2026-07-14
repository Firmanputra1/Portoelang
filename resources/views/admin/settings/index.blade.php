@extends('admin.layout')

@section('title', 'Pengaturan Website')

@section('header_title', 'Pengaturan')
@section('header_subtitle', 'Konfigurasi teks, kontak, media sosial, dan data SEO pada website.')

@section('content')
<style>
    .settings-section-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 8px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        color: var(--primary-light);
    }
</style>

<div class="card" style="max-width: 900px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Manajemen Konfigurasi Website</h2>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- SECTION 1: PROFIL INSTANSI -->
        <h3 class="settings-section-title">🏢 Profil Instansi & Teks Hero</h3>
        
        <div class="form-group">
            <label for="company_name" class="form-label">Nama Perusahaan / Brand *</label>
            <input type="text" id="company_name" name="company_name" class="form-control" value="{{ old('company_name', $settings['company_name'] ?? 'ElangDesign') }}" required>
        </div>

        <div class="form-group">
            <label for="company_tagline" class="form-label">Tagline Perusahaan</label>
            <input type="text" id="company_tagline" name="company_tagline" class="form-control" value="{{ old('company_tagline', $settings['company_tagline'] ?? '') }}" placeholder="Contoh: Desain Grafis Profesional & Hasil Premium">
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="hero_title" class="form-label">Judul Utama Hero (Halaman Depan)</label>
                <input type="text" id="hero_title" name="hero_title" class="form-control" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}">
            </div>
            <div>
                <label for="hero_subtitle" class="form-label">Subjudul Hero</label>
                <input type="text" id="hero_subtitle" name="hero_subtitle" class="form-control" value="{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="footer_description" class="form-label">Deskripsi Footer</label>
            <textarea id="footer_description" name="footer_description" class="form-control" rows="3" placeholder="Deskripsi singkat yang tampil di bagian footer halaman depan...">{{ old('footer_description', $settings['footer_description'] ?? '') }}</textarea>
        </div>

        <!-- SECTION 2: KONTAK & WHATSAPP -->
        <h3 class="settings-section-title" style="margin-top: 40px;">📞 Kontak & WhatsApp</h3>
        
        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="whatsapp_number" class="form-label">Nomor WhatsApp Utama *</label>
                <input type="text" id="whatsapp_number" name="whatsapp_number" class="form-control" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '6285385794598') }}" placeholder="Format: 628xxx (Tanpa + atau 0)" required>
            </div>
            <div>
                <label for="company_phone" class="form-label">Nomor Telepon Kantor (Opsional)</label>
                <input type="text" id="company_phone" name="company_phone" class="form-control" value="{{ old('company_phone', $settings['company_phone'] ?? '') }}">
            </div>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="company_email" class="form-label">Alamat Email Kontak</label>
                <input type="email" id="company_email" name="company_email" class="form-control" value="{{ old('company_email', $settings['company_email'] ?? '') }}">
            </div>
            <div>
                <label for="whatsapp_default_text" class="form-label">Default Teks WhatsApp Chat</label>
                <input type="text" id="whatsapp_default_text" name="whatsapp_default_text" class="form-control" value="{{ old('whatsapp_default_text', $settings['whatsapp_default_text'] ?? '') }}" placeholder="Contoh: Halo ElangDesign, saya ingin bertanya mengenai...">
            </div>
        </div>

        <div class="form-group">
            <label for="company_address" class="form-label">Alamat Kantor</label>
            <textarea id="company_address" name="company_address" class="form-control" rows="2" placeholder="Masukkan alamat lengkap kantor...">{{ old('company_address', $settings['company_address'] ?? '') }}</textarea>
        </div>

        <!-- SECTION 3: MEDIA SOSIAL -->
        <h3 class="settings-section-title" style="margin-top: 40px;">🌐 Media Sosial</h3>
        
        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
            <div>
                <label for="facebook_url" class="form-label">Facebook URL</label>
                <input type="url" id="facebook_url" name="facebook_url" class="form-control" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" placeholder="https://facebook.com/...">
            </div>
            <div>
                <label for="instagram_url" class="form-label">Instagram URL</label>
                <input type="url" id="instagram_url" name="instagram_url" class="form-control" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" placeholder="https://instagram.com/...">
            </div>
            <div>
                <label for="youtube_url" class="form-label">YouTube URL</label>
                <input type="url" id="youtube_url" name="youtube_url" class="form-control" value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}" placeholder="https://youtube.com/...">
            </div>
        </div>

        <!-- SECTION 4: DATA STATISTIK -->
        <h3 class="settings-section-title" style="margin-top: 40px;">📊 Statistik Pencapaian</h3>
        
        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 15px;">
            <div>
                <label for="stats_projects" class="form-label">Proyek Selesai</label>
                <input type="text" id="stats_projects" name="stats_projects" class="form-control" value="{{ old('stats_projects', $settings['stats_projects'] ?? '150+') }}">
            </div>
            <div>
                <label for="stats_clients" class="form-label">Klien Puas</label>
                <input type="text" id="stats_clients" name="stats_clients" class="form-control" value="{{ old('stats_clients', $settings['stats_clients'] ?? '80+') }}">
            </div>
            <div>
                <label for="stats_years" class="form-label">Tahun Pengalaman</label>
                <input type="text" id="stats_years" name="stats_years" class="form-control" value="{{ old('stats_years', $settings['stats_years'] ?? '5+') }}">
            </div>
            <div>
                <label for="stats_satisfaction" class="form-label">Tingkat Kepuasan</label>
                <input type="text" id="stats_satisfaction" name="stats_satisfaction" class="form-control" value="{{ old('stats_satisfaction', $settings['stats_satisfaction'] ?? '98%') }}">
            </div>
        </div>

        <!-- SECTION 5: METADATA / SEO -->
        <h3 class="settings-section-title" style="margin-top: 40px;">🔍 Pengaturan SEO (Search Engine Optimization)</h3>
        
        <div class="form-group">
            <label for="meta_title" class="form-label">SEO Meta Title</label>
            <input type="text" id="meta_title" name="meta_title" class="form-control" value="{{ old('meta_title', $settings['meta_title'] ?? '') }}" placeholder="Judul yang tampil di tab browser / Google Search">
        </div>

        <div class="form-group">
            <label for="meta_description" class="form-label">SEO Meta Description</label>
            <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Deskripsi singkat mengenai website Anda untuk hasil pencarian Google...">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
        </div>

        <div style="margin-top: 48px; display: flex; justify-content: flex-end; gap: 12px;">
            <button type="submit" class="btn btn-primary" style="padding: 14px 30px;">Simpan Semua Pengaturan</button>
        </div>
    </form>
</div>
@endsection
