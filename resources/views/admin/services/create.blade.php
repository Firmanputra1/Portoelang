@extends('admin.layout')

@section('title', 'Tambah Layanan')

@section('header_title', 'Tambah Layanan')
@section('header_subtitle', 'Buat jenis jasa desain grafis baru.')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Layanan</h2>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
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

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name" class="form-label">Nama Layanan *</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Desain Brosur Lipat" value="{{ old('name') }}" required>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="price_start" class="form-label">Mulai Harga (Rupiah) *</label>
                <input type="number" id="price_start" name="price_start" class="form-control" placeholder="Contoh: 150000" value="{{ old('price_start') }}" required>
            </div>
            <div>
                <label for="icon" class="form-label">Icon (Nama Kelas / Lucide) *</label>
                <input type="text" id="icon" name="icon" class="form-control" placeholder="Contoh: pen-tool, monitor, layout, briefcase" value="{{ old('icon') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Deskripsi Singkat</label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Jelaskan mengenai layanan desain ini..." style="resize: vertical;">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="features" class="form-label">Fitur / Keunggulan (Satu per baris)</label>
            <textarea id="features" name="features" class="form-control" rows="5" placeholder="Contoh:&#10;Konsep original&#10;Revisi 3x&#10;File AI, PNG, SVG" style="resize: vertical;">{{ old('features') }}</textarea>
            <span style="font-size: 12px; color: var(--text-muted); margin-top: 4px; display: block;">Tuliskan setiap keunggulan/fitur di baris baru (tekan Enter untuk membuat baris baru).</span>
        </div>

        <div class="form-group">
            <label for="whatsapp_text" class="form-label">WhatsApp Default Text</label>
            <input type="text" id="whatsapp_text" name="whatsapp_text" class="form-control" placeholder="Contoh: Halo, saya ingin memesan Desain Logo..." value="{{ old('whatsapp_text') }}">
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: center;">
            <div>
                <label for="sort_order" class="form-label">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
            </div>
            <div style="padding-top: 24px;">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" checked>
                    <span style="font-weight: 600;">Aktifkan Layanan</span>
                </label>
            </div>
        </div>

        <div style="margin-top: 36px; display: flex; justify-content: flex-end; gap: 12px;">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan Layanan</button>
        </div>
    </form>
</div>
@endsection
