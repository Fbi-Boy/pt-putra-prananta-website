@props([
    'testimonials' => [],
])

<section class="w-full bg-white py-14">

    <div class="max-w-[1200px] mx-auto px-5 lg:px-0">

        {{-- =====================================================
            HEADER
        ====================================================== --}}
        <div class="text-center mb-10">

            {{-- LABEL --}}
            <span
                class="inline-flex
                       items-center
                       px-3.5
                       py-1.5
                       rounded-full
                       bg-orange-50
                       text-[#FF5A00]
                       text-[10px]
                       font-semibold
                       uppercase
                       tracking-wider"
            >
                Client Testimonials
            </span>

            {{-- TITLE --}}
            <h2
                class="mt-4
                       text-[28px]
                       md:text-[32px]
                       font-bold
                       leading-[1.15]
                       text-gray-950"
            >
                Apa Kata Mereka
                <br>

                <span class="text-[#FF5A00]">
                    Tentang Layanan Kami
                </span>
            </h2>

            {{-- DESCRIPTION --}}
            <p
                class="mt-4
                       max-w-[580px]
                       mx-auto
                       text-[13px]
                       leading-6
                       text-gray-500"
            >
                Pengalaman dan kepercayaan dari para klien yang telah
                menggunakan layanan properti kami.
            </p>

        </div>


        {{-- =====================================================
            TESTIMONIAL CARDS
            HANYA 3 CARD
        ====================================================== --}}
        <div
            class="grid
                   grid-cols-1
                   md:grid-cols-2
                   lg:grid-cols-3
                   gap-6"
        >

            @forelse (array_slice($testimonials, 0, 3) as $testimonial)

                <article
                    class="relative
                           bg-[#F7F7F7]
                           rounded-2xl
                           border border-gray-100
                           px-6
                           py-6
                           min-h-[220px]
                           shadow-sm
                           hover:shadow-md
                           transition duration-300
                           overflow-visible"
                >

                    {{-- =================================================
                        ORANGE NEON SIDE LINE
                    ================================================== --}}
                    <div
                        class="absolute
                               -left-[5px]
                               top-[20px]
                               h-[70px]
                               w-[5px]
                               rounded-full
                               bg-[#FF5A00]
                               shadow-[0_0_5px_#FF5A00,0_0_10px_#FF5A00,0_0_18px_rgba(255,90,0,0.75)]"
                    ></div>


                    {{-- =================================================
                        PROFILE + RATING
                    ================================================== --}}
                    <div
                        class="flex
                               items-start
                               justify-between
                               gap-4"
                    >

                        {{-- CLIENT INFO --}}
                        <div class="min-w-0">

                            <div
                                class="flex
                                       items-center
                                       gap-3"
                            >

                                {{-- FOTO --}}
                                <div
                                    class="w-18
                                           h-18
                                           rounded-full
                                           overflow-hidden
                                           bg-gray-200
                                           shrink-0"
                                >
                                    <img
                                        src="{{ $testimonial['image'] ?? asset('images/default-user.jpg') }}"
                                        alt="{{ $testimonial['name'] ?? 'Client' }}"
                                        class="w-full h-full object-cover"
                                    >
                                </div>


                                {{-- NAME + ROLE + RATING --}}
                                <div class="min-w-0">

                                    {{-- =================================================
                                        NAME
                                        FONT LEBIH TEGAS / NEON STYLE
                                    ================================================== --}}

                                    <h3
                                        class="font-cutive
                                            text-[15px]
                                            font-bold
                                            uppercase
                                            tracking-[0.12em]
                                            leading-5
                                            text-gray-950
                                            truncate"
                                    >
                                        {{ $testimonial['name'] ?? 'CLIENT' }}
                                    </h3>

                                    {{-- ROLE --}}
                                    <p
                                        class="mt-1
                                               text-[12px]
                                               leading-4
                                               text-gray-500
                                               truncate"
                                    >
                                        {{ $testimonial['role'] ?? 'Client' }}
                                    </p>


                                    {{-- =================================================
                                        RATING
                                    ================================================== --}}
                                    <div
                                        class="flex
                                               items-center
                                               gap-1
                                               mt-2"
                                    >

                                        @for ($i = 1; $i <= 5; $i++)

                                            <i
                                                data-lucide="star"
                                                class="w-[17px]
                                                       h-[17px]
                                                       text-[#FF5A00]
                                                       drop-shadow-[0_0_2px_rgba(255,90,0,0.45)]
                                                       drop-shadow-[0_0_5px_rgba(255,90,0,0.25)]"
                                                fill="currentColor"
                                            ></i>

                                        @endfor


                                        {{-- RATING NUMBER --}}
                                        <span
                                            class="ml-1
                                                   text-[17px]
                                                   leading-[17px]
                                                   font-semibold
                                                   text-gray-700"
                                        >
                                            {{ $testimonial['rating'] ?? '5.0' }}
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            QUOTE ICON
                        ================================================== --}}
                        <div
                            class="w-12 h-12 rounded-full
                                bg-orange-50
                                flex items-center justify-center
                                shrink-0"
                        >
                            <i
                                data-lucide="quote"
                                class="w-[23px] h-[23px]
                                    text-[#FF5A00]
                                    fill-[#FF5A00]
                                    stroke-[#FF5A00]
                                    drop-shadow-[0_0_3px_#FF5A00]
                                    drop-shadow-[0_0_7px_#FF5A00]
                                    drop-shadow-[0_0_14px_rgba(255,90,0,0.8)]"
                            ></i>
                        </div>

                    </div>


                    {{-- =================================================
                        MESSAGE
                    ================================================== --}}
                    <p
                        class="mt-5
                               text-[12px]
                               leading-[19px]
                               text-gray-500
                               line-clamp-4"
                    >
                        {{ $testimonial['message'] ?? 'Pelayanan yang sangat baik dan profesional. Prosesnya mudah, cepat, dan sangat membantu.' }}
                    </p>

                </article>

            @empty

                {{-- EMPTY STATE --}}
                <div
                    class="md:col-span-2
                           lg:col-span-3
                           py-12
                           text-center"
                >
                    <p class="text-sm text-gray-500">
                        Belum ada testimonial.
                    </p>
                </div>

            @endforelse

        </div>


        {{-- =====================================================
            BUTTON
            HANYA MUNCUL JIKA DATA LEBIH DARI 3
        ====================================================== --}}
        @if (count($testimonials) > 3)

            <div class="flex justify-center mt-9">

                <a
                    href="#"
                    class="inline-flex
                           items-center
                           justify-center
                           h-11
                           px-7
                           rounded-full
                           bg-[#FF5A00]
                           text-white
                           text-[12px]
                           font-semibold
                           hover:bg-[#E94F00]
                           hover:shadow-lg
                           transition"
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