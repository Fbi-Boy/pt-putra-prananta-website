@extends('components.layout.app')

@section('title', 'Company Profile — ' . config('company.name'))

@section('content')

{{-- ========================================== --}}
{{-- 1. HERO SECTION (Tanpa Overlay + Card CEO) --}}
{{-- ========================================== --}}
<section class="relative w-full">
    {{-- Gambar Banner --}}
    <div class="w-full h-[300px] md:h-[450px]">
        <img src="{{ asset('images/banner-property.png') }}"
             alt="Company Profile Banner"
             class="w-full h-full object-cover">
    </div>

    {{-- Floating Card Profil CEO --}}
    <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2 z-20 w-[90%] max-w-md">
        <div class="bg-white rounded-3xl shadow-2xl p-5 md:p-6 border border-stone-100 flex items-center gap-4 md:gap-5">
            <div class="shrink-0">
                <img src="{{ asset('images/agents/agent.png') }}"
                     alt="Muhammad Giovarel"
                     class="w-20 h-20 md:w-24 md:h-24 rounded-2xl object-cover border-2 border-orange-500 bg-stone-100">
            </div>
            <div>
                <p class="text-xs md:text-sm font-bold text-orange-500 uppercase tracking-wider mb-1">
                    CEO Putra Prananta Property
                </p>
                <h3 class="text-xl md:text-2xl font-bold text-stone-900 leading-tight">
                    Muhammad Giovarel
                </h3>
                <p class="text-xs text-stone-500 mt-1">Memimpin dengan visi & inovasi.</p>
            </div>
        </div>
    </div>
</section>

<div class="h-32 md:h-40"></div>

