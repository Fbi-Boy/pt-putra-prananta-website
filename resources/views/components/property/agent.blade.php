{{--
  Component: Property Agent Footer
  Path: resources/views/components/property/agent.blade.php

  FUNGSI:
  Footer card yang menampilkan info agent (foto, nama, waktu publish) + tombol WA.
  Fallback ke "Langsung dari PT" kalau properti tidak punya agent.

  DIPAKAI DI:
  - card.blade.php (size="sm")

  TIDAK DIPAKAI DI card-featured (footer-nya custom karena ada 2 tombol: WA + Lihat Detail).

  PROPS:
  - $property (Model) — WAJIB
  - $size (string) — "sm" | "md". Default: "sm"

  CARA PAKAI:
  <x-property.agent :property="$property" />

  CATATAN:
  - Nomor WA di-clean via preg_replace (hapus +, spasi, strip)
  - Format URL: https://wa.me/628xxx
--}}

@props([
    'property',
    'size' => 'sm',
])

@php
    $agent = $property->agent;
    $waUrl = $agent?->whatsapp
        ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $agent->whatsapp)
        : '#';
    $published = $property->published_at?->diffForHumans() ?? 'Baru';

    $photoSize = $size === 'md' ? 'w-10 h-10' : 'w-8 h-8';
    $nameSize  = $size === 'md' ? 'text-sm' : 'text-[11px]';
    $metaSize  = $size === 'md' ? 'text-xs' : 'text-[10px]';
    $btnSize   = $size === 'md' ? 'h-10 px-4 text-sm' : 'h-8 px-3 text-[11px]';
    $btnIcon   = $size === 'md' ? 'w-4 h-4' : 'w-3.5 h-3.5';
@endphp

<div class="flex items-center justify-between gap-3">
    @if($agent)
        <div class="flex items-center gap-2.5 min-w-0">
            <img src="{{ $agent->photo ? asset($agent->photo) : asset('images/agents/agent.png') }}"
                 alt="{{ $agent->name }}"
                 class="{{ $photoSize }} rounded-full object-cover ring-2 ring-white shadow-sm shrink-0">
            <div class="min-w-0">
                <p class="{{ $nameSize }} font-bold text-stone-900 truncate">{{ $agent->name }}</p>
                <p class="{{ $metaSize }} text-stone-500 truncate flex items-center gap-1">
                    <i data-lucide="clock" class="w-3 h-3"></i>
                    {{ $published }}
                </p>
            </div>
        </div>
        <a href="{{ $waUrl }}" target="_blank" rel="noopener"
           class="{{ $btnSize }} shrink-0 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white font-semibold flex items-center gap-1.5 transition shadow-sm">
            <i data-lucide="message-circle" class="{{ $btnIcon }}"></i>
            WA
        </a>
    @else
        <div class="flex items-center justify-between w-full">
            <p class="text-xs text-stone-500 italic">Langsung dari PT</p>
            <a href="{{ route('static.contact') }}"
               class="{{ $btnSize }} rounded-lg bg-stone-900 hover:bg-stone-800 text-white font-semibold transition">
                Hubungi
            </a>
        </div>
    @endif
</div>
