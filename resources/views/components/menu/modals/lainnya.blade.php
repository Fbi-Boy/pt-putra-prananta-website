{{-- =========================================================
     Modal "Semua Fitur & Layanan"
     Pembukaan tetap: x-show="openMore" (Alpine). Hanya isi yang dioptimalkan.
     ========================================================= --}}
@php
    $moreGroups = [
        [
            'title' => 'Perusahaan', 'tone' => 'orange',
            'items' => [
                ['Tentang Kami', 'Profil & visi perusahaan', route('company.profile'), 'building'],
                ['Tim Kami', 'Kenali orang di baliknya', route('page.coming-soon', 'tim-kami'), 'users'],
                ['Karier', 'Bergabung bersama kami', route('page.coming-soon', 'karier'), 'briefcase'],
                ['Hubungi Kami', 'Kami siap membantu', route('page.coming-soon', 'kontak'), 'phone'],
            ],
        ],
        [
            'title' => 'Properti', 'tone' => 'amber',
            'items' => [
                ['Beli Properti', 'Temukan hunian impian', route('properties.sale'), 'tag'],
                ['Sewa Properti', 'Sewa fleksibel & aman', route('properties.rent'), 'key'],
                ['Proyek Baru', 'Perumahan & apartemen baru', route('page.coming-soon', 'proyek-baru'), 'building2'],
                ['Properti Tersimpan', 'Daftar favoritmu', route('page.coming-soon', 'favorit'), 'heart'],
            ],
        ],
        [
            'title' => 'Layanan', 'tone' => 'emerald',
            'items' => [
                ['Kalkulator KPR', 'Simulasi cicilan instan', route('kpr.index'), 'calculator'],
                ['Take Over KPR', 'Pindah KPR lebih ringan', route('page.coming-soon', 'pindah-kpr'), 'swap'],
                ['Cari Agen', 'Agen terpercaya di area Anda', route('agents.index'), 'agent'],
                ['Daftar Agen', 'Jadi mitra agen kami', route('page.coming-soon', 'daftar-agent'), 'userplus'],
            ],
        ],
        [
            'title' => 'Panduan', 'tone' => 'sky',
            'items' => [
                ['Cara Membeli Rumah', 'Langkah dari awal sampai akad', route('page.coming-soon', 'panduan-beli'), 'book'],
                ['Tips Menjual Properti', 'Cepat laku, harga terbaik', route('page.coming-soon', 'panduan-jual'), 'file'],
                ['FAQ', 'Pertanyaan yang sering diajukan', route('page.coming-soon', 'faq'), 'help'],
                ['Tanya Forum', 'Diskusi bersama komunitas', route('page.coming-soon', 'tanya-forum'), 'chat'],
            ],
        ],
    ];
@endphp

