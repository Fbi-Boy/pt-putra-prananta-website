@extends('components.layout.app')

@section('title', $property->title . ' — ' . config('company.name'))

@section('content')

@php
    $isSale   = $property->listing_type === 'sale';
    $area     = $property->area?->name;
    $agent    = $property->agent;
    $banks    = $banks ?? collect();
    $url      = url()->current();
    $ring     = 'focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60';

    // Foto: foto utama di depan, tanpa duplikat
    $fallback = asset('images/property/rumah1.jpg');
    $fotos = collect([$property->primaryImage ? ['t' => $property->primaryImage->medium_url, 'f' => $property->primaryImage->large_url ?? $property->primaryImage->medium_url] : null])->filter()
        ->merge($property->images->map(fn ($i) => ['t' => $i->medium_url, 'f' => $i->large_url ?? $i->medium_url]))
        ->unique('f')->values();
    if ($fotos->isEmpty()) $fotos = collect([['t' => $fallback, 'f' => $fallback]]);

    $negotiable = (bool) ($property->is_negotiable ?? false);
    $verified   = (bool) ($property->is_verified ?? false);
    $harga      = is_numeric($property->price ?? null) ? (int) $property->price : null;
    $bankMin    = $isSale ? $banks->sortBy('estimated_installment')->first() : null;
    $hargaM2    = $isSale && $harga && $property->land_area > 0 ? $harga / $property->land_area : null;
    $bungaAwal  = $banks->min('interest_rate') ?: 7.5;
    $alamat     = collect([$property->address, $area, 'Jember'])->filter()->join(', ');

    $n = preg_replace('/\D/', '', $agent?->whatsapp ?? $agent?->phone ?? '');
    if ($n !== '' && str_starts_with($n, '0')) $n = '62' . substr($n, 1);
    $waUrl = $n ? 'https://wa.me/' . $n . '?text=' . rawurlencode('Halo ' . $agent->name . ', saya tertarik dengan "' . $property->title . '" (' . $url . '). Apakah masih tersedia?') : null;
    $tel   = preg_replace('/[^+\d]/', '', $agent?->phone ?? $agent?->whatsapp ?? '');

    $rows = array_filter([
        'Transaksi'     => $isSale ? 'Dijual' : 'Disewa',
        'Tipe properti' => $property->type?->name,
        'Kamar tidur'   => $property->bedrooms ?: null,
        'Kamar mandi'   => $property->bathrooms ?: null,
        'Luas tanah'    => $property->land_area ? $property->land_area . ' m²' : null,
        'Luas bangunan' => $property->building_area ? $property->building_area . ' m²' : null,
        'Jumlah lantai' => $property->floors ?? null,
        'Sertifikat'    => $property->certificate ?? null,
        'Listrik'       => ($property->electricity ?? null) ? $property->electricity . ' Watt' : null,
        'Diperbarui'    => $property->updated_at?->locale('id')->translatedFormat('d F Y'),
    ]);

    $facts = collect([
        ['bed-double', 'Kamar tidur', $property->bedrooms ?: null],
        ['bath', 'Kamar mandi', $property->bathrooms ?: null],
        ['maximize', 'Luas tanah', $property->land_area ? $property->land_area . ' m²' : null],
        ['home', 'Luas bangunan', $property->building_area ? $property->building_area . ' m²' : null],
    ])->filter(fn ($s) => $s[2]);

    $desc = trim((string) ($property->description ?? ''));
    $descLong = mb_strlen($desc) > 380;

    $faq = array_values(array_filter([
        ['Berapa harga ' . $property->title . '?', 'Harga properti ini ' . $property->price_formatted . ($negotiable ? ' (dapat dinegosiasi)' : '') . '.'],
        ($property->land_area || $property->building_area) ? ['Berapa luas tanah dan bangunannya?', 'Luas tanah ' . ($property->land_area ?: '-') . ' m² dan luas bangunan ' . ($property->building_area ?: '-') . ' m².'] : null,
        $property->bedrooms ? ['Berapa kamar tidur dan kamar mandinya?', $property->bedrooms . ' kamar tidur dan ' . ($property->bathrooms ?: 0) . ' kamar mandi.'] : null,
        ['Di mana lokasi properti ini?', $alamat . '.'],
        $bankMin ? ['Berapa estimasi cicilan KPR-nya?', 'Mulai Rp ' . number_format($bankMin->estimated_installment, 0, ',', '.') . ' per bulan dengan tenor hingga ' . $bankMin->max_tenor . ' tahun (' . $bankMin->name . '). Angka ini estimasi.'] : null,
    ]));

    $nav = [['ringkasan', 'Ringkasan'], ['detail', 'Detail'], ['lokasi', 'Lokasi'], ['kpr', 'Simulasi KPR'], ['faq', 'FAQ']];
