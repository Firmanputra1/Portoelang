@extends('admin.layout')

@section('title', 'Layanan Desain')

@section('header_title', 'Kelola Layanan')
@section('header_subtitle', 'Daftar jenis jasa desain grafis yang ditawarkan kepada klien.')

@section('content')
<div class="card">
    <div class="card-header" style="margin-bottom: 20px;">
        <h2 class="card-title">Semua Layanan</h2>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="vertical-align: middle;"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Tambah Layanan Baru
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="filter-search-bar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; gap: 16px; flex-wrap: wrap;">
        <!-- Search Input -->
        <div style="position: relative; flex-grow: 1; max-width: 400px; min-width: 250px;">
            <input type="text" id="serviceSearch" placeholder="Cari layanan..." class="form-control" style="padding-left: 40px; margin-bottom: 0;">
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
                    <th style="width: 80px;">Urutan</th>
                    <th>Nama Layanan</th>
                    <th>Mulai Harga</th>
                    <th>WhatsApp Text</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 200px; text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr class="table-row-element" data-name="{{ strtolower($service->name) }}">
                    <td>
                        <span class="badge" style="background: rgba(255,255,255,0.05); color: var(--text-primary);">
                            {{ $service->sort_order }}
                        </span>
                    </td>
                    <td>
                        <strong style="font-size: 15px; color: white;">{{ $service->name }}</strong>
                        <div style="font-size: 12px; color: var(--text-muted); margin-top: 4px;">{{ Str::limit($service->description, 60) }}</div>
                    </td>
                    <td>
                        <span style="color: var(--accent); font-weight: 700;">{{ $service->formatted_price }}</span>
                    </td>
                    <td>
                        <code style="font-size: 12px; color: var(--text-secondary);">{{ Str::limit($service->whatsapp_text, 40) }}</code>
                    </td>
                    <td>
                        <form action="{{ route('admin.services.toggle', $service) }}" method="POST">
                            @csrf
                            <button type="submit" class="badge {{ $service->is_active ? 'badge-success' : 'badge-danger' }}" style="border: none; cursor: pointer;">
                                {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td style="text-align: right;">
                        <div style="display: inline-flex; gap: 8px;">
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">
                                Edit
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
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
                    <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 40px 0;">
                        Belum ada data layanan desain. Klik tombol di atas untuk menambahkan.
                    </td>
                </tr>
                @endforelse
                <tr id="tableNoResults" style="display: none;">
                    <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 40px 0;">
                        Tidak ada layanan yang cocok dengan pencarian Anda.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- MODE 2: CARD VIEW -->
    <div id="cardViewContainer" style="display: none;">
        <div class="services-cards-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;">
            @forelse($services as $service)
            <div class="service-card-item" data-name="{{ strtolower($service->name) }}" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 24px; display: flex; flex-direction: column; position: relative; transition: var(--transition);">
                
                <!-- Card Header -->
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
                    <div style="font-size: 28px; background: rgba(99, 102, 241, 0.1); width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(99, 102, 241, 0.2);">
                        🎨
                    </div>
                    <span class="badge" style="background: rgba(255,255,255,0.05); color: var(--text-secondary);">
                        Urutan: {{ $service->sort_order }}
                    </span>
                </div>

                <!-- Card Content -->
                <div style="flex-grow: 1; margin-bottom: 20px;">
                    <h3 style="font-size: 17px; font-weight: 700; color: white; margin-bottom: 6px;">{{ $service->name }}</h3>
                    <div style="font-size: 14px; color: var(--accent); font-weight: 700; margin-bottom: 12px;">
                        Mulai: {{ $service->formatted_price }}
                    </div>
                    @if($service->description)
                        <p style="font-size: 13px; color: var(--text-secondary); line-height: 1.6; margin-bottom: 12px;">{{ Str::limit($service->description, 100) }}</p>
                    @endif
                    
                    @if(is_array($service->features) && count($service->features) > 0)
                        <ul style="list-style: none; font-size: 12px; color: var(--text-muted); display: flex; flex-direction: column; gap: 4px;">
                            @foreach(array_slice($service->features, 0, 3) as $feature)
                                <li style="display: flex; align-items: center; gap: 6px;">
                                    <span style="color: #10b981;">✓</span> {{ Str::limit($feature, 25) }}
                                </li>
                            @endforeach
                            @if(count($service->features) > 3)
                                <li style="font-style: italic; color: var(--text-muted); margin-left: 12px;">+{{ count($service->features) - 3 }} lainnya</li>
                            @endif
                        </ul>
                    @endif
                </div>

                <!-- Card Actions -->
                <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); padding-top: 16px; gap: 8px;">
                    <form action="{{ route('admin.services.toggle', $service) }}" method="POST">
                        @csrf
                        <button type="submit" class="badge {{ $service->is_active ? 'badge-success' : 'badge-danger' }}" style="border: none; cursor: pointer;">
                            {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                        </button>
                    </form>

                    <div style="display: flex; gap: 6px;">
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px; gap: 0;">
                            Edit
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
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
                Belum ada data layanan desain.
            </div>
            @endforelse
            <div id="cardNoResults" style="display: none; text-align: center; color: var(--text-muted); padding: 40px 0; grid-column: 1/-1;">
                Tidak ada layanan yang cocok dengan pencarian Anda.
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('serviceSearch');
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
                localStorage.setItem('service_view_mode', 'card');
            } else {
                listViewContainer.style.display = 'block';
                cardViewContainer.style.display = 'none';
                btnListView.style.background = 'var(--primary)';
                btnListView.style.color = 'white';
                btnCardView.style.background = 'transparent';
                btnCardView.style.color = 'var(--text-secondary)';
                localStorage.setItem('service_view_mode', 'list');
            }
        };

        // Load preference
        const savedMode = localStorage.getItem('service_view_mode') || 'list';
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
            const cardItems = document.querySelectorAll('.service-card-item');
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
