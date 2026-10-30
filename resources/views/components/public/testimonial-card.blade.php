@props([
    'testimonials' => [
        [
            'name' => 'Andi Pratama',
            'role' => 'Client Property',
            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150&auto=format&fit=crop',
            'message' => 'Pelayanannya sangat baik dan saya mendapatkan rumah yang sesuai dengan kebutuhan serta budget saya.',
        ],
        [
            'name' => 'Siti Aulia',
            'role' => 'Client Property',
            'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=150&auto=format&fit=crop',
            'message' => 'Saya sangat terbantu menemukan property yang sesuai dengan keinginan, lengkap, aman, dan terpercaya.',
        ],
        [
            'name' => 'Rizky Ramadhan',
            'role' => 'Client Property',
            'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=150&auto=format&fit=crop',
            'message' => 'Proses transaksi berjalan jelas dan cepat dari awal pencarian hingga pembelian property selesai.',
        ],
        [
            'name' => 'Dewi Anggraini',
            'role' => 'Client Property',
            'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=150&auto=format&fit=crop',
            'message' => 'Pelayanan dari awal sampai proses pembelian sangat membantu dan komunikasinya juga sangat baik.',
        ],
    ],
])

<section class="testimonial-section">
    <div class="testimonial-container">

        {{-- =========================================
             HEADING (Desain Baru & Kreatif)
        ========================================== --}}
        <div class="testimonial-header">
            {{-- Ornamen Kutipan Background --}}
            <div class="bg-quote-left">“</div>
            <div class="bg-quote-right">”</div>

            <div class="header-content">
                <span class="header-label">TESTIMONI KLIEN</span>
                <h2 class="header-title">Apa Kata Klien Kami?</h2>
                <p class="header-subtitle">Kepercayaan dan kepuasan Anda adalah prioritas utama kami.</p>

                {{-- Garis Aksen Bawah --}}
                <div class="header-divider">
                    <span class="divider-line"></span>
                    <span class="divider-dot"></span>
                    <span class="divider-dot"></span>
                </div>
            </div>
        </div>

        {{-- =========================================
             CAROUSEL WRAPPER
        ========================================== --}}
        <div class="testimonial-carousel-wrapper" id="testimonialWrapper">
            <div class="testimonial-carousel-track" id="testimonialTrack">

                {{-- LOOPING 2X UNTUK EFEK INFINITE --}}
                @foreach ($testimonials as $testimonial)
                    <article class="testimonial-card">
                        <div class="testimonial-content">
                            {{-- AVATAR --}}
                            <div class="testimonial-avatar">
                                <img
                                    src="{{ $testimonial['image'] ?? 'https://via.placeholder.com/150' }}"
                                    alt="{{ $testimonial['name'] }}"
                                >
                            </div>

                            {{-- NAME & ROLE --}}
                            <h3 class="testimonial-name">{{ $testimonial['name'] }}</h3>
                            <span class="testimonial-role">{{ $testimonial['role'] }}</span>

                            {{-- MESSAGE --}}
                            <p class="testimonial-message">
                                {{ $testimonial['message'] }}
                            </p>
                        </div>
                    </article>
                @endforeach

                {{-- DUPLIKASI KEDUA --}}
                @foreach ($testimonials as $testimonial)
                    <article class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-avatar">
                                <img
                                    src="{{ $testimonial['image'] ?? 'https://via.placeholder.com/150' }}"
                                    alt="{{ $testimonial['name'] }}"
                                >
                            </div>
                            <h3 class="testimonial-name">{{ $testimonial['name'] }}</h3>
                            <span class="testimonial-role">{{ $testimonial['role'] }}</span>
                            <p class="testimonial-message">
                                {{ $testimonial['message'] }}
                            </p>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>

    </div>
</section>

