<section class="w-full bg-white py-12 md:py-14 lg:py-16 overflow-hidden">

    @php
        $developers = [
            [
                'logo' => 'developer-1.jpg',
                'name' => 'Grand Surya Residence',
            ],
            [
                'logo' => 'developer-2.jpg',
                'name' => 'Puri Jember Regency',
            ],
            [
                'logo' => 'developer-3.jpg',
                'name' => 'Taman Arum Residence',
            ],
            [
                'logo' => 'developer-4.jpg',
                'name' => 'Mutiara Jember Residence',
            ],
            [
                'logo' => 'developer-5.jpg',
                'name' => 'Bukit Cemara Residence',
            ],
            [
                'logo' => 'developer-6.jpg',
                'name' => 'Graha Persada Jember',
            ],
            [
                'logo' => 'developer-7.jpg',
                'name' => 'Nusa bunga Residence',
            ],
            [
                'logo' => 'developer-8.png',
                'name' => 'Kencana jember Residence',
            ],
        ];
    @endphp


    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="max-w-[900px] mx-auto px-5 text-center mb-9 md:mb-11">

        <h2
            class="
                text-[20px]
                sm:text-[22px]
                md:text-[25px]
                lg:text-[28px]
                font-bold
                leading-tight
                text-gray-900
            "
        >
            Perjanjian Kerja Sama dengan
            <span class="text-[#FF5A00]">
                Perumahan Jember
            </span>
        </h2>

        <p
            class="
                mt-3
                text-[11px]
                sm:text-[12px]
                md:text-[13px]
                lg:text-[14px]
                leading-5
                text-gray-500
                max-w-[620px]
                mx-auto
            "
        >
            Bersama menghadirkan hunian terbaik dengan developer
            terpercaya di wilayah Jember.
        </p>

    </div>


    {{-- =========================================================
        LOGO MARQUEE
    ========================================================== --}}
    <div class="relative w-full overflow-hidden">

        {{-- LEFT FADE --}}
        <div
            class="
                absolute
                left-0
                top-0
                bottom-0
                w-12
                sm:w-20
                md:w-28
                lg:w-36
                z-20
                pointer-events-none
                bg-gradient-to-r
                from-white
                via-white/80
                to-transparent
            "
        ></div>


        {{-- RIGHT FADE --}}
        <div
            class="
                absolute
                right-0
                top-0
                bottom-0
                w-12
                sm:w-20
                md:w-28
                lg:w-36
                z-20
                pointer-events-none
                bg-gradient-to-l
                from-white
                via-white/80
                to-transparent
            "
        ></div>


        {{-- MARQUEE --}}
        <div class="developer-marquee">

            {{-- GROUP 1 --}}
            <div class="developer-logo-group">

                @foreach ($developers as $developer)

                    <div class="developer-logo-item">

                        {{-- LOGO --}}
                        <div class="developer-logo">

                            <img
                                src="{{ asset('images/developers/' . $developer['logo']) }}"
                                alt="{{ $developer['name'] }}"
                            >

                        </div>


                        {{-- NAMA PERUMAHAN --}}
                        <p class="developer-name">
                            {{ $developer['name'] }}
                        </p>

                    </div>

                @endforeach

            </div>


            {{-- GROUP 2
                 DUPLIKAT UNTUK LOOP TANPA PUTUS --}}
            <div
                class="developer-logo-group"
                aria-hidden="true"
            >

                @foreach ($developers as $developer)

                    <div class="developer-logo-item">

                        <div class="developer-logo">

                            <img
                                src="{{ asset('images/developers/' . $developer['logo']) }}"
                                alt=""
                            >

                        </div>

                        <p class="developer-name">
                            {{ $developer['name'] }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </div>


    {{-- =========================================================
        STYLE
    ========================================================== --}}
    <style>

        /* =====================================================
           MARQUEE
        ===================================================== */

        .developer-marquee {
            display: flex;
            width: max-content;

            animation:
                developer-marquee-scroll
                32s
                linear
                infinite;

            will-change: transform;
        }


        .developer-logo-group {
            display: flex;
            align-items: flex-start;

            gap: 42px;

            padding-right: 42px;

            flex-shrink: 0;
        }


        /* =====================================================
           ITEM
        ===================================================== */

        .developer-logo-item {
            width: 220px;

            flex-shrink: 0;

            display: flex;
            flex-direction: column;
            align-items: center;

            text-align: center;
        }


        /* =====================================================
           LOGO AREA
        ===================================================== */

        .developer-logo {
            width: 220px;
            height: 125px;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        .developer-logo img {
            width: 205px;
            height: 110px;

            object-fit: contain;

            filter: grayscale(100%);

            opacity: 0.68;

            transition:
                filter 0.3s ease,
                opacity 0.3s ease,
                transform 0.3s ease;
        }


        /* =====================================================
           HOVER LOGO
        ===================================================== */

        .developer-logo-item:hover img {
            filter: grayscale(0%);

            opacity: 1;

            transform: scale(1.06);
        }


        /* =====================================================
           NAMA PERUMAHAN
        ===================================================== */

        .developer-name {
            margin-top: 2px;

            width: 100%;

            padding: 0 8px;

            font-size: 12px;

            line-height: 18px;

            font-weight: 500;

            color: #6b7280;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

            transition:
                color 0.3s ease,
                transform 0.3s ease;
        }


        .developer-logo-item:hover .developer-name {
            color: #111827;

            transform: translateY(-1px);
        }


        /* =====================================================
           ANIMATION
        ===================================================== */

        @keyframes developer-marquee-scroll {

            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }

        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 1024px) {

            .developer-marquee {
                animation-duration: 29s;
            }

            .developer-logo-group {
                gap: 30px;
                padding-right: 30px;
            }

            .developer-logo-item {
                width: 190px;
            }

            .developer-logo {
                width: 190px;
                height: 110px;
            }

            .developer-logo img {
                width: 175px;
                height: 95px;
            }

            .developer-name {
                font-size: 11px;
            }

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 640px) {

            .developer-marquee {
                animation-duration: 23s;
            }

            .developer-logo-group {
                gap: 20px;
                padding-right: 20px;
            }

            .developer-logo-item {
                width: 150px;
            }

            .developer-logo {
                width: 150px;
                height: 90px;
            }

            .developer-logo img {
                width: 140px;
                height: 78px;
            }

            .developer-name {
                margin-top: 0;

                font-size: 10px;

                line-height: 15px;

                padding: 0 4px;
            }

        }


        /* =====================================================
           REDUCED MOTION
        ===================================================== */

        @media (prefers-reduced-motion: reduce) {

            .developer-marquee {
                animation: none;
            }

        }

    </style>

</section>
