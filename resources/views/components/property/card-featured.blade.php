{{--
  Component: Property Card (Featured / Large)
  Path: resources/views/components/property/card-featured.blade.php

  FUNGSI:
  Card properti VERTIKAL ukuran BESAR (100% lebar parent).
  Gambar 16:9, font lebih besar, info lebih lengkap (deskripsi + fasilitas + 2 CTA).

  DIPAKAI DI:
  - properties/index.blade.php (halaman /beli, /sewa, /kpr)

  JANGAN PAKAI DI:
  - Homepage section (grid 4 kolom) → pakai card.blade.php
  - Carousel → pakai card.blade.php

  PROPS:
  - $property (Model) — WAJIB

  CARA PAKAI:
  <x-property.card-featured :property="$property" />

  PARENT WAJIB (contoh — 1 kolom vertical):
  <div class="flex flex-col gap-5">
      @foreach($properties as $property)
          <x-property.card-featured :property="$property" />
      @endforeach
  </div>

  CATATAN PENTING:
  - Card ini di-desain untuk LEBAR PENUH 1 kolom (60-100% layar).
  - JANGAN taruh di grid 2+ kolom → gambar 16:9 jadi terlalu pendek.
  - Deskripsi line-clamp-2 → otomatis potong kalau > 2 baris.
  - Fasilitas diambil dari $property->facilities (max 3 tampil).
  - Footer custom: agent kiri + 2 tombol kanan (WA + Lihat Detail).

  BEDA DENGAN card.blade.php:
  - Gambar: 16:9 vs 4:3
  - Harga: text-3xl vs text-lg
  - Judul: text-xl vs text-sm
  - Info: + deskripsi + fasilitas + tombol Lihat Detail
  - Agent: custom footer + 2 tombol
--}}

@props(['property'])

@php
    $facilities = $property->relationLoaded('facilities')
        ? $property->facilities->take(3)
        : collect();
    $agent = $property->agent;
@endphp

<article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden hover:shadow-xl hover:border-orange-200 transition-all duration-300">

    {{-- Gambar (16:9) --}}
    <x-property.image :property="$property" aspect="16:9" />

    {{-- Konten --}}
    <div class="p-5 sm:p-6">

        {{-- Top: Tipe & Area --}}
        <div class="flex items-center justify-between gap-3 mb-3">
            <div class="flex items-center gap-2 text-xs font-semibold text-stone-500 uppercase tracking-wider">
                @if($property->type)
                    <span>{{ $property->type->name }}</span>
                    <span class="text-stone-300">·</span>
                @endif
                <span>{{ $property->area?->name ?? 'Jember' }}</span>
            </div>
            @if($property->is_kpr_eligible)
                <span class="px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">
                    KPR
                </span>
            @endif
        </div>

        {{-- Harga --}}
        <x-property.price :property="$property" size="lg" />

        {{-- Judul --}}
        <h3 class="mt-2 font-bold text-stone-900 text-xl sm:text-2xl leading-snug line-clamp-2 group-hover:text-orange-600 transition">
            <a href="#">{{ $property->title }}</a>
        </h3>

        {{-- Lokasi --}}
        <div class="mt-3">
            <x-property.location :property="$property" size="md" />
        </div>

        {{-- Deskripsi (kalau ada) --}}
        @if($property->description)
            <p class="mt-3 text-sm text-stone-600 leading-relaxed line-clamp-2">
                {{ $property->description }}
            </p>
        @endif

        {{-- Spesifikasi --}}
        <div class="mt-4 pb-4 border-b border-stone-100">
            <x-property.specification :property="$property" size="md" />
        </div>

        {{-- Fasilitas --}}
        @if($facilities->count() > 0)
            <div class="mt-4 flex flex-wrap gap-2">
                @foreach($facilities as $facility)
                    <span class="px-3 py-1 rounded-lg bg-stone-100 text-stone-700 text-xs font-medium">
                        {{ $facility->name }}
                    </span>
                @endforeach
            </div>
        @endif

        {{-- Footer: Agent + 2 Tombol --}}
        <div class="mt-5 pt-4 border-t border-stone-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            @if($agent)
                {{-- Agent Info --}}
                <div class="flex items-center gap-3 min-w-0">
                    <img src="{{ $agent->photo ? asset($agent->photo) : asset('images/agents/agent.png') }}"
                         alt="{{ $agent->name }}"
                         class="w-11 h-11 rounded-full object-cover ring-2 ring-white shadow-sm shrink-0">
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-stone-900 truncate">{{ $agent->name }}</p>
                        <p class="text-xs text-stone-500 truncate flex items-center gap-1">
                            <i data-lucide="clock" class="w-3 h-3"></i>
                            {{ $property->published_at?->diffForHumans() ?? 'Baru' }}
                        </p>
                    </div>
                </div>

                {{-- 2 Tombol --}}
                <div class="flex items-center gap-2 shrink-0">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $agent->whatsapp) }}"
                       target="_blank" rel="noopener"
                       class="h-11 px-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-semibold flex items-center gap-2 transition shadow-sm">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                        WA
                    </a>
                    <a href="#"
                       class="h-11 px-5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold flex items-center gap-2 transition shadow-sm">
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        Lihat Detail
                    </a>
                </div>
            @else
                {{-- Fallback: Langsung dari PT --}}
                <div class="flex items-center justify-between w-full">
                    <p class="text-sm text-stone-500 italic">Properti dikelola langsung oleh PT</p>
                    <a href="{{ route('static.contact') }}"
                       class="h-11 px-5 rounded-xl bg-stone-900 hover:bg-stone-800 text-white text-sm font-semibold flex items-center gap-2 transition">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                        Hubungi Kami
                    </a>
                </div>
            @endif

        </div>

    </div>
</article>
