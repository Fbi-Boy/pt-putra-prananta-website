
@extends('components.layout.app')

@section('title', 'Profil Perusahaan — ' . config('company.name'))

@section('content')


{{-- ========================================== --}}
{{-- 1. HERO SECTION - COMPANY PROFILE --}}
{{-- ========================================== --}}

<section class="relative bg-[#FFF8F3] overflow-hidden">

    <div class="max-w-[1440px] mx-auto px-5 lg:px-10">

        <div class="relative min-h-[490px] lg:min-h-[510px] grid grid-cols-1 lg:grid-cols-12">

            {{-- ================================= --}}
            {{-- KOLOM KIRI --}}
            {{-- ================================= --}}

            <div class="lg:col-span-4 relative flex flex-col justify-between py-8 lg:py-8 lg:pr-8 min-h-[420px]">

                {{-- Heading --}}
                <div class="relative z-10">

                    <h1 class="text-[48px] sm:text-[58px] lg:text-[52px] xl:text-[62px] leading-[0.98] tracking-tight text-stone-900 font-medium">
                        Company
                        <br>
                        <span class="font-serif italic font-normal">
                            Profile
                        </span>
                    </h1>

                    {{-- CTA --}}
                    <a href="{{ route('properties.index') }}"
                       class="inline-flex items-center gap-3 mt-7 px-4 py-2.5 rounded-full bg-[#EF4B17] text-white text-xs font-medium hover:bg-[#D93D0D] transition-all group">

                        Lihat Properti

                        <span class="flex items-center justify-center w-5 h-5 rounded-full bg-white/20 group-hover:translate-x-1 transition-transform">
                            <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                        </span>

                    </a>

                </div>

                {{-- Bottom Description --}}
                <div class="relative z-10 mt-12 lg:mt-0">

                    <p class="text-xs leading-[1.7] text-stone-500 max-w-[240px] mb-7">
                        {{ config('company.full_name') }} menghadirkan pilihan properti berkualitas dengan desain modern, lokasi strategis, dan pengalaman terbaik untuk menemukan hunian impian Anda.
                    </p>

                    {{-- Property Mini Thumbnails --}}
                    <div class="flex items-center">

                        <div class="flex -space-x-3">

                            <div class="w-9 h-9 rounded-full border-2 border-[#FFF8F3] overflow-hidden">
                                <img src="{{ asset('images/property/rumah1.jpg') }}" class="w-full h-full object-cover" alt="Properti 1">
                            </div>

                            <div class="w-9 h-9 rounded-full border-2 border-[#FFF8F3] overflow-hidden">
                                <img src="{{ asset('images/property/rumah2.jpg') }}" class="w-full h-full object-cover" alt="Properti 2">
                            </div>

                            <div class="w-9 h-9 rounded-full border-2 border-[#FFF8F3] overflow-hidden">
                                <img src="{{ asset('images/banner-property.png') }}" class="w-full h-full object-cover" alt="Properti 3">
                            </div>

                            <div class="w-9 h-9 rounded-full border-2 border-[#FFF8F3] overflow-hidden">
                                <img src="{{ asset('images/property/rumah1.jpg') }}" class="w-full h-full object-cover" alt="Properti 4">
                            </div>

                        </div>

                        <span class="ml-3 text-[10px] text-stone-500">
                            Discover our properties
                        </span>

                    </div>

                </div>

            </div>


            {{-- ================================= --}}
            {{-- KOLOM TENGAH - HERO IMAGE --}}
            {{-- ================================= --}}

            <div class="lg:col-span-4 relative flex items-center justify-center min-h-[430px] lg:min-h-0 py-5 lg:py-0">

                {{-- Main Image Capsule --}}
                <div class="relative w-[210px] sm:w-[250px] lg:w-[250px] xl:w-[275px] h-[380px] sm:h-[400px] lg:h-[440px] overflow-hidden rounded-[150px]">

                    <img
                        src="{{ asset('images/property/rumah2.jpg') }}"
                        alt="Hunian Premium"
                        class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-700"
                    >

                    {{-- Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>

                    {{-- Image Caption --}}
                    <div class="absolute bottom-7 left-0 right-0 text-center text-white">

                        <p class="text-[10px] tracking-[0.25em] uppercase opacity-80">
                            Discover
                        </p>

                        <p class="font-serif italic text-2xl mt-1">
                            Your Dream Home
                        </p>

                    </div>

                </div>

                {{-- Floating Orange Button --}}
                <a
                    href="{{ route('properties.index') }}"
                    class="absolute top-[52%] right-[4%] lg:right-[-18px] -translate-y-1/2 w-[58px] h-[58px] rounded-full bg-[#EF4B17] text-white flex items-center justify-center shadow-lg hover:scale-110 transition-transform z-20"
                >
                    <i data-lucide="arrow-up-right" class="w-7 h-7"></i>
                </a>

            </div>


            {{-- ================================= --}}
            {{-- KOLOM KANAN --}}
            {{-- ================================= --}}

            <div class="lg:col-span-4 relative flex flex-col justify-between py-8 lg:py-8 lg:pl-8 min-h-[430px]">

                {{-- CEO PROFILE --}}
                <div class="relative">

                    <div class="flex items-center justify-end gap-4">

                        {{-- CEO Information --}}
                        <div class="text-right">

                            <h3 class="text-base font-bold text-stone-900">
                                CEO Putra Prananta Property
                            </h3>

                        </div>

                        {{-- Profile Avatar --}}
                        <div class="w-11 h-11 rounded-full bg-stone-200 flex items-center justify-center overflow-hidden shrink-0">

                            <span class="text-sm font-bold text-stone-600">
                                PP
                            </span>

                        </div>

                    </div>

                    {{-- Description --}}
                    <p class="text-xs leading-relaxed text-stone-500 text-right max-w-[270px] ml-auto mt-5">
                        Menghadirkan solusi properti terpercaya dengan pelayanan profesional, pilihan hunian berkualitas, dan pengalaman terbaik bagi setiap pelanggan.
                    </p>

                </div>


                {{-- Company Statistics --}}
                <div class="grid grid-cols-2 gap-4 py-8 lg:py-4">

                    <div>

                        <h3 class="text-3xl lg:text-[34px] font-semibold tracking-tight text-stone-900">
                            200<span class="text-[#EF4B17]">+</span>
                        </h3>

                        <p class="text-[10px] text-stone-500 mt-1">
                            Pilihan Properti
                        </p>

                    </div>

                    <div>

                        <h3 class="text-3xl lg:text-[34px] font-semibold tracking-tight text-stone-900">
                            5K<span class="text-[#EF4B17]">+</span>
                        </h3>

                        <p class="text-[10px] text-stone-500 mt-1">
                            Jangkauan Pengguna
                        </p>

                    </div>

                </div>


                {{-- Bottom Right --}}
                <div class="flex items-end justify-between">

                    {{-- Scroll Indicator --}}
                    <a href="#about-company"
                       class="w-8 h-8 flex items-center justify-center text-stone-700 hover:text-[#EF4B17] transition">

                        <i data-lucide="arrow-down" class="w-5 h-5"></i>

                    </a>

                    {{-- Circular Action --}}
                    <a href="{{ route('properties.index') }}"
                       class="w-14 h-14 rounded-full border border-stone-300 flex items-center justify-center hover:bg-stone-900 hover:text-white transition group">

                        <i data-lucide="scan-qr-code" class="w-7 h-7"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- ========================================== --}}
{{-- 2. VISI & MISI --}}
{{-- ========================================== --}}

