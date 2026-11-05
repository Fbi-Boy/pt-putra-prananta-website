@php
    $email  = config('company.email', 'info@putra.com');
    $phone  = config('company.phone', '+62 812 3456 7890');
    $alamat = config('company.address', 'Jember, Jawa Timur, Indonesia');
    $wa     = preg_replace('/\D/', '', $phone);

    $kolom = [
        'Perusahaan' => [['Tentang Kami', '#'], ['Produk & Layanan', '#'], ['Partner', '#'], ['Karir', '#'], ['Pressroom', '#']],
        'Layanan'    => [['Iklankan Properti', '#'], ['KPR', '#'], ['Kalkulator KPR', '#'], ['Cari Agen', '#']],
        'Dukungan'   => [['FAQ', '#'], ['Kebijakan Privasi', '#'], ['Syarat Penggunaan', '#'], ['Syarat Agen', '#']],
    ];

    // Sebagian kecamatan Jember saja (31 total, sisanya lewat tautan "Lihat semua")
    $kecamatan = ['Kaliwates', 'Sumbersari', 'Patrang', 'Ajung', 'Ambulu', 'Rambipuji', 'Tanggul', 'Wuluhan'];

    // Logo sosial media (SVG langsung, tidak bergantung versi Lucide)
    $sosial = [
        ['Instagram', '<rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>'],
        ['Facebook',  '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>'],
        ['YouTube',   '<path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/>'],
        ['LinkedIn',  '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>'],
    ];
    $ring = 'focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-400/50';
@endphp

