@extends('components.layout.app')

@section('title', 'Pusat Bantuan — ' . config('company.name'))

@section('content')

@php
    // Kategori bantuan
    $categories = [
        [
            'title' => 'Panduan Pembeli',
            'desc' => 'Cara mencari, memilih, dan membeli properti yang tepat.',
            'icon' => 'tag',
            'count' => 8,
            'url' => route('static.guide'),
            'color' => 'blue',
        ],
        [
            'title' => 'Panduan Penjual',
            'desc' => 'Tips memasarkan properti hingga proses transaksi selesai.',
            'icon' => 'house-plus',
            'count' => 6,
            'url' => route('static.guide'),
            'color' => 'emerald',
        ],
        [
            'title' => 'Simulasi & Pengajuan KPR',
            'desc' => 'Cara menghitung cicilan dan mengajukan KPR ke bank.',
            'icon' => 'calculator',
            'count' => 12,
            'url' => route('kpr.index'),
            'color' => 'purple',
        ],
        [
            'title' => 'Legalitas Properti',
            'desc' => 'Memahami sertifikat, PPJB, AJB, dan dokumen penting lainnya.',
            'icon' => 'shield-check',
            'count' => 10,
            'url' => route('static.faq'),
            'color' => 'amber',
        ],
        [
            'title' => 'Sewa Properti',
            'desc' => 'Sistem sewa, deposit, dan perpanjangan kontrak.',
            'icon' => 'key',
            'count' => 5,
            'url' => route('static.guide'),
            'color' => 'orange',
        ],
        [
            'title' => 'Akun & Website',
            'desc' => 'Login, daftar, favorit, dan pengaturan akun Anda.',
            'icon' => 'user-round',
            'count' => 7,
            'url' => route('static.faq'),
            'color' => 'indigo',
        ],
    ];

    // Artikel populer
    $popularArticles = [
        [
            'title' => 'Cara Menghitung Cicilan KPR dengan Benar',
            'desc' => 'Panduan lengkap rumus anuitas dan tips agar cicilan tidak membebani.',
            'icon' => 'calculator',
            'tag' => 'KPR',
            'url' => route('kpr.index'),
        ],
        [
            'title' => 'Perbedaan SHM, HGB, dan Girik',
            'desc' => 'Pahami jenis sertifikat tanah sebelum membeli properti.',
            'icon' => 'file-text',
            'tag' => 'Legalitas',
            'url' => route('static.faq'),
        ],
        [
            'title' => '5 Kesalahan Umum Saat Membeli Rumah Pertama',
            'desc' => 'Hindari jebakan yang sering dialami pembeli pemula.',
            'icon' => 'alert-triangle',
            'tag' => 'Pembeli',
            'url' => route('static.guide'),
        ],
        [
            'title' => 'Tips Memilih Lokasi Properti yang Strategis',
            'desc' => 'Faktor yang wajib dipertimbangkan sebelum memilih lokasi.',
            'icon' => 'map-pin',
            'tag' => 'Tips',
            'url' => route('static.guide'),
        ],
    ];
@endphp

