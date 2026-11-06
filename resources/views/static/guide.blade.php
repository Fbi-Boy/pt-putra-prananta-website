@extends('components.layout.app')

@section('title', 'Panduan Properti — ' . config('company.name'))

@section('content')

@php
    // Warna sampul buku 3D diambil dari kelas Tailwind kategori (mis. text-blue-600 → biru).
    $bookPalette = [
        'orange' => '#ea580c', 'amber' => '#d97706', 'yellow' => '#ca8a04', 'lime' => '#65a30d',
        'green' => '#16a34a', 'emerald' => '#059669', 'teal' => '#0d9488', 'cyan' => '#0891b2',
        'sky' => '#0284c7', 'blue' => '#2563eb', 'indigo' => '#4f46e5', 'violet' => '#7c3aed',
        'purple' => '#9333ea', 'pink' => '#db2777', 'rose' => '#e11d48', 'red' => '#dc2626',
        'stone' => '#57534e', 'slate' => '#475569',
    ];
    $bookFallback = array_values($bookPalette);
    // "All" dibuat otomatis di bawah, jadi buang jika sudah ada di data.
    $cats = collect($categories)->reject(fn ($c) => ($c['id'] ?? null) === 'all')->values();
@endphp

{{-- Fungsi Alpine (global) — dijalankan sebelum Alpine start --}}
<script>
    function guidePage(guides) {
        return {
            guides: guides,
            activeCategory: 'all',
            expanded: false,
            canPrev: false,
            canNext: false,
            get filtered() {
                return this.activeCategory === 'all'
                    ? this.guides
                    : this.guides.filter(g => g.category === this.activeCategory);
            },
            select(id) {
                this.activeCategory = id;
                this.$nextTick(() => {
                    const t = this.$refs.track;
                    if (t) t.scrollTo({ left: 0 });
                    this.update();
                });
            },
            update() {
                const t = this.$refs.track;
                if (!t) return;
                this.canPrev = t.scrollLeft > 8;
                this.canNext = t.scrollLeft + t.clientWidth < t.scrollWidth - 8;
            },
            slide(dir) {
                const t = this.$refs.track;
                t.scrollBy({ left: dir * t.clientWidth * 0.8, behavior: 'smooth' });
            },
            toggle() {
                this.expanded = !this.expanded;
                this.$nextTick(() => this.update());
            },
            init() {
                window.addEventListener('resize', () => this.update());
            }
        };
    }
</script>

