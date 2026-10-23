{{--
  Component: Property Card (Small / Standard)
  Path: resources/views/components/property/card.blade.php

  FUNGSI:
  Card properti VERTIKAL ukuran KECIL untuk grid & carousel.
  Gambar 4:3, font kecil, info minimalis.

  DIPAKAI DI:
  - components/property/section.blade.php (grid 4 kolom homepage)
  - components/property/recommendation.blade.php (carousel homepage)
  - Halaman detail properti "serupa" (grid 3 kolom)

  JANGAN PAKAI DI:
  - properties/index.blade.php (listing /beli) → pakai card-featured.blade.php

  PROPS:
  - $property (Model) — WAJIB

  CARA PAKAI:
  <x-property.card :property="$property" />

  PARENT WAJIB (contoh):
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      @foreach($properties as $property)
          <x-property.card :property="$property" />
      @endforeach
  </div>

  CATATAN PENTING:
  - Card ini TIDAK punya lebar fixed → parent (grid) yang atur.
  - Card ini TIDAK punya media query → parent yang handle responsive.
  - Judul line-clamp-2 → otomatis potong kalau > 2 baris.
  - Lokasi truncate → otomatis "..." kalau kepanjangan.

  KALAU BUTUH VARIAN LAIN:
  - Ukuran besar (1 kolom) → card-featured.blade.php
  - Kalau butuh varian baru → BUAT FILE BARU, jangan tambah @if di file ini.
--}}

@props(['property'])

<article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden hover:shadow-xl hover:border-orange-200 hover:-translate-y-0.5 transition-all duration-300">

    {{-- Gambar (4:3) --}}
    <x-property.image :property="$property" aspect="4:3" />

    {{-- Konten --}}
    <div class="p-4">

        {{-- Harga --}}
        <x-property.price :property="$property" size="sm" />

        {{-- Judul (max 2 baris) --}}
        <h3 class="mt-1.5 font-bold text-stone-900 text-sm leading-snug line-clamp-2 min-h-[2.5rem] group-hover:text-orange-600 transition">
            <a href="#">{{ $property->title }}</a>
        </h3>

        {{-- Lokasi --}}
        <div class="mt-2">
            <x-property.location :property="$property" size="sm" />
        </div>

        {{-- Spesifikasi --}}
        <div class="mt-2.5 pt-2.5 border-t border-stone-100">
            <x-property.specification :property="$property" size="sm" />
        </div>

        {{-- Agent Footer --}}
        <div class="mt-3 pt-3 border-t border-stone-100">
            <x-property.agent :property="$property" size="sm" />
        </div>

    </div>
</article>
