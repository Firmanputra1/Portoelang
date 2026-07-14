@extends('layouts.app')

@section('title', 'Katalog Portfolio Lengkap - ElangDesign')

@section('content')
<section class="portfolio" style="padding-top: 160px; padding-bottom: 100px; min-height: 100vh;">
    <div class="container">
        <div class="section-header animate-on-scroll animated">
            <div class="section-badge">Portfolio Kami</div>
            <h2 class="section-title">Galeri Karya <span class="gradient-text">Terbaik</span></h2>
            <p class="section-desc">Membantu bisnis tampil profesional dengan desain logo, brosur, identitas brand, hingga website berkualitas tinggi.</p>
        </div>
        
        <!-- Filter Kategori Server-Side -->
        <div class="portfolio-filter animate-on-scroll animated" style="margin-bottom: 48px;">
            <a href="{{ route('portfolio') }}" class="filter-btn {{ !request('service') ? 'active' : '' }}" style="text-decoration: none; display: inline-block;">Semua</a>
            @foreach($services as $service)
                <a href="{{ route('portfolio', ['service' => $service->id]) }}" 
                   class="filter-btn {{ request('service') == $service->id ? 'active' : '' }}" 
                   style="text-decoration: none; display: inline-block;">
                   {{ $service->name }}
                </a>
            @endforeach
        </div>

        <!-- Grid Portfolio -->
        <div class="portfolio-grid" id="portfolioGrid">
            @php
                $colors = [
                    '#1a1a2e, #16213e, #0f3460',
                    '#0d1117, #161b22, #21262d',
                    '#1a0a2e, #16073e, #2a0f60',
                    '#0a1f2e, #0a2f3e, #0a3f60',
                    '#1a2e0a, #1a3e10, #1a5016',
                    '#2e1a0a, #3e250a, #4f300a',
                    '#2e0a1a, #3e0a25, #500a30',
                    '#0a2e2e, #0a3e3e, #0a5050',
                    '#1a1a0a, #2e2e10, #404010',
                ];
                $emojis = ['🎨', '✏️', '💼', '💻', '📱', '⭐', '🖼️', '🎯', '🚀'];
            @endphp
            @forelse($portfolios as $index => $item)
            <div class="portfolio-item animate-on-scroll animated">
                <div class="portfolio-img" style="background: linear-gradient(135deg, {{ $colors[$index % count($colors)] }})">
                    <div class="portfolio-placeholder">{{ $emojis[$index % count($emojis)] }}</div>
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6285385794598' }}?text={{ urlencode('Halo ElangDesign, saya ingin bertanya tentang proyek portfolio ' . $item->title) }}" 
                       target="_blank" 
                       class="portfolio-overlay"
                       style="text-decoration: none;">
                        <span class="portfolio-overlay-text">Tanyakan Desain Ini →</span>
                    </a>
                </div>
                <div class="portfolio-info">
                    <span class="portfolio-category">{{ $item->category }}</span>
                    <h3 class="portfolio-title">{{ $item->title }}</h3>
                    <p class="portfolio-desc">{{ $item->description }}</p>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 80px 0; background: var(--bg-card); border-radius: var(--radius-lg); border: 1px solid var(--border);">
                <div style="font-size: 48px; margin-bottom: 16px;">🖼️</div>
                <h3 class="portfolio-title">Kategori Kosong</h3>
                <p class="portfolio-desc">Kami belum memiliki portofolio untuk kategori ini. Hubungi kami untuk kebutuhan kustom Anda!</p>
            </div>
            @endforelse
        </div>

        <!-- Custom Pagination -->
        @if($portfolios->hasPages())
        <div class="pagination-container animate-on-scroll animated">
            <nav>
                {{-- Previous Page Link --}}
                @if ($portfolios->onFirstPage())
                    <span class="disabled">&laquo; Prev</span>
                @else
                    <a href="{{ $portfolios->appends(request()->query())->previousPageUrl() }}" rel="prev">&laquo; Prev</a>
                @endif

                {{-- Pagination Pages --}}
                @foreach ($portfolios->appends(request()->query())->getUrlRange(1, $portfolios->lastPage()) as $page => $url)
                    @if ($page == $portfolios->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($portfolios->hasMorePages())
                    <a href="{{ $portfolios->appends(request()->query())->nextPageUrl() }}" rel="next">Next &raquo;</a>
                @else
                    <span class="disabled">Next &raquo;</span>
                @endif
            </nav>
        </div>
        @endif
    </div>
</section>
@endsection
