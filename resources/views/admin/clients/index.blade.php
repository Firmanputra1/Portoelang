@extends('admin.layout')

@section('title', 'Klien Partner')

@section('header_title', 'Kelola Klien')
@section('header_subtitle', 'Kelola daftar logo klien / partner yang ditampilkan di beranda.')

@section('content')
<div class="card">
    <div class="card-header" style="margin-bottom: 20px;">
        <h2 class="card-title">Daftar Klien</h2>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="vertical-align: middle;"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Tambah Klien Baru
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="filter-search-bar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; gap: 16px; flex-wrap: wrap;">
        <!-- Search Input -->
        <div style="position: relative; flex-grow: 1; max-width: 400px; min-width: 250px;">
            <input type="text" id="clientSearch" placeholder="Cari klien..." class="form-control" style="padding-left: 40px; margin-bottom: 0;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-muted);">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </div>
        
        <!-- View Toggle Button -->
        <div style="display: flex; gap: 12px; align-items: center;">
            <div style="display: inline-flex; background: rgba(0,0,0,0.2); border: 1px solid var(--border); border-radius: var(--radius); padding: 4px; height: 46px; align-items: center;">
                <button type="button" id="btnListView" class="btn" style="padding: 8px 12px; font-size: 13px; background: transparent; box-shadow: none; border-radius: 8px; color: var(--text-secondary); display: flex; align-items: center; justify-content: center;" title="Mode Daftar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                </button>
                <button type="button" id="btnCardView" class="btn" style="padding: 8px 12px; font-size: 13px; background: transparent; box-shadow: none; border-radius: 8px; color: var(--text-secondary); display: flex; align-items: center; justify-content: center;" title="Mode Kartu">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- MODE 1: LIST VIEW -->
    <div id="listViewContainer" class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 120px;">Logo</th>
                    <th>Nama Klien</th>
                    <th>Website</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 200px; text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clients as $client)
                <tr class="table-row-element" data-name="{{ strtolower($client->name) }}">
                    <td>
                        @if($client->logo)
                            <img src="{{ Storage::disk(config('filesystems.default') === 'local' ? 'public' : config('filesystems.default'))->url($client->logo) }}" alt="{{ $client->name }}" style="max-width: 100px; max-height: 40px; object-fit: contain; background: rgba(255,255,255,0.02); padding: 4px; border-radius: 4px; border: 1px solid var(--border);">
                        @else
                            <div style="font-size: 11px; color: var(--text-muted);">Tidak ada logo</div>
                        @endif
                    </td>
                    <td>
                        <strong style="font-size: 15px; color: white;">{{ $client->name }}</strong>
                    </td>
                    <td>
                        @if($client->website)
                            <a href="{{ $client->website }}" target="_blank" style="color: var(--primary-light); text-decoration: none; font-size: 13px;">
                                {{ $client->website }} ↗
                            </a>
                        @else
                            <span style="color: var(--text-muted); font-size: 13px;">-</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.clients.toggle', $client) }}" method="POST">
                            @csrf
                            <button type="submit" class="badge {{ $client->is_active ? 'badge-success' : 'badge-danger' }}" style="border: none; cursor: pointer;">
                                {{ $client->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td style="text-align: right;">
                        <div style="display: inline-flex; gap: 8px;">
                            <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">
                                Edit
                            </a>
                            <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus klien ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 12px;">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="empty-state">
                    <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 40px 0;">
                        Belum ada data klien/partner. Klik tombol di atas untuk menambahkan.
                    </td>
                </tr>
                @endforelse
                <tr id="tableNoResults" style="display: none;">
                    <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 40px 0;">
                        Tidak ada klien yang cocok dengan pencarian Anda.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- MODE 2: CARD VIEW -->
    <div id="cardViewContainer" style="display: none;">
        <div class="clients-cards-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 24px;">
            @forelse($clients as $client)
            <div class="client-card-item" data-name="{{ strtolower($client->name) }}" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 24px; display: flex; flex-direction: column; position: relative; transition: var(--transition); text-align: center; align-items: center;">
                
                <!-- Sort Order Badge -->
                <span class="badge" style="position: absolute; top: 12px; right: 12px; background: rgba(255,255,255,0.05); color: var(--text-secondary);">
                    Urutan: {{ $client->sort_order }}
                </span>

                <!-- Logo Container -->
                <div style="width: 100%; height: 80px; display: flex; align-items: center; justify-content: center; margin-bottom: 16px; background: rgba(0,0,0,0.15); border-radius: 8px; border: 1px solid var(--border); padding: 8px;">
                    @if($client->logo)
                        <img src="{{ Storage::disk(config('filesystems.default') === 'local' ? 'public' : config('filesystems.default'))->url($client->logo) }}" alt="{{ $client->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    @else
                        <span style="font-size: 12px; color: var(--text-muted); font-style: italic;">Tanpa Logo</span>
                    @endif
                </div>

                <!-- Client Name -->
                <h3 style="font-size: 15px; font-weight: 700; color: white; margin-bottom: 6px;">{{ $client->name }}</h3>

                <!-- Website -->
                <div style="margin-bottom: 20px;">
                    @if($client->website)
                        <a href="{{ $client->website }}" target="_blank" style="color: var(--primary-light); text-decoration: none; font-size: 12px;">
                            {{ Str::limit($client->website, 25) }} ↗
                        </a>
                    @else
                        <span style="color: var(--text-muted); font-size: 12px;">-</span>
                    @endif
                </div>

                <!-- Card Actions -->
                <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); padding-top: 16px; gap: 8px;">
                    <form action="{{ route('admin.clients.toggle', $client) }}" method="POST">
                        @csrf
                        <button type="submit" class="badge {{ $client->is_active ? 'badge-success' : 'badge-danger' }}" style="border: none; cursor: pointer;">
                            {{ $client->is_active ? 'Aktif' : 'Nonaktif' }}
                        </button>
                    </form>

                    <div style="display: flex; gap: 6px;">
                        <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px; gap: 0;">
                            Edit
                        </a>
                        <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus klien ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 12px; gap: 0;">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state-card" style="text-align: center; color: var(--text-muted); padding: 40px 0; grid-column: 1/-1;">
                Belum ada data klien/partner.
            </div>
            @endforelse
            <div id="cardNoResults" style="display: none; text-align: center; color: var(--text-muted); padding: 40px 0; grid-column: 1/-1;">
                Tidak ada klien yang cocok dengan pencarian Anda.
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('clientSearch');
        const btnListView = document.getElementById('btnListView');
        const btnCardView = document.getElementById('btnCardView');
        const listViewContainer = document.getElementById('listViewContainer');
        const cardViewContainer = document.getElementById('cardViewContainer');
        const tableNoResults = document.getElementById('tableNoResults');
        const cardNoResults = document.getElementById('cardNoResults');
        const emptyStates = document.querySelectorAll('.empty-state, .empty-state-card');
        
        // --- VIEW MODE SYSTEM ---
        const setViewMode = (mode) => {
            if (mode === 'card') {
                listViewContainer.style.display = 'none';
                cardViewContainer.style.display = 'block';
                btnCardView.style.background = 'var(--primary)';
                btnCardView.style.color = 'white';
                btnListView.style.background = 'transparent';
                btnListView.style.color = 'var(--text-secondary)';
                localStorage.setItem('client_view_mode', 'card');
            } else {
                listViewContainer.style.display = 'block';
                cardViewContainer.style.display = 'none';
                btnListView.style.background = 'var(--primary)';
                btnListView.style.color = 'white';
                btnCardView.style.background = 'transparent';
                btnCardView.style.color = 'var(--text-secondary)';
                localStorage.setItem('client_view_mode', 'list');
            }
        };

        // Load preference
        const savedMode = localStorage.getItem('client_view_mode') || 'list';
        setViewMode(savedMode);

        btnListView.addEventListener('click', () => setViewMode('list'));
        btnCardView.addEventListener('click', () => setViewMode('card'));

        // --- SEARCH & FILTER SYSTEM ---
        const filterElements = () => {
            const searchQuery = searchInput.value.toLowerCase().trim();

            // Filter Table Rows
            const tableRows = document.querySelectorAll('.table-row-element');
            let tableVisibleCount = 0;
            tableRows.forEach(row => {
                const name = row.dataset.name;
                if (name.includes(searchQuery)) {
                    row.style.display = '';
                    tableVisibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Filter Card Grid Items
            const cardItems = document.querySelectorAll('.client-card-item');
            let cardVisibleCount = 0;
            cardItems.forEach(card => {
                const name = card.dataset.name;
                if (name.includes(searchQuery)) {
                    card.style.display = 'flex';
                    cardVisibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Toggle No Results Alerts
            if (tableRows.length > 0) {
                tableNoResults.style.display = tableVisibleCount === 0 ? '' : 'none';
                emptyStates.forEach(el => {
                    el.style.display = searchQuery !== '' ? 'none' : '';
                });
            }

            if (cardItems.length > 0) {
                cardNoResults.style.display = cardVisibleCount === 0 ? '' : 'none';
            }
        };

        searchInput.addEventListener('input', filterElements);
    });
</script>
@endsection
