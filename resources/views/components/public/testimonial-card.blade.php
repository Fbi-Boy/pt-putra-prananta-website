<section class="property-testimonial-section">

    <div class="property-testimonial-container">

        {{-- =========================================
             HEADING
        ========================================== --}}

        <div class="property-testimonial-heading">

            <span class="property-testimonial-label">
                TESTIMONIALS
            </span>

            <h2>
                Client Kami
            </h2>

            <p>
                Apa kata client tentang pengalaman mereka bersama kami.
            </p>

        </div>


        {{-- =========================================
             TESTIMONIAL CARDS
        ========================================== --}}

        <div class="property-testimonial-grid">


            {{-- =====================================
                 TESTIMONIAL 1
            ====================================== --}}

            <div class="property-testimonial-card">

                <div class="property-testimonial-quote">
                    “”
                </div>

                <p class="property-testimonial-text">
                    Pelayanannya sangat baik dan saya mendapatkan rumah
                    yang sesuai dengan kebutuhan serta budget saya.
                </p>

                <div class="property-testimonial-line"></div>

                <div class="property-testimonial-client">

                    <img
                        src="{{ asset('images/testimonials/client-1.jpg') }}"
                        alt="Andi Pratama"
                    >

                    <div class="property-testimonial-client-info">

                        <h4>
                            Andi Pratama
                        </h4>

                        <span>
                            Client Property
                        </span>

                    </div>

                </div>

            </div>


            {{-- =====================================
                 TESTIMONIAL 2
            ====================================== --}}

            <div class="property-testimonial-card">

                <div class="property-testimonial-quote">
                    “”
                </div>

                <p class="property-testimonial-text">
                    Saya sangat terbantu menemukan property yang sesuai
                    dengan keinginan, lengkap, aman, dan terpercaya.
                </p>

                <div class="property-testimonial-line"></div>

                <div class="property-testimonial-client">

                    <img
                        src="{{ asset('images/testimonials/client-2.jpg') }}"
                        alt="Siti Aulia"
                    >

                    <div class="property-testimonial-client-info">

                        <h4>
                            Siti Aulia
                        </h4>

                        <span>
                            Client Property
                        </span>

                    </div>

                </div>

            </div>


            {{-- =====================================
                 TESTIMONIAL 3
            ====================================== --}}

            <div class="property-testimonial-card">

                <div class="property-testimonial-quote">
                    “”
                </div>

                <p class="property-testimonial-text">
                    Proses transaksi berjalan jelas dan cepat dari awal
                    pencarian hingga pembelian property selesai.
                </p>

                <div class="property-testimonial-line"></div>

                <div class="property-testimonial-client">

                    <img
                        src="{{ asset('images/testimonials/client-3.jpg') }}"
                        alt="Rizky Ramadhan"
                    >

                    <div class="property-testimonial-client-info">

                        <h4>
                            Rizky Ramadhan
                        </h4>

                        <span>
                            Client Property
                        </span>

                    </div>

                </div>

            </div>


        </div>


        {{-- =========================================
             BUTTON LIHAT LAINNYA
        ========================================== --}}

        <div class="property-testimonial-action">

            <button
                type="button"
                class="property-testimonial-button"
                disabled
            >

                <span>
                    Lihat Lainnya
                </span>

                <span class="property-testimonial-arrow">
                    →
                </span>

            </button>

        </div>


    </div>

</section>



