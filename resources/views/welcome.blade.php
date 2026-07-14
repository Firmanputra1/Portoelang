@extends('layouts.app')

@section('content')
<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-content">
        <div class="hero-badge">
            <span class="dot"></span>
            Dipercaya 500+ klien di seluruh Indonesia
        </div>
        <h1>
            {{ $settings['hero_title'] ?? 'Wujudkan Brand' }}<br>
            <span class="gradient-text">Impian Anda</span>
        </h1>
        <p>{{ $settings['hero_subtitle'] ?? 'Jasa desain grafis profesional untuk logo, brosur, company profile & website yang memukau.' }}</p>
        <div class="hero-cta">
            <a href="#services" class="btn-primary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                Lihat Layanan
            </a>
            <a href="{{ route('portfolio') }}" class="btn-secondary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                Lihat Portfolio
            </a>
        </div>
        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-number" data-target="500">0</div>
                <div class="stat-label">Klien Puas</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="1200">0</div>
                <div class="stat-label">Proyek Selesai</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="5">0</div>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="98">0</div>
                <div class="stat-label">% Kepuasan</div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <span>SCROLL</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 5v14M5 12l7 7 7-7"/>
        </svg>
    </div>
</section>

<!-- SERVICES -->
<section class="services" id="services">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <div class="section-badge">Layanan Kami</div>
            <h2 class="section-title">Apa yang Kami <span class="gradient-text">Tawarkan</span></h2>
            <p class="section-desc">Dari desain logo hingga website profesional, kami siap mewujudkan visi brand Anda</p>
        </div>
        <div class="services-grid">
            @forelse($services as $index => $service)
            <div class="service-card animate-on-scroll" style="transition-delay: {{ $index * 0.1 }}s">
                <div class="service-icon">
                    @switch($service->icon)
                        @case('pen-tool') ✏️ @break
                        @case('layout') 📄 @break
                        @case('briefcase') 💼 @break
                        @case('monitor') 💻 @break
                        @case('instagram') 📱 @break
                        @case('star') ⭐ @break
                        @default 🎨
                    @endswitch
                </div>
                <h3 class="service-name">{{ $service->name }}</h3>
                <p class="service-desc">{{ $service->description }}</p>
                <div class="service-price">
                    Mulai dari <strong>{{ $service->formatted_price }}</strong>
                </div>
                @if($service->features)
                <ul class="service-features">
                    @foreach(array_slice($service->features, 0, 4) as $feature)
                    <li>{{ $feature }}</li>
                    @endforeach
                </ul>
                @endif
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6285385794598' }}?text={{ urlencode($service->whatsapp_text ?? 'Halo, saya ingin memesan ' . $service->name) }}" 
                   target="_blank" 
                   class="btn-service">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Pesan Sekarang
                </a>
            </div>
            @empty
            <div class="service-card">
                <div class="service-icon">🎨</div>
                <h3 class="service-name">Desain Logo</h3>
                <p class="service-desc">Logo profesional yang mencerminkan identitas brand Anda.</p>
                <div class="service-price">Mulai dari <strong>Rp 150.000</strong></div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- PORTFOLIO -->
