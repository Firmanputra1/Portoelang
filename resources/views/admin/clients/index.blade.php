@extends('layouts.admin')

@section('title', 'Kelola Klien - Admin Panel')

@section('content')
<div class="animate-on-scroll animated">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; flex-wrap: wrap; gap: 16px;">
        <div>
            <div class="section-badge" style="margin-bottom: 8px;">Daftar Klien</div>
            <h2 style="font-family: 'Space Grotesk', sans-serif; font-size: 32px; font-weight: 700; color: var(--text-primary);">
                Kelola <span class="gradient-text">Klien</span>
            </h2>
            <p style="color: var(--text-secondary); margin-top: 4px;">Kelola daftar logo dan nama perusahaan klien yang bekerja sama dengan Anda.</p>
        </div>
        
        <a href="{{ route('admin.clients.create') }}" class="btn-primary">
            ➕ Tambah Klien
        </a>
    </div>

    @if(session('success'))
        <div style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 16px 24px; border-radius: 12px; margin-bottom: 32px; font-size: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-table-card">
        <div class="admin-table-header">
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 700;">Semua Klien ({{ $clients->count() }})</h3>
        </div>
        
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 80px; text-align: center;">Urutan</th>
                        <th>Klien</th>
                        <th>Website</th>
                        <th style="width: 120px; text-align: center;">Status</th>
                        <th style="width: 200px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                    <tr>
                        <td style="text-align: center; font-weight: 600; color: var(--text-muted);">
                            {{ $client->sort_order }}
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 16px;">
                                <div style="width: 50px; height: 50px; border-radius: 8px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 700; overflow: hidden; color: var(--primary-light);">
                                    @if($client->logo)
                                        <img src="{{ asset('storage/' . $client->logo) }}" alt="" style="width: 100%; height: 100%; object-fit: contain; padding: 4px;">
                                    @else
                                        🤝
                                    @endif
                                </div>
                                <strong style="color: var(--text-primary); font-size: 15px;">{{ $client->name }}</strong>
                            </div>
                        </td>
                        <td>
                            @if($client->website)
                                <a href="{{ $client->website }}" target="_blank" style="color: var(--primary-light); text-decoration: none;">
                                    {{ Str::limit($client->website, 30) }} ↗
                                </a>
                            @else
                                <span style="color: var(--text-muted); font-size: 13px;">Tidak ada link</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <form action="{{ route('admin.clients.toggle', $client) }}" method="POST">
                                @csrf
                                <button type="submit" style="background: none; border: none; cursor: pointer;">
                                    @if($client->is_active)
                                        <span style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #22c55e; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600;">Aktif</span>
                                    @else
                                        <span style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #ef4444; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 600;">Nonaktif</span>
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('admin.clients.edit', $client) }}" class="btn-secondary" style="padding: 6px 14px; font-size: 12px; border-radius: 8px;">
                                    ✏️ Edit
                                </a>
                                
                                <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus klien ini?')">
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
                        <td colspan="5" style="text-align: center; padding: 48px; color: var(--text-muted);">
                            Belum ada klien terdaftar. Klik tombol di kanan atas untuk menambah klien.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
