@extends('admin.layout')

@section('title', 'Tambah Klien')

@section('header_title', 'Tambah Klien')
@section('header_subtitle', 'Tambahkan klien atau partner baru.')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah Klien</h2>
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

    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name" class="form-label">Nama Klien / Instansi *</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Tokopedia" value="{{ old('name') }}" required>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="website" class="form-label">Website Klien (URL)</label>
                <input type="url" id="website" name="website" class="form-control" placeholder="Contoh: https://tokopedia.com" value="{{ old('website') }}">
            </div>
            <div>
                <label for="logo" class="form-label">Logo Klien</label>
                <input type="file" id="logo" name="logo" class="form-control" accept="image/*">
            </div>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: center;">
            <div>
                <label for="sort_order" class="form-label">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
            </div>
            <div style="padding-top: 24px;">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" checked>
                    <span style="font-weight: 600;">Aktifkan Klien</span>
                </label>
            </div>
        </div>

        <div style="margin-top: 36px; display: flex; justify-content: flex-end; gap: 12px;">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan Klien</button>
        </div>
    </form>
</div>
@endsection
