@extends('components.layout.app')

@section('title', 'Company Profile — ' . config('company.name'))

@section('content')

{{-- ========================================== --}}
{{-- 1. HERO SECTION (Pakai Banner Welcome)     --}}
{{-- ========================================== --}}
<section class="relative h-[400px] lg:h-[500px] flex items-center justify-center overflow-hidden">
    {{-- Gambar Banner dari Welcome --}}
    <img src="{{ asset('images/banner-property.png') }}"
         alt="Company Profile Banner"
         class="absolute inset-0 w-full h-full object-cover">

    {{-- Overlay Gelap agar Teks Terbaca --}}
    <div class="absolute inset-0 bg-black/60"></div>

    {{-- Teks di Tengah --}}
    <div class="relative z-10 text-center px-4 max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
            Tentang {{ config('company.name') }}
        </h1>
        <p class="text-lg text-stone-200 leading-relaxed">
            Membangun kepercayaan, mewujudkan hunian impian. Kami adalah platform properti terpercaya di Jember dan sekitarnya.
        </p>
    </div>
</section>

{{-- ========================================== --}}
{{-- 2. VISI & MISI                             --}}
{{-- ========================================== --}}
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            {{-- Kiri: Gambar --}}
            <div class="relative">
                <div class="aspect-square md:aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/property/rumah1.jpg') }}" alt="Visi Misi" class="w-full h-full object-cover">
                </div>
                {{-- Kotak Pengalaman --}}
                <div class="absolute -bottom-6 -right-6 bg-orange-500 text-white p-6 rounded-2xl shadow-xl hidden sm:block">
                    <p class="text-4xl font-bold">10+</p>
                    <p class="text-sm font-medium mt-1">Tahun Pengalaman</p>
                </div>
            </div>

            {{-- Kanan: Teks --}}
            <div>
                <h2 class="text-sm font-bold text-orange-500 tracking-wider uppercase mb-2">Tentang Perusahaan</h2>
                <h3 class="text-3xl font-bold text-stone-900 mb-6">Visi & Misi Kami</h3>

                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center shrink-0">
                            <i data-lucide="eye" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-stone-900 mb-1">Visi</h4>
                            <p class="text-stone-600 leading-relaxed">Menjadi platform properti nomor satu di Indonesia yang mengedepankan kepercayaan, inovasi teknologi, dan kemudahan bagi seluruh masyarakat.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center shrink-0">
                            <i data-lucide="target" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-stone-900 mb-1">Misi</h4>
                            <ul class="text-stone-600 leading-relaxed list-disc list-inside space-y-1">
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
<section class="py-20 bg-stone-50 border-y border-stone-200">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-sm font-bold text-orange-500 tracking-wider uppercase mb-2">Layanan Kami</h2>
            <h3 class="text-3xl font-bold text-stone-900">Apa yang Bisa Kami Bantu?</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Layanan 1 --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4">
                    <i data-lucide="home" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-stone-900 mb-2">Jual Beli</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Temukan properti impian atau pasarkan properti Anda dengan aman bersama kami.</p>
            </div>

            {{-- Layanan 2 --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4">
                    <i data-lucide="key" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-stone-900 mb-2">Sewa Properti</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Cari tempat tinggal, kos, atau ruko yang nyaman dengan proses yang mudah.</p>
            </div>

            {{-- Layanan 3 --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center mb-4">
                    <i data-lucide="calculator" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-stone-900 mb-2">KPR</h4>
                <p class="text-sm text-stone-600 leading-relaxed">Simulasikan cicilan dan ajukan KPR untuk mewujudkan rumah pertama Anda.</p>
            </div>

            {{-- Layanan 4 --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 hover:shadow-md transition">
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
<section class="py-20 bg-white">
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