@endphp

<div class="min-h-screen bg-white pb-28 lg:pb-12" style="--nav-h:5rem">

    <div class="mx-auto max-w-[1440px] px-4 pt-5 lg:px-6">
        <nav aria-label="Breadcrumb" class="mb-4 flex min-w-0 items-center gap-2 text-xs font-medium text-stone-500">
            <a href="{{ route('home') }}" class="shrink-0 hover:text-orange-600">Beranda</a><span>/</span>
            <a href="{{ route('properties.sale') }}" class="shrink-0 hover:text-orange-600">Properti</a><span>/</span>
            <span class="truncate text-stone-900">{{ $property->title }}</span>
        </nav>

        <section aria-label="Galeri foto">
            <div class="hidden md:grid grid-cols-4 grid-rows-2 gap-2 h-[460px] overflow-hidden rounded-xl">
                <button type="button" data-open="0" class="group relative col-span-2 row-span-2 overflow-hidden {{ $ring }}" aria-label="Buka galeri foto">
                    <img src="{{ $fotos[0]['t'] }}" alt="{{ $property->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    <span class="absolute bottom-4 left-4 inline-flex items-center gap-2 rounded-lg bg-white/90 px-3.5 py-2 text-xs font-bold text-stone-900 shadow-lg backdrop-blur">
                        <i data-lucide="images" class="w-4 h-4"></i> Lihat semua {{ $fotos->count() }} foto
                    </span>
                </button>
                @for($i = 1; $i <= 4; $i++)
                    @if($f = $fotos->get($i))
                        <button type="button" data-open="{{ $i }}" class="group relative overflow-hidden {{ $ring }}" aria-label="Buka foto {{ $i + 1 }}">
                            <img src="{{ $f['t'] }}" alt="Foto {{ $i + 1 }}" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            @if($i === 4 && $fotos->count() > 5)
                                <span class="absolute inset-0 flex items-center justify-center bg-stone-950/55 text-lg font-bold text-white">+{{ $fotos->count() - 5 }}</span>
                            @endif
                        </button>
                    @else
                        <div class="flex items-center justify-center bg-stone-100 text-stone-300"><i data-lucide="image" class="w-8 h-8"></i></div>
                    @endif
                @endfor
            </div>

            <div class="md:hidden relative">
                <div class="flex snap-x snap-mandatory gap-2 overflow-x-auto rounded-xl [scrollbar-width:none]">
                    @foreach($fotos as $i => $f)
                        <button type="button" data-open="{{ $i }}" class="aspect-[4/3] w-full shrink-0 snap-center overflow-hidden" aria-label="Buka foto {{ $i + 1 }}">
                            <img src="{{ $f['t'] }}" alt="Foto {{ $i + 1 }}" @if($i) loading="lazy" @endif class="h-full w-full object-cover">
                        </button>
                    @endforeach
                </div>
                <span class="pointer-events-none absolute bottom-3 right-3 inline-flex items-center gap-1 rounded-md bg-black/60 px-2 py-1 text-[11px] font-semibold text-white backdrop-blur"><i data-lucide="camera" class="w-3 h-3"></i>{{ $fotos->count() }} foto</span>
            </div>
        </section>
    </div>

    {{-- SUB-NAVIGASI menempel --}}
    <div class="sticky top-[var(--nav-h)] z-30 mt-5 border-y border-stone-200 bg-white/95 backdrop-blur">
        <nav aria-label="Bagian halaman" class="mx-auto flex max-w-[1440px] gap-6 overflow-x-auto px-4 [scrollbar-width:none] lg:px-6">
            @foreach($nav as $i => [$id, $label])
                <a href="#{{ $id }}" data-spy-link="{{ $id }}" class="shrink-0 border-b-2 py-3.5 text-sm font-semibold transition {{ $i === 0 ? 'border-orange-500 text-orange-600' : 'border-transparent text-stone-500 hover:text-stone-900' }}">{{ $label }}</a>
            @endforeach
        </nav>
    </div>

    <div class="mx-auto max-w-[1440px] px-4 lg:px-6">
        <div class="grid grid-cols-1 items-start gap-x-12 lg:grid-cols-[1fr_360px]">

            {{-- KIRI --}}
            <div class="min-w-0 divide-y divide-stone-200">

                {{-- RINGKASAN --}}
                <section id="ringkasan" data-spy class="scroll-mt-36 py-8">
                    <div class="flex flex-wrap items-center gap-2 mb-3">
                        <span class="rounded-md bg-stone-100 px-2.5 py-1 text-[11px] font-bold text-stone-700">{{ $property->type?->name ?? 'Properti' }}</span>
                        <span class="rounded-md bg-orange-100 px-2.5 py-1 text-[11px] font-bold text-orange-700">{{ $isSale ? 'Dijual' : 'Disewa' }}</span>
                        @if($verified)<span class="inline-flex items-center gap-1 rounded-md bg-emerald-50 px-2.5 py-1 text-[11px] font-bold text-emerald-700"><i data-lucide="badge-check" class="w-3.5 h-3.5"></i>Terverifikasi</span>@endif
                        @if($property->badge)<span class="rounded-md bg-red-500 px-2.5 py-1 text-[11px] font-bold text-white">{{ $property->badge['label'] }}</span>@endif
                    </div>

                    <div class="flex items-start justify-between gap-4">
                        <div class="min-w-0">
                            <h1 class="text-2xl font-bold leading-tight text-stone-900 md:text-[1.75rem]">{{ $property->title }}</h1>
                            <p class="mt-2 flex items-start gap-1.5 text-sm text-stone-500"><i data-lucide="map-pin" class="mt-0.5 h-4 w-4 shrink-0 text-orange-500"></i>{{ $alamat }}</p>
                        </div>
                        <div class="flex shrink-0 gap-2">
                            <button type="button" data-fav="{{ $property->id }}" aria-pressed="false" aria-label="Simpan ke favorit" title="Simpan"
                                    class="flex h-11 w-11 items-center justify-center rounded-xl text-stone-700 ring-1 ring-stone-300 transition hover:bg-stone-50 aria-pressed:text-red-500 aria-pressed:ring-red-200 [&[aria-pressed=true]_svg]:fill-red-500 {{ $ring }}"><i data-lucide="heart" class="w-5 h-5"></i></button>
                            <button type="button" data-share="{{ $url }}" data-title="{{ $property->title }}" aria-label="Bagikan" title="Bagikan"
                                    class="flex h-11 w-11 items-center justify-center rounded-xl text-stone-700 ring-1 ring-stone-300 transition hover:bg-stone-50 {{ $ring }}"><i data-lucide="share-2" class="w-5 h-5"></i></button>
                        </div>
                    </div>

                    <div class="mt-6">
                        <p class="text-3xl font-bold tracking-tight text-stone-900 md:text-4xl">{{ $property->price_formatted }}<span class="text-base font-medium text-stone-500">{{ $property->price_unit ? '/' . $property->price_unit : '' }}</span>@if($negotiable)<span class="ml-2 align-middle rounded-md bg-amber-100 px-2 py-0.5 text-xs font-semibold text-amber-800">Bisa nego</span>@endif</p>
                        @if($hargaM2)<p class="mt-1 text-sm text-stone-500">± Rp {{ number_format($hargaM2, 0, ',', '.') }} per m² tanah</p>@endif
                        @if($bankMin)
                            <a href="#kpr" class="mt-3 inline-flex flex-wrap items-center gap-x-2 text-sm text-stone-600 hover:text-orange-600 transition">
                                <i data-lucide="calculator" class="h-4 w-4 text-orange-500"></i>
                                Estimasi cicilan <b class="text-stone-900">Rp {{ number_format($bankMin->estimated_installment, 0, ',', '.') }} / bln</b>
                                <span class="font-semibold text-orange-600">Cek kemampuan KPR →</span>
                            </a>
                        @endif
                    </div>

                    @if($facts->isNotEmpty())
                        <dl class="mt-7 flex flex-wrap gap-x-10 gap-y-5">
                            @foreach($facts as [$ic, $label, $val])
                                <div class="flex items-center gap-3">
                                    <i data-lucide="{{ $ic }}" class="h-6 w-6 text-stone-400"></i>
                                    <div><dd class="text-base font-bold text-stone-900">{{ $val }}</dd><dt class="text-xs text-stone-500">{{ $label }}</dt></div>
                                </div>
                            @endforeach
                        </dl>
                    @endif
                </section>

                {{-- DETAIL --}}
                <section id="detail" data-spy class="scroll-mt-36 py-8">
                    <h2 class="mb-3 text-xl font-bold text-stone-900">Tentang properti ini</h2>
                    <input id="desc-more" type="checkbox" class="peer sr-only">
                    <div class="text-sm leading-relaxed text-stone-600 {{ $descLong ? 'line-clamp-6 peer-checked:line-clamp-none' : '' }}">{!! nl2br(e($desc !== '' ? $desc : 'Belum ada deskripsi.')) !!}</div>
                    @if($descLong)
                        <label for="desc-more" class="mt-3 inline-flex cursor-pointer items-center gap-1 rounded text-sm font-semibold text-orange-600 hover:text-orange-700 peer-focus-visible:ring-4 peer-focus-visible:ring-orange-300/60 peer-checked:[&_i]:rotate-180">
                            Baca selengkapnya <i data-lucide="chevron-down" class="h-4 w-4 transition-transform"></i>
                        </label>
                    @endif

                    <h3 class="mb-2 mt-8 text-base font-bold text-stone-900">Detail properti</h3>
                    <dl class="grid grid-cols-1 gap-x-10 sm:grid-cols-2">
                        @foreach($rows as $k => $v)
                            <div class="flex items-center justify-between gap-4 border-b border-stone-100 py-3 text-sm"><dt class="text-stone-500">{{ $k }}</dt><dd class="text-right font-semibold text-stone-900">{{ $v }}</dd></div>
                        @endforeach
                    </dl>

                    @if($property->facilities->count() > 0)
                        <h3 class="mb-3 mt-8 text-base font-bold text-stone-900">Fasilitas</h3>
                        <ul class="grid grid-cols-2 gap-x-6 gap-y-3 sm:grid-cols-3">
                            @foreach($property->facilities as $fac)
                                <li class="flex items-center gap-2.5 text-sm text-stone-700"><i data-lucide="{{ $fac->icon ?? 'check' }}" class="h-4 w-4 shrink-0 text-orange-500"></i>{{ $fac->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </section>

                {{-- LOKASI --}}
                <section id="lokasi" data-spy class="scroll-mt-36 py-8">
                    <div class="mb-4 flex items-center justify-between gap-3">
                        <h2 class="text-xl font-bold text-stone-900">Lokasi</h2>
                        @unless($property->show_exact_location)<span class="inline-flex items-center gap-1 rounded-md bg-stone-100 px-2.5 py-1 text-xs font-medium text-stone-500"><i data-lucide="shield-check" class="h-3.5 w-3.5"></i> Area disamarkan</span>@endunless
                    </div>
                    @if($property->latitude && $property->longitude)
                        <div id="property-map" class="h-[320px] w-full rounded-xl"></div>
                    @else
                        <div class="flex h-[320px] w-full flex-col items-center justify-center rounded-xl bg-stone-100 text-stone-400"><i data-lucide="map" class="mb-2 h-10 w-10"></i><p class="text-sm">Koordinat lokasi belum tersedia.</p></div>
                    @endif
                </section>

                {{-- SIMULASI KPR --}}
                @if($isSale)
                <section id="kpr" data-spy class="scroll-mt-36 py-8">
                    <h2 class="text-xl font-bold text-stone-900">Simulasi KPR</h2>
                    <p class="mt-1 text-sm text-stone-500">Geser untuk melihat estimasi cicilan per bulan.</p>

                    <div id="kpr-calc" class="mt-5 grid gap-6 rounded-2xl p-5 ring-1 ring-stone-200 sm:p-6 md:grid-cols-2">
                        <div class="space-y-5">
                            <label class="block text-sm font-semibold text-stone-700">Harga properti (Rp)
                                <input id="kc-harga" type="number" min="0" step="1000000" value="{{ $harga ?? '' }}" placeholder="Masukkan harga" class="mt-1.5 h-11 w-full rounded-xl border border-stone-300 px-3 text-sm font-normal outline-none transition focus:border-orange-400 focus:ring-4 focus:ring-orange-100">
                            </label>
                            <label class="block text-sm font-semibold text-stone-700"><span class="flex justify-between">Uang muka (DP)<output id="kc-dp-out" class="text-orange-600"></output></span>
                                <input id="kc-dp" type="range" min="5" max="70" step="5" value="20" class="mt-2 w-full accent-orange-500">
                            </label>
                            <label class="block text-sm font-semibold text-stone-700"><span class="flex justify-between">Tenor<output id="kc-tenor-out" class="text-orange-600"></output></span>
                                <input id="kc-tenor" type="range" min="5" max="30" step="1" value="{{ min(20, $banks->max('max_tenor') ?: 20) }}" class="mt-2 w-full accent-orange-500">
                            </label>
                            <label class="block text-sm font-semibold text-stone-700"><span class="flex justify-between">Bunga per tahun<output id="kc-bunga-out" class="text-orange-600"></output></span>
                                <input id="kc-bunga" type="range" min="3" max="15" step="0.25" value="{{ $bungaAwal }}" class="mt-2 w-full accent-orange-500">
                            </label>
                        </div>
                        <div class="flex flex-col justify-center rounded-xl bg-stone-950 p-6 text-white">
                            <p class="text-xs text-stone-400">Cicilan per bulan</p>
                            <p id="kc-cicilan" class="mt-1 text-3xl font-bold text-amber-300">Rp 0</p>
                            <dl class="mt-5 space-y-2.5 border-t border-white/10 pt-4 text-sm">
                                <div class="flex justify-between"><dt class="text-stone-400">Uang muka</dt><dd id="kc-dp-rp" class="font-semibold"></dd></div>
                                <div class="flex justify-between"><dt class="text-stone-400">Pokok pinjaman</dt><dd id="kc-pokok" class="font-semibold"></dd></div>
                            </dl>
                            <p class="mt-4 text-[11px] leading-relaxed text-stone-500">Estimasi saja, belum termasuk biaya provisi, asuransi, dan notaris.</p>
                        </div>
                    </div>

                    @if($banks->count() > 0)
                        <h3 class="mb-3 mt-7 text-base font-bold text-stone-900">Pilihan bank</h3>
                        <div class="grid gap-3 sm:grid-cols-2">
                            @foreach($banks as $bank)
                                <div class="rounded-xl p-4 ring-1 ring-stone-200">
                                    <div class="flex items-center justify-between"><p class="text-sm font-bold text-stone-900">{{ $bank->name }}</p><span class="rounded-md bg-orange-100 px-2 py-0.5 text-[11px] font-bold text-orange-700">{{ $bank->interest_rate }}%</span></div>
                                    <p class="mt-1 text-xs text-stone-500">DP min. {{ $bank->min_dp_percent }}% · tenor hingga {{ $bank->max_tenor }} thn</p>
                                    <p class="mt-2 text-base font-bold text-stone-900">Rp {{ number_format($bank->estimated_installment, 0, ',', '.') }}<span class="text-xs font-medium text-stone-500"> / bln</span></p>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('kpr.index') }}" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-orange-600 hover:underline">Hitung detail KPR <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
                    @endif
                </section>
                @endif

                {{-- FAQ --}}
                <section id="faq" data-spy class="scroll-mt-36 py-8">
                    <h2 class="mb-4 text-xl font-bold text-stone-900">Pertanyaan umum</h2>
                    <div class="divide-y divide-stone-200 border-y border-stone-200">
                        @foreach($faq as [$q, $a])
                            <details class="group py-4">
                                <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-sm font-semibold text-stone-900 {{ $ring }} rounded">{{ $q }}<i data-lucide="plus" class="h-4 w-4 shrink-0 text-orange-500 transition-transform group-open:rotate-45"></i></summary>
                                <p class="mt-2 text-sm leading-relaxed text-stone-600">{{ $a }}</p>
                            </details>
                        @endforeach
                    </div>
                </section>
            </div>

            {{-- KANAN (SIDEBAR AGEN) --}}
            <aside class="py-8 lg:sticky lg:top-[calc(var(--nav-h)+3.5rem)]">
                <section id="kontak-agen" class="rounded-2xl bg-white p-6 shadow-xl shadow-stone-900/10 ring-1 ring-stone-200">
                    @if($agent)
                        <div class="flex items-center gap-4">
                            <img src="{{ $agent->photo ? asset($agent->photo) : asset('images/agents/agent.png') }}" alt="{{ $agent->name }}" class="h-16 w-16 rounded-full bg-stone-50 object-cover ring-1 ring-stone-200">
                            <div class="min-w-0">
                                <p class="text-[11px] text-stone-500">Dihandle oleh</p>
                                <h2 class="truncate text-lg font-bold text-stone-900">{{ $agent->name }}</h2>
                                <p class="text-xs text-stone-500">Agen · {{ $agent->areas->first()?->name ?? 'Jember' }}</p>
                            </div>
                        </div>
                        <div class="mt-5 space-y-2.5">
                            @if($waUrl)<a href="{{ $waUrl }}" target="_blank" rel="noopener" class="flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-emerald-500 font-bold text-white transition hover:bg-emerald-600 {{ $ring }}"><i data-lucide="message-circle" class="h-5 w-5"></i> Chat WhatsApp</a>@endif
                            @if($tel)<a href="tel:{{ $tel }}" class="flex h-12 w-full items-center justify-center gap-2 rounded-xl font-bold text-stone-800 ring-1 ring-stone-300 transition hover:bg-stone-50 {{ $ring }}"><i data-lucide="phone" class="h-4 w-4"></i> Telepon</a>@endif
                            @if(\Illuminate\Support\Facades\Route::has('agents.show'))<a href="{{ route('agents.show', $agent->id) }}" class="block pt-1 text-center text-sm font-semibold text-orange-600 hover:underline">Lihat profil & listing lain</a>@endif
                        </div>
                        <p class="mt-4 text-[11px] leading-relaxed text-stone-400">Dengan menghubungi agen, Anda menyetujui Syarat Penggunaan dan Kebijakan Privasi {{ config('company.name') }}.</p>
                    @else
                        <p class="mb-4 text-sm text-stone-500">Properti ini dikelola langsung oleh kantor.</p>
                        <a href="{{ route('company.profile') }}" class="flex h-12 w-full items-center justify-center rounded-xl bg-stone-900 font-bold text-white transition hover:bg-orange-500 {{ $ring }}">Hubungi kantor</a>
                    @endif
                    <a href="mailto:{{ config('company.email') }}?subject={{ rawurlencode('Laporan properti #' . $property->id) }}" class="mt-4 inline-flex items-center gap-1.5 text-xs text-stone-400 hover:text-stone-600"><i data-lucide="flag" class="h-3.5 w-3.5"></i> Ada masalah dengan properti ini?</a>
                </section>
            </aside>
        </div>

        @isset($similarProperties)
            @if($similarProperties->isNotEmpty())
                <section class="mt-6 border-t border-stone-200 pt-10" aria-label="Properti serupa">
                    <h2 class="mb-5 text-xl font-bold text-stone-900">Properti serupa di sekitar</h2>
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        {{-- PERBAIKAN: Tag component menggunakan titik (dot) --}}
                        @foreach($similarProperties as $p)<x-property.card :property="$p" />@endforeach
                    </div>
                </section>
            @endif
        @endisset
    </div>
