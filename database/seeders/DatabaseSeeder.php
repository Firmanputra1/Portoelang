<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Faq;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Settings
        $settings = [
            ['key' => 'whatsapp_number', 'value' => '6281234567890'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/elangdesign'],
            ['key' => 'email', 'value' => 'hello@elangdesign.com'],
            ['key' => 'tagline', 'value' => 'Desain Profesional, Harga Terjangkau'],
            ['key' => 'description', 'value' => 'ElangDesign hadir untuk membantu bisnis Anda tampil profesional dengan desain berkualitas tinggi.'],
            ['key' => 'hero_title', 'value' => 'Wujudkan Brand Impian Anda'],
            ['key' => 'hero_subtitle', 'value' => 'Jasa desain grafis profesional untuk logo, brosur, company profile & website yang memukau.'],
        ];
        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], ['value' => $s['value']]);
        }

        // Services
        $services = [
            [
                'name' => 'Desain Logo',
                'slug' => 'desain-logo',
                'description' => 'Logo profesional yang mencerminkan identitas brand Anda. Kami membuat logo yang unik, berkesan, dan timeless.',
                'price_start' => 150000,
                'icon' => 'pen-tool',
                'features' => ['Konsep original', 'Revisi 3x', 'File AI, PNG, SVG, PDF', 'Manual penggunaan', 'Full hak cipta'],
                'whatsapp_text' => 'Halo, saya ingin memesan Desain Logo',
                'sort_order' => 1,
            ],
            [
                'name' => 'Desain Brosur',
                'slug' => 'desain-brosur',
                'description' => 'Brosur dan flyer yang menarik perhatian dan efektif menyampaikan pesan bisnis Anda kepada pelanggan.',
                'price_start' => 75000,
                'icon' => 'layout',
                'features' => ['Desain 2 sisi', 'Revisi 2x', 'File print-ready', 'Format PDF & JPG', 'Siap cetak'],
                'whatsapp_text' => 'Halo, saya ingin memesan Desain Brosur',
                'sort_order' => 2,
            ],
            [
                'name' => 'Company Profile',
                'slug' => 'company-profile',
                'description' => 'Company profile yang elegan dan profesional untuk memperkenalkan bisnis Anda kepada klien dan investor.',
                'price_start' => 500000,
                'icon' => 'briefcase',
                'features' => ['Hingga 20 halaman', 'Desain premium', 'Revisi 3x', 'File PDF interaktif', 'Siap presentasi'],
                'whatsapp_text' => 'Halo, saya ingin memesan Company Profile',
                'sort_order' => 3,
            ],
            [
                'name' => 'Desain Website',
                'slug' => 'desain-website',
                'description' => 'Website modern dan responsif yang mengkonversi pengunjung menjadi pelanggan setia bisnis Anda.',
                'price_start' => 1500000,
                'icon' => 'monitor',
                'features' => ['Desain custom', 'Mobile responsive', 'SEO optimized', 'CMS WordPress', 'Domain & hosting'],
                'whatsapp_text' => 'Halo, saya ingin memesan Desain Website',
                'sort_order' => 4,
            ],
            [
                'name' => 'Konten Media Sosial',
                'slug' => 'konten-medsos',
                'description' => 'Konten visual media sosial yang eye-catching untuk Instagram, Facebook, TikTok, dan platform lainnya.',
                'price_start' => 50000,
                'icon' => 'instagram',
                'features' => ['Desain per post', 'Story & feed', 'Format IG, FB, TikTok', 'File editable', 'Revisi 2x'],
                'whatsapp_text' => 'Halo, saya ingin memesan Konten Medsos',
                'sort_order' => 5,
            ],
            [
                'name' => 'Identitas Brand',
                'slug' => 'identitas-brand',
                'description' => 'Paket lengkap identitas visual brand Anda mulai dari logo, kartu nama, kop surat, hingga brand guideline.',
                'price_start' => 800000,
                'icon' => 'star',
                'features' => ['Logo + variasi', 'Kartu nama', 'Kop surat', 'Brand guideline', 'Stationery set'],
                'whatsapp_text' => 'Halo, saya ingin memesan Paket Identitas Brand',
                'sort_order' => 6,
            ],
        ];
        foreach ($services as $s) {
            Service::updateOrCreate(['slug' => $s['slug']], $s);
        }

        // Packages
        $packages = [
            [
                'name' => 'Starter',
                'subtitle' => 'Untuk bisnis yang baru mulai',
                'price' => 299000,
                'is_popular' => false,
                'badge_color' => '#64748b',
                'features' => ['1 Desain Logo (3 konsep)', 'Kartu Nama', '1 Template Medsos', 'Revisi 3x', 'File AI & PNG'],
                'whatsapp_text' => 'Halo, saya ingin paket Starter',
                'sort_order' => 1,
            ],
            [
                'name' => 'Professional',
                'subtitle' => 'Paling populer & terlengkap',
                'price' => 799000,
                'is_popular' => true,
                'badge_color' => '#6366f1',
                'features' => ['Logo Full Package', 'Kartu Nama + Kop Surat', '5 Template Medsos', 'Brosur 2 Sisi', 'Revisi tak terbatas', 'Brand Guideline', 'File semua format'],
                'whatsapp_text' => 'Halo, saya ingin paket Professional',
                'sort_order' => 2,
            ],
            [
                'name' => 'Enterprise',
                'subtitle' => 'Solusi lengkap untuk korporasi',
                'price' => 2500000,
                'is_popular' => false,
                'badge_color' => '#f59e0b',
                'features' => ['Semua di Professional', 'Company Profile (20 hal)', 'Website Landing Page', '10 Template Medsos', 'Katalog Produk', 'Konsultasi Brand', 'Support 3 bulan'],
                'whatsapp_text' => 'Halo, saya ingin paket Enterprise',
                'sort_order' => 3,
            ],
        ];
        foreach ($packages as $p) {
            Package::updateOrCreate(['name' => $p['name']], $p);
        }

        // Testimonials
        $testimonials = [
            [
                'name' => 'Budi Santoso',
                'position' => 'Owner - Toko Berkah Jaya',
                'content' => 'Logo yang dibuat ElangDesign benar-benar memukau! Pelanggan saya sering memuji tampilannya. Proses cepat dan hasilnya melebihi ekspektasi.',
                'rating' => 5,
                'sort_order' => 1,
            ],
            [
                'name' => 'Siti Rahayu',
                'position' => 'Direktur - CV Maju Bersama',
                'content' => 'Company profile kami jadi jauh lebih profesional. Klien corporate kami langsung terkesan saat presentasi. Recommended banget!',
                'rating' => 5,
                'sort_order' => 2,
            ],
            [
                'name' => 'Ahmad Fauzi',
                'position' => 'Founder - StartupKita.id',
                'content' => 'Website yang dibangun responsif dan loading cepat. Tim ElangDesign sangat komunikatif dan revisi tanpa batas. Worth it!',
                'rating' => 5,
                'sort_order' => 3,
            ],
            [
                'name' => 'Dewi Lestari',
                'position' => 'Marketing Manager - PT Anugrah',
                'content' => 'Konten medsos dari ElangDesign membuat engagement Instagram kami naik 3x lipat. Desainnya fresh dan eye-catching banget.',
                'rating' => 5,
                'sort_order' => 4,
            ],
            [
                'name' => 'Rizky Pratama',
                'position' => 'CEO - Pratama Group',
                'content' => 'Paket enterprise sangat worth it. Dari logo, company profile, sampai website semua dikerjakan dengan sangat profesional.',
                'rating' => 5,
                'sort_order' => 5,
            ],
            [
                'name' => 'Nur Hidayah',
                'position' => 'Owner - Hijab Cantik Store',
                'content' => 'Brosur produk kami jadi sangat menarik. Penjualan meningkat setelah menggunakan desain dari ElangDesign. Terima kasih!',
                'rating' => 5,
                'sort_order' => 6,
            ],
        ];
        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['name' => $t['name']], $t);
        }

        // FAQs
        $faqs = [
            [
                'question' => 'Berapa lama proses pengerjaan desain?',
                'answer' => 'Tergantung jenis layanan. Logo 1-3 hari kerja, brosur 1-2 hari kerja, company profile 5-7 hari kerja, dan website 14-30 hari kerja. Kami selalu mengutamakan kualitas tanpa mengorbankan kecepatan.',
                'sort_order' => 1,
            ],
            [
                'question' => 'Apakah ada revisi gratis?',
                'answer' => 'Ya! Setiap paket sudah termasuk revisi. Paket Starter 3x revisi, Professional revisi tak terbatas, dan Enterprise revisi tak terbatas dengan konsultasi langsung.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Format file apa yang akan saya terima?',
                'answer' => 'Kami memberikan file dalam berbagai format: AI (editable), PDF, PNG (transparan), JPG, dan SVG untuk keperluan digital maupun cetak.',
                'sort_order' => 3,
            ],
            [
                'question' => 'Bagaimana sistem pembayaran?',
                'answer' => 'Pembayaran dilakukan 50% di awal sebagai tanda jadi, dan 50% setelah desain final disetujui. Kami menerima transfer bank, e-wallet (GoPay, OVO, Dana), dan QRIS.',
                'sort_order' => 4,
            ],
            [
                'question' => 'Apakah hak cipta desain menjadi milik saya?',
                'answer' => 'Tentu! Setelah pembayaran lunas, semua hak cipta desain sepenuhnya menjadi milik Anda. Kami tidak akan menggunakan desain Anda untuk klien lain.',
                'sort_order' => 5,
            ],
            [
                'question' => 'Apakah bisa request desain di luar paket?',
                'answer' => 'Bisa! Kami sangat fleksibel. Hubungi kami via WhatsApp untuk diskusi kebutuhan custom Anda dan kami akan berikan penawaran terbaik.',
                'sort_order' => 6,
            ],
        ];
        foreach ($faqs as $f) {
            Faq::updateOrCreate(['question' => $f['question']], $f);
        }

        // Clients
        $clients = [
            ['name' => 'Tokopedia', 'sort_order' => 1],
            ['name' => 'Gojek', 'sort_order' => 2],
            ['name' => 'Bukalapak', 'sort_order' => 3],
            ['name' => 'Traveloka', 'sort_order' => 4],
            ['name' => 'Shopee', 'sort_order' => 5],
            ['name' => 'Grab', 'sort_order' => 6],
        ];
        foreach ($clients as $c) {
            Client::updateOrCreate(['name' => $c['name']], $c);
        }

        // Portfolios
        $serviceIds = Service::pluck('id', 'slug');
        $portfolios = [
            [
                'title' => 'Logo Kopi Nusantara',
                'description' => 'Desain logo modern untuk brand kopi lokal dengan konsep batik fusion',
                'service_id' => $serviceIds['desain-logo'] ?? 1,
                'category' => 'Logo',
                'sort_order' => 1,
            ],
            [
                'title' => 'Brosur Produk Fashion',
                'description' => 'Brosur elegan untuk koleksi fashion wanita premium',
                'service_id' => $serviceIds['desain-brosur'] ?? 2,
                'category' => 'Brosur',
                'sort_order' => 2,
            ],
            [
                'title' => 'Website Restoran Padang',
                'description' => 'Website modern untuk restoran dengan fitur menu online',
                'service_id' => $serviceIds['desain-website'] ?? 4,
                'category' => 'Website',
                'sort_order' => 3,
            ],
            [
                'title' => 'Company Profile PT Maju',
                'description' => 'Company profile profesional 20 halaman untuk perusahaan konstruksi',
                'service_id' => $serviceIds['company-profile'] ?? 3,
                'category' => 'Company Profile',
                'sort_order' => 4,
            ],
            [
                'title' => 'Brand Identity Skincare',
                'description' => 'Identitas brand lengkap untuk produk skincare lokal',
                'service_id' => $serviceIds['identitas-brand'] ?? 6,
                'category' => 'Brand Identity',
                'sort_order' => 5,
            ],
            [
                'title' => 'Konten IG Kuliner',
                'description' => 'Template konten Instagram untuk bisnis kuliner',
                'service_id' => $serviceIds['konten-medsos'] ?? 5,
                'category' => 'Social Media',
                'sort_order' => 6,
            ],
            [
                'title' => 'Logo Startup Teknologi',
                'description' => 'Logo minimalis modern untuk startup fintech Indonesia',
                'service_id' => $serviceIds['desain-logo'] ?? 1,
                'category' => 'Logo',
                'sort_order' => 7,
            ],
            [
                'title' => 'Website Landing Page',
                'description' => 'Landing page konversi tinggi untuk bisnis properti',
                'service_id' => $serviceIds['desain-website'] ?? 4,
                'category' => 'Website',
                'sort_order' => 8,
            ],
            [
                'title' => 'Flyer Event Musik',
                'description' => 'Poster dan flyer untuk festival musik tahunan',
                'service_id' => $serviceIds['desain-brosur'] ?? 2,
                'category' => 'Brosur',
                'sort_order' => 9,
            ],
        ];
        foreach ($portfolios as $p) {
            Portfolio::updateOrCreate(['title' => $p['title']], $p);
        }
    }
}
