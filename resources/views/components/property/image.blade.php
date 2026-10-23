{{--
  Component: Property Image
  Path: resources/views/components/property/image.blade.php

  FUNGSI:
  Menampilkan gambar utama properti dengan rasio yang bisa disesuaikan.
  Termasuk badge status & tombol favorite.

  DIPAKAI DI:
  - card.blade.php (aspect="4:3")
  - card-featured.blade.php (aspect="16:9")

  PROPS:
  - $property (Model) — WAJIB
  - $aspect (string) — "4:3" | "16:9" | "21:9" | "1:1". Default: "4:3"
  - $showBadge (bool) — default true
  - $showFavorite (bool) — default true

  CARA PAKAI:
  <x-property.image :property="$property" />
  <x-property.image :property="$property" aspect="16:9" />

  CATATAN:
  - Gambar otomatis pakai absolute inset-0 → card parent atur lebarnya
  - Accessor primaryImage->medium_url dipakai kalau ada
  - Fallback ke images/property/rumah1.jpg kalau tidak ada gambar
--}}

@props([
    'property',
    'aspect' => '4:3',
    'showBadge' => true,
    'showFavorite' => true,
])

@php
    $aspectClass = match($aspect) {
        '16:9' => 'aspect-[16/9]',
        '21:9' => 'aspect-[21/9]',
        '1:1'  => 'aspect-square',
        default => 'aspect-[4/3]',
    };

    $imgUrl = $property->primaryImage?->medium_url
        ?? asset('images/property/rumah1.jpg');
    $badge = $property->badge;
@endphp

<div class="relative {{ $aspectClass }} overflow-hidden bg-stone-100">
    <img src="{{ $imgUrl }}"
         alt="{{ $property->title }}"
         class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
         loading="lazy">

    @if($showBadge && $badge)
        @php
            $badgeClass = match($badge['color']) {
                'red'    => 'bg-red-500 text-white',
                'green'  => 'bg-emerald-500 text-white',
                'orange' => 'bg-orange-500 text-white',
                default  => 'bg-stone-900 text-white',
            };
        @endphp
        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-bold tracking-wider uppercase {{ $badgeClass }} shadow-sm">
            {{ $badge['label'] }}
        </span>
    @endif

    @if($showFavorite)
        <button type="button"
                aria-label="Simpan properti"
                class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur hover:bg-white text-stone-700 hover:text-red-500 flex items-center justify-center shadow-sm transition">
            <i data-lucide="heart" class="w-4 h-4"></i>
        </button>
    @endif
</div>
