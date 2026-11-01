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

        {{-- HEADING --}}
        <div class="testimonial-header">
            <div class="header-content">
                <h2 class="header-title">Apa Kata Klien Kami?</h2>
                <p class="header-subtitle">Kepercayaan dan kepuasan Anda adalah prioritas utama kami.</p>

                <div class="header-divider">
                    <span class="divider-line"></span>
                    <span class="divider-dot"></span>
                    <span class="divider-line"></span>
                </div>
            </div>
        </div>

        {{-- CAROUSEL --}}
        <div class="testimonial-carousel-wrapper" id="testimonialWrapper">
            <div class="testimonial-carousel-track" id="testimonialTrack">

                @foreach ($testimonials as $testimonial)
                    <article class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-avatar">
                                <img src="{{ $testimonial['image'] ?? 'https://via.placeholder.com/150' }}" alt="{{ $testimonial['name'] }}">
                            </div>
                            <h3 class="testimonial-name">{{ $testimonial['name'] }}</h3>
                            <span class="testimonial-role">{{ $testimonial['role'] }}</span>
                            <p class="testimonial-message">{{ $testimonial['message'] }}</p>
                        </div>
                    </article>
                @endforeach

                @foreach ($testimonials as $testimonial)
                    <article class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-avatar">
                                <img src="{{ $testimonial['image'] ?? 'https://via.placeholder.com/150' }}" alt="{{ $testimonial['name'] }}">
                            </div>
                            <h3 class="testimonial-name">{{ $testimonial['name'] }}</h3>
                            <span class="testimonial-role">{{ $testimonial['role'] }}</span>
                            <p class="testimonial-message">{{ $testimonial['message'] }}</p>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>

        {{-- 2 ACTION BUTTONS --}}
        <div class="testimonial-actions">
            <button type="button" class="testimonial-action-btn" id="btnSeeAll">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                </svg>
                <span>Lihat Semua Testimoni</span>
            </button>

            <button type="button" class="testimonial-action-btn testimonial-action-btn--accent" id="btnOpenForm">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                <span>Testimoni Anda</span>
            </button>
        </div>

    </div>
</section>

{{-- =========================================================
     MODAL FORM TESTIMONIAL
========================================================= --}}
<div class="testimonial-modal" id="testimonialModal" aria-hidden="true">
    <div class="testimonial-modal-backdrop" data-modal-close></div>

    <div class="testimonial-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="testimonialModalTitle">
        <div class="testimonial-form-card" id="testimonialFormCard">

            <button type="button" class="testimonial-modal-close" data-modal-close aria-label="Tutup">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>

            <div class="form-header">
                <h3 class="form-title" id="testimonialModalTitle">Bagikan Pengalaman Anda</h3>
                <p class="form-subtitle">Ceritakan pengalaman Anda bersama kami</p>
            </div>

            <form class="testimonial-form" onsubmit="event.preventDefault();">
                <div class="form-row">
                    <div class="form-group">
                        <label for="tf-name">Nama Lengkap</label>
                        <input type="text" id="tf-name" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="tf-email">Email</label>
                        <input type="email" id="tf-email" placeholder="email@contoh.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Rating</label>
                    <div class="rating-input">
                        <input type="radio" name="rating" id="rating-5" value="5">
                        <label for="rating-5">★</label>
                        <input type="radio" name="rating" id="rating-4" value="4">
                        <label for="rating-4">★</label>
                        <input type="radio" name="rating" id="rating-3" value="3">
                        <label for="rating-3">★</label>
                        <input type="radio" name="rating" id="rating-2" value="2">
                        <label for="rating-2">★</label>
                        <input type="radio" name="rating" id="rating-1" value="1">
                        <label for="rating-1">★</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tf-message">Testimoni</label>
                    <textarea id="tf-message" rows="4" placeholder="Tulis testimoni Anda di sini..." required></textarea>
                </div>

                <button type="submit" class="form-submit">
                    <span>Kirim Testimoni</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

