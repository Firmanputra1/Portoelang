@extends('admin.layout')

@section('title', 'Edit Layanan')

@section('header_title', 'Edit Layanan')
@section('header_subtitle', 'Ubah data jasa desain grafis.')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Layanan: {{ $service->name }}</h2>
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

    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name" class="form-label">Nama Layanan *</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $service->name) }}" required>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="price_start" class="form-label">Mulai Harga (Rupiah) *</label>
                <input type="number" id="price_start" name="price_start" class="form-control" value="{{ old('price_start', $service->price_start) }}" required>
            </div>
            <div>
                <label for="icon" class="form-label">Icon (Nama Kelas / Lucide) *</label>
                <input type="text" id="icon" name="icon" class="form-control" value="{{ old('icon', $service->icon) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Deskripsi Singkat</label>
            <textarea id="description" name="description" class="form-control" rows="4" style="resize: vertical;">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="features" class="form-label">Fitur / Keunggulan (Satu per baris)</label>
            @php
                $featuresText = is_array($service->features) ? implode("\n", $service->features) : '';
            @endphp
            <textarea id="features" name="features" class="form-control" rows="5" style="resize: vertical;">{{ old('features', $featuresText) }}</textarea>
            <span style="font-size: 12px; color: var(--text-muted); margin-top: 4px; display: block;">Tuliskan setiap keunggulan/fitur di baris baru (tekan Enter untuk membuat baris baru).</span>
        </div>

        <div class="form-group">
            <label for="whatsapp_text" class="form-label">WhatsApp Default Text</label>
            <input type="text" id="whatsapp_text" name="whatsapp_text" class="form-control" value="{{ old('whatsapp_text', $service->whatsapp_text) }}">
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: center;">
            <div>
                <label for="sort_order" class="form-label">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', $service->sort_order) }}">
            </div>
            <div style="padding-top: 24px;">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                    <span style="font-weight: 600;">Aktifkan Layanan</span>
                </label>
            </div>
        </div>

        <div style="margin-top: 36px; display: flex; justify-content: flex-end; gap: 12px;">
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
