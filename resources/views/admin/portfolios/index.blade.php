@extends('admin.layout')

@section('title', 'Karya Portofolio')

@section('header_title', 'Kelola Portofolio')
@section('header_subtitle', 'Unggah dan atur galeri karya desain terbaik yang sudah diselesaikan.')

@section('content')
<div class="card">
    <div class="card-header" style="margin-bottom: 20px;">
        <h2 class="card-title">Semua Karya Portofolio</h2>
        <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="vertical-align: middle;"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Tambah Karya Baru
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="filter-search-bar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; gap: 16px; flex-wrap: wrap;">
        <!-- Search Input -->
        <div style="position: relative; flex-grow: 1; max-width: 400px; min-width: 250px;">
            <input type="text" id="portfolioSearch" placeholder="Cari berdasarkan judul..." class="form-control" style="padding-left: 40px; margin-bottom: 0;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-muted);">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </div>
        
        <!-- Category Filter & View Toggle -->
        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <select id="categoryFilter" class="form-control" style="width: auto; margin-bottom: 0; min-width: 160px;">
                <option value="">Semua Kategori</option>
                @php
                    $categories = $portfolios->pluck('category')->unique()->filter();
                @endphp
                @foreach($categories as $cat)
                    <option value="{{ $cat }}">{{ $cat }}</option>
                @endforeach
            </select>
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
                    <th style="width: 100px;">Gambar</th>
                    <th>Judul Karya</th>
                    <th>Kategori</th>
                    <th>Layanan Terkait</th>
                    <th>Nama Klien</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 200px; text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portfolios as $portfolio)
                <tr class="table-row-element" data-title="{{ strtolower($portfolio->title) }}" data-category="{{ strtolower($portfolio->category) }}">
                    <td>
                        @if($portfolio->image)
                            <img src="{{ (config('filesystems.default') === 'local' || config('filesystems.default') === 'public') ? asset('storage/' . $portfolio->image) : Storage::disk(config('filesystems.default'))->url($portfolio->image) }}" alt="{{ $portfolio->title }}" style="width: 80px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid var(--border);">
                        @else
                            <div style="width: 80px; height: 50px; background: rgba(255,255,255,0.05); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 10px; color: var(--text-muted); border: 1px solid var(--border);">
                                Tanpa Foto
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong style="font-size: 15px; color: white;">{{ $portfolio->title }}</strong>
                        @if($portfolio->description)
                            <div style="font-size: 12px; color: var(--text-muted); margin-top: 4px;">{{ Str::limit($portfolio->description, 50) }}</div>
                        @endif
                    </td>
                    <td>
                        <span class="badge" style="background: rgba(255,255,255,0.05); color: var(--text-secondary);">{{ $portfolio->category }}</span>
                    </td>
                    <td>
                        @if($portfolio->service)
                            <span style="font-size: 14px; color: var(--primary-light);">{{ $portfolio->service->name }}</span>
                        @else
                            <span style="font-size: 13px; color: var(--text-muted);">-</span>
                        @endif
                    </td>
                    <td>
                        <span style="font-size: 14px;">{{ $portfolio->client_name ?? '-' }}</span>
                    </td>
                    <td>
                        <form action="{{ route('admin.portfolios.toggle', $portfolio) }}" method="POST">
                            @csrf
                            <button type="submit" class="badge {{ $portfolio->is_active ? 'badge-success' : 'badge-danger' }}" style="border: none; cursor: pointer;">
                                {{ $portfolio->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td style="text-align: right;">
                        <div style="display: inline-flex; gap: 8px;">
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">
                                Edit
                            </a>
                            <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus karya portofolio ini?')">
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
                    <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 40px 0;">
                        Belum ada data karya portofolio. Klik tombol di atas untuk menambahkan.
                    </td>
                </tr>
                @endforelse
                <tr id="tableNoResults" style="display: none;">
                    <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 40px 0;">
                        Tidak ada karya portofolio yang cocok dengan pencarian Anda.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- MODE 2: CARD VIEW -->
    <div id="cardViewContainer" style="display: none;">
        <div class="portfolio-cards-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;">
            @forelse($portfolios as $portfolio)
            <div class="portfolio-card-item" data-title="{{ strtolower($portfolio->title) }}" data-category="{{ strtolower($portfolio->category) }}" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: var(--radius-lg); overflow: hidden; display: flex; flex-direction: column; position: relative; transition: var(--transition);">
                
                <!-- Image Area -->
                <div style="position: relative; width: 100%; height: 160px; background: rgba(0,0,0,0.2);">
                    @if($portfolio->image)
                        <img src="{{ (config('filesystems.default') === 'local' || config('filesystems.default') === 'public') ? asset('storage/' . $portfolio->image) : Storage::disk(config('filesystems.default'))->url($portfolio->image) }}" alt="{{ $portfolio->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 12px; color: var(--text-muted);">
                            Tanpa Foto
                        </div>
                    @endif
                    <span class="badge" style="position: absolute; top: 12px; left: 12px; background: var(--gradient); color: white; font-size: 11px;">
                        {{ $portfolio->category }}
                    </span>
                </div>

                <!-- Content Area -->
                <div style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                    <div style="margin-bottom: 16px;">
                        <h3 style="font-size: 16px; font-weight: 700; color: white; margin-bottom: 10px;">{{ $portfolio->title }}</h3>
                        <div style="font-size: 13px; color: var(--text-secondary); margin-bottom: 6px;">
                            <strong>Layanan:</strong> {{ $portfolio->service ? $portfolio->service->name : '-' }}
                        </div>
                        <div style="font-size: 13px; color: var(--text-secondary); margin-bottom: 8px;">
                            <strong>Klien:</strong> {{ $portfolio->client_name ?? '-' }}
                        </div>
                        @if($portfolio->description)
                            <p style="font-size: 12px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">{{ Str::limit($portfolio->description, 80) }}</p>
                        @endif
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); padding-top: 16px; margin-top: auto; gap: 8px; flex-wrap: wrap;">
                        <form action="{{ route('admin.portfolios.toggle', $portfolio) }}" method="POST">
                            @csrf
                            <button type="submit" class="badge {{ $portfolio->is_active ? 'badge-success' : 'badge-danger' }}" style="border: none; cursor: pointer;">
                                {{ $portfolio->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>

                        <div style="display: flex; gap: 6px;">
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px; gap: 0;">
                                Edit
                            </a>
                            <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus karya portofolio ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 12px; gap: 0;">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state-card" style="text-align: center; color: var(--text-muted); padding: 40px 0; grid-column: 1/-1;">
                Belum ada data karya portofolio.
            </div>
            @endforelse
            <div id="cardNoResults" style="display: none; text-align: center; color: var(--text-muted); padding: 40px 0; grid-column: 1/-1;">
                Tidak ada karya portofolio yang cocok dengan pencarian Anda.
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('portfolioSearch');
        const categoryFilter = document.getElementById('categoryFilter');
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
                localStorage.setItem('portfolio_view_mode', 'card');
            } else {
                listViewContainer.style.display = 'block';
                cardViewContainer.style.display = 'none';
                btnListView.style.background = 'var(--primary)';
                btnListView.style.color = 'white';
                btnCardView.style.background = 'transparent';
                btnCardView.style.color = 'var(--text-secondary)';
                localStorage.setItem('portfolio_view_mode', 'list');
            }
        };

        // Load preference
        const savedMode = localStorage.getItem('portfolio_view_mode') || 'list';
        setViewMode(savedMode);

        btnListView.addEventListener('click', () => setViewMode('list'));
        btnCardView.addEventListener('click', () => setViewMode('card'));

        // --- SEARCH & FILTER SYSTEM ---
        const filterElements = () => {
            const searchQuery = searchInput.value.toLowerCase().trim();
            const filterCategory = categoryFilter.value.toLowerCase();

            // Filter Table Rows
            const tableRows = document.querySelectorAll('.table-row-element');
            let tableVisibleCount = 0;
            tableRows.forEach(row => {
                const title = row.dataset.title;
                const category = row.dataset.category;

                const matchSearch = title.includes(searchQuery);
                const matchCategory = filterCategory === '' || category === filterCategory;

                if (matchSearch && matchCategory) {
                    row.style.display = '';
                    tableVisibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Filter Card Grid Items
            const cardItems = document.querySelectorAll('.portfolio-card-item');
            let cardVisibleCount = 0;
            cardItems.forEach(card => {
                const title = card.dataset.title;
                const category = card.dataset.category;

                const matchSearch = title.includes(searchQuery);
                const matchCategory = filterCategory === '' || category === filterCategory;

                if (matchSearch && matchCategory) {
                    card.style.display = 'flex';
                    cardVisibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Toggle No Results Alerts
            if (tableRows.length > 0) {
                tableNoResults.style.display = tableVisibleCount === 0 ? '' : 'none';
                // Hide default empty states if filtering
                emptyStates.forEach(el => {
                    el.style.display = (searchQuery !== '' || filterCategory !== '') ? 'none' : '';
                });
            }

            if (cardItems.length > 0) {
                cardNoResults.style.display = cardVisibleCount === 0 ? '' : 'none';
            }
        };

        searchInput.addEventListener('input', filterElements);
        categoryFilter.addEventListener('change', filterElements);
    });
</script>
@endsection