{{-- ========================================== --}}
{{-- 2. VISI & MISI (Dengan Mockup Dashboard)   --}}
{{-- ========================================== --}}
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center">

            {{-- Kiri: Mockup Dashboard E-commerce --}}
            <div class="relative w-full max-w-md mx-auto md:mx-0">
                {{-- Background Orange Gradient (Wadah) --}}
                <div class="bg-gradient-to-br from-orange-400 to-orange-600 rounded-[2rem] p-6 sm:p-8 shadow-2xl relative overflow-hidden">

                    {{-- Ornamen Lingkaran Background --}}
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2"></div>

                    {{-- KARTU DASHBOARD PUTIH --}}
                    <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-lg relative z-10">

                        {{-- Header Dashboard (Titik-titik & garis) --}}
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex gap-1.5">
                                <div class="w-2.5 h-2.5 rounded-full bg-orange-500"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-stone-200"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-stone-200"></div>
                            </div>
                            <div class="w-16 h-2 bg-stone-100 rounded-full"></div>
                        </div>

                        {{-- Baris 1: Statistik --}}
                        <div class="grid grid-cols-3 gap-2 mb-4">
                            {{-- Stat 1 --}}
                            <div class="bg-orange-50 rounded-lg p-2.5 border border-orange-100">
                                <div class="w-8 h-1.5 bg-orange-200 rounded-full mb-1.5"></div>
                                <p class="text-[11px] sm:text-xs font-bold text-orange-600">Rp 18.9Jt</p>
                            </div>
                            {{-- Stat 2 --}}
                            <div class="bg-stone-50 rounded-lg p-2.5 border border-stone-100">
                                <div class="w-8 h-1.5 bg-stone-200 rounded-full mb-1.5"></div>
                                <p class="text-[11px] sm:text-xs font-bold text-stone-700">1.2K</p>
                            </div>
                            {{-- Stat 3 --}}
                            <div class="bg-orange-50 rounded-lg p-2.5 border border-orange-100">
                                <div class="w-8 h-1.5 bg-orange-200 rounded-full mb-1.5"></div>
                                <p class="text-[11px] sm:text-xs font-bold text-orange-600">6,248</p>
                            </div>
                        </div>

                        {{-- Baris 2: Grafik --}}
                        <div class="grid grid-cols-3 gap-2 mb-4">
                            {{-- Line Chart (Span 2) --}}
                            <div class="col-span-2 bg-white rounded-lg p-3 border border-stone-100 relative">
                                <div class="w-12 h-1.5 bg-stone-100 rounded-full mb-2"></div>
                                <svg viewBox="0 0 100 40" class="w-full h-16 overflow-visible">
                                    {{-- Garis Grid --}}
                                    <line x1="0" y1="10" x2="100" y2="10" stroke="#f5f5f4" stroke-width="1" />
                                    <line x1="0" y1="25" x2="100" y2="25" stroke="#f5f5f4" stroke-width="1" />
                                    {{-- Garis Grafik (Orange) --}}
                                    <path d="M 0 35 Q 10 30 20 32 T 40 20 T 60 25 T 80 10 T 100 15" fill="none" stroke="#f97316" stroke-width="2.5" stroke-linecap="round" />
                                    {{-- Titik Ujung --}}
                                    <circle cx="100" cy="15" r="2" fill="#f97316" />
                                </svg>
                            </div>
                            {{-- Donut Chart (Span 1) --}}
                            <div class="col-span-1 bg-white rounded-lg p-2 border border-stone-100 flex flex-col items-center justify-center">
                                <svg viewBox="0 0 36 36" class="w-12 h-12">
                                    <circle cx="18" cy="18" r="15.9155" fill="none" stroke="#f5f5f4" stroke-width="4" />
                                    <circle cx="18" cy="18" r="15.9155" fill="none" stroke="#f97316" stroke-width="4" stroke-dasharray="75 25" stroke-dashoffset="25" stroke-linecap="round" />
                                </svg>
                                <p class="text-[9px] font-bold text-stone-800 mt-1">75%</p>
                            </div>
                        </div>

                        {{-- Baris 3: List & Floating Badge --}}
                        <div class="relative">
                            {{-- List Items --}}
                            <div class="bg-white rounded-lg p-3 border border-stone-100 space-y-2">
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="flex items-center gap-2">
                                        <div class="w-4 h-4 bg-stone-100 rounded-md shrink-0"></div>
                                        <div class="w-full h-1.5 bg-stone-100 rounded-full"></div>
                                    </div>
                                @endfor
                            </div>

                            {{-- Floating Card 94.8% --}}
                            <div class="absolute -bottom-4 -right-4 bg-white p-2.5 rounded-xl shadow-xl border border-stone-100 w-24">
                                <div class="flex justify-between items-center mb-1">
                                    <div class="w-6 h-1.5 bg-stone-100 rounded-full"></div>
                                    <div class="w-1.5 h-1.5 rounded-full bg-orange-500"></div>
                                </div>
                                <p class="text-xs font-bold text-stone-900 mb-1.5">94.8%</p>
                                <div class="flex items-end gap-1 h-5">
                                    <div class="w-2 bg-orange-200 rounded-t-sm h-2"></div>
                                    <div class="w-2 bg-orange-300 rounded-t-sm h-3"></div>
                                    <div class="w-2 bg-orange-400 rounded-t-sm h-4"></div>
                                    <div class="w-2 bg-orange-500 rounded-t-sm h-5"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Kanan: Teks Visi Misi --}}
            <div>
                <h2 class="text-sm font-bold text-orange-500 tracking-wider uppercase mb-2">Tentang Perusahaan</h2>
                <h3 class="text-3xl font-bold text-stone-900 mb-6">Visi & Misi Kami</h3>

                <div class="space-y-6">
                    {{-- Visi --}}
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center shrink-0">
                            <i data-lucide="eye" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-stone-900 mb-1">Visi</h4>
                            <p class="text-stone-600 text-sm md:text-base leading-relaxed">Menjadi platform properti nomor satu di Indonesia yang mengedepankan kepercayaan, inovasi teknologi, dan kemudahan bagi seluruh masyarakat.</p>
                        </div>
                    </div>

                    {{-- Misi --}}
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center shrink-0">
                            <i data-lucide="target" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-stone-900 mb-1">Misi</h4>
                            <ul class="text-stone-600 text-sm md:text-base leading-relaxed list-disc list-inside space-y-1">
                                <li>Menyediakan data properti yang akurat dan terpercaya.</li>
                                <li>Membantu agen dan developer memasarkan produk secara digital.</li>
                                <li>Memberikan pengalaman terbaik bagi pembeli dan penyewa.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ========================================== --}}
{{-- 3. LAYANAN KAMI                            --}}
{{-- ========================================== --}}
<section class="py-16 md:py-20 bg-stone-50 border-y border-stone-200">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-sm font-bold text-orange-500 tracking-wider uppercase mb-2">Layanan Kami</h2>
            <h3 class="text-3xl font-bold text-stone-900">Apa yang Bisa Kami Bantu?</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 md:gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md hover:border-orange-200 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4">
                    <i data-lucide="home" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-stone-900 mb-2">Jual Beli</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Temukan properti impian atau pasarkan properti Anda dengan aman bersama kami.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md hover:border-orange-200 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4">
                    <i data-lucide="key" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-stone-900 mb-2">Sewa Properti</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Cari tempat tinggal, kos, atau ruko yang nyaman dengan proses yang mudah.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md hover:border-orange-200 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4">
                    <i data-lucide="calculator" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-stone-900 mb-2">KPR</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Simulasikan cicilan dan ajukan KPR untuk mewujudkan rumah pertama Anda.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md hover:border-orange-200 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-stone-900 mb-2">Cari Agen</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Hubungi agen properti profesional yang siap membantu kebutuhan Anda.</p>
            </div>
        </div>
    </div>
</section>

{{-- ========================================== --}}
{{-- 4. KONTAK & LOKASI                         --}}
{{-- ========================================== --}}
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-sm font-bold text-orange-500 tracking-wider uppercase mb-2">Hubungi Kami</h2>
            <h3 class="text-3xl font-bold text-stone-900">Mari Berdiskusi</h3>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-stone-100 text-stone-600 flex items-center justify-center shrink-0">
                        <i data-lucide="map-pin" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-stone-900">Alamat Kantor</h4>
                        <p class="text-stone-600 mt-1">{{ config('company.address') }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-stone-100 text-stone-600 flex items-center justify-center shrink-0">
                        <i data-lucide="phone" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-stone-900">Telepon / WhatsApp</h4>
                        <p class="text-stone-600 mt-1">{{ config('company.phone') }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-stone-100 text-stone-600 flex items-center justify-center shrink-0">
                        <i data-lucide="mail" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-stone-900">Email</h4>
                        <p class="text-stone-600 mt-1">{{ config('company.email') }}</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="w-full h-[300px] md:h-[400px] bg-stone-200 rounded-2xl overflow-hidden relative">
                    <img src="{{ asset('images/banner-property.png') }}" alt="Lokasi Kantor" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                        <a href="https://maps.google.com" target="_blank" class="px-6 py-3 bg-white text-stone-900 font-bold rounded-xl shadow-lg hover:bg-stone-50 transition">
                            Buka di Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
