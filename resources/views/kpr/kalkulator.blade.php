@extends('components.layout.app')

@section('title', 'Kalkulator KPR — ' . config('company.name'))

@section('content')

@php
    $ring = 'focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60';
    $inp  = 'h-12 w-full rounded-xl border border-stone-300 bg-white px-3.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 hover:border-stone-400 focus:border-orange-400 focus:ring-4 focus:ring-orange-100';

    // Bank: kirim $banks dari controller (name, interest_rate, max_tenor, min_dp_percent). Bila kosong -> data CONTOH.
    $bankDummy = !isset($banks) || collect($banks)->isEmpty();
    $bankList  = $bankDummy
        ? collect([['BRI', 5.5, 25, 10], ['Bank Mandiri', 6.0, 30, 10], ['Bank BTN', 5.75, 25, 10], ['Bank BCA', 6.5, 20, 15], ['Bank Jatim', 6.25, 20, 10]])
            ->map(fn ($b) => ['name' => $b[0], 'rate' => $b[1], 'tenor' => $b[2], 'dp' => $b[3]])
        : collect($banks)->map(fn ($b) => ['name' => $b->name, 'rate' => (float) $b->interest_rate, 'tenor' => (int) $b->max_tenor, 'dp' => (float) ($b->min_dp_percent ?? 10)]);

    $hargaAwal = max(0, (int) request('price', 500000000));
    $waNo = preg_replace('/\D/', '', config('company.phone', ''));
    if (str_starts_with($waNo, '0')) $waNo = '62' . substr($waNo, 1);

    $tabs = [['konv', 'Simulasi KPR'], ['syariah', 'KPR Syariah'], ['mampu', 'Kemampuan KPR']];
@endphp

