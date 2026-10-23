{{--
  Component: Property Specification
  Path: resources/views/components/property/specification.blade.php

  FUNGSI:
  Menampilkan spesifikasi: luas tanah, luas bangunan, kamar tidur, kamar mandi.
  Hanya tampil kalau nilai > 0 / ada.

  DIPAKAI DI:
  - card.blade.php (size="sm")
  - card-featured.blade.php (size="md")

  PROPS:
  - $property (Model) — WAJIB
  - $size (string) — "sm" | "md". Default: "sm"

  CARA PAKAI:
  <x-property.specification :property="$property" />

  CATATAN:
  - Kalau properti tanah (bedrooms=0, bathrooms=0) → otomatis yang ditampilkan hanya luas tanah
  - Pakai flex-wrap → kalau ruang tidak cukup, otomatis ke baris baru
--}}

@props([
    'property',
    'size' => 'sm',
])

@php
    $sizeClass = $size === 'md' ? 'text-sm' : 'text-xs';
    $iconSize = $size === 'md' ? 'w-4 h-4' : 'w-3.5 h-3.5';
@endphp

<div class="flex flex-wrap items-center gap-3 {{ $sizeClass }} text-stone-600">
    @if($property->land_area)
        <span class="flex items-center gap-1">
            <i data-lucide="square" class="{{ $iconSize }} text-stone-400"></i>
            {{ $property->land_area }} m²
        </span>
    @endif
    @if($property->building_area)
        <span class="flex items-center gap-1">
            <i data-lucide="home" class="{{ $iconSize }} text-stone-400"></i>
            {{ $property->building_area }} m²
        </span>
    @endif
    @if($property->bedrooms > 0)
        <span class="flex items-center gap-1">
            <i data-lucide="bed-double" class="{{ $iconSize }} text-stone-400"></i>
            {{ $property->bedrooms }} KT
        </span>
    @endif
    @if($property->bathrooms > 0)
        <span class="flex items-center gap-1">
            <i data-lucide="bath" class="{{ $iconSize }} text-stone-400"></i>
            {{ $property->bathrooms }} KM
        </span>
    @endif
</div>
