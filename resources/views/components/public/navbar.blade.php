<nav
    x-data="{ open: false }"
    class="relative w-full bg-white border-b border-gray-200 z-50"
>

    {{-- ================================================= --}}
    {{-- MAIN CONTAINER --}}
    {{-- ================================================= --}}

    <div class="max-w-[1440px] mx-auto h-[88px] px-6 lg:px-10 flex items-center">

        {{-- LOGO --}}
        <a href="{{ url('/') }}" class="flex items-center shrink-0">
            <div class="flex items-center gap-2">

                <div class="w-10 h-10 rounded-xl bg-yellow-400 flex items-center justify-center">
                    <span class="text-black font-black text-xl">
                        P
                    </span>
                </div>

                <span class="text-[24px] font-bold tracking-tight text-gray-900">
                    Putra
                </span>

            </div>
        </a>


        {{-- ================================================= --}}
        {{-- DESKTOP MENU --}}
        {{-- ================================================= --}}

        <div class="hidden lg:flex items-center ml-12 gap-7 h-full">

            {{-- ================================================= --}}
            {{-- BELI --}}
            {{-- ================================================= --}}

            <div class="group h-full flex items-center">

                <button
                    type="button"
                    class="h-full flex items-center gap-1
                           text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition"
                >
                    Beli

                    <i
                        data-lucide="chevron-down"
                        class="w-4 h-4 transition-transform duration-200
                               group-hover:rotate-180"
                    ></i>
                </button>


                <div
                    class="absolute left-0 top-full w-full
                           bg-white border-t border-gray-100
                           shadow-xl
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-4 gap-10">

                            {{-- Rumah --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Rumah
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Rumah Baru
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Rumah Second
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Rumah Keluarga
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Rumah Terjangkau
                                    </a>

                                </div>
                            </div>


                            {{-- Tanah --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Tanah
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Tanah Kavling
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Tanah Perumahan
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Tanah Strategis
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Tanah Investasi
                                    </a>

                                </div>
                            </div>


                            {{-- Kos & Hunian --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Kos & Hunian
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Rumah Kos
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Kos Mahasiswa
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Hunian Dekat Kampus
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Hunian Keluarga
                                    </a>

                                </div>
                            </div>


                            {{-- Area Jember --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Area Jember
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Kaliwates
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Sumbersari
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Patrang
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Ajung
                                    </a>

                                </div>
                            </div>

                        </div>


                        {{-- FEATURE --}}
                        <div class="mt-8 pt-6 border-t border-gray-100">

                            <div class="flex items-center justify-between">

                                <div>
                                    <p class="text-sm font-semibold text-gray-900">
                                        Cari properti di Jember
                                    </p>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Temukan rumah dan tanah sesuai kebutuhan dan anggaran Anda.
                                    </p>
                                </div>

                                <a
                                    href="#"
                                    class="inline-flex items-center gap-2
                                           px-4 py-2.5 rounded-xl
                                           bg-yellow-400 hover:bg-yellow-500
                                           text-sm font-semibold text-black
                                           transition"
                                >
                                    Lihat Properti

                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- SEWA --}}
            {{-- ================================================= --}}

            <div class="group h-full flex items-center">

                <button
                    type="button"
                    class="h-full flex items-center gap-1
                           text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition"
                >
                    Sewa

                    <i
                        data-lucide="chevron-down"
                        class="w-4 h-4 transition-transform duration-200
                               group-hover:rotate-180"
                    ></i>
                </button>


                <div
                    class="absolute left-0 top-full w-full
                           bg-white border-t border-gray-100
                           shadow-xl
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-4 gap-10">

                            {{-- Rumah --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Rumah
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Rumah Disewa
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Rumah Tahunan
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Rumah Bulanan
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Rumah Harian
                                    </a>

                                </div>
                            </div>


                            {{-- Kos --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Kos
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Kos Mahasiswa
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Kos Putra
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Kos Putri
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Kos Keluarga
                                    </a>

                                </div>
                            </div>


                            {{-- Area --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Area Jember
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Kaliwates
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Sumbersari
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Patrang
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Rambipuji
                                    </a>

                                </div>
                            </div>


                            {{-- Kebutuhan --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Kebutuhan
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Dekat Kampus
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Dekat Pusat Kota
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Untuk Keluarga
                                    </a>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- JUAL --}}
            {{-- ================================================= --}}

            <div class="group h-full flex items-center">

                <button
                    type="button"
                    class="h-full flex items-center gap-1
                           text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition"
                >
                    Jual

                    <i
                        data-lucide="chevron-down"
                        class="w-4 h-4 transition-transform duration-200
                               group-hover:rotate-180"
                    ></i>
                </button>


                <div
                    class="absolute left-0 top-full w-full
                           bg-white border-t border-gray-100
                           shadow-xl
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-3 gap-10">

                            {{-- Jual --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Jual Properti
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Jual Rumah
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Jual Tanah
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Jual Kos
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Jual Hunian
                                    </a>

                                </div>
                            </div>


                            {{-- Bantuan --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Bantuan Menjual
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Pasang Iklan
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Cek Harga
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Konsultasi Properti
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Bantuan Dokumen
                                    </a>

                                </div>
                            </div>


                            {{-- Layanan Putra --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Layanan Putra
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Pemasaran Properti
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Foto Properti
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Pendampingan Transaksi
                                    </a>

                                </div>
                            </div>

                        </div>


                        <div class="mt-8 pt-6 border-t border-gray-100">

                            <div class="flex items-center gap-4">

                                <div class="w-11 h-11 rounded-xl bg-yellow-100
                                            flex items-center justify-center">

                                    <i data-lucide="house-plus"
                                       class="w-5 h-5 text-gray-900"></i>

                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-gray-900">
                                        Ingin menjual properti?
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Tim Putra siap membantu proses pemasaran hingga transaksi.
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- KPR --}}
            {{-- ================================================= --}}

            <div class="group h-full flex items-center">

                <button
                    type="button"
                    class="h-full flex items-center gap-1
                           text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition"
                >
                    KPR

                    <i
                        data-lucide="chevron-down"
                        class="w-4 h-4 transition-transform duration-200
                               group-hover:rotate-180"
                    ></i>
                </button>


                {{-- MEGA MENU KPR --}}
                <div
                    class="absolute left-0 top-full w-full
                           bg-white border-t border-gray-100
                           shadow-xl
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-4 gap-10">

                            {{-- KPR --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    KPR
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Simulasi KPR
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Cek Cicilan
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Hitung DP
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Cek Kemampuan
                                    </a>

                                </div>
                            </div>


                            {{-- Panduan --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Panduan
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Syarat KPR
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Dokumen KPR
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Alur Pengajuan
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Tips KPR
                                    </a>

                                </div>
                            </div>


                            {{-- Pilihan --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Pilihan Hunian
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Rumah KPR
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Rumah Terjangkau
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Rumah Siap Huni
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Proyek KPR
                                    </a>

                                </div>
                            </div>


                            {{-- CTA --}}
                            <div>

                                <div class="rounded-2xl bg-gray-950 p-6 text-white">

                                    <div class="w-10 h-10 rounded-xl bg-yellow-400
                                                flex items-center justify-center mb-4">

                                        <i data-lucide="calculator"
                                           class="w-5 h-5 text-black"></i>

                                    </div>

                                    <h3 class="text-base font-bold">
                                        Bingung mulai dari mana?
                                    </h3>

                                    <p class="text-sm text-gray-400 mt-2 leading-relaxed">
                                        Hitung perkiraan cicilan dan cari hunian
                                        yang sesuai kemampuan Anda.
                                    </p>

                                    <a
                                        href="#"
                                        class="inline-flex items-center gap-2
                                               mt-5 px-4 py-2.5
                                               rounded-xl
                                               bg-yellow-400 hover:bg-yellow-500
                                               text-sm font-semibold text-black
                                               transition"
                                    >
                                        Mulai Simulasi

                                        <i data-lucide="arrow-right"
                                           class="w-4 h-4"></i>
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- PROYEK BARU --}}
            {{-- ================================================= --}}

            <div class="group h-full flex items-center">

                <button
                    type="button"
                    class="h-full flex items-center gap-1
                           text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition"
                >
                    Proyek Baru

                    <i
                        data-lucide="chevron-down"
                        class="w-4 h-4 transition-transform duration-200
                               group-hover:rotate-180"
                    ></i>
                </button>


                <div
                    class="absolute left-0 top-full w-full
                           bg-white border-t border-gray-100
                           shadow-xl
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-3 gap-10">

                            {{-- Hunian --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Hunian Baru
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Perumahan Baru
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Rumah Cluster
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Rumah Subsidi
                                    </a>

                                </div>
                            </div>


                            {{-- Area --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Area Jember
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Jember Kota
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Kaliwates
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Sumbersari
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Patrang
                                    </a>

                                </div>
                            </div>


                            {{-- Pilihan --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Pilihan
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Proyek Terbaru
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Siap Huni
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Pilihan KPR
                                    </a>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- CARI AGEN --}}
            {{-- ================================================= --}}

            <div class="group h-full flex items-center">

                <a
                    href="#"
                    class="h-full flex items-center
                           text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition"
                >
                    Cari Agen
                </a>


                <div
                    class="absolute left-0 top-full w-full
                           bg-white border-t border-gray-100
                           shadow-xl
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-3 gap-10">

                            {{-- Cari --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Cari Agen
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Agen Properti
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Agen Rumah
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Agen Tanah
                                    </a>

                                </div>
                            </div>


                            {{-- Area --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Agen Jember
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Kaliwates
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Sumbersari
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Patrang
                                    </a>

                                </div>
                            </div>


                            {{-- Bergabung --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Bergabung
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Jadi Agen Putra
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Hubungi Kami
                                    </a>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- PANDUAN --}}
            {{-- ================================================= --}}

            <div class="group h-full flex items-center">

                <a
                    href="#"
                    class="h-full flex items-center
                           text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition"
                >
                    Panduan
                </a>


                <div
                    class="absolute left-0 top-full w-full
                           bg-white border-t border-gray-100
                           shadow-xl
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-4 gap-10">

                            {{-- Membeli --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Membeli
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Cara Membeli Rumah
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Tips Memilih Rumah
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Cek Legalitas
                                    </a>

                                </div>
                            </div>


                            {{-- KPR --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    KPR
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Panduan KPR
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Simulasi KPR
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        KPR Syariah
                                    </a>

                                </div>
                            </div>


                            {{-- Menjual --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Menjual
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Tips Menjual Rumah
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Menentukan Harga
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Persiapan Dokumen
                                    </a>

                                </div>
                            </div>


                            {{-- Properti --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Properti
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Berita Properti
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Tips Properti
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Investasi Properti
                                    </a>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- LAINNYA --}}
            {{-- ================================================= --}}

            <div class="group h-full flex items-center">

                <button
                    type="button"
                    class="h-full flex items-center gap-1
                           text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition"
                >
                    Lainnya

                    <i
                        data-lucide="chevron-down"
                        class="w-4 h-4 transition-transform duration-200
                               group-hover:rotate-180"
                    ></i>
                </button>


                <div
                    class="absolute left-0 top-full w-full
                           bg-white border-t border-gray-100
                           shadow-xl
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-4 gap-10">

                            {{-- Tentang --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Tentang Putra
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Tentang Kami
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Karir
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Hubungi Kami
                                    </a>

                                </div>
                            </div>


                            {{-- Layanan --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Layanan
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Jasa Properti
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Konsultasi
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Pemasaran Properti
                                    </a>

                                </div>
                            </div>


                            {{-- Informasi --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Informasi
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        FAQ
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Syarat & Ketentuan
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Kebijakan Privasi
                                    </a>

                                </div>
                            </div>


                            {{-- Bantuan --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Bantuan
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Pusat Bantuan
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Hubungi CS
                                    </a>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ================================================= --}}
        {{-- RIGHT SIDE --}}
        {{-- ================================================= --}}

        <div class="ml-auto flex items-center gap-3">

            {{-- Jual Properti --}}
            <button
                class="hidden md:flex items-center gap-3 h-10 px-5
                       rounded-2xl border border-gray-800
                       text-sm font-semibold text-gray-900
                       hover:bg-gray-50 transition"
            >

                <i data-lucide="house-plus" class="w-5 h-5"></i>

                <span>Jual Properti</span>

            </button>


            {{-- Favorit --}}
            <button
                class="hidden md:flex w-10 h-10 rounded-full
                       items-center justify-center
                       hover:bg-gray-100 transition"
                aria-label="Properti tersimpan"
            >

                <i data-lucide="heart" class="w-5 h-5"></i>

            </button>


            {{-- Masuk --}}
            <a
                href="#"
                class="hidden md:flex h-10 px-5 rounded-full
                       bg-yellow-400 hover:bg-yellow-500
                       items-center justify-center
                       text-sm font-semibold text-black transition"
            >
                Masuk
            </a>


            {{-- MOBILE MENU --}}
            <button
                @click="open = !open"
                class="lg:hidden w-10 h-10 rounded-xl
                       hover:bg-gray-100
                       flex items-center justify-center
                       transition"
                aria-label="Buka menu"
                :aria-expanded="open"
            >

                <span x-show="!open" x-cloak>
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </span>

                <span x-show="open" x-cloak>
                    <i data-lucide="x" class="w-5 h-5"></i>
                </span>

            </button>

        </div>

    </div>


    {{-- ================================================= --}}
    {{-- MOBILE MENU --}}
    {{-- ================================================= --}}

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="open = false"
        class="lg:hidden absolute left-0 right-0 top-full
               bg-white border-t border-gray-100
               shadow-lg z-50"
    >

        <div class="px-5 py-5">

            <nav class="flex flex-col gap-1">

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl text-sm font-medium
                           text-gray-900 hover:bg-gray-50 transition"
                >
                    Beranda
                </a>

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl text-sm font-medium
                           text-gray-900 hover:bg-gray-50 transition"
                >
                    Properti
                </a>

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl text-sm font-medium
                           text-gray-900 hover:bg-gray-50 transition"
                >
                    KPR
                </a>

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl text-sm font-medium
                           text-gray-900 hover:bg-gray-50 transition"
                >
                    Proyek Baru
                </a>

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl text-sm font-medium
                           text-gray-900 hover:bg-gray-50 transition"
                >
                    Cari Agen
                </a>

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl text-sm font-medium
                           text-gray-900 hover:bg-gray-50 transition"
                >
                    Panduan
                </a>

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl text-sm font-medium
                           text-gray-900 hover:bg-gray-50 transition"
                >
                    Tentang
                </a>

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl text-sm font-medium
                           text-gray-900 hover:bg-gray-50 transition"
                >
                    Kontak
                </a>


                <div class="my-3 border-t border-gray-100"></div>


                {{-- Jual Properti --}}
                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                           text-sm font-semibold text-gray-900
                           hover:bg-gray-50 transition"
                >

                    <i data-lucide="house-plus" class="w-5 h-5"></i>

                    <span>Jual Properti</span>

                </a>


                {{-- Properti Tersimpan --}}
                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                           text-sm font-semibold text-gray-900
                           hover:bg-gray-50 transition"
                >

                    <i data-lucide="heart" class="w-5 h-5"></i>

                    <span>Properti Tersimpan</span>

                </a>


                {{-- Masuk --}}
                <a
                    href="#"
                    @click="open = false"
                    class="mt-2 h-11 rounded-xl
                           bg-yellow-400 hover:bg-yellow-500
                           flex items-center justify-center
                           text-sm font-semibold text-black transition"
                >
                    Masuk
                </a>

            </nav>

        </div>

    </div>

</nav>