<div x-show="openMore" style="display: none;" class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-6" role="dialog" aria-modal="true" aria-labelledby="more-modal-title"
     @keydown.escape.window="openMore = false"
     x-effect="document.body.classList.toggle('overflow-hidden', openMore)">

    {{-- ===== Sprite SVG 3D (sekali saja, dipakai ulang lewat <use>) ===== --}}
    <svg width="0" height="0" class="absolute" aria-hidden="true" focusable="false">
        <defs>
            <filter id="mm-glyph-shadow" x="-30%" y="-30%" width="160%" height="170%">
                <feDropShadow dx="0" dy="1.5" stdDeviation="1" flood-color="#000" flood-opacity=".28"/>
            </filter>
            <filter id="mm-blur"><feGaussianBlur stdDeviation="2.2"/></filter>

            {{-- Gradien sisi atas (terang) & sisi tebal (gelap) per warna --}}
            <linearGradient id="mm-orange-t" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fdba74"/><stop offset="1" stop-color="#ea580c"/></linearGradient>
            <linearGradient id="mm-orange-b" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#c2410c"/><stop offset="1" stop-color="#7c2d12"/></linearGradient>
            <linearGradient id="mm-amber-t" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fde68a"/><stop offset="1" stop-color="#d97706"/></linearGradient>
            <linearGradient id="mm-amber-b" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#b45309"/><stop offset="1" stop-color="#78350f"/></linearGradient>
            <linearGradient id="mm-emerald-t" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#6ee7b7"/><stop offset="1" stop-color="#059669"/></linearGradient>
            <linearGradient id="mm-emerald-b" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#047857"/><stop offset="1" stop-color="#064e3b"/></linearGradient>
            <linearGradient id="mm-sky-t" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#7dd3fc"/><stop offset="1" stop-color="#0284c7"/></linearGradient>
            <linearGradient id="mm-sky-b" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#0369a1"/><stop offset="1" stop-color="#0c4a6e"/></linearGradient>
            <linearGradient id="mm-shine" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fff" stop-opacity=".55"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient>

            {{-- Tile 3D: bayangan lantai + sisi tebal + permukaan atas + kilau --}}
            @foreach (['orange', 'amber', 'emerald', 'sky'] as $t)
            <symbol id="mm-tile-{{ $t }}" viewBox="0 0 64 64">
                <ellipse cx="32" cy="58" rx="19" ry="3.6" fill="#1c1917" opacity=".22" filter="url(#mm-blur)"/>
                <rect x="8" y="15" width="48" height="42" rx="13" fill="url(#mm-{{ $t }}-b)"/>
                <rect x="8" y="8" width="48" height="44" rx="13" fill="url(#mm-{{ $t }}-t)"/>
                <path d="M10 24C10 14 17 9 27 9h10c-9 2-16 7-19 15z" fill="url(#mm-shine)"/>
                <rect x="8.5" y="8.5" width="47" height="43" rx="12.5" fill="none" stroke="#fff" stroke-opacity=".35"/>
            </symbol>
            @endforeach

            {{-- Glyph (putih, di tengah tile) --}}
            <symbol id="mm-g-building" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><rect x="23" y="18" width="18" height="24" rx="2"/><path d="M28 24h2M34 24h2M28 30h2M34 30h2M30 42v-5h4v5"/></g></symbol>
            <symbol id="mm-g-users" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><circle cx="27" cy="24" r="4.5"/><path d="M19 40c0-5 3.5-8 8-8s8 3 8 8"/><circle cx="38" cy="25" r="3.5"/><path d="M39 31c4 0 6 3 6 7"/></g></symbol>
            <symbol id="mm-g-briefcase" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><rect x="19" y="24" width="26" height="17" rx="3"/><path d="M27 24v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2M19 32h26"/></g></symbol>
            <symbol id="mm-g-phone" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><path d="M24 19h5l2 6-3 2c1.5 3 3.500 5 6.500 6.500l2-3 6 2v5c0 2-2 3-4 3-11 0-19.500-8.500-19.500-19 0-2 1.500-3.500 3-3.500z"/></g></symbol>
            <symbol id="mm-g-tag" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><path d="M21 31V21h10l13 13-10 10z"/><circle cx="27" cy="27" r="1.6" fill="#fff"/></g></symbol>
            <symbol id="mm-g-key" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><circle cx="26" cy="31" r="6"/><path d="M32 31h13M40 31v5M45 31v4"/></g></symbol>
            <symbol id="mm-g-building2" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><rect x="20" y="18" width="15" height="25" rx="2"/><path d="M35 29h7a2 2 0 0 1 2 2v12H35M25 24h5M25 30h5M25 36h5"/></g></symbol>
            <symbol id="mm-g-heart" viewBox="0 0 64 64"><g fill="#fff" fill-opacity=".25" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><path d="M32 42C20 34 20 24 27 23c3-.4 5 1.500 5 3.500 0-2 2-3.900 5-3.500 7 1 7 11-5 19z"/></g></symbol>
            <symbol id="mm-g-calculator" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><rect x="22" y="17" width="20" height="26" rx="3"/><rect x="26" y="21" width="12" height="5" rx="1" fill="#fff"/><path d="M27 32h.01M32 32h.01M37 32h.01M27 37h.01M32 37h.01M37 37h.01" stroke-width="3.500"/></g></symbol>
            <symbol id="mm-g-swap" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><path d="M20 26h22M37 21l5 5-5 5M44 37H22M27 32l-5 5 5 5"/></g></symbol>
            <symbol id="mm-g-agent" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><circle cx="29" cy="28" r="8"/><path d="M35 34l8 8"/><circle cx="29" cy="26" r="2.500" fill="#fff"/><path d="M24 32c1-3 9-3 10 0"/></g></symbol>
            <symbol id="mm-g-userplus" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><circle cx="27" cy="25" r="5"/><path d="M18 42c0-5 4-8 9-8s9 3 9 8M42 23v8M38 27h8"/></g></symbol>
            <symbol id="mm-g-book" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><path d="M32 22c-3-2-7-3-11-3v21c4 0 8 1 11 3 3-2 7-3 11-3V19c-4 0-8 1-11 3zM32 22v21"/></g></symbol>
            <symbol id="mm-g-file" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><path d="M25 18h10l8 8v18H25zM35 18v8h8M29 33h10M29 38h7"/></g></symbol>
            <symbol id="mm-g-help" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><circle cx="32" cy="31" r="12"/><path d="M28 28c0-2 1.800-3.500 4-3.500s4 1.300 4 3.300c0 3-4 3-4 6"/><circle cx="32" cy="38.500" r="1.300" fill="#fff"/></g></symbol>
            <symbol id="mm-g-chat" viewBox="0 0 64 64"><g fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#mm-glyph-shadow)"><path d="M21 21h22v16H31l-6 5v-5h-4zM27 28h10M27 33h6"/></g></symbol>
        </defs>
    </svg>

    {{-- Backdrop --}}
    <div x-show="openMore" x-transition.opacity class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="openMore = false"></div>

    <div x-show="openMore"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-10 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-10 sm:translate-y-0 sm:scale-95"
         class="relative w-full max-w-4xl bg-white rounded-t-3xl sm:rounded-3xl shadow-2xl px-5 sm:px-8 pt-3 sm:pt-8 pb-[max(1.5rem,env(safe-area-inset-bottom))] sm:pb-8 z-10 max-h-[92vh] max-h-[92dvh] sm:max-h-[90vh] overflow-y-auto overscroll-contain">

        {{-- Handle bottom-sheet (hanya mobile) --}}
        <div class="sm:hidden mx-auto mb-3 h-1.5 w-10 rounded-full bg-stone-200" aria-hidden="true"></div>

        {{-- Header (sticky agar tombol tutup selalu terjangkau di mobile) --}}
        <div class="sticky top-0 sm:-top-8 -mx-5 sm:-mx-8 px-5 sm:px-8 pt-1 sm:pt-0 pb-4 mb-5 sm:mb-8 bg-white/95 backdrop-blur z-20 flex items-center justify-between gap-3 border-b border-stone-100">
            <div>
                <h3 id="more-modal-title" class="text-lg sm:text-xl font-bold text-stone-900">Semua Fitur & Layanan</h3>
                <p class="text-xs sm:text-sm text-stone-500 mt-0.5 sm:mt-1">Jelajahi seluruh fitur yang tersedia.</p>
            </div>
            <button type="button" @click="openMore = false" aria-label="Tutup"
                    class="w-10 h-10 shrink-0 flex items-center justify-center rounded-full bg-stone-100 text-stone-500 hover:bg-stone-200 hover:text-stone-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-7 sm:gap-y-10">
            @foreach ($moreGroups as $group)
                {{-- Kolom: {{ $group['title'] }} --}}
                <div>
                    <h4 class="text-xs font-bold text-orange-600 uppercase tracking-wider mb-3 sm:mb-4">{{ $group['title'] }}</h4>
                    {{-- Mobile: grid 2 kolom (kartu vertikal). Desktop: daftar 1 kolom (ikon di kiri) --}}
                    <ul class="grid grid-cols-2 gap-2.5 sm:block sm:space-y-1.5">
                        @foreach ($group['items'] as [$label, $desc, $url, $glyph])
                            <li>
                                <a href="{{ $url }}"
                                   class="group flex flex-col sm:flex-row items-center sm:items-center text-center sm:text-left gap-1.5 sm:gap-3 h-full min-h-[104px] sm:min-h-0 p-3 sm:p-2 sm:-mx-2 rounded-2xl bg-stone-50 sm:bg-transparent border border-stone-100 sm:border-transparent hover:bg-stone-50 active:scale-95 sm:active:scale-100 active:bg-stone-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition">
                                    <span class="shrink-0 w-12 h-12 transition-transform duration-300 ease-out group-hover:-translate-y-1 group-hover:scale-110 group-hover:rotate-[-4deg] motion-reduce:transition-none motion-reduce:group-hover:transform-none">
                                        <svg viewBox="0 0 64 64" class="w-full h-full" aria-hidden="true" focusable="false">
                                            <use href="#mm-tile-{{ $group['tone'] }}"/>
                                            <use href="#mm-g-{{ $glyph }}"/>
                                        </svg>
                                    </span>
                                    <span class="min-w-0">
                                        <span class="block text-[13px] sm:text-sm font-semibold text-stone-700 group-hover:text-stone-900 leading-tight sm:leading-snug transition">{{ $label }}</span>
                                        <span class="hidden sm:block text-xs text-stone-400 group-hover:text-stone-500 leading-snug mt-0.5 transition">{{ $desc }}</span>
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
