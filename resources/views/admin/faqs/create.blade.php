@extends('admin.layout')

@section('title', 'Tambah FAQ')

@section('header_title', 'Tambah FAQ')
@section('header_subtitle', 'Masukkan tanya jawab baru.')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Form Tambah FAQ</h2>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
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

    <form action="{{ route('admin.faqs.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="question" class="form-label">Pertanyaan *</label>
            <input type="text" id="question" name="question" class="form-control" placeholder="Contoh: Apakah ada revisi desain gratis?" value="{{ old('question') }}" required>
        </div>

        <div class="form-group">
            <label for="answer" class="form-label">Jawaban *</label>
            <textarea id="answer" name="answer" class="form-control" rows="6" placeholder="Masukkan jawaban lengkap dari pertanyaan tersebut..." style="resize: vertical;" required>{{ old('answer') }}</textarea>
        </div>

        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: center;">
            <div>
                <label for="sort_order" class="form-label">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
            </div>
            <div style="padding-top: 24px;">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" checked>
                    <span style="font-weight: 600;">Aktifkan FAQ</span>
                </label>
            </div>
        </div>

        <div style="margin-top: 36px; display: flex; justify-content: flex-end; gap: 12px;">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan FAQ</button>
        </div>
    </form>
</div>
@endsection