/* =========================================================
   SECTION & CONTAINER
========================================================= */
.testimonial-section {
    width: 100%;
    background:
        radial-gradient(circle at 10% 15%, rgba(240, 123, 91, 0.04) 0%, transparent 45%),
        radial-gradient(circle at 90% 85%, rgba(28, 25, 23, 0.03) 0%, transparent 45%),
        #ffffff;
    padding: 80px 0;
    overflow: hidden;
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

.testimonial-container {
    width: 100%;
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 20px;
}

/* =========================================================
   HEADER
========================================================= */
.testimonial-header {
    display: flex;
    justify-content: center;
    text-align: center;
    margin-bottom: 50px;
}

.header-content {
    max-width: 700px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.header-title {
    margin: 0;
    color: #1c1917;
    font-size: 32px;
    font-weight: 700;
    line-height: 1.2;
    letter-spacing: -1px;
}

.header-subtitle {
    margin: 12px 0 0;
    color: #666666;
    font-size: 16px;
    line-height: 1.5;
}

.header-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    margin-top: 22px;
}

.divider-line {
    width: 90px;
    height: 2px;
    background-image: repeating-linear-gradient(
        to right,
        #f07b5b 0px,
        #f07b5b 6px,
        transparent 6px,
        transparent 12px
    );
}

.divider-dot {
    width: 8px;
    height: 8px;
    background: #1c1917;
    border-radius: 2px;
    transform: rotate(45deg);
    box-shadow: 0 0 0 3px rgba(240, 123, 91, 0.15);
}

/* =========================================================
   CAROUSEL LAYOUT
========================================================= */
.testimonial-carousel-wrapper {
    width: 100%;
    padding: 30px 0 60px 0;
    overflow: hidden;
    position: relative;
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
   CARD STYLING
========================================================= */
.testimonial-card {
    position: relative;
    width: 280px;
    height: 350px;
    flex-shrink: 0;
    background: #f4f5f7;
    border-radius: 24px;
    box-shadow:
        0 1px 2px rgba(0, 0, 0, 0.02),
        0 4px 8px rgba(0, 0, 0, 0.03),
        0 10px 20px rgba(0, 0, 0, 0.05),
        0 20px 40px rgba(0, 0, 0, 0.07),
        0 40px 80px rgba(0, 0, 0, 0.09),
        inset 0 -2px 4px rgba(0, 0, 0, 0.02),
        inset 0 1px 0 rgba(255, 255, 255, 0.6);
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

.testimonial-avatar {
    width: 65px;
    height: 65px;
    margin-bottom: 16px;
    border-radius: 50%;
    padding: 3px;
    background: #ffffff;
    box-shadow:
        0 2px 4px rgba(0, 0, 0, 0.04),
        0 6px 14px rgba(0, 0, 0, 0.08);
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
   2 ACTION BUTTONS
========================================================= */
.testimonial-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 14px;
    margin-top: 10px;
}

.testimonial-action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    height: 46px;
    padding: 0 26px;
    border: none;
    border-radius: 9999px;
    background: #1c1917;
    color: #ffffff;
    font-family: inherit;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.2px;
    cursor: pointer;
    box-shadow:
        0 4px 0 #000000,
        0 8px 20px rgba(0, 0, 0, 0.18);
    transition: all 0.18s cubic-bezier(0.2, 0.8, 0.2, 1);
}

.testimonial-action-btn:hover {
    background: #f07b5b;
    box-shadow:
        0 4px 0 #c25a3f,
        0 12px 28px rgba(240, 123, 91, 0.4);
    transform: translateY(-2px);
}

.testimonial-action-btn:active {
    transform: translateY(2px);
    box-shadow:
        0 1px 0 #000000,
        0 2px 8px rgba(0, 0, 0, 0.18);
}

.testimonial-action-btn svg {
    transition: transform 0.3s ease;
}

.testimonial-action-btn:hover svg {
    transform: scale(1.15);
}

.testimonial-action-btn--accent:hover svg {
    transform: rotate(-8deg) scale(1.15);
}

/* =========================================================
   MODAL — SIMPLE / CLEAN
========================================================= */
.testimonial-modal {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.3s ease;
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    box-sizing: border-box;
}

.testimonial-modal.is-open {
    pointer-events: auto;
    opacity: 1;
}

.testimonial-modal-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(15, 12, 10, 0.62);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
}

.testimonial-modal-dialog {
    position: relative;
    width: 100%;
    max-width: 680px;
    max-height: calc(100vh - 40px);
    box-sizing: border-box;
    overflow-y: auto;
    overflow-x: hidden;
    transform: translateY(30px) scale(0.94);
    opacity: 0;
    transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.35s ease;
    scrollbar-width: thin;
    scrollbar-color: #d6d6d6 transparent;
    border-radius: 28px;
}

.testimonial-modal-dialog::-webkit-scrollbar { width: 6px; }
.testimonial-modal-dialog::-webkit-scrollbar-thumb { background: #d6d6d6; border-radius: 99px; }
.testimonial-modal-dialog::-webkit-scrollbar-track { background: transparent; }

.testimonial-modal.is-open .testimonial-modal-dialog {
    transform: translateY(0) scale(1);
    opacity: 1;
    transition-delay: 0.05s;
}

/* =========================================================
   FORM CARD
========================================================= */
.testimonial-form-card {
    position: relative;
    width: 100%;
    box-sizing: border-box;
    padding: 40px;
    background: #ffffff;
    border-radius: 28px;
    transition: box-shadow 0.45s ease;
    box-shadow:
        0 2px 4px rgba(28, 25, 23, 0.02),
        0 8px 16px rgba(28, 25, 23, 0.04),
        0 20px 40px rgba(28, 25, 23, 0.06),
        0 40px 80px rgba(28, 25, 23, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
}

.testimonial-form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 120px;
    height: 4px;
    background: linear-gradient(90deg, #f07b5b, #e98522);
    border-radius: 0 0 4px 4px;
}

.testimonial-form-card:hover {
    box-shadow:
        0 2px 4px rgba(240, 123, 91, 0.04),
        0 8px 16px rgba(240, 123, 91, 0.08),
        0 20px 40px rgba(240, 123, 91, 0.12),
        0 40px 80px rgba(240, 123, 91, 0.16),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
}

/* Close button — di dalam card, top-right */
.testimonial-modal-close {
    position: absolute;
    top: 16px;
    right: 16px;
    z-index: 5;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-radius: 50%;
    background: #f4f5f7;
    color: #1c1917;
    cursor: pointer;
    transition: all 0.2s ease;
}

.testimonial-modal-close:hover {
    background: #f07b5b;
    color: #ffffff;
    transform: rotate(90deg);
}

.form-header {
    text-align: center;
    margin-bottom: 30px;
    padding: 0 40px; /* ruang untuk close button */
}

.form-title {
    font-size: 24px;
    font-weight: 700;
    color: #1c1917;
    margin: 0 0 8px;
    letter-spacing: -0.5px;
}

.form-subtitle {
    font-size: 14px;
    color: #666666;
    margin: 0;
}

.testimonial-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    width: 100%;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    min-width: 0;
}

.form-group label {
    font-size: 13px;
    font-weight: 600;
    color: #1c1917;
    letter-spacing: 0.3px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    max-width: 100%;
    padding: 14px 18px;
    border: 2px solid #eaeaea;
    border-radius: 12px;
    background: #fafafa;
    font-family: inherit;
    font-size: 14px;
    color: #1c1917;
    transition: all 0.3s ease;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.02);
    box-sizing: border-box;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: #aaaaaa;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #f07b5b;
    background: #ffffff;
    box-shadow:
        0 0 0 4px rgba(240, 123, 91, 0.12),
        inset 0 2px 4px rgba(0, 0, 0, 0.02);
    transform: translateY(-1px);
}

.form-group textarea {
    resize: vertical;
    min-height: 110px;
}

/* RATING */
.rating-input {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    gap: 4px;
}

.rating-input input { display: none; }

.rating-input label {
    font-size: 32px;
    color: #e0e0e0;
    cursor: pointer;
    transition: all 0.2s ease;
    line-height: 1;
    user-select: none;
}

.rating-input input:checked ~ label,
.rating-input label:hover,
.rating-input label:hover ~ label {
    color: #f07b5b;
    text-shadow: 0 0 14px rgba(240, 123, 91, 0.5);
    transform: scale(1.15);
}

/* SUBMIT */
.form-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 16px 24px;
    background: #1c1917;
    color: #ffffff;
    border: none;
    border-radius: 12px;
    font-family: inherit;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 0.3px;
    cursor: pointer;
    margin-top: 4px;
    box-shadow:
        0 4px 0 #000000,
        0 8px 20px rgba(0, 0, 0, 0.18);
    transition: all 0.15s cubic-bezier(0.2, 0.8, 0.2, 1);
}

