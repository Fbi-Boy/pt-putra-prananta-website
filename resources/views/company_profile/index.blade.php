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
    {{-- Posisi absolute di tengah bawah, menimpa batas banner --}}
    <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2 z-20 w-[90%] max-w-md">
        <div class="bg-white rounded-3xl shadow-2xl p-5 md:p-6 border border-stone-100 flex items-center gap-4 md:gap-5">
            {{-- Foto CEO --}}
            <div class="shrink-0">
                <img src="{{ asset('images/agents/agent.png') }}"
                     alt="Muhammad Giovarel"
                     class="w-20 h-20 md:w-24 md:h-24 rounded-2xl object-cover border-2 border-orange-500 bg-stone-100">
            </div>
            {{-- Info CEO --}}
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

{{-- Spacer agar konten di bawahnya tidak tertutup Card CEO --}}
<div class="h-32 md:h-40"></div>

{{-- ========================================== --}}
{{-- 2. VISI & MISI                             --}}
{{-- ========================================== --}}
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center">

            {{-- Kiri: Gambar (Responsive) --}}
            <div class="relative">
                {{-- Container dengan aspect ratio yang responsif --}}
                <div class="w-full aspect-square md:aspect-[4/3] rounded-3xl overflow-hidden shadow-xl">
                    {{-- Ganti URL gambar ini dengan foto kantor/tim yang kamu inginkan --}}
                    <img src="{{ asset('images/property/rumah2.jpg') }}"
                         alt="Suasana Kantor atau Tim Kami"
                         class="w-full h-full object-cover">
                </div>
                {{-- Ornamen kotak orange (opsional) --}}
                <div class="absolute -bottom-6 -right-6 bg-orange-500 text-white p-5 md:p-6 rounded-2xl shadow-xl hidden sm:block">
                    <p class="text-3xl md:text-4xl font-bold">10+</p>
                    <p class="text-xs md:text-sm font-medium mt-1">Tahun Pengalaman</p>
                </div>
            </div>

            {{-- Kanan: Teks --}}
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
            {{-- Layanan 1 --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md hover:border-orange-200 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4">
                    <i data-lucide="home" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-stone-900 mb-2">Jual Beli</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Temukan properti impian atau pasarkan properti Anda dengan aman bersama kami.</p>
            </div>

            {{-- Layanan 2 --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md hover:border-orange-200 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4">
                    <i data-lucide="key" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-stone-900 mb-2">Sewa Properti</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Cari tempat tinggal, kos, atau ruko yang nyaman dengan proses yang mudah.</p>
            </div>

            {{-- Layanan 3 --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md hover:border-orange-200 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4">
                    <i data-lucide="calculator" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-stone-900 mb-2">KPR</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Simulasikan cicilan dan ajukan KPR untuk mewujudkan rumah pertama Anda.</p>
            </div>

            {{-- Layanan 4 --}}
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
            {{-- Info Kontak --}}
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

            {{-- Peta / Gambar Kantor --}}
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
