@extends('components.layout.app')

@section('title', 'Company Profile — ' . config('company.name'))

@section('content')

{{-- ========================================== --}}
{{-- 1. HERO SECTION (Split layout + badge putar) — TIDAK DIUBAH --}}
{{-- ========================================== --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

<svg width="0" height="0" class="absolute" aria-hidden="true" focusable="false">
    <defs>
        <clipPath id="hero-notch" clipPathUnits="objectBoundingBox">
            <path d="M0.05,0 H0.95 Q1,0 1,0.067 V0.933 Q1,1 0.95,1 H0.19 Q0.14,1 0.14,0.933
                     V0.72 C0.14,0.64 0,0.68 0,0.58 V0.067 Q0,0 0.05,0 Z"/>
        </clipPath>
    </defs>
</svg>

<section class="bg-white pt-8 pb-12 md:pt-12 md:pb-16 [font-family:Outfit,ui-sans-serif,system-ui,sans-serif]">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 lg:grid-rows-[auto_1fr] gap-x-10 gap-y-8">

            {{-- A. Judul + deskripsi + tombol --}}
            <div class="lg:col-span-5 lg:col-start-1 lg:row-start-1">
                <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-medium text-stone-900 leading-[1.15] tracking-[0.14em]">
                    Company<br>Profile
                </h1>
                <p class="mt-5 max-w-sm text-[13px] leading-relaxed text-stone-500">
                    Platform jual-beli, sewa, dan KPR properti yang menghadirkan data akurat, pendampingan yang jujur, dan teknologi untuk setiap langkah Anda.
                </p>
                <a href="#layanan"
                   class="group mt-6 inline-flex items-center gap-3 rounded-full bg-stone-800 pl-5 pr-1.5 py-1.5 text-sm font-medium text-white
                          hover:bg-stone-900 transition focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300">
                    Lihat Layanan
                    <span class="w-8 h-8 rounded-full border border-white/40 flex items-center justify-center group-hover:bg-orange-500 group-hover:border-orange-500 transition">
                        <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                    </span>
                </a>
            </div>

            {{-- C. Gambar utama (notch) + indikator --}}
            <div class="lg:col-span-7 lg:col-start-6 lg:row-span-2 lg:row-start-1">
                <div class="relative aspect-[4/3] [clip-path:url(#hero-notch)] bg-stone-200">
                    <img src="{{ asset('images/company_profile.jpg') }}" alt="Putra Property"
                        class="absolute inset-0 w-full h-full object-cover">
                </div>

                {{-- Indikator slide (statis) --}}
                <div class="mt-5 flex justify-center lg:justify-end lg:pr-[22%] gap-1.5" aria-hidden="true">
                    <span class="h-1 w-16 rounded-full bg-orange-500"></span>
                    <span class="h-1 w-9 rounded-full bg-stone-200"></span>
                    <span class="h-1 w-9 rounded-full bg-stone-200"></span>
                </div>
            </div>

            {{-- B. Kartu kecil (CEO) + badge putar --}}
            <div class="lg:col-span-5 lg:col-start-1 lg:row-start-2 self-end flex items-end justify-between gap-4">
                <div class="max-w-[190px]">
                    <div class="relative w-full aspect-[4/3] rounded-2xl overflow-hidden bg-stone-200 mb-4">
                        {{-- [ISI NANTI] Foto CEO:
                        <img src="{{ asset('images/agents/agent.png') }}" alt="Muhammad Giovarel"
                             class="absolute inset-0 w-full h-full object-cover">
                        --}}
                        <div class="absolute inset-0 flex items-center justify-center text-stone-400">
                            <i data-lucide="user-round" class="w-8 h-8"></i>
                        </div>
                    </div>
                    <p class="text-sm font-semibold text-stone-900 leading-tight">Muhammad Giovarel</p>
                    <p class="mt-1 text-[11px] leading-snug text-stone-500">CEO Putra Prananta Property. Memimpin dengan visi &amp; inovasi.</p>
                </div>

                {{-- Badge teks melingkar yang berputar --}}
                <a href="#kontak" aria-label="Hubungi kami"
                   class="relative shrink-0 w-28 h-28 sm:w-32 sm:h-32 mb-1 block">
                    <svg viewBox="0 0 120 120"
                         class="absolute inset-0 w-full h-full animate-[spin_20s_linear_infinite] motion-reduce:animate-none">
                        <defs>
                            <path id="hero-circle" d="M60,60 m-47,0 a47,47 0 1,1 94,0 a47,47 0 1,1 -94,0"/>
                        </defs>
                        <text font-size="9.5" font-weight="500" letter-spacing="1" fill="#44403c">
                            <textPath href="#hero-circle" textLength="290" lengthAdjust="spacing">COMPANY PROFILE • PUTRA PROPERTY • </textPath>
                        </text>
                    </svg>
                    <span class="absolute inset-0 m-auto w-[58%] h-[58%] rounded-full bg-stone-950 text-white flex flex-col items-center justify-center gap-0.5
                                 hover:bg-orange-500 transition">
                        <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                        <span class="text-[11px] font-medium leading-none">Hubungi</span>
                    </span>
                </a>
            </div>

        </div>
    </div>
</section>

{{-- ========================================== --}}
{{-- 2. VISI & MISI (tinggi kedua kolom sama)   --}}
{{-- ========================================== --}}
<section id="tentang" class="py-12 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 items-stretch">

            {{-- KIRI: kotak orange berisi mockup, tingginya mengikuti kolom kanan --}}
            <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-orange-400 to-orange-600 p-6 sm:p-8 shadow-xl shadow-orange-500/20 flex items-center justify-center min-h-[380px]">
                <div class="absolute -top-16 -left-12 w-56 h-56 rounded-full bg-white/10" aria-hidden="true"></div>
                <div class="absolute -bottom-20 -right-10 w-64 h-64 rounded-full border-[18px] border-white/10" aria-hidden="true"></div>

                <div class="relative w-full max-w-sm">
                    {{-- Frame: HP di mobile, jendela browser di sm ke atas --}}
                    <div class="relative bg-white overflow-hidden shadow-2xl rounded-[1.75rem] border-[7px] border-stone-900 sm:border-0 sm:rounded-xl">
                        <div class="sm:hidden absolute top-0 left-1/2 -translate-x-1/2 w-16 h-3.5 bg-stone-900 rounded-b-xl z-20"></div>

                        <div class="hidden sm:flex items-center gap-1.5 px-3 py-1.5 bg-stone-100 border-b border-stone-200">
                            <span class="w-2 h-2 rounded-full bg-red-400"></span>
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span class="w-2 h-2 rounded-full bg-green-400"></span>
                            <span class="ml-3 flex-1 h-4 rounded-full bg-white border border-stone-200 text-[8px] leading-4 text-stone-400 px-3">putraproperty.id</span>
                        </div>

                        <div class="flex items-center justify-between px-3 pt-5 pb-2 sm:pt-2 border-b border-stone-100">
                            <div class="flex items-center gap-1.5">
                                <span class="w-5 h-5 rounded-md bg-amber-400 text-stone-900 text-[10px] font-extrabold flex items-center justify-center">P</span>
                                <div class="leading-none">
                                    <p class="text-[10px] font-extrabold text-stone-900">Putra</p>
                                    <p class="text-[5px] tracking-widest text-stone-400">PRANANTA PROPERTY</p>
                                </div>
                            </div>
                            <div class="hidden sm:flex items-center gap-2.5 text-[8px] font-semibold text-stone-700">
                                <span>Beli</span><span>Sewa</span><span>Jual</span><span>KPR</span><span>Cari Agen</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="px-2 py-1 rounded-md bg-amber-400 text-[8px] font-bold text-stone-900">Masuk</span>
                                <i data-lucide="menu" class="sm:hidden w-4 h-4 text-stone-700"></i>
                            </div>
                        </div>

                        <div class="relative h-32 sm:h-28 bg-gradient-to-r from-orange-100 to-orange-200 overflow-hidden">
                            <img src="{{ asset('images/banner-property.png') }}" alt="Putra Property"
                                 class="absolute inset-0 w-full h-full object-cover object-right">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-50/80 via-transparent to-transparent"></div>
                        </div>

                        <div class="relative z-10 -mt-10 mx-3 sm:mx-auto sm:w-4/5 bg-white rounded-xl shadow-xl border border-stone-100 p-2.5 text-center">
                            <p class="text-[10px] font-extrabold text-stone-900">Temukan Properti Impian Anda</p>
                            <div class="flex justify-center gap-3 text-[8px] my-1.5">
                                <span class="font-bold text-stone-900">Beli</span>
                                <span class="text-stone-400">Sewa</span>
                                <span class="text-stone-400">KPR</span>
                            </div>
                            <div class="flex gap-1.5">
                                <div class="flex-1 h-5 rounded-md border border-stone-200 flex items-center gap-1 px-1.5">
                                    <i data-lucide="search" class="w-2.5 h-2.5 text-stone-400"></i>
                                    <span class="h-1 w-1/2 bg-stone-200 rounded-full"></span>
                                </div>
                                <span class="px-2.5 h-5 rounded-md bg-amber-400 text-[8px] font-bold text-stone-900 flex items-center">Cari</span>
                            </div>
                            <div class="flex justify-center gap-1 mt-1.5">
                                <span class="h-3.5 w-12 rounded-full border border-stone-200"></span>
                                <span class="h-3.5 w-9 rounded-full border border-stone-200"></span>
                                <span class="h-3.5 w-9 rounded-full border border-stone-200"></span>
                            </div>
                        </div>

                        <div class="grid grid-cols-4 gap-1.5 px-3 pt-2.5 pb-3">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="h-6 rounded-lg border border-orange-100 bg-orange-50"></div>
                            @endfor
                        </div>
                    </div>

                    {{-- Kartu mengambang --}}
                    <div class="absolute -bottom-5 -right-2 sm:-right-5 bg-white p-2.5 rounded-xl shadow-xl w-24 sm:w-28 z-20">
                        <div class="flex justify-between items-center mb-1">
                            <span class="h-1.5 w-7 bg-stone-200 rounded-full"></span>
                            <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                        </div>
                        <p class="text-base font-bold text-stone-900 mb-1">94.8%</p>
                        <div class="flex items-end gap-1 h-5">
                            <div class="w-2 bg-orange-200 rounded-t-sm h-1.5"></div>
                            <div class="w-2 bg-orange-300 rounded-t-sm h-2.5"></div>
                            <div class="w-2 bg-orange-400 rounded-t-sm h-3"></div>
                            <div class="w-2 bg-orange-500 rounded-t-sm h-4"></div>
                            <div class="w-2 bg-orange-600 rounded-t-sm h-5"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KANAN: Visi & Misi, dua kartu membagi tinggi yang sama dengan kotak orange --}}
            <div class="flex flex-col gap-6 lg:gap-8">
                <div class="relative overflow-hidden rounded-[2rem] bg-stone-900 text-white p-7 sm:p-8 flex-1 flex flex-col justify-center">
                    <div class="absolute -top-16 -right-12 w-48 h-48 rounded-full bg-orange-500/25 blur-2xl" aria-hidden="true"></div>
                    <div class="relative">
                        <div class="w-11 h-11 rounded-2xl bg-orange-500 flex items-center justify-center mb-5">
                            <i data-lucide="eye" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-2xl font-semibold tracking-tight">Visi</h3>
                        <p class="mt-2 text-stone-300 text-sm leading-relaxed max-w-md">Menjadi platform properti nomor satu di Indonesia yang mengedepankan kepercayaan, inovasi teknologi, dan kemudahan bagi seluruh masyarakat.</p>
                    </div>
                </div>

                <div class="rounded-[2rem] bg-orange-50 ring-1 ring-orange-200 p-7 sm:p-8 flex-1 flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-11 h-11 rounded-2xl bg-orange-500 text-white flex items-center justify-center">
                            <i data-lucide="target" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-2xl font-semibold tracking-tight text-stone-900">Misi</h3>
                    </div>
                    <ul class="space-y-3 text-stone-700 text-sm leading-relaxed">
                        @foreach ([
                            'Menyediakan data properti yang akurat dan terpercaya.',
                            'Membantu agen dan developer memasarkan produk secara digital.',
                            'Memberikan pengalaman terbaik bagi pembeli dan penyewa.',
                        ] as $misi)
                            <li class="flex gap-3">
                                <i data-lucide="check-circle-2" class="w-4 h-4 mt-0.5 text-orange-500 shrink-0"></i>{{ $misi }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================== --}}
{{-- 3. ANGKA PENCAPAIAN                        --}}
{{-- Ganti angka dengan data asli perusahaan.   --}}
{{-- ========================================== --}}
@php
    $stats = [
        ['n' => '2019',  'l' => 'Tahun berdiri'],
        ['n' => '1.200+', 'l' => 'Properti terdaftar'],
        ['n' => '350+',   'l' => 'Agen & developer mitra'],
        ['n' => '8.500+', 'l' => 'Pengguna aktif'],
    ];
