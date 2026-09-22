@props([
    'testimonials' => [
        [
            'name' => 'Andi Pratama',
            'role' => 'Client Property',
            'image' => asset('images/testimonials/client-1.jpg'),
            'message' => 'Pelayanannya sangat baik dan saya mendapatkan rumah yang sesuai dengan kebutuhan serta budget saya.',
        ],
        [
            'name' => 'Siti Aulia',
            'role' => 'Client Property',
            'image' => asset('images/testimonials/client-2.jpg'),
            'message' => 'Saya sangat terbantu menemukan property yang sesuai dengan keinginan, lengkap, aman, dan terpercaya.',
        ],
        [
            'name' => 'Rizky Ramadhan',
            'role' => 'Client Property',
            'image' => asset('images/testimonials/client-3.jpg'),
            'message' => 'Proses transaksi berjalan jelas dan cepat dari awal pencarian hingga pembelian property selesai.',
        ],
        [
            'name' => 'Dewi Anggraini',
            'role' => 'Client Property',
            'image' => asset('images/testimonials/client-4.jpg'),
            'message' => 'Pelayanan dari awal sampai proses pembelian sangat membantu dan komunikasinya juga sangat baik.',
        ],
    ],
])

<section class="testimonial-section">

    <div class="testimonial-container">

        {{-- =========================================
             TITLE
        ========================================== --}}
        <div class="testimonial-heading">

            <h2>
                <span>Testimoni</span>
                <strong>Tentang Kami</strong>
            </h2>

            <div class="testimonial-heading-line"></div>

        </div>


        {{-- =========================================
             TESTIMONIAL GRID
             SELALU 4 CARD
        ========================================== --}}
        <div class="testimonial-grid">

            @foreach ($testimonials as $index => $testimonial)

                <article
                    class="
                        testimonial-card
                        testimonial-card-{{ $index + 1 }}
                    "
                >

                    {{-- =================================
                         PUSH PIN
                    ================================= --}}
                    <div class="push-pin">

                        <div class="push-pin-head"></div>

                        <div class="push-pin-neck"></div>

                    </div>


                    {{-- =================================
                         CLIENT HEADER
                    ================================= --}}
                    <div class="testimonial-client">

                        {{-- PROFILE --}}
                        <div class="testimonial-avatar">

                            <img
                                src="{{ $testimonial['image'] ?? asset('images/default-user.jpg') }}"
                                alt="{{ $testimonial['name'] ?? 'Client' }}"
                            >

                        </div>


                        {{-- INFO --}}
                        <div class="testimonial-client-info">

                            {{-- STARS --}}
                            <div class="testimonial-stars">

                                @for ($i = 1; $i <= 5; $i++)

                                    <i
                                        data-lucide="star"
                                        class="star-icon"
                                    ></i>

                                @endfor

                            </div>


                            {{-- NAME --}}
                            <h3>
                                {{ $testimonial['name'] ?? 'CLIENT' }}
                            </h3>


                            {{-- ROLE --}}
                            <span>
                                {{ $testimonial['role'] ?? 'Client Property' }}
                            </span>

                        </div>

                    </div>


                    {{-- =================================
                         QUOTE
                    ================================= --}}
                    <div class="testimonial-quote-mark">
                        “
                    </div>


                    {{-- =================================
                         MESSAGE
                    ================================= --}}
                    <p class="testimonial-message">
                        {{ $testimonial['message'] ?? '' }}
                    </p>

                </article>

            @endforeach

        </div>

    </div>

</section>


<style>

/* =====================================================
   SECTION
===================================================== */

.testimonial-section {
    width: 100%;

    background: #ffffff;

    padding: 45px 0 60px;

    overflow: hidden;
}


.testimonial-container {
    width: min(
        1200px,
        calc(100% - 40px)
    );

    margin: 0 auto;
}


/* =====================================================
   HEADING
===================================================== */

.testimonial-heading {
    text-align: center;

    margin-bottom: 50px;
}


.testimonial-heading h2 {
    margin: 0;

    font-size: 27px;

    line-height: 1.1;

    font-weight: 800;

    letter-spacing: -0.8px;

    color: #172033;
}


.testimonial-heading h2 span {
    color: #172033;
}


.testimonial-heading h2 strong {
    color: #667085;

    font-weight: 800;
}


.testimonial-heading-line {
    width: 75px;

    height: 4px;

    margin: 16px auto 0;

    border-radius: 999px;

    background: #ff7a00;

    box-shadow:
        0 0 4px rgba(255, 122, 0, 0.35),
        0 0 8px rgba(255, 122, 0, 0.2);
}


/* =====================================================
   GRID
   TETAP 4 CARD
===================================================== */

.testimonial-grid {
    display: grid;

    grid-template-columns:
        repeat(4, minmax(0, 1fr));

    gap: 20px;

    align-items: start;
}


/* =====================================================
   CARD
===================================================== */

