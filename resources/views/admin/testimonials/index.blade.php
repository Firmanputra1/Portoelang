@extends('layouts.admin')

@section('title', 'Kelola Testimoni - Admin Panel')

@section('content')
<div class="animate-on-scroll animated">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; flex-wrap: wrap; gap: 16px;">
        <div>
            <div class="section-badge" style="margin-bottom: 8px;">Daftar Testimoni</div>
            <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
                Kelola <span class="gradient-text">Testimoni</span>
            </h2>
            <p style="color: var(--text-secondary); margin-top: 4px;">Kelola testimoni dan ulasan dari klien untuk membangun kepercayaan calon pelanggan.</p>
        </div>
        
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary">
            ➕ Tambah Testimoni
        </a>
    </div>

    @if(session('success'))
        <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 16px 24px; border-radius: 12px; margin-bottom: 32px; font-size: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-table-card">
        <div class="admin-table-header">
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 700;">Semua Testimoni ({{ $testimonials->count() }})</h3>
        </div>
        
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 80px; text-align: center;">Urutan</th>
                        <th>Pengirim</th>
                        <th>Isi Ulasan</th>
                        <th style="width: 120px; text-align: center;">Rating</th>
                        <th style="width: 120px; text-align: center;">Status</th>
                        <th style="width: 200px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                    <tr>
                        <td style="text-align: center; font-weight: 600; color: var(--text-muted);">
                            {{ $testimonial->sort_order }}
                        </td>
                        <td>
                            <strong style="color: var(--text-primary); font-size: 15px;">{{ $testimonial->name }}</strong>
                            <div style="font-size: 12px; color: var(--text-muted); margin-top: 4px;">
                                {{ $testimonial->position ?? '-' }}
                            </div>
                        </td>
                        <td>
                            <div style="font-size: 13px; color: var(--text-secondary); max-width: 400px; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; font-style: italic;">
                                "{{ $testimonial->content }}"
                            </div>
                        </td>
                        <td style="text-align: center; color: var(--accent); font-size: 16px;">
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                ★
                            @endfor
                        </td>
                        <td style="text-align: center;">
                            <form action="{{ route('admin.testimonials.toggle', $testimonial) }}" method="POST">
                                @csrf
                                <button type="submit" style="background: none; border: none; cursor: pointer;">
                                    @if($testimonial->is_active)
                                        <span style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600;">Aktif</span>
                                    @else
                                        <span style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #ef4444; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600;">Nonaktif</span>
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn-secondary" style="padding: 6px 14px; font-size: 12px; border-radius: 8px;">
                                    ✏️ Edit
                                </a>
                                
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-primary" style="padding: 6px 14px; font-size: 12px; border-radius: 8px; background: #ef4444; box-shadow: none;">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 48px; color: var(--text-muted);">
                            Belum ada testimoni terdaftar. Klik tombol di kanan atas untuk menambah testimoni.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