<footer class="relative isolate overflow-hidden bg-stone-950 text-stone-300 [font-family:Outfit,ui-sans-serif,system-ui,sans-serif]">

    {{-- ===== EFEK LATAR (tanpa lingkaran) ===== --}}
    {{-- Grid garis halus yang memudar ke bawah --}}
    <div class="absolute inset-0 -z-10 [background-image:linear-gradient(rgba(255,255,255,0.055)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.055)_1px,transparent_1px)] [background-size:56px_56px]
                [-webkit-mask-image:linear-gradient(to_bottom,#000_0%,transparent_70%)] [mask-image:linear-gradient(to_bottom,#000_0%,transparent_70%)]" aria-hidden="true"></div>
    {{-- Berkas cahaya oranye dari atas --}}
    <div class="absolute -top-20 left-1/2 -translate-x-1/2 w-[80rem] max-w-none h-[36rem] -z-10 blur-2xl opacity-90
                [background:conic-gradient(from_180deg_at_50%_0%,transparent_30%,rgba(249,115,22,0.34)_50%,transparent_70%)]" aria-hidden="true"></div>
    {{-- Cahaya hangat dari bawah --}}
    <div class="absolute inset-x-0 bottom-0 h-2/5 -z-10 bg-gradient-to-t from-orange-700/20 to-transparent" aria-hidden="true"></div>
    {{-- Garis cahaya tepi atas --}}
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-orange-400 to-transparent" aria-hidden="true"></div>

    <div class="max-w-6xl mx-auto px-5 sm:px-6">

        {{-- ============ 1. JUDUL + NEWSLETTER ============ --}}
        <div class="pt-12 md:pt-24 pb-10 md:pb-12 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 lg:items-end">
            <h2 class="lg:col-span-7 text-[2rem] sm:text-5xl md:text-6xl font-medium tracking-tight leading-[1.1] text-white">
                Temukan rumah<br><span class="text-orange-400">yang terasa pulang.</span>
            </h2>

            <div class="lg:col-span-5 rounded-3xl bg-white/[0.04] ring-1 ring-white/10 p-5 sm:p-6">
                <div class="flex items-start gap-3">
                    <span class="w-10 h-10 rounded-xl bg-orange-500/15 text-orange-400 flex items-center justify-center shrink-0">
                        <i data-lucide="bell-ring" class="w-5 h-5"></i>
                    </span>
                    <div>
                        <p class="text-sm font-semibold text-white">Info listing terbaru</p>
                        <p class="mt-0.5 text-xs text-stone-400">Properti baru dan tips KPR, langsung ke email Anda.</p>
                    </div>
                </div>

                <form action="#" method="post" class="mt-4 flex items-center gap-2 rounded-2xl bg-stone-950/80 ring-1 ring-white/15 p-1.5 focus-within:ring-2 focus-within:ring-orange-400 transition">
                    @csrf
                    <label for="ft-email" class="sr-only">Alamat email</label>
                    <i data-lucide="mail" class="w-4 h-4 ml-3 text-stone-500 shrink-0"></i>
                    <input id="ft-email" type="email" name="email" required placeholder="Email Anda" autocomplete="email"
                           class="flex-1 min-w-0 h-11 bg-transparent text-sm text-white placeholder:text-stone-500 focus:outline-none">
                    <button type="submit" aria-label="Berlangganan"
                            class="h-11 w-11 sm:w-auto sm:px-5 shrink-0 rounded-xl bg-orange-500 text-sm font-semibold text-white inline-flex items-center justify-center gap-2 hover:bg-orange-400 transition {{ $ring }}">
                        <span class="hidden sm:inline">Berlangganan</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        </div>

        {{-- ============ 2. BRAND + TAUTAN + KARTU KONTAK ============ --}}
        <div class="py-10 md:py-12 border-t border-white/10 grid grid-cols-3 lg:grid-cols-12 gap-x-4 sm:gap-x-8 gap-y-9">

            <div class="col-span-3 lg:col-span-3">
                <a href="/" class="inline-flex items-center gap-3">
                    <span class="w-11 h-11 rounded-xl bg-orange-500 text-white text-xl font-bold flex items-center justify-center">P</span>
                    <span class="leading-none">
                        <span class="block text-2xl font-bold tracking-tight text-white">Putra</span>
                        <span class="block mt-1 text-[10px] tracking-[0.25em] text-stone-500">PRANANTA PROPERTY</span>
                    </span>
                </a>
                <p class="mt-4 text-sm leading-relaxed text-stone-400 max-w-xs">Beli, jual, sewa, dan KPR properti dengan data akurat dan pendampingan yang jujur.</p>

                {{-- Sosial media --}}
                <div class="mt-5 flex items-center gap-2.5">
                    @foreach ($sosial as [$nama, $svg])
                        <a href="#" aria-label="{{ $nama }}"
                           class="w-11 h-11 rounded-xl bg-white/5 ring-1 ring-white/10 flex items-center justify-center text-stone-200 hover:bg-orange-500 hover:text-white hover:ring-orange-500 hover:-translate-y-0.5 transition {{ $ring }}">
                            <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $svg !!}</svg>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- 3 kolom tetap sebaris di HP --}}
            @foreach ($kolom as $judul => $links)
                <nav class="col-span-1 lg:col-span-2 {{ $loop->first ? 'lg:col-start-4' : '' }}" aria-label="{{ $judul }}">
                    <h3 class="text-sm font-semibold text-white">{{ $judul }}</h3>
                    <ul class="mt-3 md:mt-4 space-y-2.5 md:space-y-3">
                        @foreach ($links as [$label, $url])
                            <li>
                                <a href="{{ $url }}" class="group inline-flex items-center gap-1 text-[13px] sm:text-sm leading-snug text-stone-400 hover:text-white transition">
                                    <span class="hidden lg:block w-0 h-px bg-orange-400 group-hover:w-3 transition-all duration-200"></span>{{ $label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            @endforeach

            {{-- Kartu kontak (tanpa lingkaran) --}}
            <div class="col-span-3 lg:col-span-3 relative overflow-hidden rounded-3xl bg-gradient-to-br from-orange-500 to-orange-700 p-5 sm:p-6 text-white shadow-xl shadow-orange-950/30">
                <div class="absolute inset-0 opacity-40 [background-image:linear-gradient(rgba(255,255,255,0.12)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.12)_1px,transparent_1px)] [background-size:28px_28px]
                            [-webkit-mask-image:linear-gradient(135deg,transparent_35%,#000_100%)] [mask-image:linear-gradient(135deg,transparent_35%,#000_100%)]" aria-hidden="true"></div>
                <div class="relative">
                    <h3 class="text-lg font-semibold leading-snug">Bingung memilih properti?</h3>
                    <p class="mt-1 text-sm text-orange-50">Tim kami siap membantu Anda.</p>
                    <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener"
                       class="mt-4 flex sm:inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-stone-900 hover:bg-stone-950 hover:text-white transition {{ $ring }}">
                        <i data-lucide="message-circle" class="w-4 h-4"></i> Chat WhatsApp
                    </a>
                    <ul class="mt-5 pt-5 border-t border-white/25 space-y-2.5 text-sm text-orange-50">
                        <li><a href="mailto:{{ $email }}" class="inline-flex items-center gap-2.5 hover:text-white break-all"><i data-lucide="mail" class="w-4 h-4 shrink-0"></i>{{ $email }}</a></li>
                        <li><a href="tel:{{ preg_replace('/[^+\d]/', '', $phone) }}" class="inline-flex items-center gap-2.5 hover:text-white"><i data-lucide="phone" class="w-4 h-4 shrink-0"></i>{{ $phone }}</a></li>
                        <li class="flex items-start gap-2.5"><i data-lucide="map-pin" class="w-4 h-4 mt-0.5 shrink-0"></i><span>{{ $alamat }}</span></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- ============ 3. KECAMATAN JEMBER (sebagian) ============ --}}
        <div class="py-6 border-t border-white/10 flex flex-col lg:flex-row lg:items-center gap-3 lg:gap-6">
            <p class="text-sm font-semibold text-white shrink-0">Properti dijual di Jember</p>
            <ul class="flex flex-wrap items-center gap-2">
                @foreach ($kecamatan as $k)
                    <li><a href="#" class="inline-block rounded-full bg-white/5 ring-1 ring-white/10 px-3.5 py-1.5 text-xs text-stone-300 hover:bg-orange-500 hover:ring-orange-500 hover:text-white transition {{ $ring }}">{{ $k }}</a></li>
                @endforeach
                <li><a href="#" class="inline-flex items-center gap-1 px-1.5 py-1.5 text-xs font-medium text-orange-400 hover:text-orange-300 transition">Lihat semua <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i></a></li>
            </ul>
        </div>

        {{-- ============ 4. APLIKASI + COPYRIGHT ============ --}}
        <div class="py-6 border-t border-white/10 flex flex-col md:flex-row md:items-center md:justify-between gap-5">
            {{-- Tombol toko aplikasi: hitam, oranye saat disorot --}}
            <div class="grid grid-cols-2 gap-3 md:flex">
                <a href="#" aria-label="Unduh di App Store"
                   class="group h-12 px-4 rounded-xl bg-black text-white ring-1 ring-white/25 flex items-center justify-center gap-2.5 hover:bg-orange-500 hover:ring-orange-500 hover:-translate-y-0.5 transition {{ $ring }}">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 shrink-0" fill="currentColor" aria-hidden="true"><path d="M12.152 6.896c-.948 0-2.415-1.078-3.96-1.04-2.04.027-3.91 1.183-4.961 3.014-2.117 3.675-.546 9.103 1.519 12.09 1.013 1.454 2.208 3.09 3.792 3.039 1.52-.065 2.09-.987 3.935-.987 1.831 0 2.35.987 3.96.948 1.637-.026 2.676-1.48 3.676-2.948 1.156-1.688 1.636-3.325 1.662-3.415-.039-.013-3.182-1.221-3.22-4.857-.026-3.04 2.48-4.494 2.597-4.559-1.429-2.09-3.623-2.324-4.39-2.376-2-.156-3.675 1.09-4.61 1.09zM15.53 3.83c.843-1.012 1.4-2.427 1.245-3.83-1.207.052-2.662.805-3.532 1.818-.78.896-1.454 2.338-1.273 3.714 1.338.104 2.715-.688 3.559-1.701"/></svg>
                    <span class="leading-none text-left">
                        <span class="block text-[9px] font-medium text-stone-400 group-hover:text-orange-100 transition">Download di</span>
                        <span class="block mt-0.5 text-sm font-semibold">App Store</span>
                    </span>
                </a>
                <a href="#" aria-label="Dapatkan di Google Play"
                   class="group h-12 px-4 rounded-xl bg-black text-white ring-1 ring-white/25 flex items-center justify-center gap-2.5 hover:bg-orange-500 hover:ring-orange-500 hover:-translate-y-0.5 transition {{ $ring }}">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 shrink-0" aria-hidden="true">
                        <path d="M3.6 2.4 13.3 12 3.6 21.6a1.6 1.6 0 0 1-.6-1.3V3.7c0-.5.2-1 .6-1.3Z" fill="#00d7fe"/>
                        <path d="m16.6 8.7-3.3 3.3L3.6 2.4a1.6 1.6 0 0 1 1.7-.1l11.3 6.4Z" fill="#00f076"/>
                        <path d="m16.6 15.3-11.3 6.4a1.6 1.6 0 0 1-1.7-.1l9.7-9.6 3.3 3.3Z" fill="#ff3a44"/>
                        <path d="m16.6 8.7 3.9 2.2c.9.5.9 1.7 0 2.2l-3.9 2.2-3.3-3.3 3.3-3.3Z" fill="#ffd500"/>
                    </svg>
                    <span class="leading-none text-left">
                        <span class="block text-[9px] font-medium text-stone-400 group-hover:text-orange-100 transition">Dapatkan di</span>
                        <span class="block mt-0.5 text-sm font-semibold">Google Play</span>
                    </span>
                </a>
            </div>

            <p class="text-xs text-stone-400 leading-relaxed md:text-right">© {{ date('Y') }} Putra Prananta Property. Hak cipta dilindungi.<br>
                <a href="#" class="hover:text-orange-400 transition">Kebijakan Privasi</a> ·
                <a href="#" class="hover:text-orange-400 transition">Syarat &amp; Ketentuan</a>
            </p>
        </div>
    </div>

    {{-- ============ ILUSTRASI PROPERTI ============ --}}
    <div class="relative h-32 sm:h-48 md:h-64 lg:h-72 overflow-hidden" aria-hidden="true">
        <div class="absolute bottom-0 inset-x-0 h-[10.7%] bg-stone-900 border-t border-orange-400/30"></div>
        <svg viewBox="0 0 1200 280" preserveAspectRatio="xMidYMax meet"
             class="absolute bottom-0 left-1/2 -translate-x-1/2 h-full w-auto max-w-none">
            <defs>
                <pattern id="il-win" width="14" height="18" patternUnits="userSpaceOnUse">
                    <rect x="3" y="4" width="8" height="10" rx="1" fill="#fdba74" fill-opacity=".75"/>
                </pattern>
                <linearGradient id="il-roof" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0" stop-color="#fb923c"/><stop offset="1" stop-color="#c2410c"/>
                </linearGradient>
            </defs>

            <rect x="0" y="250" width="1200" height="30" fill="#1c1917"/>
            <line x1="0" y1="250" x2="1200" y2="250" stroke="#fb923c" stroke-opacity=".3"/>

            {{-- Pohon pinus kiri --}}
            <g fill="#365314" fill-opacity=".85">
                <rect x="66" y="228" width="8" height="22" fill="#44403c"/>
                <polygon points="70,150 96,196 44,196"/><polygon points="70,172 102,218 38,218"/><polygon points="70,196 108,240 32,240"/>
            </g>

            {{-- Rumah A: gable klasik --}}
            <rect x="268" y="102" width="16" height="40" fill="#9a3412"/>
            <rect x="150" y="150" width="160" height="100" fill="#292524" stroke="#fb923c" stroke-opacity=".45"/>
            <polygon points="134,153 230,88 326,153" fill="url(#il-roof)"/>
            <rect x="220" y="116" width="20" height="20" rx="3" fill="#fdba74" fill-opacity=".85"/>
            <rect x="168" y="172" width="32" height="32" fill="#fdba74" fill-opacity=".85"/>
            <path d="M184 172v32M168 188h32" stroke="#292524" stroke-width="2"/>
            <rect x="260" y="172" width="32" height="32" fill="#fdba74" fill-opacity=".85"/>
            <path d="M276 172v32M260 188h32" stroke="#292524" stroke-width="2"/>
            <rect x="212" y="192" width="36" height="58" rx="2" fill="#7c2d12"/>
            <rect x="240" y="220" width="4" height="4" fill="#fdba74"/>
            <rect x="204" y="246" width="52" height="4" fill="#44403c"/>
            <rect x="136" y="238" width="38" height="12" rx="6" fill="#365314" fill-opacity=".85"/>
            <rect x="284" y="238" width="38" height="12" rx="6" fill="#365314" fill-opacity=".85"/>

            {{-- Lampu jalan --}}
            <rect x="344" y="196" width="3" height="54" fill="#78716c"/>
            <rect x="337" y="189" width="17" height="9" rx="3" fill="#fde68a"/>
            <rect x="333" y="185" width="25" height="17" rx="5" fill="#fde68a" fill-opacity=".18"/>

            {{-- Rumah B: modern dua lantai + garasi --}}
            <rect x="370" y="140" width="220" height="110" fill="#292524" stroke="#fb923c" stroke-opacity=".45"/>
            <rect x="358" y="128" width="244" height="14" fill="url(#il-roof)"/>
            <rect x="400" y="92" width="150" height="36" fill="#1c1917" stroke="#fb923c" stroke-opacity=".45"/>
            <rect x="392" y="84" width="166" height="10" fill="#fb923c"/>
            <rect x="415" y="100" width="30" height="22" fill="#fdba74" fill-opacity=".85"/>
            <rect x="460" y="100" width="30" height="22" fill="#fdba74" fill-opacity=".85"/>
            <rect x="505" y="100" width="30" height="22" fill="#fdba74" fill-opacity=".85"/>
            <rect x="385" y="158" width="100" height="62" fill="#fdba74" fill-opacity=".8"/>
            <path d="M418 158v62M452 158v62M385 189h100" stroke="#292524" stroke-width="2"/>
            <rect x="503" y="178" width="76" height="72" rx="2" fill="#44403c"/>
            <path d="M503 196h76M503 214h76M503 232h76" stroke="#292524" stroke-width="2"/>

            {{-- Rumah C: cottage + papan "Dijual" --}}
            <rect x="655" y="172" width="130" height="78" fill="#292524" stroke="#fb923c" stroke-opacity=".45"/>
            <polygon points="640,175 720,116 800,175" fill="#c2410c"/>
            <rect x="710" y="132" width="20" height="16" rx="2" fill="#fdba74" fill-opacity=".85"/>
            <rect x="668" y="194" width="26" height="26" fill="#fdba74" fill-opacity=".85"/>
            <rect x="746" y="194" width="26" height="26" fill="#fdba74" fill-opacity=".85"/>
            <rect x="704" y="200" width="32" height="50" rx="2" fill="#ea580c"/>
            <rect x="826" y="196" width="4" height="54" fill="#78716c"/>
            <rect x="798" y="190" width="60" height="26" rx="4" fill="#ea580c"/>
            <text x="828" y="207" text-anchor="middle" font-size="11" font-weight="700" fill="#fff" font-family="Outfit,ui-sans-serif,sans-serif" letter-spacing=".5">DIJUAL</text>

            {{-- Gedung apartemen --}}
            <rect x="880" y="104" width="92" height="146" fill="#292524" stroke="#fb923c" stroke-opacity=".45"/>
            <rect x="874" y="96" width="104" height="10" fill="#fb923c"/>
            <rect x="889" y="116" width="74" height="126" fill="url(#il-win)"/>
            <rect x="918" y="226" width="16" height="24" fill="#7c2d12"/>

            {{-- Rumah D --}}
            <rect x="1010" y="168" width="120" height="82" fill="#292524" stroke="#fb923c" stroke-opacity=".45"/>
            <polygon points="996,171 1070,116 1144,171" fill="url(#il-roof)"/>
            <rect x="1022" y="190" width="28" height="28" fill="#fdba74" fill-opacity=".85"/>
            <rect x="1090" y="190" width="28" height="28" fill="#fdba74" fill-opacity=".85"/>
            <rect x="1056" y="198" width="28" height="52" rx="2" fill="#7c2d12"/>
            <rect x="1008" y="238" width="34" height="12" rx="6" fill="#365314" fill-opacity=".85"/>

            {{-- Pohon pinus kanan --}}
            <g fill="#365314" fill-opacity=".85">
                <rect x="1166" y="228" width="8" height="22" fill="#44403c"/>
                <polygon points="1170,158 1194,200 1146,200"/><polygon points="1170,180 1198,222 1142,222"/><polygon points="1170,202 1202,240 1138,240"/>
            </g>
        </svg>
    </div>
</footer>
