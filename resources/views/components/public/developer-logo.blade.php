<section class="w-full bg-white py-10 md:py-12 lg:py-14 overflow-hidden">

    {{-- TITLE --}}
    <div class="text-center mb-5 md:mb-6 px-5">

        <h2
            class="text-[14px]
                   md:text-[15px]
                   lg:text-[16px]
                   font-normal
                   tracking-[0.01em]
                   text-gray-500"
        >
            Perjanjian Kerja Sama dengan Perumahan Jember
        </h2>

    </div>


    {{-- LOGO SLIDER --}}
    <div class="relative w-full overflow-hidden">

        {{-- FADE KIRI --}}
        <div
            class="absolute
                   left-0
                   top-0
                   bottom-0
                   w-10
                   md:w-20
                   lg:w-28
                   z-10
                   bg-gradient-to-r
                   from-white
                   to-transparent
                   pointer-events-none"
        ></div>


        {{-- FADE KANAN --}}
        <div
            class="absolute
                   right-0
                   top-0
                   bottom-0
                   w-10
                   md:w-20
                   lg:w-28
                   z-10
                   bg-gradient-to-l
                   from-white
                   to-transparent
                   pointer-events-none"
        ></div>


        {{-- MARQUEE --}}
        <div class="developer-marquee">

            {{-- GROUP 1 --}}
            <div class="developer-logo-group">

                @for ($i = 1; $i <= 8; $i++)

                    <div class="developer-logo">

                        <img
                            src="{{ asset("images/developers/developer-$i.jpg") }}"
                            alt="Perumahan Jember {{ $i }}"
                        >

                    </div>

                @endfor

            </div>


            {{-- GROUP 2 --}}
            <div
                class="developer-logo-group"
                aria-hidden="true"
            >

                @for ($i = 1; $i <= 8; $i++)

                    <div class="developer-logo">

                        <img
                            src="{{ asset("images/developers/developer-$i.jpg") }}"
                            alt=""
                        >

                    </div>

                @endfor

            </div>

        </div>

    </div>


    {{-- CSS --}}
    <style>

        /*
        |--------------------------------------------------------------------------
        | MARQUEE
        |--------------------------------------------------------------------------
        */

        .developer-marquee {
            display: flex;
            width: max-content;

            animation:
                developer-marquee
                32s
                linear
                infinite;

            will-change: transform;
        }


        /*
        |--------------------------------------------------------------------------
        | LOGO GROUP
        |--------------------------------------------------------------------------
        */

        .developer-logo-group {
            display: flex;
            align-items: center;

            gap: 35px;
            padding-right: 35px;

            flex-shrink: 0;
        }


        /*
        |--------------------------------------------------------------------------
        | DESKTOP LOGO
        |--------------------------------------------------------------------------
        */

        .developer-logo {
            width: 230px;
            height: 130px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;
        }

        .developer-logo img {
            width: 210px;
            height: 110px;

            object-fit: contain;

            filter: grayscale(100%);
            opacity: 0.72;

            transition:
                filter 0.3s ease,
                opacity 0.3s ease,
                transform 0.3s ease;
        }


        /*
        |--------------------------------------------------------------------------
        | HOVER
        |--------------------------------------------------------------------------
        */

        .developer-logo:hover img {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.05);
        }


        /*
        |--------------------------------------------------------------------------
        | ANIMATION
        |--------------------------------------------------------------------------
        */

        @keyframes developer-marquee {

            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }

        }


        /*
        |--------------------------------------------------------------------------
        | TABLET
        |--------------------------------------------------------------------------
        */

        @media (max-width: 1024px) {

            .developer-marquee {
                animation-duration: 28s;
            }

            .developer-logo-group {
                gap: 25px;
                padding-right: 25px;
            }

            .developer-logo {
                width: 190px;
                height: 110px;
            }

            .developer-logo img {
                width: 175px;
                height: 90px;
            }

        }


        /*
        |--------------------------------------------------------------------------
        | MOBILE
        |--------------------------------------------------------------------------
        */

        @media (max-width: 640px) {

            .developer-marquee {
                animation-duration: 23s;
            }

            .developer-logo-group {
                gap: 18px;
                padding-right: 18px;
            }

            .developer-logo {
                width: 145px;
                height: 90px;
            }

            .developer-logo img {
                width: 135px;
                height: 75px;
            }

        }


        /*
        |--------------------------------------------------------------------------
        | REDUCE MOTION
        |--------------------------------------------------------------------------
        */

        @media (prefers-reduced-motion: reduce) {

            .developer-marquee {
                animation: none;
            }

        }

    </style>

</section>