<div class="min-h-screen bg-stone-50 pb-28 lg:pb-14">

    {{-- HEADER --}}
    <div class="border-b border-stone-200 bg-white">
        <div class="mx-auto max-w-[1200px] px-4 py-8 lg:px-6 lg:py-10">
            <nav aria-label="Breadcrumb" class="mb-4 flex items-center gap-2 text-xs font-medium text-stone-500">
                <a href="{{ route('home') }}" class="hover:text-orange-600">Beranda</a><span>/</span><span class="text-stone-900">Kalkulator KPR</span>
            </nav>
            <h1 class="text-3xl font-bold tracking-tight text-stone-900 md:text-4xl">Kalkulator KPR</h1>
            <p class="mt-2 max-w-2xl text-sm text-stone-500 md:text-base">Hitung cicilan, uang muka, dan kemampuan KPR Anda dalam hitungan detik, tanpa perlu mendaftar.</p>
            <ul class="mt-5 flex flex-wrap gap-x-6 gap-y-2 text-sm text-stone-600">
                @foreach(['Gratis & tanpa registrasi', 'Hasil langsung berubah saat Anda mengisi', 'Bandingkan beberapa bank'] as $t)
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="h-4 w-4 text-orange-500"></i>{{ $t }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mx-auto max-w-[1200px] px-4 pt-8 lg:px-6">

        {{-- TAB --}}
        <div role="tablist" aria-label="Jenis simulasi" class="inline-flex max-w-full overflow-x-auto rounded-xl bg-stone-200/70 p-1 [scrollbar-width:none]">
            @foreach($tabs as $i => [$id, $label])
                <button type="button" role="tab" data-tab="{{ $id }}" aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                        class="shrink-0 rounded-lg px-4 py-2.5 text-sm font-semibold text-stone-600 transition aria-selected:bg-white aria-selected:text-orange-600 aria-selected:shadow-sm hover:text-stone-900 {{ $ring }}">{{ $label }}</button>
            @endforeach
        </div>

        <div class="mt-6 grid items-start gap-6 lg:grid-cols-[1fr_400px]">

            {{-- ================= FORM ================= --}}
            <div class="min-w-0 space-y-6">
                <section class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-stone-200 sm:p-7">
                    <h2 id="form-title" class="text-lg font-bold text-stone-900">Simulasi KPR</h2>
                    <p id="form-desc" class="mt-1 text-sm text-stone-500">Isi data properti dan pinjaman untuk melihat estimasi angsuran.</p>

                    <div class="mt-6 grid gap-5 sm:grid-cols-2">

                        <div data-for="konv syariah" class="sm:col-span-2">
                            <label for="f-harga" class="mb-1.5 block text-sm font-semibold text-stone-700">Harga properti</label>
                            <div class="flex"><span class="flex items-center rounded-l-xl border border-r-0 border-stone-300 bg-stone-50 px-3.5 text-sm font-semibold text-stone-500">Rp</span><input id="f-harga" inputmode="numeric" class="{{ $inp }} rounded-l-none js-money" value="{{ number_format($hargaAwal, 0, ',', '.') }}"></div>
                        </div>

                        <div data-for="konv syariah">
                            <label for="f-dprp" class="mb-1.5 block text-sm font-semibold text-stone-700">Uang muka (Rp)</label>
                            <div class="flex"><span class="flex items-center rounded-l-xl border border-r-0 border-stone-300 bg-stone-50 px-3.5 text-sm font-semibold text-stone-500">Rp</span><input id="f-dprp" inputmode="numeric" class="{{ $inp }} rounded-l-none js-money"></div>
                        </div>
                        <div data-for="konv syariah mampu">
                            <label for="f-dp" class="mb-1.5 block text-sm font-semibold text-stone-700">Uang muka (%)</label>
                            <div class="flex"><input id="f-dp" type="number" min="0" max="90" step="1" value="20" class="{{ $inp }} rounded-r-none"><span class="flex items-center rounded-r-xl border border-l-0 border-stone-300 bg-stone-50 px-3.5 text-sm font-semibold text-stone-500">%</span></div>
                            <p id="dp-hint" class="mt-1.5 hidden text-xs text-amber-600">Umumnya bank mensyaratkan DP minimal 10%.</p>
                        </div>

                        <div data-for="mampu" class="sm:col-span-2">
                            <label for="f-gaji" class="mb-1.5 block text-sm font-semibold text-stone-700">Penghasilan per bulan</label>
                            <div class="flex"><span class="flex items-center rounded-l-xl border border-r-0 border-stone-300 bg-stone-50 px-3.5 text-sm font-semibold text-stone-500">Rp</span><input id="f-gaji" inputmode="numeric" class="{{ $inp }} rounded-l-none js-money" value="15.000.000"></div>
                        </div>
                        <div data-for="mampu" class="sm:col-span-2">
                            <label for="f-lain" class="mb-1.5 block text-sm font-semibold text-stone-700">Cicilan lain per bulan <span class="font-normal text-stone-400">(opsional)</span></label>
                            <div class="flex"><span class="flex items-center rounded-l-xl border border-r-0 border-stone-300 bg-stone-50 px-3.5 text-sm font-semibold text-stone-500">Rp</span><input id="f-lain" inputmode="numeric" class="{{ $inp }} rounded-l-none js-money" value="0"></div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="f-tenor" class="mb-1.5 flex justify-between text-sm font-semibold text-stone-700">Jangka waktu (tenor)<output id="o-tenor" class="text-orange-600"></output></label>
                            <input id="f-tenor" type="range" min="1" max="30" step="1" value="20" class="w-full accent-orange-500">
                            <div class="mt-1 flex justify-between text-[11px] text-stone-400"><span>1 thn</span><span>30 thn</span></div>
                        </div>

                        <div data-for="konv mampu">
                            <label for="f-rate" class="mb-1.5 block text-sm font-semibold text-stone-700"><span data-for="konv">Bunga fixed</span><span data-for="mampu" class="hidden">Suku bunga</span></label>
                            <div class="flex"><input id="f-rate" type="number" min="0" max="30" step="0.05" value="{{ $bankList->min('rate') ?: 6 }}" class="{{ $inp }} rounded-r-none"><span class="flex items-center rounded-r-xl border border-l-0 border-stone-300 bg-stone-50 px-3.5 text-sm font-semibold text-stone-500">% /thn</span></div>
                        </div>
                        <div data-for="konv">
                            <label for="f-fix" class="mb-1.5 block text-sm font-semibold text-stone-700">Lama bunga fixed</label>
                            <div class="flex"><input id="f-fix" type="number" min="1" max="5" step="1" value="3" class="{{ $inp }} rounded-r-none"><span class="flex items-center rounded-r-xl border border-l-0 border-stone-300 bg-stone-50 px-3.5 text-sm font-semibold text-stone-500">tahun</span></div>
                            <p class="mt-1.5 text-xs text-stone-400">Maksimal 5 tahun.</p>
                        </div>
                        <div data-for="konv">
                            <label for="f-float" class="mb-1.5 block text-sm font-semibold text-stone-700">Bunga floating</label>
                            <div class="flex"><input id="f-float" type="number" min="0" max="30" step="0.05" value="11" class="{{ $inp }} rounded-r-none"><span class="flex items-center rounded-r-xl border border-l-0 border-stone-300 bg-stone-50 px-3.5 text-sm font-semibold text-stone-500">% /thn</span></div>
                        </div>
                        <div data-for="syariah">
                            <label for="f-margin" class="mb-1.5 block text-sm font-semibold text-stone-700">Margin (flat)</label>
                            <div class="flex"><input id="f-margin" type="number" min="0" max="30" step="0.05" value="8" class="{{ $inp }} rounded-r-none"><span class="flex items-center rounded-r-xl border border-l-0 border-stone-300 bg-stone-50 px-3.5 text-sm font-semibold text-stone-500">% /thn</span></div>
                        </div>
                    </div>
                </section>

                {{-- RINCIAN PER TAHUN --}}
                <section id="sec-jadwal" class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-stone-200 sm:p-7">
                    <h2 class="text-lg font-bold text-stone-900">Rincian angsuran per tahun</h2>
                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full min-w-[520px] text-sm">
                            <thead><tr class="border-b border-stone-200 text-left text-xs text-stone-500"><th class="py-2.5 pr-3 font-semibold">Tahun</th><th class="py-2.5 pr-3 font-semibold">Angsuran / bln</th><th class="py-2.5 pr-3 font-semibold">Bayar pokok</th><th class="py-2.5 pr-3 font-semibold">Bayar bunga</th><th class="py-2.5 text-right font-semibold">Sisa pinjaman</th></tr></thead>
                            <tbody id="jadwal" class="divide-y divide-stone-100"></tbody>
                        </table>
                    </div>
                    <button type="button" id="jadwal-more" class="mt-4 hidden items-center gap-1 text-sm font-semibold text-orange-600 hover:underline {{ $ring }} rounded">Tampilkan semua tahun <i data-lucide="chevron-down" class="h-4 w-4"></i></button>
                </section>
            </div>

            {{-- ================= HASIL (menempel) ================= --}}
            <aside id="hasil" class="scroll-mt-24 lg:sticky lg:top-24">
                <section class="relative isolate overflow-hidden rounded-2xl bg-stone-950 p-6 text-white shadow-xl shadow-stone-900/20 ring-1 ring-amber-400/25">
                    <div class="absolute inset-0 -z-10 [background-image:linear-gradient(rgba(255,255,255,0.06)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.06)_1px,transparent_1px)] [background-size:28px_28px] [-webkit-mask-image:linear-gradient(to_bottom,#000,transparent_65%)] [mask-image:linear-gradient(to_bottom,#000,transparent_65%)]" aria-hidden="true"></div>
                    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-amber-300 to-transparent" aria-hidden="true"></div>

                    <p class="text-sm font-semibold text-stone-300">Hasil simulasi</p>

                    {{-- Konvensional & syariah --}}
                    <div id="res-loan">
                        <p class="mt-4 text-xs text-stone-400" id="r-label">Angsuran per bulan</p>
                        <p id="r-cicilan" class="mt-1 text-4xl font-bold tracking-tight text-amber-300">Rp 0</p>
                        <p id="r-sub" class="mt-1 text-xs text-stone-400"></p>

                        <div class="mt-5">
                            <div class="flex h-2.5 overflow-hidden rounded-full bg-white/10"><span id="bar-pokok" class="bg-amber-400 transition-all" style="width:50%"></span><span id="bar-bunga" class="bg-orange-600 transition-all" style="width:50%"></span></div>
                            <div class="mt-2 flex justify-between text-[11px] text-stone-400"><span><i class="mr-1 inline-block h-2 w-2 rounded-sm bg-amber-400"></i>Pokok</span><span><i class="mr-1 inline-block h-2 w-2 rounded-sm bg-orange-600"></i>Bunga / margin</span></div>
                        </div>

                        <dl class="mt-5 space-y-3 border-t border-white/10 pt-5 text-sm">
                            <div class="flex justify-between gap-4"><dt class="text-stone-400">Harga properti</dt><dd id="r-harga" class="font-semibold"></dd></div>
                            <div class="flex justify-between gap-4"><dt class="text-stone-400">Uang muka</dt><dd id="r-dp" class="font-semibold"></dd></div>
                            <div class="flex justify-between gap-4"><dt class="text-stone-400">Plafon pinjaman</dt><dd id="r-plafon" class="font-semibold"></dd></div>
                            <div class="flex justify-between gap-4"><dt class="text-stone-400">Total bunga / margin</dt><dd id="r-bunga" class="font-semibold"></dd></div>
                            <div class="flex justify-between gap-4 border-t border-white/10 pt-3"><dt class="text-stone-300">Total pembayaran</dt><dd id="r-total" class="font-bold text-amber-300"></dd></div>
                        </dl>
                    </div>

                    {{-- Kemampuan KPR --}}
                    <div id="res-mampu" class="hidden">
                        <p class="mt-4 text-xs text-stone-400">Harga properti maksimal</p>
                        <p id="m-harga" class="mt-1 text-4xl font-bold tracking-tight text-amber-300">Rp 0</p>
                        <dl class="mt-5 space-y-3 border-t border-white/10 pt-5 text-sm">
                            <div class="flex justify-between gap-4"><dt class="text-stone-400">Angsuran maksimal disarankan</dt><dd id="m-angsuran" class="font-semibold"></dd></div>
                            <div class="flex justify-between gap-4"><dt class="text-stone-400">Uang muka yang disiapkan</dt><dd id="m-dp" class="font-semibold"></dd></div>
                            <div class="flex justify-between gap-4"><dt class="text-stone-400">Plafon pinjaman</dt><dd id="m-plafon" class="font-semibold"></dd></div>
                        </dl>
                        <p class="mt-4 text-[11px] leading-relaxed text-stone-500">Dihitung dari 30% penghasilan setelah dikurangi cicilan lain, memakai suku bunga yang Anda isi.</p>
                    </div>

                    <a id="wa-cta" href="#" target="_blank" rel="noopener" class="mt-6 flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-amber-400 text-sm font-bold text-stone-950 transition hover:bg-white {{ $ring }}"><i data-lucide="message-circle" class="h-5 w-5"></i> Konsultasi & ajukan KPR</a>
                    <p class="mt-3 text-[11px] leading-relaxed text-stone-500">Hasil berupa estimasi dan dapat berbeda dengan ketentuan bank saat pengajuan.</p>
                </section>
            </aside>
        </div>

        {{-- PILIHAN BANK --}}
        <section class="mt-12" aria-label="Pilihan bank KPR">
            <div class="mb-5 flex flex-wrap items-end justify-between gap-2">
                <div>
                    <h2 class="text-xl font-bold text-stone-900">Pilih produk KPR terbaik</h2>
                    <p class="mt-1 text-sm text-stone-500">Angsuran dihitung dari harga dan uang muka pada kalkulator, dengan tenor maksimal tiap bank.</p>
                </div>
                @if($bankDummy)<span class="rounded-md bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-800">Data bunga contoh</span>@endif
            </div>
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($bankList as $i => $b)
                    <article class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-stone-200 transition hover:-translate-y-0.5 hover:shadow-lg hover:ring-orange-300">
                        <div class="flex items-center gap-3">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-50 text-base font-bold text-orange-600">{{ mb_substr(preg_replace('/^Bank\s+/i', '', $b['name']), 0, 1) }}</span>
                            <h3 class="text-base font-bold text-stone-900">{{ $b['name'] }}</h3>
                        </div>
                        <dl class="mt-4 grid grid-cols-2 gap-3 text-sm">
                            <div><dt class="text-xs text-stone-500">Bunga mulai</dt><dd class="font-bold text-stone-900">{{ rtrim(rtrim(number_format($b['rate'], 2, ',', '.'), '0'), ',') }}%</dd></div>
                            <div><dt class="text-xs text-stone-500">Tenor maks.</dt><dd class="font-bold text-stone-900">{{ $b['tenor'] }} tahun</dd></div>
                        </dl>
                        <div class="mt-4 border-t border-stone-100 pt-4">
                            <p class="text-xs text-stone-500">Angsuran mulai dari</p>
                            <p class="bank-pay text-xl font-bold text-orange-600" data-i="{{ $i }}">Rp 0</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- TIPS --}}
        <section class="mt-12" aria-label="Pertanyaan umum">
            <h2 class="mb-4 text-xl font-bold text-stone-900">Pertanyaan seputar KPR</h2>
            <div class="divide-y divide-stone-200 rounded-2xl bg-white ring-1 ring-stone-200">
                @foreach([
                    ['Berapa uang muka (DP) minimal?', 'Umumnya 10–20% dari harga properti, tergantung bank dan jenis properti. Semakin besar DP, semakin kecil plafon dan cicilan.'],
                    ['Apa beda bunga fixed dan floating?', 'Bunga fixed tetap selama masa tertentu (biasanya 1–5 tahun). Setelah itu bunga floating mengikuti suku bunga pasar sehingga cicilan bisa berubah.'],
                    ['Berapa cicilan yang aman?', 'Banyak bank menyarankan total cicilan tidak melebihi sekitar 30% dari penghasilan bulanan. Gunakan tab "Kemampuan KPR" untuk memeriksanya.'],
                ] as [$q, $a])
                    <details class="group px-5 py-4">
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 rounded text-sm font-semibold text-stone-900 {{ $ring }}">{{ $q }}<i data-lucide="plus" class="h-4 w-4 shrink-0 text-orange-500 transition-transform group-open:rotate-45"></i></summary>
                        <p class="mt-2 text-sm leading-relaxed text-stone-600">{{ $a }}</p>
                    </details>
                @endforeach
            </div>
        </section>
    </div>
