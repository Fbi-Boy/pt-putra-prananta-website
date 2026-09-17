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

<section class="w-full bg-white py-10 md:py-12">

    <div class="max-w-[1200px] mx-auto px-5 lg:px-0">

        {{-- =========================================
            HEADING
        ========================================== --}}
        <div class="mb-7 md:mb-8">

            <h2
                class="
                    text-[20px]
                    sm:text-[22px]
                    md:text-[24px]
                    font-bold
                    text-gray-900
                    uppercase
                    tracking-tight
                "
            >
                Testimoni Tentang Kami
            </h2>

            <div class="mt-2 w-10 h-[3px] rounded-full bg-[#FF5A00]"></div>

        </div>


        {{-- =========================================
            TESTIMONIAL GRID
        ========================================== --}}
        <div
            class="
                grid
                grid-cols-1
                sm:grid-cols-2
                lg:grid-cols-4
                gap-4
                md:gap-5
            "
        >

            @foreach ($testimonials as $testimonial)

                <article
                    class="
                        relative
                        w-full
                        bg-[#F7F7F7]
                        border
                        border-gray-100
                        rounded-xl
                        px-5
                        py-5
                        shadow-sm
                        hover:shadow-md
                        hover:-translate-y-1
                        transition-all
                        duration-300
                        overflow-visible
                    "
                >

                    {{-- ORANGE LINE --}}
                    <div
                        class="
                            absolute
                            -left-[4px]
                            top-[20px]
                            w-[4px]
                            h-[55px]
                            rounded-full
                            bg-[#FF5A00]
                            shadow-[0_0_5px_#FF5A00,0_0_10px_rgba(255,90,0,0.7)]
                        "
                    ></div>


                    {{-- =================================
                        QUOTE ICON
                    ================================= --}}
                    <div
                        class="
                            flex
                            items-center
                            justify-between
                            mb-4
                        "
                    >

                        <div
                            class="
                                w-9
                                h-9
                                rounded-full
                                bg-orange-50
                                flex
                                items-center
                                justify-center
                            "
                        >

                            <i
                                data-lucide="quote"
                                class="
                                    w-[18px]
                                    h-[18px]
                                    text-[#FF5A00]
                                    fill-[#FF5A00]
                                    stroke-[#FF5A00]
                                "
                            ></i>

                        </div>


                        {{-- RATING --}}
                        <div class="flex items-center gap-1">

                            <i
                                data-lucide="star"
                                class="
                                    w-[14px]
                                    h-[14px]
                                    text-[#FF5A00]
                                    fill-[#FF5A00]
                                "
                            ></i>

                            <span
                                class="
                                    text-[12px]
                                    font-semibold
                                    text-gray-700
                                "
                            >
                                5.0
                            </span>

                        </div>

                    </div>


                    {{-- =================================
                        MESSAGE
                    ================================= --}}
                    <p
                        class="
                            text-[12px]
                            md:text-[12.5px]
                            leading-[19px]
                            text-gray-600
                            line-clamp-4
                            min-h-[76px]
                        "
                    >
                        {{ $testimonial['message'] ?? '' }}
                    </p>


                    {{-- =================================
                        DIVIDER
                    ================================= --}}
                    <div
                        class="
                            w-full
                            h-px
                            bg-gray-200
                            my-4
                        "
                    ></div>


                    {{-- =================================
                        CLIENT
                    ================================= --}}
                    <div
                        class="
                            flex
                            items-center
                            gap-3
                            min-w-0
                        "
                    >

                        {{-- FOTO --}}
                        <div
                            class="
                                w-11
                                h-11
                                rounded-full
                                overflow-hidden
                                bg-gray-200
                                shrink-0
                            "
                        >

                            <img
                                src="{{ $testimonial['image'] ?? asset('images/default-user.jpg') }}"
                                alt="{{ $testimonial['name'] ?? 'Client' }}"
                                class="
                                    w-full
                                    h-full
                                    object-cover
                                "
                            >

                        </div>


                        {{-- INFO --}}
                        <div class="min-w-0">

                            <h3
                                class="
                                    font-cutive
                                    text-[13px]
                                    font-bold
                                    uppercase
                                    tracking-[0.06em]
                                    leading-5
                                    text-gray-950
                                    truncate
                                "
                            >
                                {{ $testimonial['name'] ?? 'CLIENT' }}
                            </h3>

                            <p
                                class="
                                    text-[10px]
                                    text-gray-500
                                    mt-0.5
                                    truncate
                                "
                            >
                                {{ $testimonial['role'] ?? 'Client Property' }}
                            </p>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>


        {{-- =========================================
            BUTTON
        ========================================== --}}
        @if (count($testimonials) > 4)

            <div class="flex justify-center mt-8">

                <a
                    href="#"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        h-10
                        px-6
                        rounded-full
                        bg-gray-950
                        text-white
                        text-[11px]
                        font-semibold
                        hover:bg-[#FF5A00]
                        transition
                    "
                >
                    Lihat Testimoni Lainnya

                    <i
                        data-lucide="arrow-right"
                        class="w-4 h-4 ml-2"
                    ></i>

                </a>

            </div>

        @endif

    </div>

</section>