<div x-data="guidePage({{ Js::from($popularGuides) }})" class="guide-page min-h-screen py-8 lg:py-12">
    <div class="max-w-6xl mx-auto px-4 lg:px-6">

        {{-- Header --}}
        <div class="text-center max-w-2xl mx-auto mb-8 lg:mb-10">
            <h1 class="font-guide text-3xl md:text-4xl font-semibold text-stone-900 mb-3">Pusat Panduan Properti</h1>
            <p class="text-stone-600">Dapatkan informasi, tips, dan panduan lengkap seputar jual-beli, sewa, dan KPR properti.</p>
        </div>

        {{-- ========================================================= --}}
        {{-- BAGIAN ATAS: KLASIFIKASI PANDUAN (deretan buku 3D)        --}}
        {{-- ========================================================= --}}
        <div class="relative -mx-4 lg:mx-0 mb-10 lg:mb-12">
            <div class="absolute inset-y-0 left-0 w-6 bg-gradient-to-r from-[#fcf8f5] to-transparent z-10 pointer-events-none lg:hidden"></div>
            <div class="absolute inset-y-0 right-0 w-6 bg-gradient-to-l from-[#fcf8f5] to-transparent z-10 pointer-events-none lg:hidden"></div>

            <div class="flex gap-3 sm:gap-4 lg:justify-between overflow-x-auto scrollbar-hide snap-x snap-proximity px-4 lg:px-0 pt-3 pb-3" role="tablist" aria-label="Kategori panduan">

                {{-- ALL (tumpukan buku) --}}
                <button type="button" role="tab" @click="select('all')"
                        :aria-selected="activeCategory === 'all'"
                        class="cat-item group snap-start shrink-0 w-[78px] flex flex-col items-center focus:outline-none">
                    <span class="cat-book" :class="activeCategory === 'all' ? '-translate-y-1.5' : ''">
                        <svg viewBox="0 0 72 84" class="w-full h-full" aria-hidden="true" focusable="false">
                            <ellipse cx="36" cy="78" rx="26" ry="4" fill="#78350f" opacity=".14"/>
                            {{-- buku bawah --}}
                            <rect x="9" y="56" width="54" height="16" rx="4" fill="#0f766e"/>
                            <rect x="9" y="56" width="10" height="16" rx="4" fill="#000" opacity=".15"/>
                            <rect x="22" y="62" width="34" height="3" rx="1.5" fill="#fff" opacity=".55"/>
                            {{-- buku tengah --}}
                            <rect x="14" y="40" width="50" height="16" rx="4" fill="#16a34a"/>
                            <rect x="14" y="40" width="10" height="16" rx="4" fill="#000" opacity=".15"/>
                            <rect x="27" y="46" width="30" height="3" rx="1.5" fill="#fff" opacity=".55"/>
                            {{-- buku atas --}}
                            <rect x="8" y="24" width="52" height="16" rx="4" fill="#dc2626"/>
                            <rect x="8" y="24" width="10" height="16" rx="4" fill="#000" opacity=".15"/>
                            <rect x="21" y="30" width="32" height="3" rx="1.5" fill="#fff" opacity=".55"/>
                            {{-- pita --}}
                            <path d="M50 24v-9l5 4 5-4v9z" fill="#f6b84c"/>
                        </svg>
                    </span>
                    <span class="cat-label" :class="activeCategory === 'all' ? 'text-stone-900 font-bold' : 'text-stone-500'">Semua</span>
                    <span class="cat-dot" :class="activeCategory === 'all' ? 'opacity-100 scale-100' : 'opacity-0 scale-50'"></span>
                </button>

                @foreach ($cats as $cat)
                    @php
                        preg_match('/(?:text|bg)-([a-z]+)-\d{2,3}/', ($cat['color'] ?? '') . ' ' . ($cat['bg'] ?? ''), $m);
                        $hex = $bookPalette[$m[1] ?? ''] ?? $bookFallback[$loop->index % count($bookFallback)];
                    @endphp
                    <button type="button" role="tab" @click="select('{{ $cat['id'] }}')"
                            :aria-selected="activeCategory === '{{ $cat['id'] }}'"
                            class="cat-item group snap-start shrink-0 w-[78px] flex flex-col items-center focus:outline-none">
                        <span class="cat-book" :class="activeCategory === '{{ $cat['id'] }}' ? '-translate-y-1.5' : ''">
                            <svg viewBox="0 0 72 84" class="w-full h-full" style="--c: {{ $hex }}" aria-hidden="true" focusable="false">
                                <ellipse cx="36" cy="78" rx="24" ry="4" fill="#78350f" opacity=".14"/>
                                {{-- sampul --}}
                                <rect x="10" y="6" width="52" height="62" rx="7" style="fill:var(--c)"/>
                                {{-- punggung buku --}}
                                <path d="M17 6h5v62h-5a7 7 0 0 1-7-7V13a7 7 0 0 1 7-7z" fill="#000" opacity=".16"/>
                                {{-- kilau --}}
                                <path d="M22 6h33a7 7 0 0 1 7 7v4c-12-3-26-5-40-4z" fill="#fff" opacity=".14"/>
                                {{-- tepi bawah + halaman --}}
                                <path d="M10 56h52v5a7 7 0 0 1-7 7H17a7 7 0 0 1-7-7z" fill="#000" opacity=".2"/>
                                <rect x="16" y="60" width="42" height="4" rx="2" fill="#fdf6e3"/>
                                {{-- pita --}}
                                <path d="M43 56v20l6-5 6 5V56z" fill="#f6b84c"/>
                                <path d="M43 56h12v3H43z" fill="#000" opacity=".12"/>
                            </svg>
                            {{-- Emblem di sampul --}}
                            <span class="absolute left-[18%] right-[8%] top-[11%] h-[44%] flex items-center justify-center">
                                <i data-lucide="{{ $cat['icon'] }}" class="w-6 h-6 text-white/95 drop-shadow"></i>
                            </span>
                        </span>
                        <span class="cat-label" :class="activeCategory === '{{ $cat['id'] }}' ? 'text-stone-900 font-bold' : 'text-stone-500'">{{ $cat['name'] }}</span>
                        <span class="cat-dot" :class="activeCategory === '{{ $cat['id'] }}' ? 'opacity-100 scale-100' : 'opacity-0 scale-50'"></span>
                    </button>
                @endforeach
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- BAGIAN BAWAH: PANDUAN POPULER (poster / pamflet)          --}}
        {{-- ========================================================= --}}
        <div class="mb-6 flex items-center justify-between gap-3">
            <div class="min-w-0">
                <h2 class="font-guide text-xl md:text-2xl font-semibold text-stone-800">Panduan Populer</h2>
                <p class="text-xs sm:text-sm text-stone-500 mt-0.5">Artikel paling banyak dibaca oleh pengguna.</p>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <button type="button" @click="toggle()"
                        class="font-guide px-4 sm:px-5 h-10 rounded-full bg-[#efe7e2] text-sm font-medium text-stone-700 hover:bg-[#e6dcd5] active:scale-95 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-400 transition"
                        x-text="expanded ? 'Ringkas' : 'Lihat Semua'"></button>

                <div class="hidden sm:flex items-center gap-2" x-show="!expanded">
                    <button type="button" @click="slide(-1)" :disabled="!canPrev" aria-label="Sebelumnya"
                            class="w-10 h-10 rounded-full bg-[#efe7e2] flex items-center justify-center text-stone-600 hover:bg-[#e6dcd5] disabled:opacity-40 disabled:pointer-events-none active:scale-95 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-400 transition">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>
                    <button type="button" @click="slide(1)" :disabled="!canNext" aria-label="Berikutnya"
                            class="w-10 h-10 rounded-full bg-[#efe7e2] flex items-center justify-center text-stone-600 hover:bg-[#e6dcd5] disabled:opacity-40 disabled:pointer-events-none active:scale-95 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-400 transition">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Jalur poster --}}
        <div class="relative -mx-4 lg:mx-0">
            <div x-ref="track"
                 @scroll.passive="update()"
                 x-effect="filtered; expanded; $nextTick(() => update())"
                 class="flex gap-4 sm:gap-5 px-4 lg:px-0 pt-4 pb-6 scrollbar-hide"
                 :class="expanded ? 'flex-wrap justify-center sm:justify-start' : 'overflow-x-auto snap-x snap-mandatory scroll-px-4 flex-nowrap'">

                <template x-for="(guide, i) in filtered" :key="guide.title">
                    <article class="snap-start shrink-0 w-[152px] sm:w-[180px] lg:w-[200px]">
                        <a :href="guide.url ?? '#'" class="poster group block focus:outline-none">

                            {{-- Poster --}}
                            <div class="relative">
                                {{-- Selotip --}}
                                <span class="absolute -top-2 left-1/2 z-20 h-5 w-14 -translate-x-1/2 -rotate-3 rounded-[3px] bg-amber-100/80 shadow-sm backdrop-blur-sm ring-1 ring-amber-200/60"></span>

                                <div class="poster-frame relative aspect-[3/4] overflow-hidden rounded-xl bg-gradient-to-br from-orange-200 via-amber-100 to-stone-200 transition duration-300 ease-out group-hover:-translate-y-1.5 group-hover:rotate-0 group-focus-visible:ring-2 group-focus-visible:ring-orange-500 motion-reduce:transition-none"
                                     :class="i % 2 === 0 ? '-rotate-[1.2deg]' : 'rotate-[1.2deg]'">

                                    <img :src="guide.image" :alt="guide.title" loading="lazy"
                                         x-on:error="$el.classList.add('hidden')"
                                         class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105 motion-reduce:transition-none">

                                    {{-- Gradasi bawah supaya teks terbaca --}}
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>
                                    {{-- Kilau kertas --}}
                                    <div class="absolute inset-0 bg-gradient-to-br from-white/25 via-transparent to-transparent pointer-events-none"></div>

                                    {{-- Tag --}}
                                    <span class="absolute top-3 left-3 rounded-md bg-white/90 px-2 py-1 text-[10px] font-bold text-stone-800 shadow-sm backdrop-blur" x-text="guide.tag"></span>

                                    {{-- Ringkasan (muncul saat hover/fokus di desktop) --}}
                                    <p class="absolute inset-x-0 bottom-0 p-3 text-[11px] leading-snug text-white/95 line-clamp-4 translate-y-3 opacity-0 transition duration-300 group-hover:translate-y-0 group-hover:opacity-100 group-focus-visible:translate-y-0 group-focus-visible:opacity-100 hidden lg:block"
                                       x-text="guide.excerpt"></p>
                                </div>
                            </div>

                            {{-- Judul & info (di bawah poster, seperti daftar buku) --}}
                            <div class="mt-3 px-0.5">
                                <h3 class="font-guide text-[15px] font-semibold leading-tight text-stone-800 line-clamp-2 transition group-hover:text-orange-600" x-text="guide.title"></h3>
                                <p class="mt-1 flex items-center gap-1 text-xs font-medium text-rose-500">
                                    <svg viewBox="0 0 24 24" class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                                    <span x-text="guide.read_time"></span>
                                </p>
                            </div>
                        </a>
                    </article>
                </template>

                {{-- Kosong --}}
                <div x-show="filtered.length === 0" x-cloak class="w-full py-14 text-center">
                    <p class="font-guide text-lg font-semibold text-stone-700">Belum ada panduan di kategori ini</p>
                    <button type="button" @click="select('all')" class="mt-2 text-sm font-semibold text-orange-600 hover:underline">Lihat semua panduan</button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    .guide-page { background-color: #fcf8f5; }
    .font-guide { font-family: 'Fredoka', ui-rounded, 'Nunito', system-ui, sans-serif; }

    /* Sembunyikan scrollbar bawaan browser */
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

    /* Item kategori (buku 3D) */
    .cat-book {
        position: relative; display: block; width: 66px; height: 77px;
        transition: transform .25s cubic-bezier(.2,.8,.2,1);
        filter: drop-shadow(0 6px 6px rgba(120, 53, 15, .12));
    }
    .cat-item:hover .cat-book { transform: translateY(-6px) rotate(-2deg); }
    .cat-item:focus-visible .cat-book { outline: 2px solid #f97316; outline-offset: 4px; border-radius: 10px; }
    .cat-label {
        margin-top: .35rem; font-family: 'Fredoka', ui-rounded, system-ui, sans-serif;
        font-size: 11.5px; line-height: 1.15; text-align: center; transition: color .2s;
    }
    .cat-dot {
        margin-top: .3rem; width: 5px; height: 5px; border-radius: 9999px; background: #f97316;
        transition: opacity .2s, transform .2s;
    }

    /* Bayangan poster */
    .poster-frame { box-shadow: 0 14px 22px -10px rgba(41, 37, 36, .45), 0 2px 4px rgba(41, 37, 36, .12); }
    .poster:hover .poster-frame { box-shadow: 0 22px 30px -12px rgba(41, 37, 36, .5), 0 2px 4px rgba(41, 37, 36, .12); }

    @media (prefers-reduced-motion: reduce) {
        .cat-book, .cat-item:hover .cat-book { transition: none; transform: none; }
    }
    [x-cloak] { display: none !important; }
</style>
@endpush