</div>

{{-- BAR KONTAK TETAP DI HP --}}
<div class="fixed inset-x-0 bottom-0 z-40 flex items-center gap-3 border-t border-stone-200 bg-white/95 px-4 pt-3 pb-[max(0.75rem,env(safe-area-inset-bottom))] backdrop-blur lg:hidden">
    <div class="min-w-0 flex-1 leading-tight">
        <p class="truncate text-lg font-bold text-orange-600">{{ $property->price_formatted }}<span class="text-xs font-medium text-stone-500">{{ $property->price_unit ? '/' . $property->price_unit : '' }}</span></p>
        <p class="truncate text-[11px] text-stone-500">{{ $property->title }}</p>
    </div>
    @if($waUrl)
        <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="inline-flex h-12 shrink-0 items-center gap-2 rounded-xl bg-emerald-500 px-5 text-sm font-bold text-white {{ $ring }}">
            <i data-lucide="message-circle" class="w-5 h-5"></i> Chat
        </a>
    @else
        <a href="#kontak-agen" class="inline-flex h-12 shrink-0 items-center rounded-xl bg-stone-900 px-5 text-sm font-bold text-white">Hubungi</a>
    @endif
</div>

{{-- LIGHTBOX --}}
<dialog id="lightbox" class="fixed inset-0 m-0 h-full max-h-none w-full max-w-none bg-stone-950/95 p-0 text-white backdrop:bg-black">
    <div class="flex h-full flex-col">
        <div class="flex items-center justify-between p-4">
            <p id="lb-count" class="text-sm font-semibold"></p>
            <button type="button" id="lb-close" aria-label="Tutup" class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 hover:bg-white/20 {{ $ring }}"><i data-lucide="x" class="w-5 h-5"></i></button>
        </div>
        <div class="relative flex min-h-0 flex-1 items-center justify-center px-4 pb-6">
            <button type="button" id="lb-prev" aria-label="Sebelumnya" class="absolute left-3 z-10 flex h-11 w-11 items-center justify-center rounded-xl bg-white/10 hover:bg-white/20 {{ $ring }}"><i data-lucide="chevron-left" class="w-6 h-6"></i></button>
            <img id="lb-img" src="" alt="" class="max-h-full max-w-full rounded-xl object-contain">
            <button type="button" id="lb-next" aria-label="Berikutnya" class="absolute right-3 z-10 flex h-11 w-11 items-center justify-center rounded-xl bg-white/10 hover:bg-white/20 {{ $ring }}"><i data-lucide="chevron-right" class="w-6 h-6"></i></button>
        </div>
    </div>
