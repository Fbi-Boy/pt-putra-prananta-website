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

                {{-- Logo Icon --}}
                <div class="w-10 h-10 rounded-xl bg-yellow-400 flex items-center justify-center">
                    <span class="text-black font-black text-xl">
                        P
                    </span>
                </div>

                {{-- Logo Text --}}
                <span class="text-[24px] font-bold tracking-tight text-gray-900">
                    Putra
                </span>

            </div>
        </a>


        {{-- ================================================= --}}
        {{-- DESKTOP MENU --}}
        {{-- ================================================= --}}

        <div class="hidden lg:flex items-center ml-12 gap-8 h-full">

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


                {{-- MEGA MENU BELI --}}
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
                                        Rumah Murah
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Rumah Mewah
                                    </a>

                                </div>
                            </div>


                            {{-- Apartemen --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Apartemen
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Apartemen Baru
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Apartemen Second
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Apartemen Murah
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Apartemen Premium
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
                                        Tanah Investasi
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Tanah Perumahan
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Tanah Strategis
                                    </a>

                                </div>
                            </div>


                            {{-- Properti Komersial --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Properti Komersial
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Ruko
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Gudang
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Kantor
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500 transition">
                                        Properti Komersial
                                    </a>

                                </div>
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


                {{-- MEGA MENU SEWA --}}
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


                            {{-- Apartemen --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Apartemen
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Apartemen Disewa
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Apartemen Tahunan
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Apartemen Bulanan
                                    </a>

                                </div>
                            </div>


                            {{-- Komersial --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Komersial
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Ruko Disewa
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Kantor Disewa
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Gudang Disewa
                                    </a>

                                </div>
                            </div>


                            {{-- Berdasarkan Lokasi --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Berdasarkan Lokasi
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Jember
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


                {{-- MEGA MENU JUAL --}}
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

                            {{-- Jual Properti --}}
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
                                        Jual Apartemen
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Jual Ruko
                                    </a>

                                </div>
                            </div>


                            {{-- Bantuan Menjual --}}
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
                                        Konsultasi Harga
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Konsultasi Properti
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
                                        Pemasaran
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


                {{-- MEGA MENU PROYEK BARU --}}
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

                            {{-- Proyek Rumah --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Proyek Rumah
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


                            {{-- Berdasarkan Area --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Berdasarkan Area
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

                                </div>
                            </div>


                            {{-- Pilihan Populer --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Pilihan Populer
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Proyek Terbaru
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Proyek Terlaris
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Proyek Premium
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

                            {{-- Cari Agen --}}
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


                            {{-- Berdasarkan Lokasi --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Berdasarkan Lokasi
                                </h3>

                                <div class="space-y-3">

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Agen Jember
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Agen Kaliwates
                                    </a>

                                    <a href="#"
                                       class="block text-sm text-gray-600 hover:text-yellow-500">
                                        Agen Sumbersari
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

                            {{-- Panduan Membeli --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Panduan Membeli
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


                            {{-- Pembiayaan --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Pembiayaan
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


                            {{-- Jual Properti --}}
                            <div>
                                <h3 class="text-base font-bold text-gray-950 mb-4">
                                    Jual Properti
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

                            {{-- Tentang Putra --}}
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


            {{-- Properti Tersimpan --}}
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


            {{-- MOBILE MENU BUTTON --}}
            <button
                @click="open = !open"
                class="lg:hidden w-10 h-10 rounded-xl
                       hover:bg-gray-100
                       flex items-center justify-center
                       transition"
                aria-label="Buka menu"
                :aria-expanded="open"
            >

                {{-- Menu Icon --}}
                <span x-show="!open" x-cloak>
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </span>

                {{-- Close Icon --}}
                <span x-show="open" x-cloak>
                    <i data-lucide="x" class="w-5 h-5"></i>
                </span>

            </button>

        </div>

    </div>


    {{-- ================================================= --}}
    {{-- MOBILE MENU PANEL --}}
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
                    Tentang
                </a>

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl text-sm font-medium
                           text-gray-900 hover:bg-gray-50 transition"
                >
                    Galeri
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
