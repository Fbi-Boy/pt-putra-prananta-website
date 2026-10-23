{{--
  Component: Property Status Badge
  Path: resources/views/components/property/status.blade.php

  FUNGSI:
  Badge status dinamis (TURUN HARGA / BARU / REKOMENDASI).
  Menggunakan accessor $property->badge dari model Property.

  DIPAKAI DI:
  - image.blade.php (inline, tidak dipanggil langsung)

  PROPS:
  - $property (Model) — WAJIB
  - $position (string) — "top-left" | "top-right". Default: "top-left"

  CATATAN:
  - Accessor $property->badge return null kalau tidak ada badge → component tidak render
  - Prioritas badge dari accessor: TURUN HARGA > BARU > REKOMENDASI
--}}

@props([
    'property',
    'position' => 'top-left',
])

@php
    $badge = $property->badge;
    if (!$badge) return;

    $colorClass = match($badge['color']) {
        'red'    => 'bg-red-500 text-white',
        'green'  => 'bg-emerald-500 text-white',
        'orange' => 'bg-orange-500 text-white',
        default  => 'bg-stone-900 text-white',
    };

    $positionClass = $position === 'top-right' ? 'top-3 right-3' : 'top-3 left-3';
@endphp

<span class="absolute {{ $positionClass }} px-2.5 py-1 rounded-md text-[10px] font-bold tracking-wider uppercase {{ $colorClass }} shadow-sm">
    {{ $badge['label'] }}
</span>