.testimonial-card {
    position: relative;

    min-width: 0;

    min-height: 325px;

    padding: 62px 23px 25px;

    border-radius: 17px;

    border: 1px solid rgba(255, 255, 255, 0.9);

    box-shadow:
        0 14px 28px rgba(31, 41, 55, 0.08),
        0 3px 8px rgba(31, 41, 55, 0.04);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}


/* =====================================================
   CARD COLORS
===================================================== */

.testimonial-card-1 {
    background: #fff8f2;

    transform: rotate(-3deg);
}


.testimonial-card-2 {
    background: #f1f8ff;

    transform: rotate(0.5deg);
}


.testimonial-card-3 {
    background: #f6f4ff;

    transform: rotate(-1.5deg);
}


.testimonial-card-4 {
    background: #f3faf7;

    transform: rotate(-2.5deg);
}


/* =====================================================
   CARD HOVER
===================================================== */

.testimonial-card:hover {

    transform:
        translateY(-6px)
        rotate(0deg);

    box-shadow:
        0 20px 35px rgba(31, 41, 55, 0.12),
        0 5px 12px rgba(31, 41, 55, 0.05);
}


/* =====================================================
   PUSH PIN
===================================================== */

.push-pin {
    position: absolute;

    left: 50%;

    top: -15px;

    width: 42px;

    height: 57px;

    transform: translateX(-50%);

    z-index: 10;

    pointer-events: none;
}


/* =====================================================
   PUSH PIN HEAD
===================================================== */

.push-pin-head {
    position: absolute;

    left: 50%;

    top: 0;

    width: 34px;

    height: 34px;

    transform: translateX(-50%);

    border-radius: 50%;

    background:
        radial-gradient(
            circle at 32% 25%,
            #ffb45b 0%,
            #ff8a18 28%,
            #ff6b00 65%,
            #e65300 100%
        );

    box-shadow:
        0 4px 7px rgba(0, 0, 0, 0.18),
        inset 0 2px 3px rgba(255, 255, 255, 0.45);
}


/* PIN HIGHLIGHT */

.push-pin-head::before {

    content: "";

    position: absolute;

    top: 4px;

    left: 7px;

    width: 11px;

    height: 6px;

    border-radius: 50%;

    background:
        rgba(255, 255, 255, 0.5);

    transform:
        rotate(-20deg);
}


/* =====================================================
   PUSH PIN NECK
===================================================== */

.push-pin-neck {

    position: absolute;

    left: 50%;

    top: 28px;

    width: 13px;

    height: 16px;

    transform:
        translateX(-50%);

    background:
        linear-gradient(
            to bottom,
            #f56d00,
            #c94300
        );

    border-radius:
        0 0 5px 5px;

    box-shadow:
        0 4px 6px rgba(0, 0, 0, 0.15);
}


/* =====================================================
   CLIENT
===================================================== */

.testimonial-client {

    display: flex;

    align-items: center;

    gap: 11px;

    min-width: 0;
}


/* =====================================================
   AVATAR
===================================================== */

.testimonial-avatar {

    width: 54px;

    height: 54px;

    flex-shrink: 0;

    overflow: hidden;

    border-radius: 50%;

    background: #e5e7eb;

    border:
        3px solid
        rgba(255, 255, 255, 0.8);

    box-shadow:
        0 3px 8px
        rgba(0, 0, 0, 0.08);
}


.testimonial-avatar img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    display: block;
}


/* =====================================================
   CLIENT INFO
===================================================== */

.testimonial-client-info {

    min-width: 0;

    padding-top: 1px;
}


/* =====================================================
   STARS
===================================================== */

.testimonial-stars {

    display: flex;

    align-items: center;

    gap: 2px;

    margin-bottom: 4px;
}


.star-icon {

    width: 13px;

    height: 13px;

    color: #ffb52e;

    fill: #ffb52e;

    stroke: #ffb52e;
}


/* =====================================================
   NAME
===================================================== */

