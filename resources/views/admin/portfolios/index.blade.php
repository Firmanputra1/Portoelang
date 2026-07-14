@extends('layouts.admin')

@section('title', 'Kelola Portfolio - Admin Panel')

@section('content')
<div class="animate-on-scroll animated">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; flex-wrap: wrap; gap: 16px;">
        <div>
            <div class="section-badge" style="margin-bottom: 8px;">Daftar Portfolio</div>
            <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
                Kelola <span class="gradient-text">Portfolio</span>
            </h2>
            <p style="color: var(--text-secondary); margin-top: 4px;">Kelola galeri karya terbaik untuk ditampilkan di halaman depan.</p>
        </div>
        
        <a href="{{ route('admin.portfolios.create') }}" class="btn-primary">
            ➕ Tambah Portfolio
        </a>
    </div>

    @if(session('success'))
        <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 16px 24px; border-radius: 12px; margin-bottom: 32px; font-size: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-table-card">
        <div class="admin-table-header">
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 700;">Semua Portfolio ({{ $portfolios->count() }})</h3>
        </div>
        
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 80px; text-align: center;">Urutan</th>
                        <th>Karya</th>
                        <th>Kategori</th>
                        <th>Nama Klien</th>
                        <th style="width: 120px; text-align: center;">Status</th>
                        <th style="width: 200px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $portfolio)
                    <tr>
                        <td style="text-align: center; font-weight: 600; color: var(--text-muted);">
                            {{ $portfolio->sort_order }}
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 16px;">
                                <div style="width: 50px; height: 50px; border-radius: 8px; background: linear-gradient(135deg, #1a1a2e, #16213e); display: flex; align-items: center; justify-content: center; font-size: 20px; overflow: hidden;">
                                    @if($portfolio->image)
                                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        🎨
                                    @endif
                                </div>
                                <div>
                                    <strong style="color: var(--text-primary); font-size: 15px;">{{ $portfolio->title }}</strong>
                                    <div style="font-size: 12px; color: var(--text-muted); margin-top: 4px; max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $portfolio->description }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span style="background: rgba(99,102,241,0.1); color: var(--primary-light); padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600;">
                                {{ $portfolio->category }}
                            </span>
                        </td>
                        <td style="color: var(--text-secondary);">
                            {{ $portfolio->client_name ?? '-' }}
                        </td>
                        <td style="text-align: center;">
                            <form action="{{ route('admin.portfolios.toggle', $portfolio) }}" method="POST">
                                @csrf
                                <button type="submit" style="background: none; border: none; cursor: pointer;">
                                    @if($portfolio->is_active)
                                        <span style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600;">Aktif</span>
                                    @else
                                        <span style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #ef4444; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600;">Nonaktif</span>
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn-secondary" style="padding: 6px 14px; font-size: 12px; border-radius: 8px;">
                                    ✏️ Edit
                                </a>
                                
                                <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus portfolio ini?')">
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
                            Belum ada portfolio terdaftar. Klik tombol di kanan atas untuk menambah portfolio.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