@endphp
<section class="bg-orange-500">
    <div class="max-w-6xl mx-auto px-4 py-10 md:py-12 grid grid-cols-2 lg:grid-cols-4 gap-y-8 gap-x-6">
        @foreach ($stats as $s)
            <div class="text-white lg:border-l lg:border-white/30 lg:pl-6 first:border-0 first:pl-0">
                <p class="text-3xl md:text-4xl font-semibold tracking-tight">{{ $s['n'] }}</p>
                <p class="mt-1 text-sm text-orange-50">{{ $s['l'] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- ========================================== --}}
{{-- 4. KEUNGGULAN (anchor tombol "Lihat Layanan") --}}
{{-- ========================================== --}}
<section id="layanan" class="py-14 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-10">
        <div class="lg:col-span-4">
            <div class="lg:sticky lg:top-24">
                <h2 class="text-2xl md:text-3xl font-semibold text-stone-900 tracking-tight">Kenapa memilih Putra Property</h2>
                <div class="w-10 h-1 bg-orange-500 rounded-full mt-3 mb-4"></div>
                <p class="text-sm text-stone-600 leading-relaxed max-w-sm">Kami mengurus jual-beli, sewa, dan KPR dalam satu tempat, supaya Anda tidak perlu pindah-pindah layanan.</p>
            </div>
        </div>

        <div class="lg:col-span-8 divide-y divide-stone-200 border-y border-stone-200">
            @foreach ([
                ['shield-check', 'Data properti terverifikasi', 'Setiap listing dicek legalitas dan kondisinya sebelum tayang, jadi informasi yang Anda lihat bisa dipegang.'],
                ['badge-percent', 'Simulasi KPR di satu tempat', 'Hitung cicilan, bandingkan tenor, lalu ajukan KPR tanpa meninggalkan platform.'],
                ['users', 'Agen profesional', 'Agen kami melayani pembeli, penyewa, dan pemilik properti dengan penjelasan yang jujur dan jelas.'],
                ['smartphone', 'Mudah diakses dari mana saja', 'Cari, bandingkan, dan simpan properti favorit dari ponsel maupun komputer.'],
            ] as [$ic, $t, $d])
                <div class="flex gap-5 py-6">
                    <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
                        <i data-lucide="{{ $ic }}" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-stone-900">{{ $t }}</h3>
                        <p class="mt-1 text-sm text-stone-600 leading-relaxed max-w-xl">{{ $d }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================================== --}}
{{-- 5. PERJALANAN PERUSAHAAN (urutan waktu)    --}}
{{-- Ganti tahun & isi dengan sejarah asli.     --}}
{{-- ========================================== --}}
<section class="py-14 md:py-20 bg-stone-50">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-semibold text-stone-900 tracking-tight text-center">Perjalanan kami</h2>
        <div class="w-10 h-1 bg-orange-500 rounded-full mx-auto mt-3 mb-10"></div>

        <ol class="relative border-l-2 border-orange-200 ml-3 space-y-8">
            @foreach ([
                ['2019', 'Putra Property berdiri', 'Dimulai dari layanan perantara jual-beli rumah di wilayah Jawa Timur.'],
                ['2021', 'Layanan sewa dan KPR dibuka', 'Cakupan layanan melebar ke sewa properti dan pendampingan pengajuan KPR.'],
                ['2023', 'Platform digital diluncurkan', 'Listing, pencarian, dan simulasi KPR pindah ke satu website.'],
                ['2025', 'Kemitraan dengan developer', 'Developer dan agen mulai memasarkan proyek langsung lewat platform.'],
            ] as [$yr, $t, $d])
                <li class="pl-8 relative">
                    <span class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-orange-500 ring-4 ring-stone-50"></span>
                    <p class="text-sm font-semibold text-orange-600">{{ $yr }}</p>
                    <h3 class="text-lg font-semibold text-stone-900 mt-0.5">{{ $t }}</h3>
                    <p class="mt-1 text-sm text-stone-600 leading-relaxed max-w-lg">{{ $d }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- ========================================== --}}
{{-- 6. TIM MANAJEMEN                           --}}
{{-- Foto: ganti blok ikon dengan <img>.        --}}
{{-- ========================================== --}}
<section class="py-14 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-semibold text-stone-900 tracking-tight">Tim di balik layar</h2>
            <div class="w-10 h-1 bg-orange-500 rounded-full mx-auto mt-3"></div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            @foreach ([
                ['Muhammad Giovarel', 'CEO'],
                ['Nama Anggota', 'Chief Operating Officer'],
                ['Nama Anggota', 'Kepala Pemasaran'],
                ['Nama Anggota', 'Kepala Teknologi'],
            ] as [$nama, $jabatan])
                <div>
                    <div class="aspect-[4/5] rounded-3xl bg-orange-50 ring-1 ring-orange-100 flex items-center justify-center text-orange-300 overflow-hidden">
                        <i data-lucide="user-round" class="w-12 h-12"></i>
                    </div>
                    <p class="mt-3 text-sm font-semibold text-stone-900">{{ $nama }}</p>
                    <p class="text-xs text-stone-500">{{ $jabatan }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================================== --}}
{{-- 7. FAQ (tanpa JavaScript)                  --}}
{{-- ========================================== --}}
<section class="py-14 md:py-20 bg-stone-50 border-y border-stone-200">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-semibold text-stone-900 tracking-tight text-center">Pertanyaan yang sering diajukan</h2>
        <div class="w-10 h-1 bg-orange-500 rounded-full mx-auto mt-3 mb-8"></div>

        <div class="space-y-3">
            @foreach ([
                ['Apakah semua properti sudah diverifikasi?', 'Ya. Tim kami memeriksa legalitas dan kondisi properti sebelum listing ditayangkan.'],
                ['Bagaimana cara mengajukan KPR?', 'Gunakan simulasi KPR untuk menghitung cicilan, lalu ajukan lewat agen kami. Kami mendampingi sampai proses selesai.'],
                ['Apakah ada biaya untuk memasang iklan properti?', 'Isi dengan kebijakan biaya yang berlaku di Putra Property.'],
                ['Bagaimana cara bergabung sebagai agen atau developer?', 'Hubungi kami lewat tombol di bawah, tim kami akan menjelaskan syarat dan prosesnya.'],
            ] as [$q, $a])
                <details class="group rounded-2xl bg-white border border-stone-200 open:border-orange-300 open:shadow-sm transition">
                    <summary class="flex items-center justify-between gap-4 cursor-pointer list-none px-5 py-4 text-sm font-semibold text-stone-900 focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300 rounded-2xl">
                        {{ $q }}
                        <i data-lucide="plus" class="w-4 h-4 text-orange-500 shrink-0 transition-transform group-open:rotate-45"></i>
                    </summary>
                    <p class="px-5 pb-5 text-sm text-stone-600 leading-relaxed">{{ $a }}</p>
                </details>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================================== --}}
{{-- 8. CTA PENUTUP (anchor badge "Hubungi")    --}}
{{-- ========================================== --}}
<section id="kontak" class="py-14 md:py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4">
        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-orange-500 to-orange-600 text-white px-6 py-12 md:px-14 md:py-14 text-center shadow-xl shadow-orange-500/20">
            <div class="absolute -top-20 -left-16 w-64 h-64 rounded-full bg-white/10" aria-hidden="true"></div>
            <div class="absolute -bottom-24 -right-10 w-72 h-72 rounded-full border-[18px] border-white/10" aria-hidden="true"></div>
            <div class="relative">
                <h2 class="text-2xl md:text-4xl font-semibold tracking-tight">Siap mencari atau memasarkan properti?</h2>
                <p class="mt-3 text-orange-50 text-sm md:text-base max-w-xl mx-auto">Ceritakan kebutuhan Anda, tim kami akan membantu dari pencarian sampai serah terima.</p>
                <div class="mt-7 flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', config('company.phone')) }}" target="_blank" rel="noopener"
                       class="inline-flex items-center justify-center gap-2 rounded-full bg-white text-stone-900 px-6 py-3 text-sm font-semibold hover:bg-stone-900 hover:text-white transition focus:outline-none focus-visible:ring-4 focus-visible:ring-white/60">
                        <i data-lucide="message-circle" class="w-4 h-4"></i> Chat via WhatsApp
                    </a>
                    <a href="mailto:{{ config('company.email') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-full border border-white/60 px-6 py-3 text-sm font-semibold hover:bg-white/15 transition focus:outline-none focus-visible:ring-4 focus-visible:ring-white/60">
                        <i data-lucide="mail" class="w-4 h-4"></i> Kirim email
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