.form-submit:hover {
    background: #f07b5b;
    box-shadow:
        0 4px 0 #c25a3f,
        0 12px 28px rgba(240, 123, 91, 0.4);
    transform: translateY(-2px);
}

.form-submit:active {
    transform: translateY(2px);
    box-shadow:
        0 1px 0 #000000,
        0 2px 8px rgba(0, 0, 0, 0.18);
}

.form-submit svg { transition: transform 0.3s ease; }
.form-submit:hover svg { transform: translateX(3px) rotate(-8deg); }

body.testimonial-modal-lock { overflow: hidden; }

/* =========================================================
   RESPONSIVE — TABLET
========================================================= */
@media (max-width: 768px) {
    .header-title { font-size: 26px; }
    .header-subtitle { font-size: 14px; }
    .divider-line { width: 60px; }

    .testimonial-card {
        width: 250px;
        height: 320px;
    }

    .testimonial-action-btn {
        flex: 1;
        min-width: 150px;
        padding: 0 16px;
        font-size: 13px;
        height: 44px;
    }
}

/* =========================================================
   RESPONSIVE — MOBILE (compact width, no horizontal scroll)
========================================================= */
@media (max-width: 640px) {
    .testimonial-modal {
        padding: 12px;
    }

    .testimonial-modal-dialog {
        max-width: 100%;
        max-height: calc(100vh - 24px);
        border-radius: 20px;
    }

    .testimonial-form-card {
        padding: 26px 18px 22px;
        border-radius: 20px;
    }

    .testimonial-form-card::before {
        width: 90px;
        height: 3px;
    }

    .testimonial-modal-close {
        top: 10px;
        right: 10px;
        width: 32px;
        height: 32px;
    }

    .form-header {
        margin-bottom: 20px;
        padding: 0 28px;
    }

    .form-title {
        font-size: 18px;
        letter-spacing: -0.3px;
    }

    .form-subtitle {
        font-size: 12px;
        line-height: 1.4;
    }

    .testimonial-form {
        gap: 14px;
    }

    .form-row {
        grid-template-columns: 1fr;
        gap: 14px;
    }

    .form-group {
        gap: 6px;
    }

    .form-group label {
        font-size: 12px;
    }

    .form-group input,
    .form-group textarea {
        padding: 11px 14px;
        font-size: 13px;
        border-radius: 10px;
    }

    .form-group textarea {
        min-height: 80px;
        padding-top: 10px;
    }

    .rating-input label {
        font-size: 26px;
    }

    .form-submit {
        padding: 13px 18px;
        font-size: 14px;
        border-radius: 10px;
        margin-top: 2px;
    }

    .form-submit svg {
        width: 16px;
        height: 16px;
    }
}

