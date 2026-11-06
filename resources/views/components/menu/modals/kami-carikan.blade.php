{{--
    Modal "Kami Carikan Properti Anda" (v2: layout stabil, scroll mobile aman, tanpa dependensi Lucide)
    Stack: Laravel Blade + Alpine.js v3 + Tailwind
    Prasyarat:
      - variabel Alpine `openFind` ada di scope induk (x-data="{ openFind: false }")
      - layout punya @stack('scripts') dan <meta name="csrf-token">
      - route 'property-requests.store' (POST, balas JSON; 422 untuk error validasi)
--}}
<style>
    [x-cloak] { display: none !important; }

    /* Root mengikuti visual viewport (aman saat keyboard HP muncul) */
    .fp-root { position: fixed; left: 0; right: 0; top: var(--fp-top, 0px); height: var(--fp-vh, 100%); }

    /* Ukuran panel: TETAP, tidak berubah antar langkah */
    .fp-panel { height: 92%; }
    .fp-panel.fp-kb { height: 100%; }
    @media (min-width: 640px) {
        .fp-panel, .fp-panel.fp-kb { height: min(720px, 100%); }
    }

    /* Area scroll: sentuh lancar, scrollbar disembunyikan, tidak merambat ke halaman */
    .fp-scroll {
        overflow-y: auto; overflow-x: hidden;
        -webkit-overflow-scrolling: touch;
        overscroll-behavior: contain;
        touch-action: pan-y;
        scrollbar-width: none;
    }
    .fp-scroll::-webkit-scrollbar { display: none; }
    .fp-hscroll { overflow-x: auto; scrollbar-width: none; touch-action: pan-x pan-y; }
    .fp-hscroll::-webkit-scrollbar { display: none; }

    /* Ikon SVG inline */
    .fp-i { fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; flex-shrink: 0; }

    /* Transisi antar langkah murah (opacity + translate saja) */
    .fp-step { animation: fp-in .22s ease-out; }
    @keyframes fp-in { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: none; } }
    @media (prefers-reduced-motion: reduce) { .fp-step { animation: none; } }

    /* Layar pendek: sembunyikan kartu ringkasan di panel kiri supaya tidak terpotong */
    @media (max-height: 680px) { .fp-aside-sum { display: none; } }
</style>