<section id="about-company" class="py-20 bg-white">

    <div class="max-w-6xl mx-auto px-4">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            {{-- Image --}}
            <div class="relative">

                <div class="aspect-square md:aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl">

                    <img
                        src="{{ asset('images/banner-property.png') }}"
                        alt="Kantor Kami"
                        class="w-full h-full object-cover"
                    >

                </div>

                {{-- Experience --}}
                <div class="absolute -bottom-6 -right-6 bg-[#EF4B17] text-white p-6 rounded-2xl shadow-xl">

                    <p class="text-4xl font-bold">10+</p>

                    <p class="text-sm font-medium mt-1">
                        Tahun Pengalaman
                    </p>

                </div>

            </div>


            {{-- Content --}}
            <div>

                <h2 class="text-sm font-bold text-[#EF4B17] tracking-wider uppercase mb-2">
                    Tentang Perusahaan
                </h2>

                <h3 class="text-3xl font-bold text-stone-900 mb-6">
                    Visi & Misi Kami
                </h3>

                <div class="space-y-6">

                    {{-- Vision --}}
                    <div class="flex gap-4">

                        <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#EF4B17] flex items-center justify-center shrink-0">
                            <i data-lucide="eye" class="w-6 h-6"></i>
                        </div>

                        <div>

                            <h4 class="text-lg font-bold text-stone-900 mb-1">
                                Visi
                            </h4>

                            <p class="text-stone-600 leading-relaxed">
                                Menjadi platform properti nomor satu di Indonesia yang mengedepankan kepercayaan, inovasi teknologi, dan kemudahan bagi seluruh masyarakat.
                            </p>

                        </div>

                    </div>


                    {{-- Mission --}}
                    <div class="flex gap-4">

                        <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#EF4B17] flex items-center justify-center shrink-0">
                            <i data-lucide="target" class="w-6 h-6"></i>
                        </div>

                        <div>

                            <h4 class="text-lg font-bold text-stone-900 mb-1">
                                Misi
                            </h4>

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
{{-- 3. LAYANAN KAMI --}}
{{-- ========================================== --}}

