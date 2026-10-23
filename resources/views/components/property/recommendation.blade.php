{{--
  Component: Property Recommendation (Carousel Horizontal)
  Path: resources/views/components/property/recommendation.blade.php

  FUNGSI:
  Carousel horizontal dengan tombol navigasi kiri/kanan (Alpine.js).
  Layout: teks kiri (deskripsi + CTA), carousel kanan.

  DIPAKAI DI:
  - resources/views/welcome.blade.php (Rekomendasi Properti Untuk Anda)

  TERHUBUNG DENGAN:
  - card.blade.php (di-loop per properti)

  PROPS:
  - $title (string) — default "Rekomendasi Properti Untuk Anda"
  - $description (string) — default text
  - $properties (Collection) — WAJIB
  - $viewAllUrl (string) — default "#"

  CARA PAKAI:
  <x-property.recommendation
      title="Rekomendasi Properti Untuk Anda"
      :properties="$recommended"
      view-all-url="{{ route('properties.index') }}"
  />

  CATATAN:
  - Pakai Alpine.js untuk scroll smooth (x-data, @click)
  - Card lebar ~280-300px per item di mobile, ~1/3 container di lg
  - Tombol navigasi melayang setengah di luar container
  - Properties kosong → tampil "Belum ada rekomendasi properti"
--}}

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
            container.scrollBy({ left: direction * 340, behavior: 'smooth' });
        }
    }"
    class="w-full bg-stone-50 py-12"
>
    <div class="max-w-[1200px] mx-auto px-5 lg:px-0">
        <div class="grid grid-cols-1 lg:grid-cols-[280px_minmax(0,1fr)] gap-8 lg:gap-10 items-center">

            {{-- Kiri: Info --}}
            <div class="lg:pr-2">
                <h2 class="text-2xl md:text-3xl font-bold text-stone-900 leading-tight">{{ $title }}</h2>
                <p class="mt-4 text-sm md:text-[15px] leading-6 text-stone-600">{{ $description }}</p>
                <a href="{{ $viewAllUrl }}"
                   class="inline-flex items-center justify-center mt-6 px-7 h-11 rounded-full bg-stone-900 text-white text-sm font-semibold hover:bg-orange-500 transition">
                    Lihat Semua
                </a>
            </div>

            {{-- Kanan: Carousel --}}
            <div class="relative min-w-0">

                {{-- Tombol Kiri --}}
                <button type="button" @click="scroll(-1)"
                        class="absolute z-20 left-0 top-1/2 -translate-x-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-lg flex items-center justify-center text-stone-700 hover:bg-stone-900 hover:text-white transition"
                        aria-label="Geser ke kiri">
                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                </button>

                {{-- Slider --}}
                <div x-ref="slider" class="flex gap-4 overflow-x-auto scroll-smooth snap-x snap-mandatory scrollbar-hide">
                    @forelse($properties as $property)
                        <div class="shrink-0 w-[280px] sm:w-[300px] lg:w-[calc((100%_-_32px)_/_3)] snap-start">
                            <x-property.card :property="$property" />
                        </div>
                    @empty
                        <div class="w-full py-16 text-center">
                            <p class="text-stone-500">Belum ada rekomendasi properti.</p>
                        </div>
                    @endforelse
                </div>

                {{-- Tombol Kanan --}}
                <button type="button" @click="scroll(1)"
                        class="absolute z-20 right-0 top-1/2 translate-x-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-lg flex items-center justify-center text-stone-700 hover:bg-stone-900 hover:text-white transition"
                        aria-label="Geser ke kanan">
                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                </button>

            </div>

        </div>
    </div>
</section>
