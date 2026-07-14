@extends('layouts.app')

@section('title', 'Hubungi Kami - ElangDesign')

@section('content')
<section class="contact" style="padding-top: 160px; padding-bottom: 100px; min-height: 100vh;">
    <div class="container">
        <div class="section-header animate-on-scroll animated">
            <div class="section-badge">Hubungi Kami</div>
            <h2 class="section-title">Mari Wujudkan Proyek <span class="gradient-text">Impian Anda</span></h2>
            <p class="section-desc">Punya pertanyaan atau ingin mulai berkonsultasi gratis? Kirim pesan kepada kami dan tim kami akan segera merespons.</p>
        </div>

        <div class="contact-grid animate-on-scroll animated">
            <!-- Informasi Kontak -->
            <div class="contact-info-card">
                <div class="contact-info-item">
                    <div class="contact-info-icon">📱</div>
                    <div class="contact-info-text">
                        <h3>WhatsApp</h3>
                        <p><a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6285385794598' }}" target="_blank">+{{ $settings['whatsapp_number'] ?? '6285385794598' }}</a></p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">✉️</div>
                    <div class="contact-info-text">
                        <h3>Email Resmi</h3>
                        <p><a href="mailto:{{ $settings['email'] ?? 'hello@elangdesign.com' }}">{{ $settings['email'] ?? 'hello@elangdesign.com' }}</a></p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">🕒</div>
                    <div class="contact-info-text">
                        <h3>Jam Layanan</h3>
                        <p>Senin - Sabtu: 09:00 - 17:00 WIB<br>Minggu: Libur</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">📍</div>
                    <div class="contact-info-text">
                        <h3>Lokasi</h3>
                        <p>Yogyakarta, Indonesia</p>
                    </div>
                </div>
            </div>

            <!-- Form Pesan Instant WhatsApp -->
            <div class="contact-form-card">
                <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 24px; font-weight: 700; margin-bottom: 24px;">Kirim Pesan</h3>
                <form onsubmit="sendContactToWhatsapp(event)">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" id="name" class="form-control" placeholder="Masukkan nama Anda..." required>
                    </div>

                    <div class="form-group">
                        <label for="service_select" class="form-label">Layanan yang Diminati</label>
                        <select id="service_select" class="form-control" required>
                            <option value="" disabled selected>Pilih layanan...</option>
                            <option value="Desain Logo">Desain Logo</option>
                            <option value="Desain Brosur">Desain Brosur</option>
                            <option value="Company Profile">Company Profile</option>
                            <option value="Desain Website">Desain Website</option>
                            <option value="Konten Media Sosial">Konten Media Sosial</option>
                            <option value="Identitas Brand">Identitas Brand / Paket Lengkap</option>
                            <option value="Custom Project">Proyek Custom / Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Pesan / Kebutuhan Desain</label>
                        <textarea id="message" class="form-control" placeholder="Jelaskan secara singkat mengenai kebutuhan desain Anda..." required></textarea>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; padding: 14px 0; font-size: 15px; border-radius: 12px;">
                        Kirim via WhatsApp
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function sendContactToWhatsapp(e) {
        e.preventDefault();
        const name = document.getElementById('name').value;
        const service = document.getElementById('service_select').value;
        const message = document.getElementById('message').value;
        
        const waNumber = '{{ $settings["whatsapp_number"] ?? "6285385794598" }}';
        
        const text = `Halo ElangDesign,\n\nNama saya *${name}*.\nSaya ingin berkonsultasi mengenai *${service}*.\n\n*Detail Kebutuhan:*\n${message}`;
        
        const url = `https://wa.me/${waNumber}?text=${encodeURIComponent(text)}`;
        window.open(url, '_blank');
    }
</script>
@endsection
