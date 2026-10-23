{{--
  Component: Property Price
  Path: resources/views/components/property/price.blade.php

  FUNGSI:
  Menampilkan harga properti (format Rupiah via accessor price_formatted).

  DIPAKAI DI:
  - card.blade.php (size="sm")
  - card-featured.blade.php (size="lg")

  PROPS:
  - $property (Model) — WAJIB
  - $size (string) — "sm" | "md" | "lg". Default: "sm"

  CARA PAKAI:
  <x-property.price :property="$property" />
  <x-property.price :property="$property" size="lg" />

  CATATAN:
  - Format "Rp 850 Juta" via accessor $property->price_formatted
  - Unit (/bulan, /tahun, /hari) otomatis muncul kalau price_unit terisi (khusus sewa)
--}}

@props([
    'property',
    'size' => 'sm',
])

@php
    $sizeClass = match($size) {
        'lg'    => 'text-3xl font-bold',
        'md'    => 'text-2xl font-bold',
        default => 'text-lg font-bold',
    };

    $unitLabel = match($property->price_unit) {
        'day'   => '/hari',
        'month' => '/bulan',
        'year'  => '/tahun',
        default => '',
    };
@endphp

<p class="{{ $sizeClass }} text-orange-600 leading-tight">
    {{ $property->price_formatted }}@if($unitLabel)<span class="text-sm font-medium text-stone-500">{{ $unitLabel }}</span>@endif
</p>
