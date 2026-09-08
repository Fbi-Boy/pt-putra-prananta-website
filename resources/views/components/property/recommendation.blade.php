@props([
    'title' => 'Rekomendasi Properti Untuk Anda',
    'description' => 'Temukan berbagai pilihan properti terbaik yang sesuai dengan kebutuhan Anda.',
    'properties' => [],
    'viewAllUrl' => '#',
])

<section
    x-data="{
        scroll(direction) {
            const container = this.$refs.slider;

            container.scrollBy({
                left: direction * 360,
                behavior: 'smooth'
            });
        }
    }"
    class="w-full bg-[#F5F5F5] py-12"
>

    <div class="max-w-[1200px] mx-auto px-5 lg:px-0">

        <div class="grid grid-cols-1 lg:grid-cols-[280px_minmax(0,1fr)] gap-8 lg:gap-10 items-center">

            {{-- ================================= --}}
            {{-- BAGIAN KIRI : INFORMASI --}}
            {{-- ================================= --}}
            <div class="lg:pr-2">

                <h2 class="text-2xl md:text-3xl font-bold text-gray-950 leading-tight">
                    {{ $title }}
                </h2>

                <p class="mt-4 text-sm md:text-[15px] leading-6 text-gray-600">
                    {{ $description }}
                </p>

                <a
                    href="{{ $viewAllUrl }}"
                    class="inline-flex items-center justify-center
                           mt-6 px-7 h-11 rounded-full
                           bg-gray-950 text-white
                           text-sm font-semibold
                           hover:bg-orange-500 transition"
                >
                    Lihat Semua
                </a>

            </div>


            {{-- ================================= --}}
            {{-- BAGIAN KANAN : CAROUSEL --}}
            {{-- ================================= --}}
            <div class="relative min-w-0">

                {{-- TOMBOL KIRI --}}
                <button
                    type="button"
                    @click="scroll(-1)"
                    class="absolute z-20 left-0 top-1/2 -translate-x-1/2 -translate-y-1/2
                           w-10 h-10 rounded-full
                           bg-white shadow-lg
                           flex items-center justify-center
                           text-gray-700
                           hover:bg-gray-950 hover:text-white
                           transition"
                    aria-label="Geser ke kiri"
                >
                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                </button>


                {{-- CARD SLIDER --}}
                <div
                    x-ref="slider"
                    class="flex gap-4 overflow-x-auto scroll-smooth snap-x snap-mandatory
                           scrollbar-hide"
                >

                    @forelse ($properties as $property)

                        <div
                            class="shrink-0
                                   w-[280px] sm:w-[300px] lg:w-[calc((100%_-_32px)_/_3)]
                                   snap-start"
                        >

                            <x-property.card :property="$property" />

                        </div>

                    @empty

                        <div class="w-full py-16 text-center">
                            <p class="text-gray-500">
                                Belum ada rekomendasi properti.
                            </p>
                        </div>

                    @endforelse

                </div>


                {{-- TOMBOL KANAN --}}
                <button
                    type="button"
                    @click="scroll(1)"
                    class="absolute z-20 right-0 top-1/2 translate-x-1/2 -translate-y-1/2
                           w-10 h-10 rounded-full
                           bg-white shadow-lg
                           flex items-center justify-center
                           text-gray-700
                           hover:bg-gray-950 hover:text-white
                           transition"
                    aria-label="Geser ke kanan"
                >
                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                </button>

            </div>

        </div>

    </div>

</section>