.testimonial-client-info h3 {

    margin: 0;

    color: #172033;

    font-size: 13px;

    line-height: 17px;

    font-weight: 700;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


/* =====================================================
   ROLE
===================================================== */

.testimonial-client-info span {

    display: block;

    margin-top: 2px;

    color: #667085;

    font-size: 9px;

    line-height: 13px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


/* =====================================================
   QUOTE
===================================================== */

.testimonial-quote-mark {

    margin-top: 27px;

    margin-bottom: -2px;

    color: #9ac8e5;

    font-family:
        Georgia,
        "Times New Roman",
        serif;

    font-size: 48px;

    line-height: 30px;

    font-weight: 700;

    height: 30px;
}


/* =====================================================
   MESSAGE
===================================================== */

.testimonial-message {

    margin: 10px 0 0;

    color: #52627a;

    font-size: 11.5px;

    line-height: 1.6;

    font-weight: 400;

    display: -webkit-box;

    -webkit-box-orient: vertical;

    -webkit-line-clamp: 5;

    overflow: hidden;
}


/* =====================================================
   TABLET
   TETAP 4 CARD
===================================================== */

@media (max-width: 1024px) {

    .testimonial-section {

        padding:
            38px 0 50px;
    }


    .testimonial-container {

        width:
            calc(100% - 30px);
    }


    .testimonial-heading {

        margin-bottom: 42px;
    }


    .testimonial-heading h2 {

        font-size: 23px;
    }


    .testimonial-heading-line {

        width: 60px;

        height: 3px;

        margin-top: 13px;
    }


    .testimonial-grid {

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 10px;
    }


    .testimonial-card {

        min-height: 270px;

        padding:
            52px
            12px
            18px;

        border-radius: 12px;
    }


    /* PIN */

    .push-pin {

        top: -11px;

        width: 32px;

        height: 44px;
    }


    .push-pin-head {

        width: 27px;

        height: 27px;
    }


    .push-pin-neck {

        top: 23px;

        width: 10px;

        height: 12px;
    }


    /* CLIENT */

    .testimonial-client {

        gap: 7px;
    }


    /* AVATAR */

    .testimonial-avatar {

        width: 38px;

        height: 38px;

        border-width: 2px;
    }


    /* STARS */

    .testimonial-stars {

        gap: 1px;

        margin-bottom: 2px;
    }


    .star-icon {

        width: 9px;

        height: 9px;
    }


    /* NAME */

    .testimonial-client-info h3 {

        font-size: 9px;

        line-height: 12px;
    }


    /* ROLE */

    .testimonial-client-info span {

        font-size: 7px;

        line-height: 10px;
    }


    /* QUOTE */

    .testimonial-quote-mark {

        margin-top: 18px;

        font-size: 36px;

        line-height: 23px;

        height: 23px;
    }


    /* MESSAGE */

    .testimonial-message {

        margin-top: 7px;

        font-size: 9px;

        line-height: 1.5;

        -webkit-line-clamp: 5;
    }

}


/* =====================================================
   MOBILE
   TETAP 4 CARD
===================================================== */

@media (max-width: 640px) {

    .testimonial-section {

        padding:
            30px 0 40px;
    }


    .testimonial-container {

        width:
            calc(100% - 20px);
    }


    .testimonial-heading {

        margin-bottom: 34px;
    }


    .testimonial-heading h2 {

        font-size: 18px;

        letter-spacing:
            -0.4px;
    }


    .testimonial-heading-line {

        width: 45px;

        height: 3px;

        margin-top: 10px;
    }


    /* GRID */

    .testimonial-grid {

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 6px;
    }


    /* CARD */

    .testimonial-card {

        min-height: 210px;

        padding:
            42px
            7px
            12px;

        border-radius: 8px;
    }


    /* CARD ROTATION */

    .testimonial-card-1 {

        transform:
            rotate(-2deg);
    }


    .testimonial-card-2 {

        transform:
            rotate(0.5deg);
    }


    .testimonial-card-3 {

        transform:
            rotate(-1deg);
    }


    .testimonial-card-4 {

        transform:
            rotate(-2deg);
    }


    /* PIN */

    .push-pin {

        top: -8px;

        width: 24px;

        height: 34px;
    }


    .push-pin-head {

        width: 20px;

        height: 20px;
    }


    .push-pin-neck {

        top: 17px;

        width: 8px;

        height: 9px;

        border-radius:
            0 0 3px 3px;
    }


    /* CLIENT */

    .testimonial-client {

        gap: 5px;
    }


    /* AVATAR */

    .testimonial-avatar {

        width: 28px;

        height: 28px;

        border-width: 2px;
    }


    /* STARS */

    .testimonial-stars {

        gap: 0;

        margin-bottom: 1px;
    }


    .star-icon {

        width: 7px;

        height: 7px;
    }


    /* NAME */

    .testimonial-client-info h3 {

        font-size: 7px;

        line-height: 9px;
    }


    /* ROLE */

    .testimonial-client-info span {

        font-size: 5.5px;

        line-height: 8px;
    }


    /* QUOTE */

    .testimonial-quote-mark {

        margin-top: 13px;

        font-size: 27px;

        line-height: 18px;

        height: 18px;
    }


    /* MESSAGE */

    .testimonial-message {

        margin-top: 5px;

        font-size: 7px;

        line-height: 1.45;

        -webkit-line-clamp: 5;
    }

}


/* =====================================================
   VERY SMALL MOBILE
===================================================== */

@media (max-width: 380px) {

    .testimonial-container {

        width:
            calc(100% - 12px);
    }


    .testimonial-grid {

        gap: 4px;
    }


    .testimonial-card {

        padding:
            39px
            5px
            10px;

        min-height: 190px;

        border-radius: 7px;
    }


    .testimonial-avatar {

        width: 24px;

        height: 24px;
    }


    .testimonial-client {

        gap: 3px;
    }


    .star-icon {

        width: 6px;

        height: 6px;
    }


    .testimonial-client-info h3 {

        font-size: 6px;

        line-height: 8px;
    }


    .testimonial-client-info span {

        font-size: 5px;

        line-height: 7px;
    }


    .testimonial-message {

        font-size: 6.2px;
    }

}

</style>
 