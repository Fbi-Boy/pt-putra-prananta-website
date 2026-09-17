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
             CARDS
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
                                src="{{ $testimonial['image'] }}"
                                alt="{{ $testimonial['name'] }}"
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
                                {{ $testimonial['name'] }}
                            </h3>


                            {{-- ROLE --}}
                            <span>
                                {{ $testimonial['role'] }}
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
                        {{ $testimonial['message'] }}
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
        padding: 55px 0 70px;
        overflow: hidden;
    }


    .testimonial-container {
        width: min(1200px, calc(100% - 40px));
        margin: 0 auto;
    }


    /* =====================================================
       HEADING
    ===================================================== */

    .testimonial-heading {
        text-align: center;
        margin-bottom: 65px;
    }


    .testimonial-heading h2 {
        margin: 0;

        font-size: 42px;
        line-height: 1.1;

        font-weight: 800;

        letter-spacing: -1.5px;

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
        width: 115px;
        height: 6px;

        margin: 25px auto 0;

        border-radius: 999px;

        background: #ff7a00;

        box-shadow:
            0 0 4px rgba(255, 122, 0, 0.45),
            0 0 10px rgba(255, 122, 0, 0.25);
    }


    /* =====================================================
       GRID
    ===================================================== */

    .testimonial-grid {
        display: grid;

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 28px;

        align-items: start;
    }


    /* =====================================================
       CARD
    ===================================================== */

    .testimonial-card {
        position: relative;

        min-width: 0;

        min-height: 365px;

        padding: 72px 32px 30px;

        border-radius: 20px;

        border: 1px solid rgba(255, 255, 255, 0.9);

        box-shadow:
            0 16px 30px rgba(31, 41, 55, 0.08),
            0 4px 10px rgba(31, 41, 55, 0.04);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;
    }


    /* CARD COLORS */

    .testimonial-card-1 {
        background: #fff8f2;
        transform: rotate(-4deg);
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
        transform: rotate(-3deg);
    }


    .testimonial-card:hover {
        transform:
            translateY(-7px)
            rotate(0deg);

        box-shadow:
            0 22px 40px rgba(31, 41, 55, 0.13),
            0 6px 14px rgba(31, 41, 55, 0.06);
    }


    /* =====================================================
       PUSH PIN
    ===================================================== */

    .push-pin {
        position: absolute;

        left: 50%;
        top: -17px;

        width: 46px;
        height: 62px;

        transform: translateX(-50%);

        z-index: 10;

        pointer-events: none;
    }


    /* MAIN ROUND HEAD */

    .push-pin-head {
        position: absolute;

        left: 50%;
        top: 0;

        width: 38px;
        height: 38px;

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
            0 5px 8px rgba(0, 0, 0, 0.18),
            inset 0 2px 3px rgba(255, 255, 255, 0.45);

        border: 1px solid rgba(255, 255, 255, 0.35);
    }


    /* HIGHLIGHT */

    .push-pin-head::before {
        content: "";

        position: absolute;

        top: 5px;
        left: 8px;

        width: 12px;
        height: 7px;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.5);

        transform: rotate(-20deg);
    }


    /* NECK */

    .push-pin-neck {
        position: absolute;

        left: 50%;
        top: 32px;

        width: 15px;
        height: 17px;

        transform: translateX(-50%);

        background:
            linear-gradient(
                to bottom,
                #f56d00,
                #c94300
            );

        border-radius:
            0 0 6px 6px;

        box-shadow:
            0 5px 7px rgba(0, 0, 0, 0.15);
    }


    /* =====================================================
       CLIENT
    ===================================================== */

    .testimonial-client {
        display: flex;

        align-items: center;

        gap: 16px;

        min-width: 0;
    }


    /* =====================================================
       AVATAR
    ===================================================== */

    .testimonial-avatar {
        width: 66px;
        height: 66px;

        flex-shrink: 0;

        overflow: hidden;

        border-radius: 50%;

        background: #e5e7eb;

        border: 4px solid rgba(255, 255, 255, 0.8);

        box-shadow:
            0 4px 10px rgba(0, 0, 0, 0.08);
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

        padding-top: 2px;
    }


    /* =====================================================
       STARS
    ===================================================== */

    .testimonial-stars {
        display: flex;

        align-items: center;

        gap: 3px;

        margin-bottom: 6px;
    }


    .star-icon {
        width: 16px;
        height: 16px;

        color: #ffb52e;

        fill: #ffb52e;

        stroke: #ffb52e;

        filter:
            drop-shadow(
                0 1px 1px
                rgba(255, 160, 0, 0.18)
            );
    }


    /* =====================================================
       NAME
    ===================================================== */

    .testimonial-client-info h3 {
        margin: 0;

        color: #172033;

        font-size: 16px;

        line-height: 20px;

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

        margin-top: 3px;

        color: #667085;

        font-size: 11px;

        line-height: 15px;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;
    }


    /* =====================================================
       QUOTE
    ===================================================== */

    .testimonial-quote-mark {
        margin-top: 34px;

        margin-bottom: -2px;

        color: #9ac8e5;

        font-family:
            Georgia,
            "Times New Roman",
            serif;

        font-size: 58px;

        line-height: 35px;

        font-weight: 700;

        height: 35px;
    }


    /* =====================================================
       MESSAGE
    ===================================================== */

    .testimonial-message {
        margin: 12px 0 0;

        color: #52627a;

        font-size: 14px;

        line-height: 1.65;

        font-weight: 400;

        display: -webkit-box;

        -webkit-box-orient: vertical;

        -webkit-line-clamp: 5;

        overflow: hidden;
    }


    /* =====================================================
       TABLET
    ===================================================== */

    @media (max-width: 1100px) {

        .testimonial-section {
            padding: 48px 0 60px;
        }


        .testimonial-container {
            width: min(
                94%,
                900px
            );
        }


        .testimonial-heading {
            margin-bottom: 55px;
        }


        .testimonial-heading h2 {
            font-size: 34px;
        }


        .testimonial-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 28px;
        }


        .testimonial-card {
            min-height: 340px;

            padding:
                68px
                28px
                28px;
        }

    }


    /* =====================================================
       MOBILE
    ===================================================== */

    @media (max-width: 640px) {

        .testimonial-section {
            padding: 38px 0 48px;
        }


        .testimonial-container {
            width: calc(100% - 30px);
        }


        .testimonial-heading {
            margin-bottom: 50px;
        }


        .testimonial-heading h2 {
            font-size: 28px;

            letter-spacing: -0.8px;
        }


        .testimonial-heading-line {
            width: 75px;

            height: 4px;

            margin-top: 18px;
        }


        .testimonial-grid {
            grid-template-columns: 1fr;

            gap: 45px;
        }


        .testimonial-card {
            width: 100%;

            min-height: 320px;

            padding:
                65px
                25px
                28px;
        }


        .testimonial-card-1,
        .testimonial-card-2,
        .testimonial-card-3,
        .testimonial-card-4 {
            transform: rotate(0deg);
        }


        .testimonial-avatar {
            width: 60px;
            height: 60px;
        }


        .testimonial-client {
            gap: 14px;
        }


        .testimonial-client-info h3 {
            font-size: 15px;
        }


        .testimonial-message {
            font-size: 13px;

            line-height: 1.65;
        }

    }


    /* =====================================================
       SMALL MOBILE
    ===================================================== */

    @media (max-width: 400px) {

        .testimonial-heading h2 {
            font-size: 24px;
        }


        .testimonial-card {
            padding:
                62px
                21px
                25px;
        }


        .testimonial-avatar {
            width: 56px;
            height: 56px;
        }


        .testimonial-stars {
            gap: 2px;
        }


        .star-icon {
            width: 14px;
            height: 14px;
        }


        .testimonial-client-info h3 {
            font-size: 14px;
        }

    }


    /* =====================================================
       REDUCED MOTION
    ===================================================== */

    @media (prefers-reduced-motion: reduce) {

        .testimonial-card {
            transition: none;
        }

    }

</style>
