@extends('admin.layout')

@section('title', 'Edit Testimoni')

@section('header_title', 'Edit Testimoni')
@section('header_subtitle', 'Ubah data ulasan pelanggan.')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Form Edit Testimoni: {{ $testimonial->name }}</h2>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
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

    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name" class="form-label">Nama Pelanggan *</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label for="position" class="form-label">Jabatan / Keterangan</label>
                <input type="text" id="position" name="position" class="form-control" value="{{ old('position', $testimonial->position) }}">
            </div>
            <div>
                <label for="rating" class="form-label">Rating Penilaian (Bintang) *</label>
                <select id="rating" name="rating" class="form-control" required>
                    <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                    <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Bintang)</option>
                    <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>⭐⭐⭐ (3 Bintang)</option>
                    <option value="2" {{ old('rating', $testimonial->rating) == 2 ? 'selected' : '' }}>⭐⭐ (2 Bintang)</option>
                    <option value="1" {{ old('rating', $testimonial->rating) == 1 ? 'selected' : '' }}>⭐ (1 Bintang)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Isi Ulasan / Testimoni *</label>
            <textarea id="content" name="content" class="form-control" rows="5" style="resize: vertical;" required>{{ old('content', $testimonial->content) }}</textarea>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: center;">
            <div>
                <label for="sort_order" class="form-label">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', $testimonial->sort_order) }}">
            </div>
            <div style="padding-top: 24px;">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                    <span style="font-weight: 600;">Aktifkan Testimoni</span>
                </label>
            </div>
        </div>

        <div style="margin-top: 36px; display: flex; justify-content: flex-end; gap: 12px;">
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