</dialog>

@endsection

@push('styles')
<style>html { scroll-behavior: smooth; }</style>
@if($property->latitude && $property->longitude)
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #property-map { z-index: 10; }
    .leaflet-container { background: #1c1917; font-family: inherit; border-radius: 1rem; }
</style>
@endif
@endpush

@push('scripts')
@include('components.layout.partials.property-action')

<script>
    // Lightbox foto
    (function () {
        var photos = @json($fotos->pluck('f')->values());
        var dlg = document.getElementById('lightbox'), img = document.getElementById('lb-img'), count = document.getElementById('lb-count'), idx = 0;
        function show(i) { idx = (i + photos.length) % photos.length; img.src = photos[idx]; count.textContent = (idx + 1) + ' / ' + photos.length; }
        document.addEventListener('click', function (e) {
            var o = e.target.closest('[data-open]');
            if (o) { show(parseInt(o.dataset.open, 10) || 0); dlg.showModal(); }
        });
        document.getElementById('lb-close').addEventListener('click', function () { dlg.close(); });
        document.getElementById('lb-prev').addEventListener('click', function () { show(idx - 1); });
        document.getElementById('lb-next').addEventListener('click', function () { show(idx + 1); });
        dlg.addEventListener('click', function (e) { if (e.target === dlg) dlg.close(); });
        document.addEventListener('keydown', function (e) {
            if (!dlg.open) return;
            if (e.key === 'ArrowLeft') show(idx - 1);
            if (e.key === 'ArrowRight') show(idx + 1);
        });
    })();
</script>

@if($property->latitude && $property->longitude)
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var lat = {{ $property->latitude }}, lng = {{ $property->longitude }};
        var radius = {{ $property->map_radius_meter ?? 500 }};
        var showExact = {{ $property->show_exact_location ? 'true' : 'false' }};

        var map = L.map('property-map', { zoomControl: false }).setView([lat, lng], 14);
        L.control.zoom({ position: 'bottomright' }).addTo(map);
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Dark_Gray_Base/MapServer/tile/{z}/{y}/{x}', { attribution: '&copy; Esri', maxZoom: 16 }).addTo(map);

        if (showExact) { L.marker([lat, lng]).addTo(map); }
        else { L.circle([lat, lng], { color: '#f97316', fillColor: '#f97316', fillOpacity: 0.2, weight: 2, radius: radius }).addTo(map); }
    });
