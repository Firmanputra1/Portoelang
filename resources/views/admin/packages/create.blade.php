@extends('layouts.admin')

@section('title', 'Tambah Paket Baru - Admin Panel')

@section('content')
<div class="animate-on-scroll animated">
    <div style="margin-bottom: 32px;">
        <a href="{{ route('admin.packages.index') }}" class="btn-secondary" style="padding: 8px 18px; font-size: 13px; border-radius: 8px; margin-bottom: 16px;">
            ← Kembali ke Daftar
        </a>
        <div class="section-badge" style="margin-bottom: 8px;">Tambah Konten</div>
        <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
            Tambah <span class="gradient-text">Paket Harga Baru</span>
        </h2>
        <p style="color: var(--text-secondary); margin-top: 4px;">Isi formulir berikut untuk menambahkan pilihan paket harga baru ke landing page.</p>
    </div>

    <div class="contact-form-card" style="max-width: 800px;">
        <form action="{{ route('admin.packages.store') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap;">
                <div class="form-group">
                    <label for="name" class="form-label">Nama Paket *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Paket Branding Umbi" required>
                    @error('name')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price" class="form-label">Harga Paket (Rupiah) *</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" placeholder="Contoh: 799000" required>
                    @error('price')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap;">
                <div class="form-group">
                    <label for="subtitle" class="form-label">Subjudul / Tagline Singkat</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}" placeholder="Contoh: Paling cocok untuk UMKM berkembang">
                    @error('subtitle')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="badge_color" class="form-label">Kode Warna Badge (Hex/Nama)</label>
                    <input type="text" name="badge_color" id="badge_color" class="form-control" value="{{ old('badge_color', '#6366f1') }}" placeholder="Contoh: #6366f1">
                    @error('badge_color')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap;">
                <div class="form-group">
                    <label for="whatsapp_text" class="form-label">Teks Pemesanan WhatsApp Kustom</label>
                    <input type="text" name="whatsapp_text" id="whatsapp_text" class="form-control" value="{{ old('whatsapp_text') }}" placeholder="Contoh: Halo, saya ingin paket Professional">
                    @error('whatsapp_text')
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
                <label for="features" class="form-label">Fitur Paket (Satu fitur per baris) *</label>
                <textarea name="features" id="features" class="form-control" placeholder="Contoh:&#10;Logo Full Package&#10;Kartu nama + Kop Surat&#10;Revisi tak terbatas" style="min-height: 150px;" required>{{ old('features') }}</textarea>
                <span style="color: var(--text-muted); font-size: 12px; margin-top: 4px; display: block;">Tekan ENTER untuk membuat baris baru bagi setiap fitur paket.</span>
                @error('features')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; gap: 24px; margin-bottom: 32px; flex-wrap: wrap;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--text-secondary); cursor: pointer; user-select: none;">
                    <input type="checkbox" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }} style="accent-color: var(--primary); width: 18px; height: 18px;">
                    ⭐ Tandai sebagai Paket Terpopuler
                </label>

                <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--text-secondary); cursor: pointer; user-select: none;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} style="accent-color: var(--primary); width: 18px; height: 18px;">
                    Aktifkan paket ini (langsung tampilkan di landing page)
                </label>
            </div>

            <button type="submit" class="btn-primary" style="padding: 14px 28px; font-size: 15px; border-radius: 12px; width: 100%; justify-content: center;">
                💾 Simpan Paket Baru
            </button>
        </form>
    </div>
</div>
@endsection
