@extends('admin.layout')

@section('title', 'Edit Klien')

@section('header_title', 'Edit Klien')
@section('header_subtitle', 'Ubah data klien partner.')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Klien: {{ $client->name }}</h2>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
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

    <form action="{{ route('admin.clients.update', $client) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name" class="form-label">Nama Klien / Instansi *</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $client->name) }}" required>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="website" class="form-label">Website Klien (URL)</label>
                <input type="url" id="website" name="website" class="form-control" value="{{ old('website', $client->website) }}">
            </div>
            <div>
                <label for="logo" class="form-label">Logo Klien (Biarkan kosong jika tidak diubah)</label>
                <input type="file" id="logo" name="logo" class="form-control" accept="image/*">
            </div>
        </div>

        @if($client->logo)
        <div class="form-group">
            <label class="form-label">Logo Saat Ini:</label>
            <div style="margin-top: 8px;">
                <img src="{{ (config('filesystems.default') === 'local' || config('filesystems.default') === 'public') ? asset('storage/' . $client->logo) : Storage::disk(config('filesystems.default'))->url($client->logo) }}" alt="Logo Preview" style="max-width: 150px; max-height: 60px; object-fit: contain; background: rgba(255,255,255,0.02); padding: 6px; border-radius: 6px; border: 1px solid var(--border);">
            </div>
        </div>
        @endif

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: center;">
            <div>
                <label for="sort_order" class="form-label">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', $client->sort_order) }}">
            </div>
            <div style="padding-top: 24px;">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $client->is_active) ? 'checked' : '' }}>
                    <span style="font-weight: 600;">Aktifkan Klien</span>
                </label>
            </div>
        </div>

        <div style="margin-top: 36px; display: flex; justify-content: flex-end; gap: 12px;">
            <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
