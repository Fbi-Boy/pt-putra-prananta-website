{{--
  Component: Property Section (Grid 4 Kolom)
  Path: resources/views/components/property/section.blade.php

  FUNGSI:
  Section grid properti untuk homepage. 4 kolom desktop, 2 tablet, 1 mobile.

  DIPAKAI DI:
  - resources/views/welcome.blade.php (Properti Terpopuler, Properti Terbaru)

  TERHUBUNG DENGAN:
  - card.blade.php (di-loop per properti)

  PROPS:
  - $title (string) — default "Properti Terpopuler"
  - $properties (Collection) — WAJIB, dari controller (query hasil)
  - $viewAllUrl (string) — default "#"
  - $background (string) — default "bg-white"

  CARA PAKAI:
  <x-property.section
      title="Properti Terpopuler"
      :properties="$popular"
      view-all-url="{{ route('properties.index') }}"
  />

  CATATAN:
  - Grid 4 kolom hanya di lg (1024px+), di bawahnya auto 1-2 kolom
  - Properties KOSONG → tampil "Belum ada properti"
  - Tombol "Lihat Semua" muncul di desktop + mobile (styling beda)
--}}

@props([
    'title' => 'Properti Terpopuler',
    'properties' => [],
    'viewAllUrl' => '#',
    'background' => 'bg-white',
])

<section class="w-full py-10 {{ $background }}">
    <div class="max-w-[1200px] mx-auto px-5 lg:px-0">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-stone-900">{{ $title }}</h2>
            <a href="{{ $viewAllUrl }}"
               class="hidden sm:flex items-center justify-center px-6 h-10 rounded-full bg-stone-900 text-white text-sm font-semibold hover:bg-orange-500 transition">
                Lihat Semua
            </a>
        </div>

        {{-- Grid: 1 → 2 → 4 kolom --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @forelse($properties as $property)
                <x-property.card :property="$property" />
            @empty
                <div class="col-span-full py-16 text-center">
                    <p class="text-stone-500">Belum ada properti.</p>
                </div>
            @endforelse
        </div>

        {{-- Lihat Semua (Mobile) --}}
        <div class="mt-5 sm:hidden">
            <a href="{{ $viewAllUrl }}"
               class="flex items-center justify-center w-full h-11 rounded-xl bg-stone-900 text-white text-sm font-semibold hover:bg-orange-600 transition">
                Lihat Semua
            </a>
        </div>

    </div>
</section>
