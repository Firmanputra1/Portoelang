@extends('layouts.admin')

@section('title', 'Edit Klien - Admin Panel')

@section('content')
<div class="animate-on-scroll animated">
    <div style="margin-bottom: 32px;">
        <a href="{{ route('admin.clients.index') }}" class="btn-secondary" style="padding: 8px 18px; font-size: 13px; border-radius: 8px; margin-bottom: 16px;">
            ← Kembali ke Daftar
        </a>
        <div class="section-badge" style="margin-bottom: 8px;">Edit Konten</div>
        <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
            Edit Klien: <span class="gradient-text">{{ $client->name }}</span>
        </h2>
        <p style="color: var(--text-secondary); margin-top: 4px;">Perbarui data perusahaan mitra kerja sama.</p>
    </div>

    <div class="contact-form-card" style="max-width: 800px;">
        <form action="{{ route('admin.clients.update', $client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap;">
                <div class="form-group">
                    <label for="name" class="form-label">Nama Klien / Perusahaan *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $client->name) }}" placeholder="Contoh: Shopee Indonesia" required>
                    @error('name')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="website" class="form-label">Tautan Website Klien</label>
                    <input type="url" name="website" id="website" class="form-control" value="{{ old('website', $client->website) }}" placeholder="Contoh: https://shopee.co.id">
                    @error('website')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap;">
                <div class="form-group">
                    <label for="logo" class="form-label">Ubah Logo Klien (Max: 1MB)</label>
                    <input type="file" name="logo" id="logo" class="form-control" style="padding: 10px;">
                    @if($client->logo)
                        <div style="margin-top: 12px; display: flex; align-items: center; gap: 12px;">
                            <img src="{{ asset('storage/' . $client->logo) }}" alt="Preview" style="width: 60px; height: 60px; border-radius: 8px; object-fit: contain; background: rgba(255,255,255,0.03); border: 1px solid var(--border); padding: 4px;">
                            <span style="font-size: 13px; color: var(--text-secondary);">Logo saat ini aktif. Unggah baru untuk mengganti.</span>
                        </div>
                    @endif
                    @error('logo')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sort_order" class="form-label">Urutan Tampilan</label>
                    <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $client->sort_order) }}" placeholder="Semakin kecil angka, semakin awal muncul">
                    @error('sort_order')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 32px;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--text-secondary); cursor: pointer; user-select: none;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $client->is_active) ? 'checked' : '' }} style="accent-color: var(--primary); width: 18px; height: 18px;">
                    Aktifkan klien ini (langsung tampilkan di landing page)
                </label>
            </div>

            <button type="submit" class="btn-primary" style="padding: 14px 28px; font-size: 15px; border-radius: 12px; width: 100%; justify-content: center;">
                💾 Simpan Perubahan Klien
            </button>
        </form>
    </div>
</div>
@endsection
