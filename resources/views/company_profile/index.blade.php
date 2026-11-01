@extends('components.layout.app')

@section('title', 'Company Profile — ' . config('company.name'))

@section('content')

{{-- ========================================== --}}
{{-- 1. HERO SECTION (Split layout + badge putar) --}}
{{-- Foto sengaja dikosongkan (placeholder). Isi nanti lewat tag <img> yang sudah disiapkan di komentar. --}}
{{-- ========================================== --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

{{-- Bentuk gambar utama: sudut membulat + takik (notch) di kiri bawah.
     Satuan relatif (objectBoundingBox), jadi ikut skala. Pakai rasio 4:3 agar sudut tetap bulat. --}}
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

<div class="h-16 md:h-20"></div>

{{-- ========================================== --}}
{{-- 2. VISI & MISI + PROPERTI (Tema Orange)    --}}
{{-- ========================================== --}}
<section class="py-12 md:py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 space-y-12 md:space-y-16">

        {{-- ========== ATAS: BANNER ILUSTRASI (landscape) ========== --}}
        <div class="relative rounded-3xl overflow-hidden shadow-xl ring-1 ring-stone-900/5 bg-orange-100 aspect-[16/9] sm:aspect-[21/7]">
            <img src="{{ asset('images/banner-property.png') }}" alt="Putra Property"
                 class="absolute inset-0 w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-r from-white/85 via-white/25 to-transparent"></div>
            <div class="relative z-10 h-full flex flex-col justify-center px-5 sm:px-9 max-w-md sm:max-w-lg">
                <p class="text-xl sm:text-3xl font-extrabold text-stone-900 leading-tight tracking-tight">
                    Find the Right Buyer.<br>
                    <span class="text-orange-500">Sell Your Property with Confidence.</span>
                </p>
                <div class="flex items-center gap-2 mt-3">
                    <span class="w-6 h-6 rounded-full border border-orange-500 bg-white/70 text-orange-500 flex items-center justify-center shrink-0">
                        <i data-lucide="search" class="w-3 h-3"></i>
                    </span>
                    <p class="text-[11px] sm:text-xs text-stone-700">Search. Compare. Sell. Get the Best Value for Your Home.</p>
                </div>
            </div>
        </div>

        {{-- ========== TENGAH: MOCKUP (kiri) + VISI MISI (kanan) ========== --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-14 items-center">

            {{-- KIRI: Mockup tampilan awal website (desktop = browser, mobile = HP) --}}
            <div class="relative w-full max-w-[270px] sm:max-w-md mx-auto md:mx-0">
                <div class="absolute -top-6 -left-6 w-36 h-36 rounded-full bg-orange-200/70 blur-3xl" aria-hidden="true"></div>
                <div class="absolute -bottom-6 -right-4 w-32 h-32 rounded-full bg-amber-200/70 blur-3xl" aria-hidden="true"></div>

                <div class="bg-gradient-to-br from-orange-400 to-orange-600 rounded-[2rem] p-3.5 sm:p-5 pb-9 sm:pb-10 shadow-2xl shadow-orange-500/30 relative">

                    {{-- Frame: HP di mobile, jendela browser di sm ke atas --}}
                    <div class="relative bg-white overflow-hidden shadow-lg rounded-[1.75rem] border-[7px] border-stone-900 sm:border-0 sm:rounded-xl">

                        {{-- Notch HP (mobile saja) --}}
                        <div class="sm:hidden absolute top-0 left-1/2 -translate-x-1/2 w-16 h-3.5 bg-stone-900 rounded-b-xl z-20"></div>

                        {{-- Bar browser (desktop saja) --}}
                        <div class="hidden sm:flex items-center gap-1.5 px-3 py-1.5 bg-stone-100 border-b border-stone-200">
                            <span class="w-2 h-2 rounded-full bg-red-400"></span>
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span class="w-2 h-2 rounded-full bg-green-400"></span>
                            <span class="ml-3 flex-1 h-4 rounded-full bg-white border border-stone-200 text-[8px] leading-4 text-stone-400 px-3">putraproperty.id</span>
                        </div>

                        {{-- Navbar --}}
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

                        {{-- Hero ilustrasi --}}
                        <div class="relative h-32 sm:h-28 bg-gradient-to-r from-orange-100 to-orange-200 overflow-hidden">
                            <img src="{{ asset('images/banner-property.png') }}" alt="Putra Property"
                                 class="absolute inset-0 w-full h-full object-cover object-right">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-50/80 via-transparent to-transparent"></div>
                        </div>

                        {{-- Kartu pencarian (menimpa hero) --}}
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

                        {{-- Strip kategori --}}
                        <div class="grid grid-cols-4 gap-1.5 px-3 pt-2.5 pb-3">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="h-6 rounded-lg border border-orange-100 bg-orange-50"></div>
                            @endfor
                        </div>
                    </div>

                    {{-- Kartu mengambang 94.8% --}}
                    <div class="absolute -bottom-4 right-1 sm:-right-3 bg-white p-2.5 rounded-xl shadow-xl border border-stone-100 w-24 sm:w-28 z-20">
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

            {{-- KANAN: Visi & Misi (bento: Visi = kartu orange, Misi = kartu putih) --}}
            <div>
                <h2 class="text-xs font-bold text-orange-500 tracking-wider uppercase mb-1.5">Tentang Perusahaan</h2>
                <h3 class="text-2xl md:text-3xl font-extrabold text-stone-900 tracking-tight">Visi & Misi Kami</h3>
                <div class="w-10 h-1 bg-orange-500 rounded-full mt-3 mb-6"></div>

                <div class="space-y-4">
                    {{-- Visi --}}
                    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-orange-500 to-orange-600 text-white p-5 shadow-lg shadow-orange-500/20">
                        <div class="absolute -top-10 -right-8 w-32 h-32 rounded-full bg-white/10" aria-hidden="true"></div>
                        <div class="absolute -bottom-14 right-10 w-28 h-28 rounded-full border-[14px] border-white/10" aria-hidden="true"></div>
                        <div class="relative flex gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0">
                                <i data-lucide="eye" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-base font-bold mb-1">Visi</h4>
                                <p class="text-orange-50 text-sm leading-relaxed">Menjadi platform properti nomor satu di Indonesia yang mengedepankan kepercayaan, inovasi teknologi, dan kemudahan bagi seluruh masyarakat.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Misi --}}
                    <div class="rounded-2xl bg-white border border-stone-200 p-5 shadow-sm">
                        <div class="flex items-center gap-3.5 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-stone-900 text-white flex items-center justify-center shrink-0">
                                <i data-lucide="target" class="w-5 h-5"></i>
                            </div>
                            <h4 class="text-base font-bold text-stone-900">Misi</h4>
                        </div>
                        <ul class="space-y-2.5 text-stone-600 text-sm leading-relaxed">
                            <li class="flex gap-2.5"><i data-lucide="check-circle-2" class="w-4 h-4 mt-0.5 text-orange-500 shrink-0"></i>Menyediakan data properti yang akurat dan terpercaya.</li>
                            <li class="flex gap-2.5"><i data-lucide="check-circle-2" class="w-4 h-4 mt-0.5 text-orange-500 shrink-0"></i>Membantu agen dan developer memasarkan produk secara digital.</li>
                            <li class="flex gap-2.5"><i data-lucide="check-circle-2" class="w-4 h-4 mt-0.5 text-orange-500 shrink-0"></i>Memberikan pengalaman terbaik bagi pembeli dan penyewa.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========== BAWAH: CARD PROPERTI (tema orange) ========== --}}
        <div>
            <div class="flex items-end justify-between mb-6">
                <div>
                    <h2 class="text-xs font-bold text-orange-500 tracking-wider uppercase mb-1">Pilihan Kami</h2>
                    <h3 class="text-xl md:text-2xl font-extrabold text-stone-900 tracking-tight">Rekomendasi Properti</h3>
                </div>
                <a href="#" class="inline-flex items-center gap-1 text-sm font-bold text-orange-600 hover:text-orange-700 transition">
                    Lihat semua <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>

            {{-- Ganti array ini dengan data dari controller ($properties) --}}
            @php
                $cards = [
                    ['img' => 'rumah1.jpg', 'tag' => 'Dijual', 'harga' => 'Rp 1,25 M', 'nama' => 'Rumah Minimalis Cluster Asri', 'lokasi' => 'Bondowoso, Jawa Timur', 'kt' => 3, 'km' => 2, 'lt' => 120],
                    ['img' => 'rumah2.jpg', 'tag' => 'Dijual', 'harga' => 'Rp 890 Jt', 'nama' => 'Rumah Modern Dekat Pusat Kota', 'lokasi' => 'Jember, Jawa Timur', 'kt' => 2, 'km' => 1, 'lt' => 84],
                    ['img' => 'rumah3.jpg', 'tag' => 'Disewa', 'harga' => 'Rp 4,5 Jt/bln', 'nama' => 'Rumah Keluarga Siap Huni', 'lokasi' => 'Situbondo, Jawa Timur', 'kt' => 3, 'km' => 2, 'lt' => 110],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($cards as $c)
                    <div class="group bg-white rounded-2xl border border-orange-100 overflow-hidden shadow-sm
                                hover:shadow-xl hover:shadow-orange-500/10 hover:border-orange-300 hover:-translate-y-1 transition-all duration-300">
                        <div class="relative aspect-[16/11] bg-orange-50 overflow-hidden">
                            <img src="{{ asset('images/property/' . $c['img']) }}" alt="{{ $c['nama'] }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-black/30 to-transparent"></div>
                            <span class="absolute top-2.5 left-2.5 {{ $c['tag'] === 'Disewa' ? 'bg-stone-900' : 'bg-orange-500' }} text-white text-[11px] font-bold px-2.5 py-0.5 rounded-full shadow">{{ $c['tag'] }}</span>
                            <button type="button" aria-label="Simpan"
                                    class="absolute top-2.5 right-2.5 w-8 h-8 rounded-full bg-white/90 backdrop-blur text-orange-500 flex items-center justify-center shadow hover:bg-orange-500 hover:text-white transition">
                                <i data-lucide="heart" class="w-4 h-4"></i>
                            </button>
                        </div>
                        <div class="p-4">
                            <p class="text-lg font-extrabold text-orange-600">{{ $c['harga'] }}</p>
                            <h4 class="text-sm font-bold text-stone-900 mt-0.5 truncate">{{ $c['nama'] }}</h4>
                            <p class="flex items-center gap-1 text-xs text-stone-500 mt-1">
                                <i data-lucide="map-pin" class="w-3 h-3 text-orange-400"></i> {{ $c['lokasi'] }}
                            </p>
                            <div class="flex items-center gap-4 mt-3 pt-3 border-t border-orange-100 text-xs text-stone-600">
                                <span class="flex items-center gap-1.5"><i data-lucide="bed-double" class="w-4 h-4 text-orange-500"></i>{{ $c['kt'] }}</span>
                                <span class="flex items-center gap-1.5"><i data-lucide="bath" class="w-4 h-4 text-orange-500"></i>{{ $c['km'] }}</span>
                                <span class="flex items-center gap-1.5"><i data-lucide="ruler" class="w-4 h-4 text-orange-500"></i>{{ $c['lt'] }} m²</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

{{-- ========================================== --}}
{{-- 3. LAYANAN KAMI                            --}}
{{-- ========================================== --}}
<section class="py-12 md:py-16 bg-stone-50 border-y border-stone-200">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-xs font-bold text-orange-500 tracking-wider uppercase mb-1.5">Layanan Kami</h2>
            <h3 class="text-2xl md:text-3xl font-extrabold text-stone-900 tracking-tight">Apa yang Bisa Kami Bantu?</h3>
            <div class="w-10 h-1 bg-orange-500 rounded-full mx-auto mt-3"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
            {{-- Setiap card: garis orange di atas melebar saat hover, ikon jadi solid --}}
            <div class="group relative overflow-hidden bg-white p-5 rounded-2xl border border-stone-200 shadow-sm hover:shadow-xl hover:shadow-orange-500/10 hover:-translate-y-1.5 transition-all duration-300">
                <span class="absolute top-0 left-0 h-1 w-0 bg-orange-500 group-hover:w-full transition-all duration-500"></span>
                <div class="w-11 h-11 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                    <i data-lucide="home" class="w-5 h-5"></i>
                </div>
                <h4 class="text-base font-bold text-stone-900 mb-1.5">Jual Beli</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Temukan properti impian atau pasarkan properti Anda dengan aman bersama kami.</p>
            </div>

            <div class="group relative overflow-hidden bg-white p-5 rounded-2xl border border-stone-200 shadow-sm hover:shadow-xl hover:shadow-orange-500/10 hover:-translate-y-1.5 transition-all duration-300">
                <span class="absolute top-0 left-0 h-1 w-0 bg-orange-500 group-hover:w-full transition-all duration-500"></span>
                <div class="w-11 h-11 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                    <i data-lucide="key" class="w-5 h-5"></i>
                </div>
                <h4 class="text-base font-bold text-stone-900 mb-1.5">Sewa Properti</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Cari tempat tinggal, kos, atau ruko yang nyaman dengan proses yang mudah.</p>
            </div>

            <div class="group relative overflow-hidden bg-white p-5 rounded-2xl border border-stone-200 shadow-sm hover:shadow-xl hover:shadow-orange-500/10 hover:-translate-y-1.5 transition-all duration-300">
                <span class="absolute top-0 left-0 h-1 w-0 bg-orange-500 group-hover:w-full transition-all duration-500"></span>
                <div class="w-11 h-11 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                    <i data-lucide="calculator" class="w-5 h-5"></i>
                </div>
                <h4 class="text-base font-bold text-stone-900 mb-1.5">KPR</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Simulasikan cicilan dan ajukan KPR untuk mewujudkan rumah pertama Anda.</p>
            </div>

            <div class="group relative overflow-hidden bg-white p-5 rounded-2xl border border-stone-200 shadow-sm hover:shadow-xl hover:shadow-orange-500/10 hover:-translate-y-1.5 transition-all duration-300">
                <span class="absolute top-0 left-0 h-1 w-0 bg-orange-500 group-hover:w-full transition-all duration-500"></span>
                <div class="w-11 h-11 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                    <i data-lucide="users" class="w-5 h-5"></i>
                </div>
                <h4 class="text-base font-bold text-stone-900 mb-1.5">Cari Agen</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Hubungi agen properti profesional yang siap membantu kebutuhan Anda.</p>
            </div>
        </div>
    </div>
</section>

{{-- ========================================== --}}
{{-- 4. KONTAK & LOKASI (panel gelap)           --}}
{{-- ========================================== --}}
<section class="py-12 md:py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-xs font-bold text-orange-500 tracking-wider uppercase mb-1.5">Hubungi Kami</h2>
            <h3 class="text-2xl md:text-3xl font-extrabold text-stone-900 tracking-tight">Mari Berdiskusi</h3>
            <div class="w-10 h-1 bg-orange-500 rounded-full mx-auto mt-3"></div>
        </div>

        <div class="relative overflow-hidden rounded-[2rem] bg-stone-900 p-4 sm:p-6 md:p-8 shadow-2xl">
            <div class="absolute -top-24 -left-16 w-72 h-72 rounded-full bg-orange-500/20 blur-3xl" aria-hidden="true"></div>
            <div class="absolute -bottom-24 right-0 w-72 h-72 rounded-full bg-orange-600/10 blur-3xl" aria-hidden="true"></div>

            <div class="relative grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-8 items-center">

                {{-- Info kontak --}}
                <div class="lg:col-span-2 space-y-5 p-1 md:p-2">
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-orange-500/15 text-orange-400 flex items-center justify-center shrink-0">
                            <i data-lucide="map-pin" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Alamat Kantor</h4>
                            <p class="text-stone-400 mt-0.5 text-sm leading-relaxed">{{ config('company.address') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-orange-500/15 text-orange-400 flex items-center justify-center shrink-0">
                            <i data-lucide="phone" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Telepon / WhatsApp</h4>
                            <a href="tel:{{ preg_replace('/[^+\d]/', '', config('company.phone')) }}"
                               class="text-stone-400 mt-0.5 block text-sm hover:text-orange-400 transition">{{ config('company.phone') }}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-orange-500/15 text-orange-400 flex items-center justify-center shrink-0">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Email</h4>
                            <a href="mailto:{{ config('company.email') }}"
                               class="text-stone-400 mt-0.5 block text-sm break-all hover:text-orange-400 transition">{{ config('company.email') }}</a>
                        </div>
                    </div>
                </div>

                {{-- Peta / foto lokasi --}}
                <div class="lg:col-span-3">
                    <div class="relative w-full h-[240px] md:h-[320px] bg-stone-800 rounded-2xl overflow-hidden ring-1 ring-white/10">
                        <img src="{{ asset('images/banner-property.png') }}" alt="Lokasi Kantor" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-stone-900/45 flex items-center justify-center">
                            <a href="{{ config('company.maps_url', 'https://maps.google.com') }}" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-stone-900 text-sm font-bold rounded-xl shadow-lg
                                      hover:bg-orange-500 hover:text-white hover:-translate-y-0.5 transition">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                                Buka di Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