<style>
/* =========================================================
   SECTION & CONTAINER (Background Putih)
========================================================= */
.testimonial-section {
    width: 100%;
    background: #ffffff;
    padding: 80px 0;
    overflow: hidden;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

.testimonial-container {
    width: 100%;
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 20px;
}

/* =========================================================
   HEADER STYLING (Desain Kreatif Baru)
========================================================= */
.testimonial-header {
    position: relative;
    text-align: center;
    margin-bottom: 50px;
    display: flex;
    justify-content: center;
}

.header-content {
    position: relative;
    z-index: 2;
    max-width: 600px;
}

/* Ornamen Kutipan Raksasa di Background */
.bg-quote-left,
.bg-quote-right {
    position: absolute;
    font-family: Georgia, serif;
    font-size: 200px;
    color: #f4f5f7; /* Abu-abu sangat pudar */
    line-height: 1;
    z-index: 1;
    pointer-events: none;
    user-select: none;
}

.bg-quote-left {
    top: -40px;
    left: 10%;
    transform: rotate(-10deg);
}

.bg-quote-right {
    bottom: -80px;
    right: 10%;
    transform: rotate(10deg);
}

/* Label Kecil di Atas Judul */
.header-label {
    display: inline-block;
    padding: 6px 16px;
    background: #fdf3ee; /* Orange sangat pudar */
    color: #f07b5b; /* Orange aksen */
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    border-radius: 50px;
    margin-bottom: 16px;
    text-transform: uppercase;
}

/* Judul Utama */
.header-title {
    font-size: 38px;
    font-weight: 800;
    color: #111111;
    margin: 0 0 12px 0;
    letter-spacing: -1px;
    line-height: 1.2;
}

/* Subtitle */
.header-subtitle {
    font-size: 15px;
    color: #666666;
    margin: 0 0 24px 0;
    line-height: 1.5;
}

/* Garis Aksen (Garis + 2 Titik) */
.header-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.divider-line {
    width: 60px;
    height: 3px;
    background: #f07b5b;
    border-radius: 10px;
}

.divider-dot {
    width: 5px;
    height: 5px;
    background: #f07b5b;
    border-radius: 50%;
}

/* =========================================================
   CAROUSEL LAYOUT (Animasi Center Focus)
========================================================= */
.testimonial-carousel-wrapper {
    width: 100%;
    padding: 30px 0 60px 0;
    overflow: hidden;
    position: relative;
    /* Efek blur/fade di pinggir layar */
    mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
    -webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
}

.testimonial-carousel-track {
    display: flex;
    gap: 30px;
    width: max-content;
    will-change: transform;
}

/* =========================================================
   CARD STYLING (Lebih Ramping & Warna Abu-Abu)
========================================================= */
.testimonial-card {
    position: relative;
    width: 280px;
    height: 350px;
    flex-shrink: 0;
    background: #f4f5f7;
    border-radius: 24px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
    transition: box-shadow 0.3s ease;
    will-change: transform, opacity;
    overflow: hidden;
}

.testimonial-content {
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100%;
    padding: 40px 25px;
}

/* =========================================================
   AVATAR & TEXT
========================================================= */
.testimonial-avatar {
    width: 65px;
    height: 65px;
    margin-bottom: 16px;
    border-radius: 50%;
    padding: 3px;
    background: #ffffff;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}

.testimonial-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.testimonial-name {
    margin: 0 0 4px 0;
    font-size: 15px;
    font-weight: 700;
    color: #1a1a1a;
}

.testimonial-role {
    display: block;
    font-size: 11px;
    color: #888888;
    margin-bottom: 16px;
}

.testimonial-message {
    margin: 0;
    font-size: 13px;
    line-height: 1.6;
    color: #555555;
    font-style: italic;
    text-align: center;
}

/* =========================================================
   RESPONSIVE
========================================================= */
@media (max-width: 768px) {
    .bg-quote-left, .bg-quote-right { display: none; } /* Sembunyikan quote di HP */
    .header-title { font-size: 28px; }
    .testimonial-card {
        width: 250px;
        height: 320px;
    }
}
</style>

{{-- =========================================================
     JAVASCRIPT UNTUK ANIMASI INFINITE LOOP (TANPA HENTI)
========================================================= --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('testimonialTrack');
    const wrapper = document.getElementById('testimonialWrapper');

    if (!track || !wrapper) return;

    const cards = Array.from(track.children);

    let speed = 1.2;
    let currentX = 0;

    let totalWidth = track.scrollWidth / 2;

    window.addEventListener('resize', () => {
        totalWidth = track.scrollWidth / 2;
    });

    function animate() {
        // Pergerakan Track ke Kiri (TERUS BERJALAN TANPA HENTI)
        currentX -= speed;

        if (Math.abs(currentX) >= totalWidth) {
            currentX = 0;
        }
        track.style.transform = `translateX(${currentX}px)`;

        // Efek Center Focus
        const wrapperCenter = wrapper.getBoundingClientRect().left + (wrapper.offsetWidth / 2);

        cards.forEach(card => {
            const cardRect = card.getBoundingClientRect();
            const cardCenter = cardRect.left + (cardRect.width / 2);

            const distanceToCenter = Math.abs(wrapperCenter - cardCenter);
            const maxDistance = wrapper.offsetWidth / 2;

            let percentage = distanceToCenter / maxDistance;
            if (percentage > 1) percentage = 1;

            const scale = 1.05 - (percentage * 0.20);
            const translateY = percentage * 40;
            const opacity = 1 - (percentage * 0.4);

            card.style.transform = `scale(${scale}) translateY(${translateY}px)`;
            card.style.opacity = opacity;

            card.style.zIndex = 100 - Math.floor(percentage * 100);
        });

        requestAnimationFrame(animate);
    }

    requestAnimationFrame(animate);
});
</script>
@endpush