</script>
@endif

<script>
    // Sub-navigasi: tandai bagian yang sedang dibaca
    (function () {
        var links = document.querySelectorAll('[data-spy-link]'), secs = document.querySelectorAll('[data-spy]');
        if (!('IntersectionObserver' in window)) return;
        var io = new IntersectionObserver(function (es) {
            es.forEach(function (e) {
                if (!e.isIntersecting) return;
                links.forEach(function (l) {
                    var on = l.dataset.spyLink === e.target.id;
                    l.classList.toggle('border-orange-500', on); l.classList.toggle('text-orange-600', on);
                    l.classList.toggle('border-transparent', !on); l.classList.toggle('text-stone-500', !on);
                });
            });
        }, { rootMargin: '-30% 0px -60% 0px' });
        secs.forEach(function (s) { io.observe(s); });
    })();

    // Kalkulator KPR langsung di halaman
    (function () {
        var box = document.getElementById('kpr-calc'); if (!box) return;
        var $ = function (id) { return document.getElementById(id); };
        var fmt = new Intl.NumberFormat('id-ID');
        function calc() {
            var harga = +$('kc-harga').value || 0, dp = +$('kc-dp').value, tenor = +$('kc-tenor').value, bunga = +$('kc-bunga').value;
            var pokok = harga * (1 - dp / 100), r = bunga / 1200, n = tenor * 12;
            var cicilan = r ? pokok * r / (1 - Math.pow(1 + r, -n)) : pokok / n;
            $('kc-dp-out').textContent = dp + '%'; $('kc-tenor-out').textContent = tenor + ' tahun'; $('kc-bunga-out').textContent = bunga.toString().replace('.', ',') + '%';
            $('kc-cicilan').textContent = 'Rp ' + fmt.format(Math.round(cicilan));
            $('kc-dp-rp').textContent = 'Rp ' + fmt.format(Math.round(harga * dp / 100));
            $('kc-pokok').textContent = 'Rp ' + fmt.format(Math.round(pokok));
        }
        box.querySelectorAll('input').forEach(function (i) { i.addEventListener('input', calc); });
        calc();
    })();
</script>
@endpush