<section class="py-20 bg-[#FFF8F3] border-y border-[#EDE5DF]">

    <div class="max-w-6xl mx-auto px-4">

        <div class="text-center mb-12">

            <h2 class="text-sm font-bold text-[#EF4B17] tracking-wider uppercase mb-2">
                Layanan Kami
            </h2>

            <h3 class="text-3xl font-bold text-stone-900">
                Apa yang Bisa Kami Bantu?
            </h3>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- Service 1 --}}
            <div class="bg-white p-6 rounded-2xl border border-[#EDE5DF] hover:-translate-y-1 hover:shadow-lg transition">

                <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#EF4B17] flex items-center justify-center mb-4">
                    <i data-lucide="home" class="w-6 h-6"></i>
                </div>

                <h4 class="text-lg font-bold text-stone-900 mb-2">
                    Jual Beli
                </h4>

                <p class="text-sm text-stone-600 leading-relaxed">
                    Temukan properti impian atau pasarkan properti Anda dengan aman bersama kami.
                </p>

            </div>


            {{-- Service 2 --}}
            <div class="bg-white p-6 rounded-2xl border border-[#EDE5DF] hover:-translate-y-1 hover:shadow-lg transition">

                <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#EF4B17] flex items-center justify-center mb-4">
                    <i data-lucide="key" class="w-6 h-6"></i>
                </div>

                <h4 class="text-lg font-bold text-stone-900 mb-2">
                    Sewa Properti
                </h4>

                <p class="text-sm text-stone-600 leading-relaxed">
                    Cari tempat tinggal, kos, atau ruko yang nyaman dengan proses yang mudah.
                </p>

            </div>


            {{-- Service 3 --}}
            <div class="bg-white p-6 rounded-2xl border border-[#EDE5DF] hover:-translate-y-1 hover:shadow-lg transition">

                <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#EF4B17] flex items-center justify-center mb-4">
                    <i data-lucide="calculator" class="w-6 h-6"></i>
                </div>

                <h4 class="text-lg font-bold text-stone-900 mb-2">
                    KPR
                </h4>

                <p class="text-sm text-stone-600 leading-relaxed">
                    Simulasikan cicilan dan ajukan KPR untuk mewujudkan rumah pertama Anda.
                </p>

            </div>


            {{-- Service 4 --}}
            <div class="bg-white p-6 rounded-2xl border border-[#EDE5DF] hover:-translate-y-1 hover:shadow-lg transition">

                <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#EF4B17] flex items-center justify-center mb-4">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>

                <h4 class="text-lg font-bold text-stone-900 mb-2">
                    Cari Agen
                </h4>

                <p class="text-sm text-stone-600 leading-relaxed">
                    Hubungi agen properti profesional yang siap membantu kebutuhan Anda.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- ========================================== --}}
{{-- 4. KONTAK & LOKASI --}}
{{-- ========================================== --}}

<section class="py-20 bg-white">

    <div class="max-w-6xl mx-auto px-4">

        <div class="text-center mb-12">

            <h2 class="text-sm font-bold text-[#EF4B17] tracking-wider uppercase mb-2">
                Hubungi Kami
            </h2>

            <h3 class="text-3xl font-bold text-stone-900">
                Mari Berdiskusi
            </h3>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Contact Information --}}
            <div class="space-y-6">

                {{-- Address --}}
                <div class="flex items-start gap-4">

                    <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#EF4B17] flex items-center justify-center shrink-0">
                        <i data-lucide="map-pin" class="w-6 h-6"></i>
                    </div>

                    <div>

                        <h4 class="font-bold text-stone-900">
                            Alamat Kantor
                        </h4>

                        <p class="text-stone-600 mt-1">
                            {{ config('company.address') }}
                        </p>

                    </div>

                </div>


                {{-- Phone --}}
                <div class="flex items-start gap-4">

                    <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#EF4B17] flex items-center justify-center shrink-0">
                        <i data-lucide="phone" class="w-6 h-6"></i>
                    </div>

                    <div>

                        <h4 class="font-bold text-stone-900">
                            Telepon / WhatsApp
                        </h4>

                        <p class="text-stone-600 mt-1">
                            {{ config('company.phone') }}
                        </p>

                    </div>

                </div>


                {{-- Email --}}
                <div class="flex items-start gap-4">

                    <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#EF4B17] flex items-center justify-center shrink-0">
                        <i data-lucide="mail" class="w-6 h-6"></i>
                    </div>

                    <div>

                        <h4 class="font-bold text-stone-900">
                            Email
                        </h4>

                        <p class="text-stone-600 mt-1">
                            {{ config('company.email') }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Office Location --}}
            <div class="lg:col-span-2">

                <div class="w-full h-[300px] md:h-[400px] bg-stone-200 rounded-2xl overflow-hidden relative">

                    <img
                        src="{{ asset('images/banner-property.png') }}"
                        alt="Lokasi Kantor"
                        class="w-full h-full object-cover"
                    >

                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">

                        <a
                            href="https://maps.google.com"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="px-6 py-3 bg-white text-stone-900 font-bold rounded-xl shadow-lg hover:bg-stone-50 transition"
                        >
                            Buka di Google Maps
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
