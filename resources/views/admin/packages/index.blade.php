@extends('layouts.admin')

@section('title', 'Kelola Paket Harga - Admin Panel')

@section('content')
<div class="animate-on-scroll animated">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; flex-wrap: wrap; gap: 16px;">
        <div>
            <div class="section-badge" style="margin-bottom: 8px;">Daftar Paket</div>
            <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
                Kelola <span class="gradient-text">Paket Harga</span>
            </h2>
            <p style="color: var(--text-secondary); margin-top: 4px;">Kelola paket bundel harga transparan yang Anda tawarkan untuk bisnis klien.</p>
        </div>
        
        <a href="{{ route('admin.packages.create') }}" class="btn-primary">
            ➕ Tambah Paket
        </a>
    </div>

    @if(session('success'))
        <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 16px 24px; border-radius: 12px; margin-bottom: 32px; font-size: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-table-card">
        <div class="admin-table-header">
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 700;">Semua Paket Harga ({{ $packages->count() }})</h3>
        </div>
        
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 80px; text-align: center;">Urutan</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th style="width: 120px; text-align: center;">Populer</th>
                        <th style="width: 120px; text-align: center;">Status</th>
                        <th style="width: 200px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($packages as $package)
                    <tr>
                        <td style="text-align: center; font-weight: 600; color: var(--text-muted);">
                            {{ $package->sort_order }}
                        </td>
                        <td>
                            <strong style="color: var(--text-primary); font-size: 15px;">{{ $package->name }}</strong>
                            <div style="font-size: 12px; color: var(--text-muted); margin-top: 4px;">
                                {{ $package->subtitle }}
                            </div>
                        </td>
                        <td style="font-family: 'Space Grotesk', sans-serif; font-weight: 700; color: var(--text-primary);">
                            Rp {{ number_format($package->price, 0, ',', '.') }}
                        </td>
                        <td style="text-align: center;">
                            @if($package->is_popular)
                                <span style="background: rgba(245,158,11,0.1); border: 1px solid rgba(245,158,11,0.3); color: var(--accent); padding: 4px 10px; border-radius: 50px; font-size: 11px; font-weight: 700;">⭐ POPULER</span>
                            @else
                                <span style="color: var(--text-muted); font-size: 12px;">Biasa</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <form action="{{ route('admin.packages.toggle', $package) }}" method="POST">
                                @csrf
                                <button type="submit" style="background: none; border: none; cursor: pointer;">
                                    @if($package->is_active)
                                        <span style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600;">Aktif</span>
                                    @else
                                        <span style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #ef4444; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600;">Nonaktif</span>
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('admin.packages.edit', $package) }}" class="btn-secondary" style="padding: 6px 14px; font-size: 12px; border-radius: 8px;">
                                    ✏️ Edit
                                </a>
                                
                                <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">
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
                            Belum ada paket harga terdaftar. Klik tombol di kanan atas untuk menambah paket.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
