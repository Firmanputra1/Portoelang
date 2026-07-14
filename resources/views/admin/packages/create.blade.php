@extends('admin.layout')

@section('title', 'Tambah Paket Harga')

@section('header_title', 'Tambah Paket Harga')
@section('header_subtitle', 'Buat jenis penawaran paket harga baru.')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Paket</h2>
        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
            Kembali
        </a>
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

    <form action="{{ route('admin.packages.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name" class="form-label">Nama Paket *</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Starter, Professional, Enterprise" value="{{ old('name') }}" required>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="price" class="form-label">Harga (Rupiah) *</label>
                <input type="number" id="price" name="price" class="form-control" placeholder="Contoh: 299000" value="{{ old('price') }}" required>
            </div>
            <div>
                <label for="badge_color" class="form-label">Warna Badge (Hex Code)</label>
                <input type="text" id="badge_color" name="badge_color" class="form-control" placeholder="Contoh: #6366f1" value="{{ old('badge_color', '#6366f1') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="subtitle" class="form-label">Subjudul / Keterangan Singkat</label>
            <input type="text" id="subtitle" name="subtitle" class="form-control" placeholder="Contoh: Untuk bisnis yang baru mulai" value="{{ old('subtitle') }}">
        </div>

        <div class="form-group">
            <label for="features" class="form-label">Fitur / Layanan yang Didapat (Satu per baris)</label>
            <textarea id="features" name="features" class="form-control" rows="6" placeholder="Contoh:&#10;1 Desain Logo (3 konsep)&#10;Kartu Nama&#10;Revisi 3x&#10;File AI & PNG" style="resize: vertical;">{{ old('features') }}</textarea>
            <span style="font-size: 12px; color: var(--text-muted); margin-top: 4px; display: block;">Tuliskan setiap fitur paket di baris baru.</span>
        </div>

        <div class="form-group">
            <label for="whatsapp_text" class="form-label">WhatsApp Default Text</label>
            <input type="text" id="whatsapp_text" name="whatsapp_text" class="form-control" placeholder="Contoh: Halo, saya tertarik dengan paket Starter..." value="{{ old('whatsapp_text') }}">
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="sort_order" class="form-label">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
            </div>
            <div style="display: flex; flex-direction: column; gap: 10px; padding-top: 14px;">
                <label class="form-check">
                    <input type="checkbox" name="is_popular" value="1">
                    <span style="font-weight: 600;">Jadikan Paket Terpopuler (Rekomendasi)</span>
                </label>
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" checked>
                    <span style="font-weight: 600;">Aktifkan Paket Ini</span>
                </label>
            </div>
        </div>

        <div style="margin-top: 36px; display: flex; justify-content: flex-end; gap: 12px;">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan Paket</button>
        </div>
    </form>
</div>
@endsection