<section class="portfolio" id="portfolio">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <div class="section-badge">Portfolio</div>
            <h2 class="section-title">Karya <span class="gradient-text">Terbaik</span> Kami</h2>
            <p class="section-desc">Lihat hasil karya kami yang telah membantu ratusan bisnis tampil profesional</p>
        </div>
        
        <div class="portfolio-filter animate-on-scroll">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="Logo">Logo</button>
            <button class="filter-btn" data-filter="Brosur">Brosur</button>
            <button class="filter-btn" data-filter="Company Profile">Company Profile</button>
            <button class="filter-btn" data-filter="Website">Website</button>
            <button class="filter-btn" data-filter="Brand Identity">Brand Identity</button>
            <button class="filter-btn" data-filter="Social Media">Social Media</button>
        </div>

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
            <div class="portfolio-item animate-on-scroll" 
                 data-category="{{ $item->category }}"
                 style="transition-delay: {{ ($index % 3) * 0.1 }}s">
                <div class="portfolio-img" style="background: linear-gradient(135deg, {{ $colors[$index % count($colors)] }})">
                    <div class="portfolio-placeholder">{{ $emojis[$index % count($emojis)] }}</div>
                    <div class="portfolio-overlay">
                        <span class="portfolio-overlay-text">Hubungi Kami →</span>
                    </div>
                </div>
                <div class="portfolio-info">
                    <span class="portfolio-category">{{ $item->category }}</span>
                    <h3 class="portfolio-title">{{ $item->title }}</h3>
                    <p class="portfolio-desc">{{ $item->description }}</p>
                </div>
            </div>
            @empty
            <div class="portfolio-item">
                <div class="portfolio-img">
                    <div class="portfolio-placeholder">🎨</div>
                </div>
                <div class="portfolio-info">
                    <span class="portfolio-category">Logo</span>
                    <h3 class="portfolio-title">Karya Terbaru</h3>
                    <p class="portfolio-desc">Portfolio akan segera ditampilkan</p>
                </div>
            </div>
            @endforelse
        </div>

        <div style="text-align:center; margin-top: 48px;" class="animate-on-scroll">
            <a href="{{ route('portfolio') }}" class="btn-secondary">
                Lihat Semua Portfolio
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- PACKAGES -->
<section class="packages" id="packages">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <div class="section-badge">Harga Paket</div>
            <h2 class="section-title">Pilih <span class="gradient-text">Paket</span> Terbaik</h2>
            <p class="section-desc">Paket harga transparan, tanpa biaya tersembunyi. Pilih sesuai kebutuhan bisnis Anda</p>
        </div>
        <div class="packages-grid">
            @forelse($packages as $index => $package)
            <div class="package-card {{ $package->is_popular ? 'popular' : '' }} animate-on-scroll" style="transition-delay: {{ $index * 0.15 }}s">
                @if($package->is_popular)
                <span class="popular-badge">⭐ Terpopuler</span>
                @endif
                <div class="package-name">{{ $package->name }}</div>
                <div class="package-subtitle">{{ $package->subtitle }}</div>
                <div class="package-price">
                    <div class="price-label">Mulai dari</div>
                    <div class="price-amount">
                        <span>Rp</span> {{ number_format($package->price, 0, ',', '.') }}
                    </div>
                </div>
                <div class="package-divider"></div>
                @if($package->features)
                <ul class="package-features">
                    @foreach($package->features as $feature)
                    <li>
                        <span class="check">✓</span>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                @endif
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6285385794598' }}?text={{ urlencode($package->whatsapp_text ?? 'Halo, saya ingin paket ' . $package->name) }}" 
                   target="_blank"
                   class="btn-package {{ $package->is_popular ? 'primary' : 'outline' }}">
                    Pilih Paket {{ $package->name }}
                </a>
            </div>
            @empty
            <div class="package-card">
                <div class="package-name">Starter</div>
                <div class="package-price">
                    <div class="price-amount"><span>Rp</span> 299.000</div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <div class="section-badge">Testimoni</div>
            <h2 class="section-title">Kata Mereka tentang <span class="gradient-text">Kami</span></h2>
            <p class="section-desc">Kepuasan klien adalah prioritas utama kami. Ini cerita sukses mereka bersama ElangDesign</p>
        </div>
        <div class="testimonials-grid">
            @forelse($testimonials as $index => $testimonial)
            <div class="testimonial-card animate-on-scroll" style="transition-delay: {{ ($index % 3) * 0.1 }}s">
                <div class="testimonial-stars">
                    @for($i = 0; $i < $testimonial->rating; $i++)
                    <span class="star">★</span>
                    @endfor
                </div>
                <p class="testimonial-text">"{{ $testimonial->content }}"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">{{ substr($testimonial->name, 0, 1) }}</div>
                    <div>
                        <div class="author-name">{{ $testimonial->name }}</div>
                        <div class="author-position">{{ $testimonial->position }}</div>
                    </div>
                </div>
            </div>
            @empty
            <div class="testimonial-card">
                <div class="testimonial-stars"><span class="star">★★★★★</span></div>
                <p class="testimonial-text">"Layanan luar biasa, hasil memuaskan!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">B</div>
                    <div>
                        <div class="author-name">Budi Santoso</div>
                        <div class="author-position">Owner - Toko Berkah</div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq" id="faq">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <div class="section-badge">FAQ</div>
            <h2 class="section-title">Pertanyaan yang <span class="gradient-text">Sering Ditanya</span></h2>
            <p class="section-desc">Jawaban untuk pertanyaan umum seputar layanan ElangDesign</p>
        </div>
        <div class="faq-list">
            @forelse($faqs as $index => $faq)
            <div class="faq-item animate-on-scroll" style="transition-delay: {{ $index * 0.05 }}s">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>{{ $faq->question }}</span>
                    <div class="faq-icon">+</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">{{ $faq->answer }}</div>
                </div>
            </div>
            @empty
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Berapa lama proses pengerjaan?</span>
                    <div class="faq-icon">+</div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">Tergantung jenis layanan, umumnya 1-7 hari kerja.</div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section" id="contact">
    <div class="cta-box animate-on-scroll">
        <h2>Siap Mulai <span class="gradient-text">Proyek Anda?</span></h2>
        <p>Konsultasi GRATIS! Kami siap membantu mewujudkan brand impian Anda. Hubungi kami sekarang dan dapatkan penawaran terbaik.</p>
        <div class="cta-buttons">
            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6285385794598' }}?text={{ urlencode('Halo ElangDesign, saya ingin konsultasi desain GRATIS') }}" 
               target="_blank" 
               class="btn-whatsapp">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Chat WhatsApp Sekarang
            </a>
            <a href="{{ route('portfolio') }}" class="btn-secondary">
                Lihat Portfolio Dulu
            </a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // ===== COUNTER ANIMATION =====
    function animateCounter(el, target, duration = 2000) {
        let start = 0;
        const step = target / (duration / 16);
        const timer = setInterval(() => {
            start += step;
            if (start >= target) {
                el.textContent = target + (target === 98 ? '%' : '+');
                clearInterval(timer);
            } else {
                el.textContent = Math.floor(start) + (target === 98 ? '%' : '+');
            }
        }, 16);
    }

    const statNumbers = document.querySelectorAll('.stat-number');
    let countersStarted = false;

    function startCounters() {
        if (countersStarted) return;
        const heroSection = document.querySelector('.hero');
        if(!heroSection) return;
        const rect = heroSection.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            countersStarted = true;
            statNumbers.forEach(el => {
                const target = parseInt(el.dataset.target);
                animateCounter(el, target);
            });
        }
    }

    window.addEventListener('scroll', startCounters);
    setTimeout(startCounters, 500);

    // ===== FAQ TOGGLE =====
    function toggleFaq(el) {
        const item = el.parentElement;
        const isOpen = item.classList.contains('open');
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
        if (!isOpen) item.classList.add('open');
    }

    // ===== PORTFOLIO FILTER =====
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const filter = btn.dataset.filter;
            portfolioItems.forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.style.display = '';
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.9)';
                    setTimeout(() => {
                        item.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
