@extends('layouts.admin')

@section('title', 'Edit Layanan - Admin Panel')

@section('content')
<div class="animate-on-scroll animated">
    <div style="margin-bottom: 32px;">
        <a href="{{ route('admin.services.index') }}" class="btn-secondary" style="padding: 8px 18px; font-size: 13px; border-radius: 8px; margin-bottom: 16px;">
            ← Kembali ke Daftar
        </a>
        <div class="section-badge" style="margin-bottom: 8px;">Edit Konten</div>
        <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
            Edit Layanan: <span class="gradient-text">{{ $service->name }}</span>
        </h2>
        <p style="color: var(--text-secondary); margin-top: 4px;">Perbarui data layanan berikut sesuai dengan perubahan kebutuhan bisnis Anda.</p>
    </div>

    <div class="contact-form-card" style="max-width: 800px;">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap;">
                <div class="form-group">
                    <label for="name" class="form-label">Nama Layanan *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $service->name) }}" placeholder="Contoh: Desain Brosur Lipat" required>
                    @error('name')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price_start" class="form-label">Harga Mulai (Rupiah) *</label>
                    <input type="number" name="price_start" id="price_start" class="form-control" value="{{ old('price_start', $service->price_start) }}" placeholder="Contoh: 150000" required>
                    @error('price_start')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; flex-wrap: wrap;">
                <div class="form-group">
                    <label for="icon" class="form-label">Pilih Ikon</label>
                    <select name="icon" id="icon" class="form-control">
                        <option value="paint-brush" {{ old('icon', $service->icon) == 'paint-brush' ? 'selected' : '' }}>🎨 Ikon Kuas Lukis (Default)</option>
                        <option value="pen-tool" {{ old('icon', $service->icon) == 'pen-tool' ? 'selected' : '' }}>✏️ Ikon Pen Tool (Desain/Logo)</option>
                        <option value="layout" {{ old('icon', $service->icon) == 'layout' ? 'selected' : '' }}>📄 Ikon Layout (Brosur/Flyer)</option>
                        <option value="briefcase" {{ old('icon', $service->icon) == 'briefcase' ? 'selected' : '' }}>💼 Ikon Tas (Company Profile)</option>
                        <option value="monitor" {{ old('icon', $service->icon) == 'monitor' ? 'selected' : '' }}>💻 Ikon Monitor (Website/Digital)</option>
                        <option value="instagram" {{ old('icon', $service->icon) == 'instagram' ? 'selected' : '' }}>📱 Ikon Gadget (Konten Medsos)</option>
                        <option value="star" {{ old('icon', $service->icon) == 'star' ? 'selected' : '' }}>⭐ Ikon Bintang (Paket/Premium)</option>
                    </select>
                    @error('icon')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sort_order" class="form-label">Urutan Tampilan</label>
                    <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $service->sort_order) }}" placeholder="Semakin kecil angka, semakin awal muncul">
                    @error('sort_order')
                        <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="whatsapp_text" class="form-label">Teks Pesanan WhatsApp Kustom</label>
                <input type="text" name="whatsapp_text" id="whatsapp_text" class="form-control" value="{{ old('whatsapp_text', $service->whatsapp_text) }}" placeholder="Contoh: Halo, saya tertarik dengan layanan Desain Brosur.">
                <span style="color: var(--text-muted); font-size: 12px; margin-top: 4px; display: block;">Jika dikosongkan, pesan default akan dibuat otomatis.</span>
                @error('whatsapp_text')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Deskripsi Singkat Layanan</label>
                <textarea name="description" id="description" class="form-control" placeholder="Tuliskan penjelasan singkat mengenai layanan ini..." style="min-height: 100px;">{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="features" class="form-label">Daftar Fitur (Satu fitur per baris)</label>
                <textarea name="features" id="features" class="form-control" placeholder="Contoh:&#10;Konsep original&#10;Revisi maks 3x&#10;Format File PNG & AI" style="min-height: 120px;">{{ old('features', is_array($service->features) ? implode("\n", $service->features) : '') }}</textarea>
                <span style="color: var(--text-muted); font-size: 12px; margin-top: 4px; display: block;">Tekan ENTER untuk membuat baris baru bagi setiap fitur layanan.</span>
                @error('features')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 32px;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--text-secondary); cursor: pointer; user-select: none;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} style="accent-color: var(--primary); width: 18px; height: 18px;">
                    Aktifkan layanan ini (langsung tampilkan di landing page)
                </label>
            </div>

            <button type="submit" class="btn-primary" style="padding: 14px 28px; font-size: 15px; border-radius: 12px; width: 100%; justify-content: center;">
                💾 Simpan Perubahan Layanan
            </button>
        </form>
    </div>
</div>
@endsection