<style>

    /* =========================================
       PROPERTY TESTIMONIAL SECTION
    ========================================== */

    .property-testimonial-section {
        width: 100%;
        padding: 48px 0;
        background: #f7f9fb;
    }

    .property-testimonial-container {
        width: min(1050px, 92%);
        margin: 0 auto;
    }


    /* =========================================
       HEADING
    ========================================== */

    .property-testimonial-heading {
        text-align: center;
        margin-bottom: 24px;
    }

    .property-testimonial-label {
        display: inline-block;
        padding: 4px 10px;

        border: 1px solid #f39a3d;
        border-radius: 4px;

        color: #e98522;

        font-size: 9px;
        font-weight: 700;
        letter-spacing: 0.5px;

        margin-bottom: 6px;
    }

    .property-testimonial-heading h2 {
        margin: 0;

        color: #161616;

        font-size: 27px;
        font-weight: 700;
        line-height: 1.2;
    }

    .property-testimonial-heading p {
        max-width: 420px;

        margin: 5px auto 0;

        color: #888;

        font-size: 11px;
        line-height: 1.4;
    }


    /* =========================================
       TESTIMONIAL GRID
       SELALU 3 CARD
    ========================================== */

    .property-testimonial-grid {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 16px;
    }


    /* =========================================
       TESTIMONIAL CARD
    ========================================== */

    .property-testimonial-card {
        min-width: 0;

        background: #ffffff;

        padding: 15px 17px 14px;

        border-radius: 12px;

        box-shadow:
            0 5px 16px rgba(0, 0, 0, 0.05);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;
    }

    .property-testimonial-card:hover {
        transform: translateY(-3px);

        box-shadow:
            0 9px 20px rgba(0, 0, 0, 0.08);
    }


    /* =========================================
       QUOTE
    ========================================== */

    .property-testimonial-quote {
        width: fit-content;

        color: #d5dfe7;

        font-family: Georgia, "Times New Roman", serif;

        font-size: 34px;
        font-weight: 700;

        line-height: 0.65;

        letter-spacing: -6px;

        margin-bottom: 10px;
    }


    /* =========================================
       TESTIMONIAL TEXT
       SELALU DISEDIAKAN UNTUK 3 BARIS
    ========================================== */

    .property-testimonial-text {
        display: -webkit-box;

        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;

        overflow: hidden;

        margin: 0;

        color: #444;

        font-size: 13px;
        line-height: 1.55;

        /*
         * Tinggi area teks selalu sama dengan
         * tinggi maksimal 3 baris.
         */
        height: calc(13px * 1.55 * 3);
    }


    /* =========================================
       DIVIDER
    ========================================== */

    .property-testimonial-line {
        width: 100%;
        height: 1px;

        background: #edf0f2;

        margin: 11px 0;
    }


    /* =========================================
       CLIENT
    ========================================== */

    .property-testimonial-client {
        display: flex;

        align-items: center;

        gap: 8px;

        min-width: 0;
    }

    .property-testimonial-client img {
        width: 36px;
        height: 36px;

        flex-shrink: 0;

        object-fit: cover;

        border-radius: 50%;

        background: #f1f1f1;
    }

    .property-testimonial-client-info {
        min-width: 0;
    }

    .property-testimonial-client h4 {
        margin: 0 0 2px;

        color: #222;

        font-size: 12px;
        font-weight: 700;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;
    }

    .property-testimonial-client span {
        color: #999;

        font-size: 9px;

        white-space: nowrap;
    }


    /* =========================================
       BUTTON
    ========================================== */

    .property-testimonial-action {
        display: flex;

        justify-content: center;

        margin-top: 21px;
    }

    .property-testimonial-button {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 7px;

        padding: 8px 16px;

        border: 1px solid #e98522;

        border-radius: 6px;

        background: #e98522;

        color: #ffffff;

        font-family: inherit;

        font-size: 11px;

        font-weight: 600;

        cursor: not-allowed;

        opacity: 0.7;
    }

    .property-testimonial-arrow {
        font-size: 14px;

        line-height: 1;
    }


    /* =========================================
       TABLET
       TETAP 3 CARD
    ========================================== */

    @media (max-width: 1024px) {

        .property-testimonial-section {
            padding: 40px 0;
        }

        .property-testimonial-container {
            width: 94%;
        }

        .property-testimonial-heading {
            margin-bottom: 20px;
        }

        .property-testimonial-label {
            padding: 4px 9px;

            font-size: 8px;

            margin-bottom: 5px;
        }

        .property-testimonial-heading h2 {
            font-size: 24px;
        }

        .property-testimonial-heading p {
            max-width: 380px;

            font-size: 10px;
        }


        /* GRID */

        .property-testimonial-grid {
            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 10px;
        }


        /* CARD */

        .property-testimonial-card {
            padding: 13px 12px 12px;

            border-radius: 10px;
        }


        /* QUOTE */

        .property-testimonial-quote {
            font-size: 30px;

            margin-bottom: 9px;
        }


        /* TEXT */

        .property-testimonial-text {
            -webkit-line-clamp: 3;

            font-size: 11.5px;

            line-height: 1.5;

            /*
             * 3 baris tetap tersedia
             */
            height: calc(11.5px * 1.5 * 3);
        }


        /* LINE */

        .property-testimonial-line {
            margin: 9px 0;
        }


        /* CLIENT */

        .property-testimonial-client {
            gap: 6px;
        }

        .property-testimonial-client img {
            width: 32px;
            height: 32px;
        }

        .property-testimonial-client h4 {
            font-size: 10px;
        }

        .property-testimonial-client span {
            font-size: 8px;
        }


        /* BUTTON */

        .property-testimonial-action {
            margin-top: 18px;
        }

        .property-testimonial-button {
            padding: 7px 14px;

            font-size: 10px;
        }

        .property-testimonial-arrow {
            font-size: 12px;
        }
    }


    /* =========================================
       MOBILE
       TETAP 3 CARD
    ========================================== */

    @media (max-width: 767px) {

        .property-testimonial-section {
            padding: 32px 0;
        }

        .property-testimonial-container {
            width: 94%;
        }

        .property-testimonial-heading {
            margin-bottom: 16px;
        }

        .property-testimonial-label {
            padding: 3px 8px;

            font-size: 7px;

            margin-bottom: 5px;
        }

        .property-testimonial-heading h2 {
            font-size: 20px;
        }

        .property-testimonial-heading p {
            max-width: 85%;

            margin-top: 4px;

            font-size: 8.5px;

            line-height: 1.4;
        }


        /* GRID */

        .property-testimonial-grid {
            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 6px;
        }


        /* CARD */

        .property-testimonial-card {
            padding: 9px 8px 8px;

            border-radius: 8px;
        }


        /* QUOTE */

        .property-testimonial-quote {
            font-size: 25px;

            letter-spacing: -5px;

            margin-bottom: 7px;
        }


        /* TEXT */

        .property-testimonial-text {
            -webkit-line-clamp: 3;

            font-size: 9.5px;

            line-height: 1.45;

            /*
             * 3 baris tetap tersedia
             */
            height: calc(9.5px * 1.45 * 3);
        }


        /* LINE */

        .property-testimonial-line {
            margin: 7px 0;
        }


        /* CLIENT */

        .property-testimonial-client {
            gap: 4px;
        }

        .property-testimonial-client img {
            width: 25px;
            height: 25px;
        }

        .property-testimonial-client h4 {
            font-size: 7.5px;
        }

        .property-testimonial-client span {
            font-size: 6.5px;
        }


        /* BUTTON */

        .property-testimonial-action {
            margin-top: 16px;
        }

        .property-testimonial-button {
            padding: 7px 12px;

            font-size: 9px;

            border-radius: 5px;
        }

        .property-testimonial-arrow {
            font-size: 11px;
        }
    }


    /* =========================================
       SMALL MOBILE
       TETAP 3 CARD
    ========================================== */

    @media (max-width: 400px) {

        .property-testimonial-section {
            padding: 27px 0;
        }

        .property-testimonial-container {
            width: 95%;
        }

        .property-testimonial-heading {
            margin-bottom: 14px;
        }

        .property-testimonial-label {
            padding: 3px 7px;

            font-size: 6.5px;
        }

        .property-testimonial-heading h2 {
            font-size: 18px;
        }

        .property-testimonial-heading p {
            max-width: 90%;

            font-size: 8px;
        }


        /* GRID */

        .property-testimonial-grid {
            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 5px;
        }


        /* CARD */

        .property-testimonial-card {
            padding: 8px 6px 7px;

            border-radius: 7px;
        }


        /* QUOTE */

        .property-testimonial-quote {
            font-size: 22px;

            letter-spacing: -4px;

            margin-bottom: 6px;
        }


        /* TEXT */

        .property-testimonial-text {
            -webkit-line-clamp: 3;

            font-size: 8.2px;

            line-height: 1.4;

            /*
             * 3 baris tetap tersedia
             */
            height: calc(8.2px * 1.4 * 3);
        }


        /* LINE */

        .property-testimonial-line {
            margin: 6px 0;
        }


        /* CLIENT */

        .property-testimonial-client {
            gap: 3px;
        }

        .property-testimonial-client img {
            width: 22px;
            height: 22px;
        }

        .property-testimonial-client h4 {
            font-size: 6.5px;
        }

        .property-testimonial-client span {
            font-size: 5.5px;
        }


        /* BUTTON */

        .property-testimonial-action {
            margin-top: 14px;
        }

        .property-testimonial-button {
            padding: 6px 10px;

            font-size: 8px;
        }

        .property-testimonial-arrow {
            font-size: 10px;
        }
    }

</style>