<div x-show="openFind" x-cloak
     x-data="propertyFinder()"
     @keydown.escape.window="if (openFind) closeModal()"
     class="fp-root z-[100] flex items-end justify-center sm:items-center sm:p-6"
     role="dialog" aria-modal="true" aria-labelledby="find-title"
     data-lenis-prevent data-lenis-prevent-touch>

    {{-- Sprite ikon (satu kali) --}}
    <svg width="0" height="0" style="position:absolute" aria-hidden="true">
        <symbol id="fp-x" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></symbol>
        <symbol id="fp-check" viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></symbol>
        <symbol id="fp-arrow-left" viewBox="0 0 24 24"><path d="m12 19-7-7 7-7M19 12H5"/></symbol>
        <symbol id="fp-arrow-right" viewBox="0 0 24 24"><path d="M5 12h14m-7-7 7 7-7 7"/></symbol>
        <symbol id="fp-send" viewBox="0 0 24 24"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></symbol>
        <symbol id="fp-pin" viewBox="0 0 24 24"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></symbol>
        <symbol id="fp-phone" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></symbol>
        <symbol id="fp-home" viewBox="0 0 24 24"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/></symbol>
        <symbol id="fp-land" viewBox="0 0 24 24"><path d="M3 7l6-3 6 3 6-3v13l-6 3-6-3-6 3z"/><path d="M9 4v13M15 7v13"/></symbol>
        <symbol id="fp-store" viewBox="0 0 24 24"><path d="M4 9 5.5 4h13L20 9"/><path d="M4 9a2.5 2.5 0 0 0 5 0 2.5 2.5 0 0 0 5 0 2.5 2.5 0 0 0 5 0"/><path d="M5 12v8h14v-8"/><path d="M10 20v-5h4v5"/></symbol>
        <symbol id="fp-building" viewBox="0 0 24 24"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2M10 6h4M10 10h4M10 14h4M10 18h4"/></symbol>
        <symbol id="fp-shield" viewBox="0 0 24 24"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></symbol>
        <symbol id="fp-ok" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></symbol>
    </svg>

    {{-- Backdrop (tanpa blur: lebih ringan di HP) --}}
    <div x-show="openFind" x-transition.opacity.duration.200ms
         class="absolute inset-0 bg-stone-900/60" @click="closeModal()"></div>

    {{-- Panel --}}
    <div x-show="openFind"
         x-transition:enter="transition ease-out duration-250"
         x-transition:enter-start="opacity-0 translate-y-8 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-8 sm:scale-95"
         :class="kb && 'fp-kb'"
         class="fp-panel relative z-10 flex w-full flex-col overflow-hidden rounded-t-[28px] bg-white shadow-2xl will-change-transform sm:max-w-4xl sm:flex-row sm:rounded-3xl">

        {{-- ============ PANEL KIRI (desktop, tidak ikut scroll form) ============ --}}
        <aside class="fp-scroll relative hidden w-[280px] shrink-0 flex-col gap-6 bg-gradient-to-br from-orange-500 to-amber-600 p-7 text-white md:flex lg:w-[300px]">
            <div class="pointer-events-none absolute -right-16 -top-16 h-52 w-52 rounded-full bg-white/10"></div>
            <div class="pointer-events-none absolute -bottom-16 -left-10 h-52 w-52 rounded-full bg-black/10"></div>

            <div class="relative">
                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-white/20">
                    <svg class="fp-i h-5 w-5"><use href="#fp-home"/></svg>
                </div>
                <h3 class="text-xl font-extrabold leading-tight">Biar kami yang repot, Anda tinggal pilih.</h3>
                <p class="mt-2.5 text-[13px] leading-relaxed text-orange-50">Ceritakan kriteria properti impian Anda. Kami saring listing dan hubungi Anda dengan pilihan terbaik.</p>

                <ul class="mt-5 space-y-3 text-[13px]">
                    <li class="flex items-start gap-2.5"><span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-white/25"><svg class="fp-i h-3 w-3"><use href="#fp-check"/></svg></span>Gratis, tanpa kewajiban membeli</li>
                    <li class="flex items-start gap-2.5"><span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-white/25"><svg class="fp-i h-3 w-3"><use href="#fp-check"/></svg></span>Dihubungi agen dalam 1x24 jam</li>
                    <li class="flex items-start gap-2.5"><span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-white/25"><svg class="fp-i h-3 w-3"><use href="#fp-check"/></svg></span>Listing terverifikasi, legalitas dibantu cek</li>
                    <li class="flex items-start gap-2.5"><span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-white/25"><svg class="fp-i h-3 w-3"><use href="#fp-check"/></svg></span>Bantuan KPR dan negosiasi harga</li>
                </ul>
            </div>

            <div class="fp-aside-sum relative mt-auto rounded-2xl bg-white/15 p-4 text-xs">
                <p class="mb-1.5 font-bold uppercase tracking-wider text-orange-100">Pencarian Anda</p>
                <p class="font-semibold leading-snug" x-text="summaryLine()"></p>
                <p class="mt-1 text-orange-100" x-text="budgetLabel() || 'Budget belum diisi'"></p>
            </div>
        </aside>

        {{-- ============ PANEL KANAN ============ --}}
        <div class="flex min-h-0 min-w-0 flex-1 flex-col">

            <div class="flex shrink-0 justify-center pt-2.5 sm:hidden" x-show="!done"><span class="h-1.5 w-10 rounded-full bg-stone-300"></span></div>

            {{-- Header --}}
            <div class="relative shrink-0 px-5 pb-3 pt-3 sm:px-8 sm:pb-4 sm:pt-7" x-show="!done">
                <button type="button" @click="closeModal()" aria-label="Tutup"
                        class="absolute right-4 top-2.5 flex h-10 w-10 items-center justify-center rounded-full bg-stone-100 text-stone-500 active:bg-stone-200 sm:right-6 sm:top-6">
                    <svg class="fp-i h-4 w-4"><use href="#fp-x"/></svg>
                </button>

                <p class="text-[11px] font-bold uppercase tracking-widest text-orange-500" x-text="'Langkah ' + step + ' dari ' + total"></p>
                <h3 id="find-title" class="mt-1 pr-11 text-lg font-extrabold leading-snug text-stone-900 sm:text-2xl" x-text="titles[step - 1]"></h3>
                <p class="mt-1 text-[13px] text-stone-500 sm:text-sm" x-text="subtitles[step - 1]"></p>

                <div class="mt-3.5 flex gap-1.5" aria-hidden="true">
                    <template x-for="n in total" :key="n">
                        <span class="h-1.5 flex-1 rounded-full transition-colors duration-300" :class="n <= step ? 'bg-orange-500' : 'bg-stone-200'"></span>
                    </template>
                </div>
            </div>

            <form @submit.prevent="step < total ? next() : submit()" novalidate
                  class="flex min-h-0 flex-1 flex-col" x-show="!done">

                <input type="text" x-model="form.website" tabindex="-1" autocomplete="off" aria-hidden="true" class="absolute -left-[9999px] h-0 w-0 opacity-0">

                {{-- Area konten: satu-satunya yang scroll --}}
                <div class="relative min-h-0 flex-1">
                    <div class="fp-scroll h-full px-5 pb-6 pt-1 sm:px-8" x-ref="scroller"
                         @focusin="onFocus($event)" data-lenis-prevent data-lenis-prevent-touch>

                        {{-- ===== STEP 1 ===== --}}
                        <div x-show="step === 1" class="fp-step space-y-5">
                            <div>
                                <label class="mb-2 block text-xs font-bold text-stone-700">Saya ingin</label>
                                <div class="grid grid-cols-2 gap-1 rounded-2xl bg-stone-100 p-1">
                                    <template x-for="p in [{v:'beli',l:'Membeli'},{v:'sewa',l:'Menyewa'}]" :key="p.v">
                                        <button type="button" @click="setPurpose(p.v)"
                                                class="min-h-[44px] rounded-xl text-sm font-bold transition-colors"
                                                :class="form.purpose === p.v ? 'bg-white text-orange-600 shadow' : 'text-stone-500'"
                                                x-text="p.l"></button>
                                    </template>
                                </div>
                            </div>

                            <div>
                                <label class="mb-2 block text-xs font-bold text-stone-700">Tipe Properti <span class="text-red-500">*</span></label>
                                <div class="grid grid-cols-4 gap-2 sm:gap-3">
                                    <template x-for="t in types" :key="t.id">
                                        <button type="button" @click="form.type = t.id; errors.type = ''"
                                                class="flex min-h-[78px] flex-col items-center justify-center gap-1.5 rounded-2xl border-2 px-1 py-3 text-xs font-bold transition-colors active:scale-95"
                                                :class="form.type === t.id ? 'border-orange-500 bg-orange-50 text-orange-600' : 'border-stone-200 text-stone-600'">
                                            <svg class="fp-i h-6 w-6"><use :href="'#fp-' + t.icon"/></svg>
                                            <span x-text="t.label"></span>
                                        </button>
                                    </template>
                                </div>
                                <p x-show="errors.type" x-text="errors.type" class="mt-1.5 text-xs font-medium text-red-500"></p>
                            </div>

                            <div>
                                <label for="f-location" class="mb-1.5 block text-xs font-bold text-stone-700">Lokasi / Area yang Diinginkan <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <svg class="fp-i pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-stone-400"><use href="#fp-pin"/></svg>
                                    <input id="f-location" type="text" list="area-list" x-model="form.location" @input="errors.location = ''"
                                           autocomplete="off" placeholder="Contoh: Sumbersari, Kaliwates, Patrang"
                                           class="h-12 w-full rounded-xl border border-stone-300 pl-10 pr-4 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm"
                                           :class="errors.location && 'border-red-400'">
                                    <datalist id="area-list">
                                        <option value="Sumbersari"><option value="Kaliwates"><option value="Patrang">
                                        <option value="Ajung"><option value="Rambipuji"><option value="Jenggawah">
                                        <option value="Ambulu"><option value="Mayang"><option value="Arjasa">
                                    </datalist>
                                </div>
                                <p x-show="errors.location" x-text="errors.location" class="mt-1.5 text-xs font-medium text-red-500"></p>
                            </div>

                            <div>
                                <div class="mb-1.5 flex items-baseline justify-between">
                                    <label class="text-xs font-bold text-stone-700" x-text="form.purpose === 'sewa' ? 'Budget Sewa (per tahun)' : 'Kisaran Budget'"></label>
                                    <button type="button" x-show="form.budget_min || form.budget_max" @click="form.budget_min = ''; form.budget_max = ''" class="p-1 text-xs font-semibold text-orange-600">Reset</button>
                                </div>

                                <div class="fp-hscroll -mx-5 flex gap-2 px-5 pb-2 sm:mx-0 sm:flex-wrap sm:overflow-visible sm:px-0">
                                    <template x-for="c in budgetChips()" :key="c.l">
                                        <button type="button" @click="form.budget_min = c.min; form.budget_max = c.max"
                                                class="min-h-[40px] shrink-0 rounded-full border px-3.5 text-xs font-bold transition-colors active:scale-95"
                                                :class="(form.budget_min === c.min && form.budget_max === c.max) ? 'border-orange-500 bg-orange-500 text-white' : 'border-stone-300 text-stone-600'"
                                                x-text="c.l"></button>
                                    </template>
                                </div>

                                <div class="mt-1 grid grid-cols-2 gap-3">
                                    <div class="relative">
                                        <span class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-xs font-bold text-stone-400">Rp</span>
                                        <input type="text" inputmode="numeric" placeholder="Minimum" :value="fmt(form.budget_min)"
                                               @input="form.budget_min = digits($event.target.value); $event.target.value = fmt(form.budget_min)"
                                               class="h-12 w-full rounded-xl border border-stone-300 pl-9 pr-3 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm">
                                    </div>
                                    <div class="relative">
                                        <span class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-xs font-bold text-stone-400">Rp</span>
                                        <input type="text" inputmode="numeric" placeholder="Maksimum" :value="fmt(form.budget_max)"
                                               @input="form.budget_max = digits($event.target.value); $event.target.value = fmt(form.budget_max)"
                                               class="h-12 w-full rounded-xl border border-stone-300 pl-9 pr-3 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm">
                                    </div>
                                </div>
                                <p x-show="budgetLabel()" x-text="budgetLabel()" class="mt-1.5 text-xs font-semibold text-orange-600"></p>
                            </div>
                        </div>

                        {{-- ===== STEP 2 ===== --}}
                        <div x-show="step === 2" class="fp-step space-y-5">
                            <div x-show="showRooms()">
                                <label class="mb-2 block text-xs font-bold text-stone-700">Kamar Tidur (minimal)</label>
                                <div class="grid grid-cols-6 gap-2">
                                    <template x-for="n in ['', '1', '2', '3', '4', '5']" :key="'bd' + n">
                                        <button type="button" @click="form.bedrooms = n"
                                                class="min-h-[44px] rounded-xl border-2 text-sm font-bold transition-colors active:scale-95"
                                                :class="form.bedrooms === n ? 'border-orange-500 bg-orange-50 text-orange-600' : 'border-stone-200 text-stone-600'"
                                                x-text="n === '' ? 'Bebas' : (n === '5' ? '5+' : n)"></button>
                                    </template>
                                </div>
                            </div>

                            <div x-show="showRooms()">
                                <label class="mb-2 block text-xs font-bold text-stone-700">Kamar Mandi (minimal)</label>
                                <div class="grid grid-cols-5 gap-2">
                                    <template x-for="n in ['', '1', '2', '3', '4']" :key="'bt' + n">
                                        <button type="button" @click="form.bathrooms = n"
                                                class="min-h-[44px] rounded-xl border-2 text-sm font-bold transition-colors active:scale-95"
                                                :class="form.bathrooms === n ? 'border-orange-500 bg-orange-50 text-orange-600' : 'border-stone-200 text-stone-600'"
                                                x-text="n === '' ? 'Bebas' : (n === '4' ? '4+' : n)"></button>
                                    </template>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div x-show="showLand()">
                                    <label for="f-land" class="mb-1.5 block text-xs font-bold text-stone-700">Luas Tanah min. (m²)</label>
                                    <input id="f-land" type="text" inputmode="numeric" placeholder="Contoh: 90" :value="form.land_min"
                                           @input="form.land_min = digits($event.target.value); $event.target.value = form.land_min"
                                           class="h-12 w-full rounded-xl border border-stone-300 px-4 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm">
                                </div>
                                <div :class="showLand() ? '' : 'col-span-2'">
                                    <label for="f-cert" class="mb-1.5 block text-xs font-bold text-stone-700">Sertifikat</label>
                                    <select id="f-cert" x-model="form.certificate"
                                            class="h-12 w-full cursor-pointer rounded-xl border border-stone-300 bg-white px-3 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm">
                                        <option value="">Bebas / belum tahu</option>
                                        <option value="SHM">SHM (Hak Milik)</option>
                                        <option value="HGB">HGB</option>
                                        <option value="Girik">Girik / Letter C</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="mb-2 block text-xs font-bold text-stone-700">Yang Anda Butuhkan di Sekitar Properti</label>
                                <div class="flex flex-wrap gap-2">
                                    <template x-for="f in featureList" :key="f">
                                        <button type="button" @click="toggleFeature(f)"
                                                class="flex min-h-[40px] items-center gap-1.5 rounded-full border px-3.5 text-xs font-bold transition-colors active:scale-95"
                                                :class="form.features.includes(f) ? 'border-orange-500 bg-orange-500 text-white' : 'border-stone-300 text-stone-600'">
                                            <svg x-show="form.features.includes(f)" class="fp-i h-3.5 w-3.5"><use href="#fp-check"/></svg>
                                            <span x-text="f"></span>
                                        </button>
                                    </template>
                                </div>
                            </div>

                            <div x-show="form.purpose === 'beli'">
                                <label class="mb-2 block text-xs font-bold text-stone-700">Rencana Pembayaran</label>
                                <div class="grid grid-cols-3 gap-2">
                                    <template x-for="p in ['KPR', 'Cash', 'Cash Bertahap']" :key="p">
                                        <button type="button" @click="form.payment = (form.payment === p ? '' : p)"
                                                class="min-h-[44px] rounded-xl border-2 px-1 text-xs font-bold transition-colors active:scale-95"
                                                :class="form.payment === p ? 'border-orange-500 bg-orange-50 text-orange-600' : 'border-stone-200 text-stone-600'"
                                                x-text="p"></button>
                                    </template>
                                </div>
                            </div>

                            <div>
                                <label for="f-notes" class="mb-1.5 block text-xs font-bold text-stone-700">Catatan Tambahan <span class="font-normal text-stone-400">(opsional)</span></label>
                                <textarea id="f-notes" rows="3" maxlength="500" x-model="form.notes"
                                          placeholder="Contoh: dekat kampus, jalan bisa masuk mobil, hadap timur..."
                                          class="w-full resize-none rounded-xl border border-stone-300 px-4 py-3 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm"></textarea>
                                <p class="mt-1 text-right text-[11px] text-stone-400" x-text="form.notes.length + '/500'"></p>
                            </div>
                        </div>

                        {{-- ===== STEP 3 ===== --}}
                        <div x-show="step === 3" class="fp-step space-y-4">
                            <div class="rounded-2xl border border-orange-200 bg-orange-50 p-4">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <p class="text-[11px] font-bold uppercase tracking-wider text-orange-600">Ringkasan Pencarian</p>
                                        <p class="mt-1 text-sm font-bold text-stone-900" x-text="summaryLine()"></p>
                                        <p class="mt-0.5 text-xs text-stone-600" x-text="budgetLabel() || 'Budget fleksibel'"></p>
                                        <p class="mt-0.5 text-xs text-stone-500" x-show="extraSummary()" x-text="extraSummary()"></p>
                                    </div>
                                    <button type="button" @click="go(1)" class="shrink-0 p-1 text-xs font-bold text-orange-600 underline underline-offset-2">Ubah</button>
                                </div>
                            </div>

                            <div>
                                <label for="f-name" class="mb-1.5 block text-xs font-bold text-stone-700">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input id="f-name" type="text" autocomplete="name" x-model="form.name" @input="errors.name = ''" placeholder="Nama Anda"
                                       class="h-12 w-full rounded-xl border border-stone-300 px-4 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm"
                                       :class="errors.name && 'border-red-400'">
                                <p x-show="errors.name" x-text="errors.name" class="mt-1.5 text-xs font-medium text-red-500"></p>
                            </div>

                            <div>
                                <label for="f-phone" class="mb-1.5 block text-xs font-bold text-stone-700">No. WhatsApp / Telepon <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <svg class="fp-i pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-stone-400"><use href="#fp-phone"/></svg>
                                    <input id="f-phone" type="tel" inputmode="tel" autocomplete="tel" x-model="form.phone" @input="errors.phone = ''" placeholder="08xxxxxxxxxx"
                                           class="h-12 w-full rounded-xl border border-stone-300 pl-10 pr-4 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm"
                                           :class="errors.phone && 'border-red-400'">
                                </div>
                                <p x-show="errors.phone" x-text="errors.phone" class="mt-1.5 text-xs font-medium text-red-500"></p>
                            </div>

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="f-job" class="mb-1.5 block text-xs font-bold text-stone-700">Pekerjaan <span class="text-red-500">*</span></label>
                                    <select id="f-job" x-model="form.job" @change="errors.job = ''"
                                            class="h-12 w-full cursor-pointer rounded-xl border border-stone-300 bg-white px-3 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm"
                                            :class="errors.job && 'border-red-400'">
                                        <option value="">Pilih pekerjaan</option>
                                        <option>Karyawan Swasta</option>
                                        <option>PNS / ASN / TNI / Polri</option>
                                        <option>Wiraswasta / Pengusaha</option>
                                        <option>Profesional (Dokter, Guru, dll)</option>
                                        <option>Petani / Pekebun</option>
                                        <option>Lainnya</option>
                                    </select>
                                    <p x-show="errors.job" x-text="errors.job" class="mt-1.5 text-xs font-medium text-red-500"></p>
                                </div>
                                <div>
                                    <label for="f-time" class="mb-1.5 block text-xs font-bold text-stone-700">Waktu Dihubungi</label>
                                    <select id="f-time" x-model="form.contact_time"
                                            class="h-12 w-full cursor-pointer rounded-xl border border-stone-300 bg-white px-3 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm">
                                        <option value="Kapan saja">Kapan saja</option>
                                        <option value="Pagi (08-12)">Pagi (08-12)</option>
                                        <option value="Siang (12-17)">Siang (12-17)</option>
                                        <option value="Malam (17-21)">Malam (17-21)</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="f-email" class="mb-1.5 block text-xs font-bold text-stone-700">Email <span class="font-normal text-stone-400">(opsional)</span></label>
                                <input id="f-email" type="email" autocomplete="email" x-model="form.email" placeholder="nama@email.com"
                                       class="h-12 w-full rounded-xl border border-stone-300 px-4 text-base outline-none transition-colors focus:border-orange-500 focus:ring-2 focus:ring-orange-100 sm:text-sm">
                            </div>

                            <p x-show="serverError" x-text="serverError" class="rounded-xl bg-red-50 px-4 py-3 text-xs font-medium text-red-600"></p>

                            <p class="flex items-start gap-2 text-[11px] leading-relaxed text-stone-400">
                                <svg class="fp-i mt-0.5 h-3.5 w-3.5"><use href="#fp-shield"/></svg>
                                Data Anda hanya dipakai untuk mencarikan properti dan tidak dibagikan ke pihak lain.
                            </p>
                        </div>
                    </div>

                    {{-- Petunjuk masih ada konten di bawah --}}
                    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-5 bg-gradient-to-t from-white to-transparent"></div>
                </div>

                {{-- Footer tetap --}}
                <div class="flex shrink-0 items-center gap-3 border-t border-stone-100 bg-white px-5 pt-3 sm:px-8 sm:py-5"
                     style="padding-bottom: max(0.875rem, env(safe-area-inset-bottom));">
                    <button type="button" x-show="step > 1" @click="back()" aria-label="Kembali"
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-stone-300 text-stone-600 active:bg-stone-50 sm:w-auto sm:gap-1.5 sm:px-5 sm:text-sm sm:font-bold">
                        <svg class="fp-i h-4 w-4"><use href="#fp-arrow-left"/></svg><span class="hidden sm:inline">Kembali</span>
                    </button>

                    <button type="submit" :disabled="sending"
                            class="flex h-12 flex-1 items-center justify-center gap-2 rounded-xl bg-orange-500 text-sm font-bold text-white shadow-lg shadow-orange-500/30 transition-colors hover:bg-orange-600 active:scale-[.98] disabled:cursor-not-allowed disabled:opacity-70">
                        <svg x-show="sending" class="h-5 w-5 animate-spin" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25"/><path d="M4 12a8 8 0 018-8" stroke="currentColor" stroke-width="4" stroke-linecap="round" class="opacity-75"/></svg>
                        <span x-text="sending ? 'Mengirim...' : (step < total ? 'Lanjut' : 'Kirim Permintaan')"></span>
                        <svg x-show="!sending" class="fp-i h-4 w-4"><use :href="step < total ? '#fp-arrow-right' : '#fp-send'"/></svg>
                    </button>
                </div>
            </form>

            {{-- ===== SUKSES ===== --}}
            <div x-show="done" class="fp-step fp-scroll relative flex flex-1 flex-col items-center justify-center px-6 py-10 text-center sm:px-12">
                <button type="button" @click="closeModal(); reset()" aria-label="Tutup"
                        class="absolute right-4 top-3 flex h-10 w-10 items-center justify-center rounded-full bg-stone-100 text-stone-500 active:bg-stone-200 sm:right-6 sm:top-6">
                    <svg class="fp-i h-4 w-4"><use href="#fp-x"/></svg>
                </button>
                <div class="mb-5 flex h-20 w-20 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                    <svg class="fp-i h-10 w-10"><use href="#fp-ok"/></svg>
                </div>
                <h3 class="text-2xl font-extrabold text-stone-900">Permintaan Terkirim!</h3>
                <p class="mt-2 max-w-sm text-sm leading-relaxed text-stone-500">
                    Terima kasih, <span class="font-bold text-stone-700" x-text="form.name.split(' ')[0]"></span>. Agen kami akan menghubungi Anda di
                    <span class="font-bold text-stone-700" x-text="form.phone"></span> dengan pilihan properti yang paling cocok.
                </p>
                <div class="mt-6 w-full max-w-sm rounded-2xl bg-stone-50 p-4 text-left text-xs text-stone-600">
                    <p class="font-bold text-stone-800" x-text="summaryLine()"></p>
                    <p class="mt-1" x-text="budgetLabel() || 'Budget fleksibel'"></p>
                </div>
                <div class="mt-7 flex w-full max-w-sm flex-col gap-3 sm:flex-row">
                    <a href="{{ route('properties.index') }}" class="flex h-12 flex-1 items-center justify-center rounded-xl bg-orange-500 text-sm font-bold text-white shadow-lg shadow-orange-500/30 hover:bg-orange-600">Lihat Semua Properti</a>
                    <button type="button" @click="closeModal(); reset()" class="flex h-12 flex-1 items-center justify-center rounded-xl border border-stone-300 text-sm font-bold text-stone-600 active:bg-stone-50">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('propertyFinder', () => {
        // State non-reaktif (tidak memicu render)
        let scrollY = 0, locked = false, prevBody = {}, vvRaf = 0, saveTimer = 0, vvHandler = null;

        return {
            step: 1,
            total: 3,
            sending: false,
            done: false,
            kb: false,
            serverError: '',
            errors: {},
            titles: ['Properti seperti apa yang Anda cari?', 'Detail yang Anda inginkan', 'Ke mana kami menghubungi Anda?'],
            subtitles: [
                'Mulai dari yang utama: tipe, lokasi, dan budget.',
                'Semua opsional. Makin lengkap, makin tepat hasilnya.',
                'Terakhir, data diri agar agen kami bisa menghubungi Anda.'
            ],
            types: [
                { id: '1', label: 'Rumah',     icon: 'home' },
                { id: '2', label: 'Tanah',     icon: 'land' },
                { id: '3', label: 'Ruko',      icon: 'store' },
                { id: '4', label: 'Apartemen', icon: 'building' }
            ],
            featureList: ['Carport', 'Taman', 'Dekat Sekolah', 'Dekat Jalan Utama', 'Dekat Pasar', 'Lingkungan Aman', 'Bebas Banjir', 'Lantai 2'],
            form: {
                purpose: 'beli', type: '', location: '', budget_min: '', budget_max: '',
                bedrooms: '', bathrooms: '', land_min: '', certificate: '', features: [],
                payment: '', notes: '', name: '', phone: '', email: '', job: '',
                contact_time: 'Kapan saja', website: ''
            },

            // Alpine memanggil init() otomatis (jangan panggil lagi lewat x-init)
            init() {
                try {
                    const d = JSON.parse(localStorage.getItem('find_property_draft') || 'null');
                    if (d) Object.assign(this.form, d);
                } catch (e) {}

                // Simpan draf (tanpa data pribadi), di-debounce
                this.$watch('form', () => {
                    clearTimeout(saveTimer);
                    saveTimer = setTimeout(() => {
                        try {
                            const { name, phone, email, website, ...draft } = this.form;
                            localStorage.setItem('find_property_draft', JSON.stringify(draft));
                        } catch (e) {}
                    }, 400);
                });

                this.$watch('openFind', (v) => v ? this.lock() : this.unlock());
                if (this.openFind) this.lock();
            },

            // ---------- kunci scroll halaman (aman untuk iOS/Android) ----------
            lock() {
                if (locked) return;
                locked = true;
                scrollY = window.scrollY;
                const b = document.body;
                const sw = window.innerWidth - document.documentElement.clientWidth;
                prevBody = { position: b.style.position, top: b.style.top, width: b.style.width, paddingRight: b.style.paddingRight };
                b.style.position = 'fixed';
                b.style.top = '-' + scrollY + 'px';
                b.style.width = '100%';
                if (sw > 0) b.style.paddingRight = sw + 'px';

                this.syncViewport();
                if (window.visualViewport) {
                    vvHandler = () => { cancelAnimationFrame(vvRaf); vvRaf = requestAnimationFrame(() => this.syncViewport()); };
                    window.visualViewport.addEventListener('resize', vvHandler);
                    window.visualViewport.addEventListener('scroll', vvHandler);
                }
            },
            unlock() {
                if (!locked) return;
                locked = false;
                Object.assign(document.body.style, prevBody);
                window.scrollTo(0, scrollY);
                if (window.visualViewport && vvHandler) {
                    window.visualViewport.removeEventListener('resize', vvHandler);
                    window.visualViewport.removeEventListener('scroll', vvHandler);
                }
                vvHandler = null;
                this.kb = false;
            },
            // Modal mengikuti area yang benar-benar terlihat (saat keyboard HP muncul)
            syncViewport() {
                const vv = window.visualViewport;
                if (!vv) return;
                this.$root.style.setProperty('--fp-vh', vv.height + 'px');
                this.$root.style.setProperty('--fp-top', vv.offsetTop + 'px');
                this.kb = (window.innerHeight - vv.height) > 150 && window.innerWidth < 640;
            },
            onFocus(e) {
                if (window.innerWidth >= 640) return;
                const el = e.target;
                if (!el.matches('input, textarea, select')) return;
                setTimeout(() => el.scrollIntoView({ block: 'center', behavior: 'smooth' }), 280);
            },

            // ---------- helpers ----------
            digits(v) { return String(v || '').replace(/\D/g, ''); },
            fmt(v) { return v ? new Intl.NumberFormat('id-ID').format(v) : ''; },
            compact(n) {
                n = Number(n);
                if (n >= 1e9) return (n / 1e9).toFixed(n % 1e9 ? 1 : 0).replace('.', ',') + ' M';
                if (n >= 1e6) return Math.round(n / 1e6) + ' jt';
                return this.fmt(n);
            },
            typeLabel() { return (this.types.find(t => t.id === this.form.type) || {}).label || 'Properti'; },
            showRooms() { return ['1', '4', ''].includes(this.form.type); },
            showLand() { return ['1', '2', '3', ''].includes(this.form.type); },

            setPurpose(p) {
                if (this.form.purpose !== p) { this.form.purpose = p; this.form.budget_min = ''; this.form.budget_max = ''; }
            },
            budgetChips() {
                return this.form.purpose === 'sewa' ? [
                    { l: '< 10 jt',    min: '',         max: '10000000' },
                    { l: '10 - 25 jt', min: '10000000', max: '25000000' },
                    { l: '25 - 50 jt', min: '25000000', max: '50000000' },
                    { l: '> 50 jt',    min: '50000000', max: '' }
                ] : [
                    { l: '< 500 jt',     min: '',           max: '500000000' },
                    { l: '500 jt - 1 M', min: '500000000',  max: '1000000000' },
                    { l: '1 - 2 M',      min: '1000000000', max: '2000000000' },
                    { l: '2 - 5 M',      min: '2000000000', max: '5000000000' },
                    { l: '> 5 M',        min: '5000000000', max: '' }
                ];
            },
            budgetLabel() {
                const { budget_min: a, budget_max: b } = this.form;
                if (a && b) return 'Rp ' + this.compact(a) + ' - Rp ' + this.compact(b);
                if (b) return 'Maksimal Rp ' + this.compact(b);
                if (a) return 'Mulai Rp ' + this.compact(a);
                return '';
            },
            summaryLine() {
                const f = this.form;
                return (f.purpose === 'sewa' ? 'Sewa ' : 'Beli ') + this.typeLabel() + (f.location ? ' di ' + f.location : '');
            },
            extraSummary() {
                const f = this.form, p = [];
                if (f.bedrooms) p.push(f.bedrooms + '+ KT');
                if (f.bathrooms) p.push(f.bathrooms + '+ KM');
                if (f.land_min) p.push('LT ≥ ' + f.land_min + ' m²');
                if (f.certificate) p.push(f.certificate);
                if (f.payment && f.purpose === 'beli') p.push(f.payment);
                if (f.features.length) p.push(f.features.length + ' fasilitas');
                return p.join(' · ');
            },
            toggleFeature(f) {
                const i = this.form.features.indexOf(f);
                i > -1 ? this.form.features.splice(i, 1) : this.form.features.push(f);
            },

            // ---------- navigasi & validasi ----------
            validate(step) {
                const e = {}, f = this.form;
                if (step === 1) {
                    if (!f.type) e.type = 'Pilih tipe properti terlebih dahulu.';
                    if (f.location.trim().length < 2) e.location = 'Isi area atau lokasi yang diinginkan.';
                }
                if (step === 3) {
                    if (f.name.trim().length < 3) e.name = 'Nama minimal 3 karakter.';
                    if (!/^(\+?62|0)8\d{7,12}$/.test(f.phone.replace(/[\s-]/g, ''))) e.phone = 'Masukkan nomor HP yang valid, mis. 081234567890.';
                    if (!f.job) e.job = 'Pilih pekerjaan Anda.';
                }
                this.errors = e;
                return Object.keys(e).length === 0;
            },
            scrollTop() { this.$nextTick(() => { const s = this.$refs.scroller; if (s) s.scrollTop = 0; }); },
            next() { if (this.validate(this.step)) { this.step++; this.scrollTop(); } },
            back() { if (this.step > 1) { this.step--; this.errors = {}; this.scrollTop(); } },
            go(n) { this.step = n; this.errors = {}; this.scrollTop(); },

            // ---------- kirim ----------
            async submit() {
                if (!this.validate(3) || this.sending) return;
                if (this.form.website) return; // bot
                this.sending = true;
                this.serverError = '';
                try {
                    const payload = { ...this.form, phone: this.form.phone.replace(/[\s-]/g, '') };
                    const res = await fetch(@json(route('property-requests.store')), {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || ''
                        },
                        body: JSON.stringify(payload)
                    });
                    if (res.status === 422) {
                        const data = await res.json();
                        this.errors = Object.fromEntries(Object.entries(data.errors || {}).map(([k, v]) => [k, v[0]]));
                        this.serverError = 'Mohon periksa kembali isian Anda.';
                        return;
                    }
                    if (!res.ok) throw new Error('http ' + res.status);
                    this.done = true;
                    try { localStorage.removeItem('find_property_draft'); } catch (e) {}
                } catch (err) {
                    this.serverError = 'Koneksi bermasalah. Silakan coba lagi dalam beberapa saat.';
                } finally {
                    this.sending = false;
                }
            },

            closeModal() { this.openFind = false; },
            reset() {
                setTimeout(() => {
                    this.step = 1; this.done = false; this.errors = {}; this.serverError = '';
                    Object.assign(this.form, { type: '', location: '', budget_min: '', budget_max: '', bedrooms: '', bathrooms: '', land_min: '', certificate: '', features: [], payment: '', notes: '', name: '', phone: '', email: '', job: '' });
                }, 300);
            }
        };
    });
});
</script>
@endpush
