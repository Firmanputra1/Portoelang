@extends('layouts.admin')

@section('title', 'Tambah Portfolio Baru - Admin Panel')

@section('content')
<div class="animate-on-scroll animated">
    <div style="margin-bottom: 32px;">
        <a href="{{ route('admin.portfolios.index') }}" class="btn-secondary" style="padding: 8px 18px; font-size: 13px; border-radius: 8px; margin-bottom: 16px;">
            ← Kembali ke Daftar
        </a>
        <div class="section-badge" style="margin-bottom: 8px;">Tambah Konten</div>
        <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
            Tambah <span class="gradient-text">Portfolio Baru</span>
        </h2>
        <p style="color: var(--text-secondary); margin-top: 4px;">Isi formulir berikut untuk menambahkan hasil proyek baru ke galeri portfolio Anda.</p>
    </div>

    <div class="contact-form-card" style="max-width: 800px;">
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap;">
                <div class="form-group">
                    <label for="title" class="form-label">Judul Proyek / Karya *</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Contoh: Kopi Nusantara Branding" required>
                    @error('title')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category" class="form-label">Kategori Proyek *</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="" disabled selected>Pilih kategori...</option>
                        <option value="Logo" {{ old('category') == 'Logo' ? 'selected' : '' }}>Logo</option>
                        <option value="Brosur" {{ old('category') == 'Brosur' ? 'selected' : '' }}>Brosur</option>
                        <option value="Company Profile" {{ old('category') == 'Company Profile' ? 'selected' : '' }}>Company Profile</option>
                        <option value="Website" {{ old('category') == 'Website' ? 'selected' : '' }}>Website</option>
                        <option value="Brand Identity" {{ old('category') == 'Brand Identity' ? 'selected' : '' }}>Brand Identity</option>
                        <option value="Social Media" {{ old('category') == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                    </select>
                    @error('category')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap;">
                <div class="form-group">
                    <label for="client_name" class="form-label">Nama Klien / Instansi</label>
                    <input type="text" name="client_name" id="client_name" class="form-control" value="{{ old('client_name') }}" placeholder="Contoh: PT Sukses Bersama">
                    @error('client_name')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sort_order" class="form-label">Urutan Tampilan</label>
                    <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" placeholder="Semakin kecil angka, semakin awal muncul">
                    @error('sort_order')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Unggah Gambar Desain (Max: 4MB)</label>
                <input type="file" name="image" id="image" class="form-control" style="padding: 10px;">
                <span style="color: var(--text-muted); font-size: 12px; margin-top: 4px; display: block;">Format gambar didukung: JPG, PNG, WEBP.</span>
                @error('image')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Deskripsi Proyek</label>
                <textarea name="description" id="description" class="form-control" placeholder="Jelaskan secara singkat mengenai proyek desain ini..." style="min-height: 120px;">{{ old('description') }}</textarea>
                @error('description')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 32px;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--text-secondary); cursor: pointer; user-select: none;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} style="accent-color: var(--primary); width: 18px; height: 18px;">
                    Aktifkan portfolio ini (langsung tampilkan di website)
                </label>
            </div>

            <button type="submit" class="btn-primary" style="padding: 14px 28px; font-size: 15px; border-radius: 12px; width: 100%; justify-content: center;">
                💾 Simpan Portfolio Baru
            </button>
        </form>
    </div>
</div>
@endsection