</div>

{{-- Ringkasan menempel di HP --}}
<div class="fixed inset-x-0 bottom-0 z-40 flex items-center gap-3 border-t border-stone-200 bg-white/95 px-4 pt-3 pb-[max(0.75rem,env(safe-area-inset-bottom))] backdrop-blur lg:hidden">
    <div class="min-w-0 flex-1 leading-tight"><p class="text-[11px] text-stone-500" id="bar-label">Angsuran per bulan</p><p id="bar-cicilan" class="truncate text-lg font-bold text-orange-600">Rp 0</p></div>
    <a href="#hasil" class="inline-flex h-11 shrink-0 items-center rounded-xl bg-stone-900 px-5 text-sm font-bold text-white {{ $ring }}">Lihat hasil</a>
</div>

@endsection

@push('styles')
<style>html { scroll-behavior: smooth; }</style>
@endpush

@push('scripts')
<script>
(function () {
    var BANKS = @json($bankList->values());
    var WA = @json($waNo);
    var $ = function (id) { return document.getElementById(id); };
    var fmt = function (n) { return 'Rp ' + Math.round(isFinite(n) ? n : 0).toLocaleString('id-ID'); };
    var num = function (id) { return parseFloat(String($(id).value).replace(',', '.')) || 0; };
    var money = function (id) { return parseInt(String($(id).value).replace(/\D/g, ''), 10) || 0; };
    var tab = 'konv', showAll = false, lock = false;

    var TITLES = {
        konv: ['Simulasi KPR', 'Isi data properti dan pinjaman untuk melihat estimasi angsuran.'],
        syariah: ['KPR Syariah', 'Pembiayaan dengan margin flat sehingga angsuran bulanan tetap sama.'],
        mampu: ['Kemampuan KPR', 'Cari tahu harga properti yang sesuai dengan penghasilan Anda.']
    };

    function annuity(P, r, n) { return r ? P * r / (1 - Math.pow(1 + r, -n)) : P / n; }

    // Jadwal bulanan: [{pay, i, p, b}]
    function scheduleKonv(P, rf, fy, rfl, n) {
        var bal = P, out = [], r1 = rf / 1200, r2 = rfl / 1200, pay = 0;
        fy = Math.min(fy, Math.floor(n / 12) || 1);
        for (var m = 1; m <= n; m++) {
            var r = m <= fy * 12 ? r1 : r2;
            if (m === 1 || m === fy * 12 + 1) pay = annuity(bal, r, n - m + 1);
            var i = bal * r, p = pay - i; bal = Math.max(0, bal - p);
            out.push({ pay: pay, i: i, p: p, b: bal });
        }
        return out;
    }
    function scheduleSyariah(P, mg, n) {
        var out = [], bal = P, i = P * mg / 1200, p = P / n;
        for (var m = 1; m <= n; m++) { bal = Math.max(0, bal - p); out.push({ pay: p + i, i: i, p: p, b: bal }); }
        return out;
    }

    function renderJadwal(s) {
        var years = Math.ceil(s.length / 12), rows = '';
        for (var y = 1; y <= years; y++) {
            var part = s.slice((y - 1) * 12, y * 12), pk = 0, bg = 0;
            part.forEach(function (x) { pk += x.p; bg += x.i; });
            var hidden = !showAll && y > 5 ? ' hidden' : '';
            rows += '<tr class="' + hidden.trim() + '"><td class="py-3 pr-3 font-semibold text-stone-900">' + y + '</td><td class="py-3 pr-3">' + fmt(part[0].pay) + '</td><td class="py-3 pr-3">' + fmt(pk) + '</td><td class="py-3 pr-3">' + fmt(bg) + '</td><td class="py-3 text-right">' + fmt(part[part.length - 1].b) + '</td></tr>';
        }
        $('jadwal').innerHTML = rows;
        var more = $('jadwal-more');
        more.classList.toggle('hidden', years <= 5 || showAll); more.classList.toggle('inline-flex', years > 5 && !showAll);
    }

    function calc() {
        var tenor = num('f-tenor'), n = tenor * 12, dpPct = num('f-dp');
        $('o-tenor').textContent = tenor + ' tahun';
        $('dp-hint').classList.toggle('hidden', dpPct >= 10 || tab === 'mampu' && false);
        var msg = '', main = 0;

        if (tab === 'mampu') {
            var gaji = money('f-gaji'), lain = money('f-lain'), r = num('f-rate') / 1200;
            var angs = Math.max(0, gaji * 0.3 - lain);
            var plafon = r ? angs * (1 - Math.pow(1 + r, -n)) / r : angs * n;
            var harga = plafon / (1 - dpPct / 100);
            $('m-harga').textContent = fmt(harga); $('m-angsuran').textContent = fmt(angs); $('m-dp').textContent = fmt(harga * dpPct / 100); $('m-plafon').textContent = fmt(plafon);
            main = angs; $('bar-label').textContent = 'Harga properti maksimal'; $('bar-cicilan').textContent = fmt(harga);
            msg = 'Halo, saya ingin konsultasi KPR. Penghasilan ' + fmt(gaji) + '/bln, tenor ' + tenor + ' tahun. Hasil simulasi: harga properti maksimal ' + fmt(harga) + ' (DP ' + dpPct + '%).';
            $('sec-jadwal').classList.add('hidden');
        } else {
            var hargaP = money('f-harga'), dp = hargaP * dpPct / 100, P = Math.max(0, hargaP - dp), s;
            if (tab === 'konv') { s = scheduleKonv(P, num('f-rate'), num('f-fix') || 1, num('f-float'), n); }
            else { s = scheduleSyariah(P, num('f-margin'), n); }
            var tot = 0, bunga = 0; s.forEach(function (x) { tot += x.pay; bunga += x.i; });
            var first = s[0] ? s[0].pay : 0, fixM = Math.min((num('f-fix') || 1) * 12, n);
            $('r-cicilan').textContent = fmt(first);
            $('r-sub').textContent = tab === 'konv' && fixM < n && s[fixM] ? 'Selama ' + (num('f-fix') || 1) + ' tahun pertama. Setelah bunga floating: ± ' + fmt(s[fixM].pay) + ' / bln' : 'Angsuran tetap sepanjang tenor';
            $('r-harga').textContent = fmt(hargaP); $('r-dp').textContent = fmt(dp) + ' (' + dpPct + '%)'; $('r-plafon').textContent = fmt(P);
            $('r-bunga').textContent = fmt(bunga); $('r-total').textContent = fmt(tot);
            var pkPct = tot ? Math.round(P / tot * 100) : 50; $('bar-pokok').style.width = pkPct + '%'; $('bar-bunga').style.width = (100 - pkPct) + '%';
            main = first; $('bar-label').textContent = 'Angsuran per bulan'; $('bar-cicilan').textContent = fmt(first);
            msg = 'Halo, saya ingin konsultasi KPR. Harga properti ' + fmt(hargaP) + ', DP ' + dpPct + '%, tenor ' + tenor + ' tahun. Estimasi angsuran ' + fmt(first) + ' per bulan.';
            $('sec-jadwal').classList.remove('hidden'); renderJadwal(s);

            // Angsuran tiap bank pada harga & DP yang sama
            document.querySelectorAll('.bank-pay').forEach(function (el) {
                var b = BANKS[el.dataset.i]; el.textContent = fmt(annuity(P, b.rate / 1200, b.tenor * 12));
            });
        }
        $('wa-cta').href = WA ? 'https://wa.me/' + WA + '?text=' + encodeURIComponent(msg) : '#';
    }

    function setTab(t) {
        tab = t;
        document.querySelectorAll('[data-tab]').forEach(function (b) { b.setAttribute('aria-selected', b.dataset.tab === t); });
        document.querySelectorAll('[data-for]').forEach(function (el) { el.classList.toggle('hidden', el.dataset.for.split(' ').indexOf(t) === -1); });
        $('form-title').textContent = TITLES[t][0]; $('form-desc').textContent = TITLES[t][1];
        $('res-loan').classList.toggle('hidden', t === 'mampu'); $('res-mampu').classList.toggle('hidden', t !== 'mampu');
        calc();
    }

    // Input uang: format titik ribuan
    document.querySelectorAll('.js-money').forEach(function (el) {
        el.addEventListener('input', function () { var d = el.value.replace(/\D/g, ''); el.value = d ? parseInt(d, 10).toLocaleString('id-ID') : ''; });
    });
    // DP Rp <-> DP %
    function dpFromPct() { var h = money('f-harga'); $('f-dprp').value = Math.round(h * num('f-dp') / 100).toLocaleString('id-ID'); }
    $('f-harga').addEventListener('input', dpFromPct);
    $('f-dp').addEventListener('input', dpFromPct);
    $('f-dprp').addEventListener('input', function () { var h = money('f-harga'); if (h) $('f-dp').value = Math.min(90, Math.round(money('f-dprp') / h * 1000) / 10); });

    document.querySelectorAll('input').forEach(function (el) { el.addEventListener('input', calc); });
    document.querySelectorAll('[data-tab]').forEach(function (b) { b.addEventListener('click', function () { setTab(b.dataset.tab); }); });
    $('jadwal-more').addEventListener('click', function () { showAll = true; calc(); });

    dpFromPct(); setTab('konv');
})();
</script>
@endpush
