@extends('admin.layout')

@section('title', 'Tambah Portofolio')

@section('header_title', 'Tambah Karya')
@section('header_subtitle', 'Masukkan data karya desain grafis baru ke dalam galeri.')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Portofolio</h2>
        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">
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

    <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="title" class="form-label">Judul Karya *</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Contoh: Rebranding Kopi Kenangan" value="{{ old('title') }}" required>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="service_id" class="form-label">Layanan Desain Terkait</label>
                <select id="service_id" name="service_id" class="form-control">
                    <option value="">-- Pilih Layanan (Opsional) --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="category" class="form-label">Kategori Tampilan (Untuk Filter Halaman Depan) *</label>
                <input type="text" id="category" name="category" class="form-control" placeholder="Contoh: Logo, Brosur, Website, Social Media" value="{{ old('category', 'Logo') }}" required>
            </div>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="client_name" class="form-label">Nama Klien (Opsional)</label>
                <input type="text" id="client_name" name="client_name" class="form-control" placeholder="Contoh: PT. Maju Jaya" value="{{ old('client_name') }}">
            </div>
            <div>
                <label for="image" class="form-label">File Gambar Karya</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Keterangan / Detail Karya</label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Jelaskan mengenai konsep atau detail pengerjaan desain ini..." style="resize: vertical;">{{ old('description') }}</textarea>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: center;">
            <div>
                <label for="sort_order" class="form-label">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
            </div>
            <div style="padding-top: 24px;">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" checked>
                    <span style="font-weight: 600;">Aktifkan Karya (Tampilkan di Beranda)</span>
                </label>
            </div>
        </div>

        <div style="margin-top: 36px; display: flex; justify-content: flex-end; gap: 12px;">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan Portofolio</button>
        </div>
    </form>
</div>
@endsection