<div class="bg-stone-50 min-h-screen">

    {{-- HERO --}}
    <section class="bg-[#09251C] py-20 md:py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur border border-white/20 mb-6">
                <i data-lucide="life-buoy" class="w-4 h-4 text-orange-400"></i>
                <span class="text-xs font-bold text-white uppercase tracking-wider">Pusat Bantuan</span>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
                Ada yang Bisa Kami <span class="text-orange-500">Bantu</span>?
            </h1>
            <p class="text-stone-300 text-base md:text-lg max-w-2xl mx-auto mb-8">
                Jelajahi panduan, tips, dan jawaban atas pertanyaan seputar properti.
            </p>

            {{-- SEARCH --}}
            <div class="relative max-w-2xl mx-auto">
                <i data-lucide="search" class="w-5 h-5 absolute left-5 top-1/2 -translate-y-1/2 text-stone-400"></i>
                <input type="text"
                       placeholder="Cari topik bantuan, panduan, atau pertanyaan..."
                       class="w-full h-16 pl-14 pr-4 rounded-2xl bg-white border-2 border-transparent focus:border-orange-400 outline-none text-stone-900 placeholder-stone-400 shadow-2xl transition">
                <button class="absolute right-2 top-1/2 -translate-y-1/2 h-12 px-6 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm transition">
                    Cari
                </button>
            </div>

            {{-- Quick Links --}}
            <div class="flex flex-wrap justify-center gap-2 mt-6">
                <span class="text-xs text-stone-400 mr-2">Populer:</span>
                @foreach(['Cara beli rumah', 'Simulasi KPR', 'Sertifikat SHM', 'Biaya notaris'] as $tag)
                    <a href="{{ route('static.faq') }}"
                       class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-xs font-medium text-white transition border border-white/10">
                        {{ $tag }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- KATEGORI BANTUAN --}}
    <section class="py-16 max-w-6xl mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-stone-900 mb-2">Jelajahi Kategori</h2>
            <p class="text-stone-500">Pilih topik yang ingin Anda pelajari.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($categories as $cat)
                <a href="{{ $cat['url'] }}"
                   class="group bg-white rounded-2xl p-6 border border-stone-200 shadow-sm hover:shadow-xl hover:border-orange-300 hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                            <i data-lucide="{{ $cat['icon'] }}" class="w-7 h-7"></i>
                        </div>
                        <span class="text-xs font-bold text-stone-400">{{ $cat['count'] }} artikel</span>
                    </div>
                    <h3 class="text-lg font-bold text-stone-900 mb-2 group-hover:text-orange-600 transition">{{ $cat['title'] }}</h3>
                    <p class="text-sm text-stone-500 leading-relaxed mb-4">{{ $cat['desc'] }}</p>
                    <span class="inline-flex items-center gap-1 text-xs font-bold text-orange-600 group-hover:gap-2 transition-all">
                        Lihat Artikel <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </span>
                </a>
            @endforeach
        </div>
    </section>

    {{-- ARTIKEL POPULER --}}
    <section class="pb-16 max-w-6xl mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-stone-900 mb-1">Artikel Populer</h2>
                <p class="text-stone-500 text-sm">Paling banyak dibaca pengunjung.</p>
            </div>
            <a href="{{ route('static.guide') }}"
               class="hidden sm:inline-flex items-center gap-1.5 text-sm font-bold text-orange-600 hover:text-orange-700 transition">
                Lihat Semua <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($popularArticles as $article)
                <a href="{{ $article['url'] }}"
                   class="group flex gap-4 bg-white p-5 rounded-2xl border border-stone-200 hover:shadow-lg hover:border-orange-200 transition-all duration-300">
                    <div class="shrink-0 w-14 h-14 rounded-xl bg-stone-100 text-stone-600 flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition-colors">
                        <i data-lucide="{{ $article['icon'] }}" class="w-6 h-6"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="inline-block px-2 py-0.5 rounded bg-orange-50 text-orange-600 text-[10px] font-bold uppercase tracking-wider mb-1.5">
                            {{ $article['tag'] }}
                        </span>
                        <h3 class="text-sm font-bold text-stone-900 leading-snug group-hover:text-orange-600 transition line-clamp-2">
                            {{ $article['title'] }}
                        </h3>
                        <p class="text-xs text-stone-500 mt-1 line-clamp-1">{{ $article['desc'] }}</p>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-stone-400 shrink-0 self-center group-hover:translate-x-1 group-hover:text-orange-500 transition"></i>
                </a>
            @endforeach
        </div>
    </section>

    {{-- CTA SECTION --}}
    <section class="pb-20 max-w-5xl mx-auto px-4">
        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-8 md:p-12 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-black/10 rounded-full blur-2xl"></div>

            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-3 leading-tight">
                        Tidak menemukan jawaban yang dicari?
                    </h2>
                    <p class="text-orange-50 mb-6 text-sm md:text-base">
                        Tim customer support kami siap membantu Anda. Hubungi kami via WhatsApp untuk respon tercepat.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('static.contact') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-white text-orange-600 font-bold rounded-xl hover:bg-orange-50 transition shadow-lg">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                            Hubungi Kami
                        </a>
                        <a href="{{ route('static.faq') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-white/10 backdrop-blur border border-white/30 text-white font-bold rounded-xl hover:bg-white/20 transition">
                            <i data-lucide="circle-help" class="w-5 h-5"></i>
                            Lihat FAQ
                        </a>
                    </div>
                </div>

                <div class="hidden md:flex justify-center">
                    <div class="w-32 h-32 rounded-full bg-white/20 backdrop-blur flex items-center justify-center">
                        <i data-lucide="headset" class="w-16 h-16 text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
