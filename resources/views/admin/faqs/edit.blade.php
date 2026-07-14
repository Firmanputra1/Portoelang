@extends('layouts.admin')

@section('title', 'Edit FAQ - Admin Panel')

@section('content')
<div class="animate-on-scroll animated">
    <div style="margin-bottom: 32px;">
        <a href="{{ route('admin.faqs.index') }}" class="btn-secondary" style="padding: 8px 18px; font-size: 13px; border-radius: 8px; margin-bottom: 16px;">
            ← Kembali ke Daftar
        </a>
        <div class="section-badge" style="margin-bottom: 8px;">Edit Konten</div>
        <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
            Edit FAQ: <span class="gradient-text">{{ Str::limit($faq->question, 40) }}</span>
        </h2>
        <p style="color: var(--text-secondary); margin-top: 4px;">Perbarui isi tanya jawab FAQ Anda.</p>
    </div>

    <div class="contact-form-card" style="max-width: 800px;">
        <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="question" class="form-label">Pertanyaan *</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ old('question', $faq->question) }}" placeholder="Contoh: Berapa lama pengerjaan desain logo?" required>
                @error('question')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="sort_order" class="form-label">Urutan Tampilan</label>
                <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $faq->sort_order) }}" placeholder="Semakin kecil angka, semakin awal muncul">
                @error('sort_order')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="answer" class="form-label">Jawaban *</label>
                <textarea name="answer" id="answer" class="form-control" placeholder="Tuliskan jawaban lengkap atas pertanyaan di atas..." style="min-height: 150px;" required>{{ old('answer', $faq->answer) }}</textarea>
                @error('answer')
                    <span style="color: #ef4444; font-size: 13px; margin-top: 6px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 32px;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--text-secondary); cursor: pointer; user-select: none;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $faq->is_active) ? 'checked' : '' }} style="accent-color: var(--primary); width: 18px; height: 18px;">
                    Aktifkan FAQ ini (langsung tampilkan di landing page)
                </label>
            </div>

            <button type="submit" class="btn-primary" style="padding: 14px 28px; font-size: 15px; border-radius: 12px; width: 100%; justify-content: center;">
                💾 Simpan Perubahan FAQ
            </button>
        </form>
    </div>
</div>
@endsection
