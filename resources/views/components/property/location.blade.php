{{--
  Component: Property Location
  Path: resources/views/components/property/location.blade.php

  FUNGSI:
  Menampilkan lokasi properti (kecamatan dari relasi area, atau alamat).

  DIPAKAI DI:
  - card.blade.php (size="sm")
  - card-featured.blade.php (size="md")

  PROPS:
  - $property (Model) — WAJIB
  - $size (string) — "sm" | "md". Default: "sm"

  CARA PAKAI:
  <x-property.location :property="$property" />

  CATATAN:
  - Prioritas: $property->area->name + ", Jember"
  - Fallback: $property->address
  - Fallback akhir: "Jember"
  - Pakai truncate → otomatis "..." kalau kepanjangan
--}}

@props([
    'property',
    'size' => 'sm',
])

@php
    $location = $property->area?->name
        ? $property->area->name . ', Jember'
        : ($property->address ?? 'Jember');

    $sizeClass = $size === 'md' ? 'text-sm' : 'text-xs';
    $iconSize = $size === 'md' ? 'w-4 h-4' : 'w-3.5 h-3.5';
@endphp

<p class="flex items-center gap-1.5 {{ $sizeClass }} text-stone-500">
    <i data-lucide="map-pin" class="{{ $iconSize }} shrink-0 text-orange-500"></i>
    <span class="truncate">{{ $location }}</span>
</p>
