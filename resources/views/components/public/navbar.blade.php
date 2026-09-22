<nav
    x-data="{ open: false }"
    class="relative w-full bg-white border-b border-gray-200 z-50"
>

    {{-- =========================================================
        MAIN NAVBAR
    ========================================================== --}}

    <div class="max-w-[1440px] mx-auto h-[88px] px-6 lg:px-10 flex items-center">

        {{-- =====================================================
            LOGO
        ====================================================== --}}

        <a
            href="{{ url('/') }}"
            class="flex items-center shrink-0"
        >
            <div class="flex items-center gap-2.5">

                <div
                    class="w-10 h-10 rounded-xl
                           bg-yellow-400
                           flex items-center justify-center
                           shadow-sm"
                >
                    <span class="text-black font-black text-xl">
                        P
                    </span>
                </div>

                <div class="leading-none">
                    <span class="block text-[24px] font-bold tracking-tight text-gray-950">
                        Putra
                    </span>

                    <span class="block text-[10px] font-semibold tracking-[0.18em] uppercase text-gray-500 mt-1">
                        Prananta Property
                    </span>
                </div>

            </div>
        </a>


        {{-- =====================================================
            DESKTOP MENU
        ====================================================== --}}

        <div class="hidden lg:flex items-center ml-12 gap-7 h-full">


        {{-- =================================================
            BELI
        ================================================== --}}

        <div class="group h-full flex items-center">

            {{-- TRIGGER BELI --}}
            <a
                href="{{ route('company.beli') }}"
                class="h-full flex items-center gap-1.5
                    text-[15px] font-semibold
                    text-gray-900
                    hover:text-yellow-500
                    transition"
            >
                Beli

                <i
                    data-lucide="chevron-down"
                    class="w-4 h-4 transition-transform duration-200
                        group-hover:rotate-180"
                ></i>
            </a>


            {{-- DROPDOWN BELI --}}
            <div
                class="absolute left-0 top-full w-full
                    bg-white
                    border-t border-gray-100
                    shadow-[0_18px_45px_rgba(0,0,0,0.08)]
                    opacity-0 invisible
                    -translate-y-2
                    group-hover:opacity-100
                    group-hover:visible
                    group-hover:translate-y-0
                    transition-all duration-200"
            >

                <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                    <div class="grid grid-cols-12 gap-8">

                        {{-- ISI DROPDOWN BELI TETAP PAKAI KODE LAMA --}}

                    </div>

                </div>

            </div>

        </div>


            {{-- =================================================
                SEWA
            ================================================== --}}

            <div class="group h-full flex items-center">

                <button
                    type="button"
                    class="h-full flex items-center gap-1.5
                           text-[15px] font-semibold
                           text-gray-900
                           hover:text-yellow-500 transition"
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
                           bg-white
                           border-t border-gray-100
                           shadow-[0_18px_45px_rgba(0,0,0,0.08)]
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-12 gap-8">

                            {{-- QUICK SEARCH --}}

                            <div class="col-span-7">

                                <p class="text-xs font-bold uppercase tracking-wider text-yellow-600">
                                    Properti sewa
                                </p>

                                <h3 class="text-xl font-bold text-gray-950 mt-1">
                                    Temukan tempat untuk tinggal
                                </h3>


                                <div class="grid grid-cols-3 gap-3 mt-6">

                                    <a
                                        href="#"
                                        class="p-4 rounded-2xl border border-gray-200
                                               hover:border-yellow-300
                                               hover:bg-yellow-50/50 transition"
                                    >
                                        <i data-lucide="house" class="w-5 h-5"></i>

                                        <h4 class="font-bold text-sm mt-4">
                                            Rumah
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Tahunan & bulanan
                                        </p>
                                    </a>


                                    <a
                                        href="#"
                                        class="p-4 rounded-2xl border border-gray-200
                                               hover:border-yellow-300
                                               hover:bg-yellow-50/50 transition"
                                    >
                                        <i data-lucide="building-2" class="w-5 h-5"></i>

                                        <h4 class="font-bold text-sm mt-4">
                                            Kos
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Putra, putri & keluarga
                                        </p>
                                    </a>


                                    <a
                                        href="#"
                                        class="p-4 rounded-2xl border border-gray-200
                                               hover:border-yellow-300
                                               hover:bg-yellow-50/50 transition"
                                    >
                                        <i data-lucide="home" class="w-5 h-5"></i>

                                        <h4 class="font-bold text-sm mt-4">
                                            Hunian
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Pilihan untuk keluarga
                                        </p>
                                    </a>

                                </div>

                            </div>


                            {{-- AREA --}}

                            <div class="col-span-5">

                                <div class="rounded-2xl bg-gray-50 p-6">

                                    <div class="flex items-center justify-between">

                                        <div>
                                            <p class="text-xs font-bold uppercase tracking-wider text-gray-400">
                                                Area populer
                                            </p>

                                            <h4 class="font-bold text-gray-950 mt-1">
                                                Sewa di Jember
                                            </h4>
                                        </div>

                                        <i
                                            data-lucide="map-pin"
                                            class="w-5 h-5 text-yellow-500"
                                        ></i>

                                    </div>


                                    <div class="grid grid-cols-2 gap-3 mt-5">

                                        <a href="#" class="px-3 py-2.5 rounded-xl bg-white border border-gray-200 text-sm font-medium hover:border-yellow-300 transition">
                                            Kaliwates
                                        </a>

                                        <a href="#" class="px-3 py-2.5 rounded-xl bg-white border border-gray-200 text-sm font-medium hover:border-yellow-300 transition">
                                            Sumbersari
                                        </a>

                                        <a href="#" class="px-3 py-2.5 rounded-xl bg-white border border-gray-200 text-sm font-medium hover:border-yellow-300 transition">
                                            Patrang
                                        </a>

                                        <a href="#" class="px-3 py-2.5 rounded-xl bg-white border border-gray-200 text-sm font-medium hover:border-yellow-300 transition">
                                            Rambipuji
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                JUAL
            ================================================== --}}

            <div class="group h-full flex items-center">

                <button
                    type="button"
                    class="h-full flex items-center gap-1.5
                           text-[15px] font-semibold
                           text-gray-900
                           hover:text-yellow-500 transition"
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
                           bg-white
                           border-t border-gray-100
                           shadow-[0_18px_45px_rgba(0,0,0,0.08)]
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-12 gap-8">

                            {{-- MAIN CTA --}}

                            <div class="col-span-5">

                                <div
                                    class="relative overflow-hidden
                                           rounded-3xl
                                           bg-gray-950
                                           p-7 text-white"
                                >

                                    <div class="relative z-10">

                                        <div
                                            class="w-11 h-11 rounded-2xl
                                                   bg-yellow-400
                                                   flex items-center justify-center"
                                        >
                                            <i
                                                data-lucide="house-plus"
                                                class="w-5 h-5 text-black"
                                            ></i>
                                        </div>

                                        <h3 class="text-2xl font-bold mt-6">
                                            Mau jual properti?
                                        </h3>

                                        <p class="text-sm text-gray-400 mt-2 leading-relaxed">
                                            Serahkan pemasaran properti Anda kepada tim Prananta Property.
                                        </p>

                                        <a
                                            href="#"
                                            class="mt-6 inline-flex items-center gap-2
                                                   px-4 py-2.5 rounded-xl
                                                   bg-yellow-400
                                                   hover:bg-yellow-500
                                                   text-sm font-bold text-black
                                                   transition"
                                        >
                                            Mulai Jual Properti

                                            <i
                                                data-lucide="arrow-right"
                                                class="w-4 h-4"
                                            ></i>
                                        </a>

                                    </div>

                                    <div
                                        class="absolute -right-12 -bottom-16
                                               w-40 h-40 rounded-full
                                               border-[28px] border-yellow-400/10"
                                    ></div>

                                </div>

                            </div>


                            {{-- SERVICE --}}

                            <div class="col-span-7">

                                <p class="text-xs font-bold uppercase tracking-wider text-yellow-600">
                                    Layanan penjualan
                                </p>

                                <h3 class="text-xl font-bold text-gray-950 mt-1">
                                    Kami bantu prosesnya
                                </h3>


                                <div class="grid grid-cols-3 gap-3 mt-6">

                                    <div class="p-4 rounded-2xl border border-gray-200">

                                        <i
                                            data-lucide="megaphone"
                                            class="w-5 h-5"
                                        ></i>

                                        <h4 class="font-bold text-sm mt-4">
                                            Pemasaran
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                            Properti dipasarkan melalui jaringan kami.
                                        </p>

                                    </div>


                                    <div class="p-4 rounded-2xl border border-gray-200">

                                        <i
                                            data-lucide="handshake"
                                            class="w-5 h-5"
                                        ></i>

                                        <h4 class="font-bold text-sm mt-4">
                                            Pendampingan
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                            Tim membantu proses komunikasi dan transaksi.
                                        </p>

                                    </div>


                                    <div class="p-4 rounded-2xl border border-gray-200">

                                        <i
                                            data-lucide="file-check-2"
                                            class="w-5 h-5"
                                        ></i>

                                        <h4 class="font-bold text-sm mt-4">
                                            Administrasi
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                            Pendampingan dokumen dan proses transaksi.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                KPR
            ================================================== --}}

            <div class="group h-full flex items-center">

                <button
                    type="button"
                    class="h-full flex items-center gap-1.5
                           text-[15px] font-semibold
                           text-gray-900
                           hover:text-yellow-500 transition"
                >
                    KPR

                    <i
                        data-lucide="chevron-down"
                        class="w-4 h-4 transition-transform duration-200
                               group-hover:rotate-180"
                    ></i>
                </button>


                <div
                    class="absolute left-0 top-full w-full
                           bg-white
                           border-t border-gray-100
                           shadow-[0_18px_45px_rgba(0,0,0,0.08)]
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-12 gap-8">

                            {{-- FEATURE TOOLS --}}

                            <div class="col-span-8">

                                <div class="flex items-end justify-between">

                                    <div>

                                        <p class="text-xs font-bold uppercase tracking-wider text-yellow-600">
                                            KPR Prananta
                                        </p>

                                        <h3 class="text-xl font-bold text-gray-950 mt-1">
                                            Siapkan rumah impian Anda
                                        </h3>

                                    </div>

                                    <a
                                        href="#"
                                        class="text-sm font-semibold text-gray-900 hover:text-yellow-500 flex items-center gap-1.5 transition"
                                    >
                                        Semua fitur

                                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                    </a>

                                </div>


                                <div class="grid grid-cols-2 gap-3 mt-5">

                                    {{-- SIMULASI --}}

                                    <a
                                        href="#"
                                        class="group/kpr p-5 rounded-2xl
                                               border border-gray-200
                                               hover:border-yellow-300
                                               hover:bg-yellow-50/50
                                               transition"
                                    >

                                        <div class="flex items-start justify-between">

                                            <div
                                                class="w-11 h-11 rounded-xl
                                                       bg-yellow-100
                                                       flex items-center justify-center"
                                            >
                                                <i
                                                    data-lucide="calculator"
                                                    class="w-5 h-5 text-gray-900"
                                                ></i>
                                            </div>

                                            <i
                                                data-lucide="arrow-up-right"
                                                class="w-4 h-4 text-gray-400
                                                       group-hover/kpr:text-gray-900 transition"
                                            ></i>

                                        </div>

                                        <h4 class="font-bold text-sm mt-5">
                                            Simulasi KPR
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Perkirakan cicilan sesuai harga rumah.
                                        </p>

                                    </a>


                                    {{-- CICILAN --}}

                                    <a
                                        href="#"
                                        class="group/kpr p-5 rounded-2xl
                                               border border-gray-200
                                               hover:border-yellow-300
                                               hover:bg-yellow-50/50
                                               transition"
                                    >

                                        <div class="flex items-start justify-between">

                                            <div
                                                class="w-11 h-11 rounded-xl
                                                       bg-gray-100
                                                       flex items-center justify-center"
                                            >
                                                <i
                                                    data-lucide="wallet"
                                                    class="w-5 h-5"
                                                ></i>
                                            </div>

                                            <i
                                                data-lucide="arrow-up-right"
                                                class="w-4 h-4 text-gray-400
                                                       group-hover/kpr:text-gray-900 transition"
                                            ></i>

                                        </div>

                                        <h4 class="font-bold text-sm mt-5">
                                            Cek Cicilan
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Lihat perkiraan cicilan per bulan.
                                        </p>

                                    </a>


                                    {{-- DP --}}

                                    <a
                                        href="#"
                                        class="group/kpr p-5 rounded-2xl
                                               border border-gray-200
                                               hover:border-yellow-300
                                               hover:bg-yellow-50/50
                                               transition"
                                    >

                                        <div class="flex items-start justify-between">

                                            <div
                                                class="w-11 h-11 rounded-xl
                                                       bg-gray-100
                                                       flex items-center justify-center"
                                            >
                                                <i
                                                    data-lucide="coins"
                                                    class="w-5 h-5"
                                                ></i>
                                            </div>

                                            <i
                                                data-lucide="arrow-up-right"
                                                class="w-4 h-4 text-gray-400
                                                       group-hover/kpr:text-gray-900 transition"
                                            ></i>

                                        </div>

                                        <h4 class="font-bold text-sm mt-5">
                                            Hitung DP
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Perkirakan uang muka rumah.
                                        </p>

                                    </a>


                                    {{-- KEMAMPUAN --}}

                                    <a
                                        href="#"
                                        class="group/kpr p-5 rounded-2xl
                                               border border-gray-200
                                               hover:border-yellow-300
                                               hover:bg-yellow-50/50
                                               transition"
                                    >

                                        <div class="flex items-start justify-between">

                                            <div
                                                class="w-11 h-11 rounded-xl
                                                       bg-gray-100
                                                       flex items-center justify-center"
                                            >
                                                <i
                                                    data-lucide="chart-no-axes-combined"
                                                    class="w-5 h-5"
                                                ></i>
                                            </div>

                                            <i
                                                data-lucide="arrow-up-right"
                                                class="w-4 h-4 text-gray-400
                                                       group-hover/kpr:text-gray-900 transition"
                                            ></i>

                                        </div>

                                        <h4 class="font-bold text-sm mt-5">
                                            Cek Kemampuan
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Sesuaikan pilihan rumah dengan budget.
                                        </p>

                                    </a>

                                </div>

                            </div>


                            {{-- KPR SIDE CTA --}}

                            <div class="col-span-4">

                                <div
                                    class="h-full rounded-3xl
                                           bg-gray-950
                                           p-6 text-white"
                                >

                                    <div
                                        class="w-11 h-11 rounded-2xl
                                               bg-yellow-400
                                               flex items-center justify-center"
                                    >
                                        <i
                                            data-lucide="house"
                                            class="w-5 h-5 text-black"
                                        ></i>
                                    </div>


                                    <h3 class="text-xl font-bold mt-6">
                                        Bingung mulai dari mana?
                                    </h3>

                                    <p class="text-sm text-gray-400 mt-2 leading-relaxed">
                                        Mulai dari simulasi sederhana untuk mengetahui gambaran KPR Anda.
                                    </p>


                                    <a
                                        href="#"
                                        class="mt-6 flex items-center justify-center
                                               h-11 rounded-xl
                                               bg-yellow-400
                                               hover:bg-yellow-500
                                               text-sm font-bold text-black
                                               transition"
                                    >
                                        Mulai Simulasi
                                    </a>


                                    <div class="mt-6 pt-5 border-t border-white/10">

                                        <p class="text-xs font-semibold text-gray-300">
                                            Panduan KPR
                                        </p>

                                        <div class="grid grid-cols-2 gap-3 mt-3">

                                            <a href="#" class="text-xs text-gray-400 hover:text-yellow-400 transition">
                                                Syarat KPR
                                            </a>

                                            <a href="#" class="text-xs text-gray-400 hover:text-yellow-400 transition">
                                                Dokumen
                                            </a>

                                            <a href="#" class="text-xs text-gray-400 hover:text-yellow-400 transition">
                                                Alur Pengajuan
                                            </a>

                                            <a href="#" class="text-xs text-gray-400 hover:text-yellow-400 transition">
                                                Tips KPR
                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- =================================================
                CARI AGEN
            ================================================== --}}

            <div class="group h-full flex items-center">

                <a
                    href="#"
                    class="h-full flex items-center
                           text-[15px] font-semibold
                           text-gray-900
                           hover:text-yellow-500 transition"
                >
                    Cari Agen
                </a>


                <div
                    class="absolute left-0 top-full w-full
                           bg-white
                           border-t border-gray-100
                           shadow-[0_18px_45px_rgba(0,0,0,0.08)]
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-12 gap-8">

                            <div class="col-span-7">

                                <p class="text-xs font-bold uppercase tracking-wider text-yellow-600">
                                    Tim Prananta
                                </p>

                                <h3 class="text-xl font-bold text-gray-950 mt-1">
                                    Butuh bantuan properti?
                                </h3>

                                <p class="text-sm text-gray-500 mt-2">
                                    Temukan agen yang dapat membantu kebutuhan properti Anda di Jember.
                                </p>


                                <div class="mt-6 flex gap-3">

                                    <a
                                        href="#"
                                        class="inline-flex items-center gap-2
                                               px-4 py-3 rounded-xl
                                               bg-gray-950
                                               text-sm font-semibold text-white
                                               hover:bg-gray-800 transition"
                                    >
                                        <i data-lucide="search" class="w-4 h-4"></i>

                                        Cari Agen
                                    </a>

                                    <a
                                        href="#"
                                        class="inline-flex items-center gap-2
                                               px-4 py-3 rounded-xl
                                               border border-gray-200
                                               text-sm font-semibold
                                               hover:border-yellow-300
                                               hover:bg-yellow-50/50
                                               transition"
                                    >
                                        <i data-lucide="users" class="w-4 h-4"></i>

                                        Tim Kami
                                    </a>

                                </div>

                            </div>


                            <div class="col-span-5">

                                <div class="rounded-2xl bg-gray-50 p-6">

                                    <p class="text-xs font-bold uppercase tracking-wider text-gray-400">
                                        Area layanan
                                    </p>

                                    <div class="flex flex-wrap gap-2 mt-4">

                                        <span class="px-3 py-2 rounded-xl bg-white border border-gray-200 text-xs font-medium">
                                            Kaliwates
                                        </span>

                                        <span class="px-3 py-2 rounded-xl bg-white border border-gray-200 text-xs font-medium">
                                            Sumbersari
                                        </span>

                                        <span class="px-3 py-2 rounded-xl bg-white border border-gray-200 text-xs font-medium">
                                            Patrang
                                        </span>

                                        <span class="px-3 py-2 rounded-xl bg-white border border-gray-200 text-xs font-medium">
                                            Ajung
                                        </span>

                                        <span class="px-3 py-2 rounded-xl bg-white border border-gray-200 text-xs font-medium">
                                            Rambipuji
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                PANDUAN
            ================================================== --}}

            <div class="group h-full flex items-center">

                <a
                    href="#"
                    class="h-full flex items-center
                           text-[15px] font-semibold
                           text-gray-900
                           hover:text-yellow-500 transition"
                >
                    Panduan
                </a>


                <div
                    class="absolute left-0 top-full w-full
                           bg-white
                           border-t border-gray-100
                           shadow-[0_18px_45px_rgba(0,0,0,0.08)]
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-12 gap-8">

                            {{-- ARTICLES --}}

                            <div class="col-span-8">

                                <div class="flex items-center justify-between">

                                    <div>

                                        <p class="text-xs font-bold uppercase tracking-wider text-yellow-600">
                                            Pusat informasi
                                        </p>

                                        <h3 class="text-xl font-bold text-gray-950 mt-1">
                                            Panduan properti
                                        </h3>

                                    </div>

                                    <a
                                        href="#"
                                        class="text-sm font-semibold flex items-center gap-1.5 hover:text-yellow-500 transition"
                                    >
                                        Semua panduan

                                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                    </a>

                                </div>


                                <div class="grid grid-cols-2 gap-3 mt-5">

                                    <a
                                        href="#"
                                        class="group/article p-4 rounded-2xl
                                               border border-gray-200
                                               hover:border-yellow-300
                                               transition"
                                    >

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-10 h-10 rounded-xl
                                                       bg-yellow-100
                                                       flex items-center justify-center"
                                            >
                                                <i data-lucide="house" class="w-5 h-5"></i>
                                            </div>

                                            <div>
                                                <h4 class="font-bold text-sm">
                                                    Cara Membeli Rumah
                                                </h4>

                                                <p class="text-xs text-gray-500 mt-1">
                                                    Panduan untuk pembeli
                                                </p>
                                            </div>

                                        </div>

                                    </a>


                                    <a
                                        href="#"
                                        class="group/article p-4 rounded-2xl
                                               border border-gray-200
                                               hover:border-yellow-300
                                               transition"
                                    >

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-10 h-10 rounded-xl
                                                       bg-gray-100
                                                       flex items-center justify-center"
                                            >
                                                <i data-lucide="file-check-2" class="w-5 h-5"></i>
                                            </div>

                                            <div>
                                                <h4 class="font-bold text-sm">
                                                    Cek Legalitas
                                                </h4>

                                                <p class="text-xs text-gray-500 mt-1">
                                                    Dokumen properti
                                                </p>
                                            </div>

                                        </div>

                                    </a>


                                    <a
                                        href="#"
                                        class="group/article p-4 rounded-2xl
                                               border border-gray-200
                                               hover:border-yellow-300
                                               transition"
                                    >

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-10 h-10 rounded-xl
                                                       bg-gray-100
                                                       flex items-center justify-center"
                                            >
                                                <i data-lucide="calculator" class="w-5 h-5"></i>
                                            </div>

                                            <div>
                                                <h4 class="font-bold text-sm">
                                                    Panduan KPR
                                                </h4>

                                                <p class="text-xs text-gray-500 mt-1">
                                                    KPR dari awal sampai pengajuan
                                                </p>
                                            </div>

                                        </div>

                                    </a>


                                    <a
                                        href="#"
                                        class="group/article p-4 rounded-2xl
                                               border border-gray-200
                                               hover:border-yellow-300
                                               transition"
                                    >

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-10 h-10 rounded-xl
                                                       bg-gray-100
                                                       flex items-center justify-center"
                                            >
                                                <i data-lucide="tag" class="w-5 h-5"></i>
                                            </div>

                                            <div>
                                                <h4 class="font-bold text-sm">
                                                    Tips Menjual
                                                </h4>

                                                <p class="text-xs text-gray-500 mt-1">
                                                    Persiapkan properti Anda
                                                </p>
                                            </div>

                                        </div>

                                    </a>

                                </div>

                            </div>


                            {{-- QUICK HELP --}}

                            <div class="col-span-4">

                                <div class="rounded-3xl bg-yellow-400 p-6 h-full">

                                    <div
                                        class="w-10 h-10 rounded-xl
                                               bg-black
                                               flex items-center justify-center"
                                    >
                                        <i
                                            data-lucide="lightbulb"
                                            class="w-5 h-5 text-yellow-400"
                                        ></i>
                                    </div>

                                    <h3 class="text-xl font-bold text-black mt-6">
                                        Belum tahu harus mulai dari mana?
                                    </h3>

                                    <p class="text-sm text-black/60 mt-2 leading-relaxed">
                                        Pelajari langkah dasar sebelum membeli, menjual, atau mengajukan KPR.
                                    </p>

                                    <a
                                        href="#"
                                        class="mt-6 inline-flex items-center gap-2
                                               text-sm font-bold text-black
                                               hover:underline"
                                    >
                                        Baca panduan

                                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                LAINNYA
            ================================================== --}}

            <div class="group h-full flex items-center">

                <button
                    type="button"
                    class="h-full flex items-center gap-1.5
                           text-[15px] font-semibold
                           text-gray-900
                           hover:text-yellow-500 transition"
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
                           bg-white
                           border-t border-gray-100
                           shadow-[0_18px_45px_rgba(0,0,0,0.08)]
                           opacity-0 invisible
                           -translate-y-2
                           group-hover:opacity-100
                           group-hover:visible
                           group-hover:translate-y-0
                           transition-all duration-200"
                >

                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">

                        <div class="grid grid-cols-4 gap-10">

                            {{-- TENTANG --}}

                            <div>

                                <p class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4">
                                    Prananta
                                </p>

                                <div class="space-y-3">

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="building" class="w-4 h-4"></i>
                                        Tentang Kami
                                    </a>

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="users" class="w-4 h-4"></i>
                                        Tim Kami
                                    </a>

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="briefcase" class="w-4 h-4"></i>
                                        Karier
                                    </a>

                                </div>

                            </div>


                            {{-- LAYANAN --}}

                            <div>

                                <p class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4">
                                    Layanan
                                </p>

                                <div class="space-y-3">

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="house-plus" class="w-4 h-4"></i>
                                        Jual Properti
                                    </a>

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="calculator" class="w-4 h-4"></i>
                                        KPR
                                    </a>

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                                        Konsultasi
                                    </a>

                                </div>

                            </div>


                            {{-- BANTUAN --}}

                            <div>

                                <p class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4">
                                    Bantuan
                                </p>

                                <div class="space-y-3">

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="circle-help" class="w-4 h-4"></i>
                                        FAQ
                                    </a>

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="life-buoy" class="w-4 h-4"></i>
                                        Pusat Bantuan
                                    </a>

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="phone" class="w-4 h-4"></i>
                                        Hubungi Kami
                                    </a>

                                </div>

                            </div>


                            {{-- LEGAL --}}

                            <div>

                                <p class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4">
                                    Informasi
                                </p>

                                <div class="space-y-3">

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="shield-check" class="w-4 h-4"></i>
                                        Kebijakan Privasi
                                    </a>

                                    <a href="#" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="file-text" class="w-4 h-4"></i>
                                        Syarat & Ketentuan
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            RIGHT ACTIONS
        ====================================================== --}}

        <div class="ml-auto flex items-center gap-2.5">


            {{-- JUAL PROPERTI --}}

            <a
                href="#"
                class="hidden md:flex items-center gap-2
                       h-10 px-4
                       rounded-xl
                       border border-gray-800
                       text-sm font-semibold text-gray-900
                       hover:bg-gray-50
                       transition"
            >

                <i data-lucide="house-plus" class="w-4 h-4"></i>

                <span>Jual Properti</span>

            </a>


            {{-- FAVORIT --}}

            <button
                type="button"
                class="hidden md:flex
                       w-10 h-10
                       rounded-xl
                       items-center justify-center
                       hover:bg-gray-100
                       transition"
                aria-label="Properti tersimpan"
            >

                <i data-lucide="heart" class="w-5 h-5"></i>

            </button>


            {{-- MASUK --}}

            <a
                href="#"
                class="hidden md:flex
                       h-10 px-5
                       rounded-xl
                       bg-yellow-400
                       hover:bg-yellow-500
                       items-center justify-center
                       text-sm font-bold text-black
                       transition"
            >
                Masuk
            </a>


            {{-- MOBILE MENU --}}

            <button
                type="button"
                @click="open = !open"
                class="lg:hidden
                       w-10 h-10
                       rounded-xl
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


    {{-- =========================================================
        MOBILE MENU
    ========================================================== --}}

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
               shadow-xl z-50"
    >

        <div class="px-5 py-5 max-h-[calc(100vh-88px)] overflow-y-auto">

            <div class="space-y-1">


                {{-- BERANDA --}}

                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center justify-between
                           px-4 py-3.5 rounded-xl
                           text-sm font-semibold
                           text-gray-900
                           hover:bg-gray-50 transition"
                >
                    Beranda

                    <i data-lucide="arrow-up-right" class="w-4 h-4 text-gray-400"></i>
                </a>


                {{-- PROPERTI --}}

                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center justify-between
                           px-4 py-3.5 rounded-xl
                           text-sm font-semibold
                           text-gray-900
                           hover:bg-gray-50 transition"
                >
                    Properti

                    <i data-lucide="arrow-up-right" class="w-4 h-4 text-gray-400"></i>
                </a>


                {{-- KPR --}}

                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center gap-3
                           px-4 py-3.5 rounded-xl
                           text-sm font-semibold
                           text-gray-900
                           hover:bg-yellow-50 transition"
                >

                    <span
                        class="w-8 h-8 rounded-lg
                               bg-yellow-100
                               flex items-center justify-center"
                    >
                        <i data-lucide="calculator" class="w-4 h-4"></i>
                    </span>

                    KPR

                </a>


                {{-- PROYEK --}}

                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center gap-3
                           px-4 py-3.5 rounded-xl
                           text-sm font-semibold
                           text-gray-900
                           hover:bg-gray-50 transition"
                >

                    <span
                        class="w-8 h-8 rounded-lg
                               bg-gray-100
                               flex items-center justify-center"
                    >
                        <i data-lucide="building-2" class="w-4 h-4"></i>
                    </span>

                    Proyek Baru

                </a>


                {{-- CARI AGEN --}}

                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center gap-3
                           px-4 py-3.5 rounded-xl
                           text-sm font-semibold
                           text-gray-900
                           hover:bg-gray-50 transition"
                >

                    <span
                        class="w-8 h-8 rounded-lg
                               bg-gray-100
                               flex items-center justify-center"
                    >
                        <i data-lucide="users" class="w-4 h-4"></i>
                    </span>

                    Cari Agen

                </a>


                {{-- PANDUAN --}}

                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center gap-3
                           px-4 py-3.5 rounded-xl
                           text-sm font-semibold
                           text-gray-900
                           hover:bg-gray-50 transition"
                >

                    <span
                        class="w-8 h-8 rounded-lg
                               bg-gray-100
                               flex items-center justify-center"
                    >
                        <i data-lucide="book-open" class="w-4 h-4"></i>
                    </span>

                    Panduan

                </a>


                <div class="my-3 border-t border-gray-100"></div>


                {{-- JUAL PROPERTI --}}

                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center gap-3
                           px-4 py-3.5 rounded-xl
                           text-sm font-semibold
                           text-gray-900
                           hover:bg-gray-50 transition"
                >

                    <span
                        class="w-9 h-9 rounded-xl
                               bg-gray-950
                               flex items-center justify-center"
                    >
                        <i
                            data-lucide="house-plus"
                            class="w-4 h-4 text-white"
                        ></i>
                    </span>

                    <span>
                        <span class="block">
                            Jual Properti
                        </span>

                        <span class="block text-xs font-normal text-gray-500 mt-0.5">
                            Pasarkan properti Anda
                        </span>
                    </span>

                </a>


                {{-- FAVORIT --}}

                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center gap-3
                           px-4 py-3.5 rounded-xl
                           text-sm font-semibold
                           text-gray-900
                           hover:bg-gray-50 transition"
                >

                    <span
                        class="w-9 h-9 rounded-xl
                               bg-gray-100
                               flex items-center justify-center"
                    >
                        <i data-lucide="heart" class="w-4 h-4"></i>
                    </span>

                    Properti Tersimpan

                </a>


                {{-- TENTANG --}}

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3.5 block rounded-xl
                           text-sm font-medium
                           text-gray-600
                           hover:bg-gray-50 transition"
                >
                    Tentang Kami
                </a>


                {{-- KONTAK --}}

                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3.5 block rounded-xl
                           text-sm font-medium
                           text-gray-600
                           hover:bg-gray-50 transition"
                >
                    Hubungi Kami
                </a>


                {{-- LOGIN --}}

                <a
                    href="#"
                    @click="open = false"
                    class="mt-3 h-12 rounded-xl
                           bg-yellow-400
                           hover:bg-yellow-500
                           flex items-center justify-center
                           text-sm font-bold text-black
                           transition"
                >
                    Masuk
                </a>

            </div>

        </div>

    </div>

</nav>
