<nav
    x-data="{ open: false }"
    class="relative w-full bg-white border-b border-gray-200 z-50"
    >

    {{-- =========================================================
        MAIN NAVBAR
    ========================================================== --}}

    <div class="max-w-[1440px] mx-auto h-[88px] px-6 lg:px-10 flex items-center">

        {{-- LOGO --}}
        <a
            href="{{ route('home') }}"
            class="flex items-center shrink-0"
        >
            <div class="flex items-center gap-2.5">
                <div class="w-10 h-10 rounded-xl bg-yellow-400 flex items-center justify-center shadow-sm">
                    <span class="text-black font-black text-xl">P</span>
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

            {{-- BELI --}}
            <div class="group h-full flex items-center">
                <a href="{{ route('properties.sale') }}" class="h-full flex items-center gap-1.5 text-[15px] font-semibold text-gray-900 hover:text-yellow-500 transition">
                    Beli
                    <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"></i>
                </a>

                <div class="absolute left-0 top-full w-full bg-white border-t border-gray-100 shadow-[0_18px_45px_rgba(0,0,0,0.08)] opacity-0 invisible -translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200">
                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">
                        <div class="grid grid-cols-12 gap-8">
                            {{-- KOLOM KIRI: KATEGORI PROPERTI (8/12) --}}
                            <div class="col-span-8">
                                <div class="flex items-center justify-between mb-5">
                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-wider text-yellow-600">Katalog Properti</p>
                                        <h3 class="text-xl font-bold text-gray-950 mt-1">Pilih jenis properti yang Anda butuhkan</h3>
                                    </div>
                                    <a href="{{ route('properties.sale') }}" class="text-sm font-semibold text-gray-900 hover:text-yellow-500 flex items-center gap-1.5 transition">
                                        Lihat Semua <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                    </a>
                                </div>

                                <div class="grid grid-cols-4 gap-3">
                                    <a href="{{ route('properties.sale', ['type' => 1]) }}" class="group/card p-4 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <div class="w-11 h-11 rounded-xl bg-gray-100 group-hover/card:bg-yellow-100 flex items-center justify-center transition">
                                            <i data-lucide="house" class="w-5 h-5 text-gray-800"></i>
                                        </div>
                                        <h4 class="mt-4 font-bold text-sm text-gray-950">Rumah</h4>
                                        <p class="mt-1 text-xs text-gray-500 leading-relaxed">Rumah baru, second, dan keluarga</p>
                                    </a>
                                    <a href="{{ route('properties.sale', ['type' => 2]) }}" class="group/card p-4 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <div class="w-11 h-11 rounded-xl bg-gray-100 group-hover/card:bg-yellow-100 flex items-center justify-center transition">
                                            <i data-lucide="map" class="w-5 h-5 text-gray-800"></i>
                                        </div>
                                        <h4 class="mt-4 font-bold text-sm text-gray-950">Tanah</h4>
                                        <p class="mt-1 text-xs text-gray-500 leading-relaxed">Kavling siap bangun & investasi</p>
                                    </a>
                                    <a href="{{ route('properties.sale', ['type' => 3]) }}" class="group/card p-4 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <div class="w-11 h-11 rounded-xl bg-gray-100 group-hover/card:bg-yellow-100 flex items-center justify-center transition">
                                            <i data-lucide="store" class="w-5 h-5 text-gray-800"></i>
                                        </div>
                                        <h4 class="mt-4 font-bold text-sm text-gray-950">Ruko</h4>
                                        <p class="mt-1 text-xs text-gray-500 leading-relaxed">Tempat usaha strategis & ramai</p>
                                    </a>
                                    <a href="{{ route('properties.sale', ['type' => 4]) }}" class="group/card p-4 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <div class="w-11 h-11 rounded-xl bg-gray-100 group-hover/card:bg-yellow-100 flex items-center justify-center transition">
                                            <i data-lucide="building-2" class="w-5 h-5 text-gray-800"></i>
                                        </div>
                                        <h4 class="mt-4 font-bold text-sm text-gray-950">Apartemen</h4>
                                        <p class="mt-1 text-xs text-gray-500 leading-relaxed">Hunian vertikal modern & aman</p>
                                    </a>
                                </div>
                            </div>

                            {{-- KOLOM KANAN: QUICK BUDGET (4/12) --}}
                            <div class="col-span-4">
                                <div class="h-full rounded-3xl bg-gray-950 p-6 text-white relative overflow-hidden">
                                    <div class="relative z-10">
                                        <div class="w-11 h-11 rounded-2xl bg-yellow-400 flex items-center justify-center">
                                            <i data-lucide="wallet" class="w-5 h-5 text-black"></i>
                                        </div>
                                        <h3 class="text-xl font-bold mt-5">Sesuaikan Budget</h3>
                                        <p class="text-sm text-gray-400 mt-2 leading-relaxed">Filter cepat berdasarkan perkiraan harga properti.</p>
                                        <div class="flex flex-wrap gap-2 mt-5">
                                            <a href="{{ route('properties.sale', ['max_price' => 500000000]) }}" class="px-3 py-2 rounded-xl bg-white/10 text-xs font-semibold text-white hover:bg-white/20 transition border border-white/10">&lt; 500 Juta</a>
                                            <a href="{{ route('properties.sale', ['max_price' => 1000000000]) }}" class="px-3 py-2 rounded-xl bg-white/10 text-xs font-semibold text-white hover:bg-white/20 transition border border-white/10">500 Jt - 1 M</a>
                                            <a href="{{ route('properties.sale', ['min_price' => 1000000000]) }}" class="px-3 py-2 rounded-xl bg-white/10 text-xs font-semibold text-white hover:bg-white/20 transition border border-white/10">&gt; 1 Miliar</a>
                                        </div>
                                        <a href="{{ route('properties.sale') }}" class="mt-7 flex items-center justify-center h-11 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-sm font-bold text-black transition shadow-lg">Mulai Pencarian</a>
                                    </div>
                                    <div class="absolute -right-12 -bottom-16 w-40 h-40 rounded-full border-[28px] border-yellow-400/10"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SEWA --}}
            <div class="group h-full flex items-center">
                <button type="button" class="h-full flex items-center gap-1.5 text-[15px] font-semibold text-gray-900 hover:text-yellow-500 transition">
                    Sewa <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div class="absolute left-0 top-full w-full bg-white border-t border-gray-100 shadow-[0_18px_45px_rgba(0,0,0,0.08)] opacity-0 invisible -translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200">
                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">
                        <div class="grid grid-cols-12 gap-8">
                            <div class="col-span-7">
                                <p class="text-xs font-bold uppercase tracking-wider text-yellow-600">Properti sewa</p>
                                <h3 class="text-xl font-bold text-gray-950 mt-1">Temukan tempat untuk tinggal</h3>
                                <div class="grid grid-cols-3 gap-3 mt-6">
                                    <a href="{{ route('properties.rent') }}" class="p-4 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <i data-lucide="house" class="w-5 h-5"></i>
                                        <h4 class="font-bold text-sm mt-4">Rumah</h4>
                                        <p class="text-xs text-gray-500 mt-1">Tahunan & bulanan</p>
                                    </a>
                                    <a href="{{ route('properties.rent') }}" class="p-4 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <i data-lucide="building-2" class="w-5 h-5"></i>
                                        <h4 class="font-bold text-sm mt-4">Kos</h4>
                                        <p class="text-xs text-gray-500 mt-1">Putra, putri & keluarga</p>
                                    </a>
                                    <a href="{{ route('properties.rent') }}" class="p-4 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <i data-lucide="home" class="w-5 h-5"></i>
                                        <h4 class="font-bold text-sm mt-4">Hunian</h4>
                                        <p class="text-xs text-gray-500 mt-1">Pilihan untuk keluarga</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-span-5">
                                <div class="rounded-2xl bg-gray-50 p-6">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Area populer</p>
                                            <h4 class="font-bold text-gray-950 mt-1">Sewa di Jember</h4>
                                        </div>
                                        <i data-lucide="map-pin" class="w-5 h-5 text-yellow-500"></i>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3 mt-5">
                                        <a href="{{ route('properties.rent') }}" class="px-3 py-2.5 rounded-xl bg-white border border-gray-200 text-sm font-medium hover:border-yellow-300 transition">Kaliwates</a>
                                        <a href="{{ route('properties.rent') }}" class="px-3 py-2.5 rounded-xl bg-white border border-gray-200 text-sm font-medium hover:border-yellow-300 transition">Sumbersari</a>
                                        <a href="{{ route('properties.rent') }}" class="px-3 py-2.5 rounded-xl bg-white border border-gray-200 text-sm font-medium hover:border-yellow-300 transition">Patrang</a>
                                        <a href="{{ route('properties.rent') }}" class="px-3 py-2.5 rounded-xl bg-white border border-gray-200 text-sm font-medium hover:border-yellow-300 transition">Rambipuji</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- JUAL --}}
            <div class="group h-full flex items-center">
                <button type="button" class="h-full flex items-center gap-1.5 text-[15px] font-semibold text-gray-900 hover:text-yellow-500 transition">
                    Jual <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div class="absolute left-0 top-full w-full bg-white border-t border-gray-100 shadow-[0_18px_45px_rgba(0,0,0,0.08)] opacity-0 invisible -translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200">
                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">
                        <div class="grid grid-cols-12 gap-8">
                            <div class="col-span-5">
                                <div class="relative overflow-hidden rounded-3xl bg-gray-950 p-7 text-white">
                                    <div class="relative z-10">
                                        <div class="w-11 h-11 rounded-2xl bg-yellow-400 flex items-center justify-center">
                                            <i data-lucide="house-plus" class="w-5 h-5 text-black"></i>
                                        </div>
                                        <h3 class="text-2xl font-bold mt-6">Mau jual properti?</h3>
                                        <p class="text-sm text-gray-400 mt-2 leading-relaxed">Serahkan pemasaran properti Anda kepada tim Prananta Property.</p>
                                        <a href="{{ route('page.coming-soon', 'jual-properti') }}" class="mt-6 inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-sm font-bold text-black transition">
                                            Mulai Jual Properti <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                        </a>
                                    </div>
                                    <div class="absolute -right-12 -bottom-16 w-40 h-40 rounded-full border-[28px] border-yellow-400/10"></div>
                                </div>
                            </div>
                            <div class="col-span-7">
                                <p class="text-xs font-bold uppercase tracking-wider text-yellow-600">Layanan penjualan</p>
                                <h3 class="text-xl font-bold text-gray-950 mt-1">Kami bantu prosesnya</h3>
                                <div class="grid grid-cols-3 gap-3 mt-6">
                                    <div class="p-4 rounded-2xl border border-gray-200">
                                        <i data-lucide="megaphone" class="w-5 h-5"></i>
                                        <h4 class="font-bold text-sm mt-4">Pemasaran</h4>
                                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">Properti dipasarkan melalui jaringan kami.</p>
                                    </div>
                                    <div class="p-4 rounded-2xl border border-gray-200">
                                        <i data-lucide="handshake" class="w-5 h-5"></i>
                                        <h4 class="font-bold text-sm mt-4">Pendampingan</h4>
                                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">Tim membantu proses komunikasi dan transaksi.</p>
                                    </div>
                                    <div class="p-4 rounded-2xl border border-gray-200">
                                        <i data-lucide="file-check-2" class="w-5 h-5"></i>
                                        <h4 class="font-bold text-sm mt-4">Administrasi</h4>
                                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">Pendampingan dokumen dan proses transaksi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KPR --}}
            <div class="group h-full flex items-center">
                <button type="button" class="h-full flex items-center gap-1.5 text-[15px] font-semibold text-gray-900 hover:text-yellow-500 transition">
                    KPR <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div class="absolute left-0 top-full w-full bg-white border-t border-gray-100 shadow-[0_18px_45px_rgba(0,0,0,0.08)] opacity-0 invisible -translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200">
                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">
                        <div class="grid grid-cols-12 gap-8">
                            <div class="col-span-8">
                                <div class="flex items-end justify-between">
                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-wider text-yellow-600">KPR Prananta</p>
                                        <h3 class="text-xl font-bold text-gray-950 mt-1">Siapkan rumah impian Anda</h3>
                                    </div>
                                    <a href="{{ route('kpr.index') }}" class="text-sm font-semibold text-gray-900 hover:text-yellow-500 flex items-center gap-1.5 transition">
                                        Semua fitur <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                    </a>
                                </div>
                                <div class="grid grid-cols-2 gap-3 mt-5">
                                    <a href="{{ route('kpr.index') }}" class="group/kpr p-5 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <div class="flex items-start justify-between">
                                            <div class="w-11 h-11 rounded-xl bg-yellow-100 flex items-center justify-center">
                                                <i data-lucide="calculator" class="w-5 h-5 text-gray-900"></i>
                                            </div>
                                            <i data-lucide="arrow-up-right" class="w-4 h-4 text-gray-400 group-hover/kpr:text-gray-900 transition"></i>
                                        </div>
                                        <h4 class="font-bold text-sm mt-5">Simulasi KPR</h4>
                                        <p class="text-xs text-gray-500 mt-1">Perkirakan cicilan sesuai harga rumah.</p>
                                    </a>
                                    <a href="{{ route('kpr.index') }}" class="group/kpr p-5 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <div class="flex items-start justify-between">
                                            <div class="w-11 h-11 rounded-xl bg-gray-100 flex items-center justify-center">
                                                <i data-lucide="wallet" class="w-5 h-5"></i>
                                            </div>
                                            <i data-lucide="arrow-up-right" class="w-4 h-4 text-gray-400 group-hover/kpr:text-gray-900 transition"></i>
                                        </div>
                                        <h4 class="font-bold text-sm mt-5">Cek Cicilan</h4>
                                        <p class="text-xs text-gray-500 mt-1">Lihat perkiraan cicilan per bulan.</p>
                                    </a>
                                    <a href="{{ route('kpr.index') }}" class="group/kpr p-5 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <div class="flex items-start justify-between">
                                            <div class="w-11 h-11 rounded-xl bg-gray-100 flex items-center justify-center">
                                                <i data-lucide="coins" class="w-5 h-5"></i>
                                            </div>
                                            <i data-lucide="arrow-up-right" class="w-4 h-4 text-gray-400 group-hover/kpr:text-gray-900 transition"></i>
                                        </div>
                                        <h4 class="font-bold text-sm mt-5">Hitung DP</h4>
                                        <p class="text-xs text-gray-500 mt-1">Perkirakan uang muka rumah.</p>
                                    </a>
                                    <a href="{{ route('kpr.index') }}" class="group/kpr p-5 rounded-2xl border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50/50 transition">
                                        <div class="flex items-start justify-between">
                                            <div class="w-11 h-11 rounded-xl bg-gray-100 flex items-center justify-center">
                                                <i data-lucide="chart-no-axes-combined" class="w-5 h-5"></i>
                                            </div>
                                            <i data-lucide="arrow-up-right" class="w-4 h-4 text-gray-400 group-hover/kpr:text-gray-900 transition"></i>
                                        </div>
                                        <h4 class="font-bold text-sm mt-5">Cek Kemampuan</h4>
                                        <p class="text-xs text-gray-500 mt-1">Sesuaikan pilihan rumah dengan budget.</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-span-4">
                                <div class="h-full rounded-3xl bg-gray-950 p-6 text-white">
                                    <div class="w-11 h-11 rounded-2xl bg-yellow-400 flex items-center justify-center">
                                        <i data-lucide="house" class="w-5 h-5 text-black"></i>
                                    </div>
                                    <h3 class="text-xl font-bold mt-6">Bingung mulai dari mana?</h3>
                                    <p class="text-sm text-gray-400 mt-2 leading-relaxed">Mulai dari simulasi sederhana untuk mengetahui gambaran KPR Anda.</p>
                                    <a href="{{ route('kpr.index') }}" class="mt-6 flex items-center justify-center h-11 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-sm font-bold text-black transition">Mulai Simulasi</a>
                                    <div class="mt-6 pt-5 border-t border-white/10">
                                        <p class="text-xs font-semibold text-gray-300">Panduan KPR</p>
                                        <div class="grid grid-cols-2 gap-3 mt-3">
                                            <a href="{{ route('page.coming-soon', 'syarat-kpr') }}" class="text-xs text-gray-400 hover:text-yellow-400 transition">Syarat KPR</a>
                                            <a href="{{ route('page.coming-soon', 'dokumen-kpr') }}" class="text-xs text-gray-400 hover:text-yellow-400 transition">Dokumen</a>
                                            <a href="{{ route('page.coming-soon', 'alur-pengajuan-kpr') }}" class="text-xs text-gray-400 hover:text-yellow-400 transition">Alur Pengajuan</a>
                                            <a href="{{ route('page.coming-soon', 'tips-kpr') }}" class="text-xs text-gray-400 hover:text-yellow-400 transition">Tips KPR</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CARI AGEN --}}
            <a href="{{ route('agents.index') }}" class="h-full flex items-center text-[15px] font-semibold text-gray-900 hover:text-yellow-500 transition">
                Cari Agen
            </a>

            {{-- PANDUAN --}}
            <div class="group h-full flex items-center">
                <a href="{{ route('page.coming-soon', 'panduan') }}" class="h-full flex items-center text-[15px] font-semibold text-gray-900 hover:text-yellow-500 transition">
                    Panduan
                </a>
            </div>

            {{-- LAINNYA --}}
            <div class="group h-full flex items-center">
                <button type="button" class="h-full flex items-center gap-1.5 text-[15px] font-semibold text-gray-900 hover:text-yellow-500 transition">
                    Lainnya <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div class="absolute left-0 top-full w-full bg-white border-t border-gray-100 shadow-[0_18px_45px_rgba(0,0,0,0.08)] opacity-0 invisible -translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200">
                    <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-8">
                        <div class="grid grid-cols-4 gap-10">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4">Prananta</p>
                                <div class="space-y-3">
                                    <a href="{{ route('company.profile') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="building" class="w-4 h-4"></i> Company Profile
                                    </a>
                                    <a href="{{ route('page.coming-soon', 'tim-kami') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="users" class="w-4 h-4"></i> Tim Kami
                                    </a>
                                    <a href="{{ route('page.coming-soon', 'karier') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="briefcase" class="w-4 h-4"></i> Karier
                                    </a>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4">Layanan</p>
                                <div class="space-y-3">
                                    <a href="{{ route('page.coming-soon', 'jual-properti') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="house-plus" class="w-4 h-4"></i> Jual Properti
                                    </a>
                                    <a href="{{ route('kpr.index') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="calculator" class="w-4 h-4"></i> KPR
                                    </a>
                                    <a href="{{ route('page.coming-soon', 'konsultasi') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="message-circle" class="w-4 h-4"></i> Konsultasi
                                    </a>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4">Bantuan</p>
                                <div class="space-y-3">
                                    <a href="{{ route('page.coming-soon', 'faq') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="circle-help" class="w-4 h-4"></i> FAQ
                                    </a>
                                    <a href="{{ route('page.coming-soon', 'pusat-bantuan') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="life-buoy" class="w-4 h-4"></i> Pusat Bantuan
                                    </a>
                                    <a href="{{ route('page.coming-soon', 'hubungi-kami') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="phone" class="w-4 h-4"></i> Hubungi Kami
                                    </a>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4">Informasi</p>
                                <div class="space-y-3">
                                    <a href="{{ route('page.coming-soon', 'kebijakan-privasi') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="shield-check" class="w-4 h-4"></i> Kebijakan Privasi
                                    </a>
                                    <a href="{{ route('page.coming-soon', 'syarat-ketentuan') }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-gray-950 transition">
                                        <i data-lucide="file-text" class="w-4 h-4"></i> Syarat & Ketentuan
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
            <a href="{{ route('page.coming-soon', 'jual-properti') }}" class="hidden md:flex items-center gap-2 h-10 px-4 rounded-xl border border-gray-800 text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                <i data-lucide="house-plus" class="w-4 h-4"></i>
                <span>Jual Properti</span>
            </a>

            <button type="button" class="hidden md:flex w-10 h-10 rounded-xl items-center justify-center hover:bg-gray-100 transition" aria-label="Properti tersimpan">
                <i data-lucide="heart" class="w-5 h-5"></i>
            </button>

            <a href="{{ route('page.coming-soon', 'login') }}" class="hidden md:flex h-10 px-5 rounded-xl bg-yellow-400 hover:bg-yellow-500 items-center justify-center text-sm font-bold text-black transition">
                Masuk
            </a>

            {{-- MOBILE MENU TOGGLE --}}
            <button type="button" @click="open = !open" class="lg:hidden w-10 h-10 rounded-xl hover:bg-gray-100 flex items-center justify-center transition" aria-label="Buka menu" :aria-expanded="open">
                <span x-show="!open" x-cloak><i data-lucide="menu" class="w-5 h-5"></i></span>
                <span x-show="open" x-cloak><i data-lucide="x" class="w-5 h-5"></i></span>
            </button>
        </div>
    </div>

    {{-- =========================================================
        MOBILE MENU (DIPERBAIKI & DIPERLENGKAP)
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
        class="lg:hidden absolute left-0 right-0 top-full bg-white border-t border-gray-100 shadow-xl z-50"
    >
        {{-- Scrollable Container --}}
        <div class="px-5 py-5 max-h-[calc(100vh-88px)] overflow-y-auto">
            <div class="space-y-1">

                <a href="{{ route('home') }}" @click="open = false" class="flex items-center justify-between px-4 py-3.5 rounded-xl text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                    Beranda <i data-lucide="arrow-up-right" class="w-4 h-4 text-gray-400"></i>
                </a>

                {{-- Beli --}}
                <a href="{{ route('properties.sale') }}" @click="open = false" class="flex items-center justify-between px-4 py-3.5 rounded-xl text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                    Beli Properti <i data-lucide="arrow-up-right" class="w-4 h-4 text-gray-400"></i>
                </a>

                {{-- Sewa --}}
                <a href="{{ route('properties.rent') }}" @click="open = false" class="flex items-center justify-between px-4 py-3.5 rounded-xl text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                    Sewa Properti <i data-lucide="arrow-up-right" class="w-4 h-4 text-gray-400"></i>
                </a>

                {{-- Jual --}}
                <a href="{{ route('page.coming-soon', 'jual-properti') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                    <span class="w-8 h-8 rounded-lg bg-gray-950 flex items-center justify-center">
                        <i data-lucide="house-plus" class="w-4 h-4 text-white"></i>
                    </span>
                    Jual Properti
                </a>

                {{-- KPR --}}
                <a href="{{ route('kpr.index') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold text-gray-900 hover:bg-yellow-50 transition">
                    <span class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center">
                        <i data-lucide="calculator" class="w-4 h-4"></i>
                    </span>
                    KPR & Simulasi
                </a>

                {{-- Cari Agen --}}
                <a href="{{ route('agents.index') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                        <i data-lucide="users" class="w-4 h-4"></i>
                    </span>
                    Cari Agen
                </a>

                {{-- Panduan --}}
                <a href="{{ route('page.coming-soon', 'panduan') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                        <i data-lucide="book-open" class="w-4 h-4"></i>
                    </span>
                    Panduan
                </a>

                <div class="my-3 border-t border-gray-100"></div>

                {{-- Menu Lainnya --}}
                <a href="{{ route('company.profile') }}" @click="open = false" class="px-4 py-3.5 block rounded-xl text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                    Tentang Kami
                </a>
                <a href="{{ route('page.coming-soon', 'karier') }}" @click="open = false" class="px-4 py-3.5 block rounded-xl text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                    Karier
                </a>
                <a href="{{ route('page.coming-soon', 'hubungi-kami') }}" @click="open = false" class="px-4 py-3.5 block rounded-xl text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                    Hubungi Kami
                </a>

                {{-- Favorit --}}
                <a href="{{ route('page.coming-soon', 'favorit') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold text-gray-900 hover:bg-gray-50 transition">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                        <i data-lucide="heart" class="w-4 h-4"></i>
                    </span>
                    Properti Tersimpan
                </a>

                <div class="my-3 border-t border-gray-100"></div>

                {{-- Login --}}
                <a href="{{ route('page.coming-soon', 'login') }}" @click="open = false" class="mt-2 h-12 rounded-xl bg-yellow-400 hover:bg-yellow-500 flex items-center justify-center text-sm font-bold text-black transition">
                    Masuk / Daftar
                </a>

            </div>
        </div>
    </div>

</nav>