/* =========================================================
   RESPONSIVE — EXTRA SMALL (<=380px)
========================================================= */
@media (max-width: 380px) {
    .testimonial-modal { padding: 8px; }
    .testimonial-form-card { padding: 22px 14px 18px; }
    .form-header { padding: 0 24px; }
    .form-title { font-size: 17px; }
    .form-subtitle { font-size: 11.5px; }
    .form-group input,
    .form-group textarea { padding: 10px 12px; font-size: 12.5px; }
    .rating-input label { font-size: 24px; }
    .form-submit { font-size: 13px; padding: 12px 16px; }
}
</style>

{{-- JAVASCRIPT: CAROUSEL + MODAL ===== --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    /* ===== CAROUSEL ===== */
    const track = document.getElementById('testimonialTrack');
    const wrapper = document.getElementById('testimonialWrapper');

    if (track && wrapper) {
        const cards = Array.from(track.children);
        let speed = 1.2;
        let currentX = 0;
        let totalWidth = track.scrollWidth / 2;

        window.addEventListener('resize', () => {
            totalWidth = track.scrollWidth / 2;
        });

        function animate() {
            currentX -= speed;
            if (Math.abs(currentX) >= totalWidth) currentX = 0;
            track.style.transform = `translateX(${currentX}px)`;

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
    }

    /* ===== MODAL ===== */
    const modal = document.getElementById('testimonialModal');
    const openBtn = document.getElementById('btnOpenForm');
    const closeEls = modal ? modal.querySelectorAll('[data-modal-close]') : [];

    function openModal() {
        if (!modal) return;
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('testimonial-modal-lock');
    }

    function closeModal() {
        if (!modal) return;
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('testimonial-modal-lock');
    }

    if (openBtn) openBtn.addEventListener('click', openModal);
    closeEls.forEach(el => el.addEventListener('click', closeModal));

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal && modal.classList.contains('is-open')) {
            closeModal();
        }
    });
});
</script>
@endpush
