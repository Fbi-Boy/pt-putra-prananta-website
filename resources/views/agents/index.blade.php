@extends('components.layout.app')

@section('title', 'Cari Agen Properti — ' . config('company.name'))

@section('content')

{{-- CSS UNTUK SCROLLBAR & UTILITY --}}
<style>
    /* Sembunyikan scrollbar di seluruh halaman dan elemen */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    /* Efek hover card yang lebih halus */
    .agent-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .agent-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px -8px rgba(249, 115, 22, 0.15);
        border-color: #fdba74; /* orange-300 */
    }
</style>

@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Route;

    // ================= DUMMY SEMENTARA =================
    $pakaiDummy = true;
    if ($pakaiDummy) {
        $d = [['Budi Santoso','Kaliwates',24,30],['Siti Rahmawati','Sumbersari',21,26],['Andi Pratama','Patrang',18,18],['Dewi Lestari','Ajung',15,14],['Rizky Firmansyah','Ambulu',13,9],
              ['Nur Aini','Rambipuji',11,40],['Hendra Wijaya','Tanggul',9,5],['Maya Kusuma','Wuluhan',8,22],['Fajar Nugroho','Balung',6,3],['Lina Marlina','Jenggawah',4,12]];
        $dummy = collect($d)->map(fn ($x, $i) => (object) [
            'id' => $i + 1, 'name' => $x[0], 'photo' => null, 'whatsapp' => sprintf('0812345678%02d', $i),
            'created_at' => now()->subMonths($x[3]), 'areas' => collect([(object) ['name' => $x[1]], (object) ['name' => 'Jember Kota']]),
            'bio' => 'Melayani jual-beli rumah, tanah, dan ruko di sekitar ' . $x[1] . '. Respon cepat dan transparan.', 'sold_count' => $x[2],
            'is_verified' => true // Fitur tambahan: Badge Verified
        ]);
        $q = mb_strtolower((string) request('q'));
        $agents = $dummy->filter(fn ($a) => (!$q || str_contains(mb_strtolower($a->name . ' ' . $a->areas->pluck('name')->join(' ')), $q))
            && (!request('area') || $a->areas->contains(fn ($z) => Str::slug($z->name) === request('area'))))->values();
    }

    $foto = fn ($a) => $a->photo ? asset($a->photo) : asset('images/agents/agent.png');
    $waLink = function ($a) {
        $n = preg_replace('/\D/', '', $a->whatsapp ?? $a->phone ?? '');
        if ($n === '') return null;
        if (str_starts_with($n, '0')) $n = '62' . substr($n, 1);
        return 'https://wa.me/' . $n . '?text=' . rawurlencode('Halo ' . $a->name . ', saya melihat profil Anda di ' . config('company.name') . ' dan ingin konsultasi properti.');
    };
    $detailUrl = fn ($a) => Route::has('agents.show') ? route('agents.show', $a->id) : '#';
    $lama      = fn ($a) => ($t = (int) $a->created_at->diffInYears(now())) >= 2 ? $t . ' Tahun' : 'Anggota Baru';

    $semua     = collect(method_exists($agents, 'items') ? $agents->items() : $agents);
    $total     = method_exists($agents, 'total') ? $agents->total() : $agents->count();
    $adaFilter = request('q') || request('area');
    $areaAktif = request('area');

    // Podium: 3 agen dengan penjualan terbanyak tahun ini
    $sumber = $pakaiDummy ? $dummy : collect($topAgents ?? $semua);
    $podium = $sumber->sortByDesc(fn ($a) => $a->sold_count ?? 0)->take(3)->values();
    $stage  = [
        ['p' => $podium->get(1), 'rank' => 2, 'h' => 'h-16', 'c' => 'from-stone-300 to-stone-500 text-stone-900', 'av' => 'w-12 h-12'],
        ['p' => $podium->get(0), 'rank' => 1, 'h' => 'h-24', 'c' => 'from-amber-300 to-amber-500 text-stone-950', 'av' => 'w-14 h-14'],
        ['p' => $podium->get(2), 'rank' => 3, 'h' => 'h-12', 'c' => 'from-orange-600 to-orange-800 text-white', 'av' => 'w-12 h-12'],
    ];

    $terjualTahunIni = $terjualTahunIni ?? 48;
    $terjualList = $terjualList ?? [
        ['Rumah Minimalis Cluster Asri', 'Kaliwates', 'Budi Santoso', 'Rp 1,25 M', '28 Okt'],
        ['Rumah Modern Dekat Pusat Kota', 'Sumbersari', 'Siti Rahmawati', 'Rp 890 Jt', '21 Okt'],
        ['Ruko Dua Lantai Gajah Mada', 'Kaliwates', 'Andi Pratama', 'Rp 1,8 M', '14 Okt'],
        ['Tanah Kavling 120 m²', 'Ajung', 'Dewi Lestari', 'Rp 320 Jt', '03 Okt'],
        ['Rumah Keluarga Siap Huni', 'Patrang', 'Budi Santoso', 'Rp 740 Jt', '26 Sep'],
    ];

    $kecDefault = ['Kaliwates', 'Sumbersari', 'Patrang', 'Ajung', 'Ambulu', 'Balung', 'Bangsalsari', 'Jenggawah', 'Kalisat', 'Rambipuji', 'Tanggul', 'Wuluhan'];
    $areaList = isset($areas)
        ? collect($areas)->map(fn ($a) => ['name' => $a->name, 'val' => $a->slug ?? $a->id])
        : collect($kecDefault)->map(fn ($n) => ['name' => $n, 'val' => Str::slug($n)]);
    $daftarUrl = Route::has('agents.register') ? route('agents.register') : '#';

    $ring = 'focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60';
    $grid = '[background-image:linear-gradient(rgba(255,255,255,0.14)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.14)_1px,transparent_1px)] [background-size:32px_32px]';
    $chipOn  = 'bg-white text-orange-600';
    $chipOff = 'bg-white/15 text-white ring-1 ring-white/25 hover:bg-white/25';
@endphp

<svg class="absolute w-0 h-0" aria-hidden="true">
    <symbol id="ic-wa" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></symbol>
</svg>

<div class="bg-stone-100 min-h-screen">
    <div class="max-w-[1440px] mx-auto px-4 lg:px-6 py-6">
        <div class="flex flex-col gap-6 lg:grid lg:grid-cols-[1fr_320px] lg:gap-8">

            {{-- ================= KOLOM KIRI ================= --}}
            <div class="contents lg:flex lg:flex-col lg:min-w-0 lg:gap-6">

                {{-- HEADER (Search & Filter) --}}
                <header class="order-1 relative isolate overflow-hidden rounded-3xl bg-gradient-to-br from-orange-500 to-orange-600 p-6 sm:p-8 text-white shadow-lg shadow-orange-500/20">
                    <div class="absolute inset-0 -z-10 {{ $grid }} [-webkit-mask-image:linear-gradient(100deg,transparent_25%,#000)] [mask-image:linear-gradient(100deg,transparent_25%,#000)]" aria-hidden="true"></div>

                    <div class="flex items-end justify-between gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight">Temukan Agen Properti</h1>
                            <p class="mt-2 text-sm text-orange-50 max-w-md leading-relaxed">Hubungi agen profesional yang ahli di area yang Anda inginkan.</p>
                        </div>
                        <p class="text-right shrink-0">
                            <span class="block text-4xl font-bold leading-none">{{ $total }}</span>
                            <span class="block mt-1 text-xs font-medium text-orange-100 uppercase tracking-wider">Agen</span>
                        </p>
                    </div>

                    <form method="GET" action="{{ route('agents.index') }}" role="search" class="flex items-center gap-2 rounded-2xl bg-white p-2 shadow-xl shadow-orange-900/20">
                        @if($areaAktif)<input type="hidden" name="area" value="{{ $areaAktif }}">@endif
                        <label for="cari-agen" class="sr-only">Cari agen</label>
                        <i data-lucide="search" class="w-5 h-5 ml-2 text-stone-400 shrink-0"></i>
                        <input id="cari-agen" type="text" name="q" value="{{ request('q') }}" autocomplete="off" placeholder="Cari nama agen atau area…"
                               class="flex-1 min-w-0 h-10 bg-transparent text-sm font-medium text-stone-900 placeholder:text-stone-400 focus:outline-none">
                        @if(request('q'))
                            <a href="{{ route('agents.index', request()->except(['q', 'page'])) }}" aria-label="Hapus kata kunci" class="w-8 h-8 rounded-lg flex items-center justify-center text-stone-400 hover:bg-stone-100 hover:text-stone-700 transition"><i data-lucide="x" class="w-4 h-4"></i></a>
                        @endif
                        <button type="submit" class="h-10 px-5 rounded-xl bg-stone-900 hover:bg-stone-800 text-white text-sm font-bold flex items-center gap-2 transition {{ $ring }}">
                            <span class="hidden sm:inline">Cari</span><i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </button>
                    </form>

                    <div class="mt-5 flex flex-nowrap gap-2 overflow-x-auto pb-1 scrollbar-hide">
                        <a href="{{ route('agents.index', request()->except(['area', 'page'])) }}" class="shrink-0 rounded-full px-4 py-1.5 text-xs font-semibold transition {{ !$areaAktif ? $chipOn : $chipOff }}">Semua area</a>
                        @foreach($areaList as $a)
                            <a href="{{ route('agents.index', array_merge(request()->except('page'), ['area' => $a['val']])) }}"
                               class="shrink-0 rounded-full px-4 py-1.5 text-xs font-semibold transition {{ (string) $areaAktif === (string) $a['val'] ? $chipOn : $chipOff }}">{{ $a['name'] }}</a>
                        @endforeach
                    </div>
                </header>

                {{-- GRID AGEN --}}
                <div class="order-4 focus:outline-none">
                    @if($agents->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                            @foreach($agents as $agent)
                                @php $wa = $waLink($agent); $sisa = max($agent->areas->count() - 1, 0); @endphp

                                {{-- CARD AGEN PREMIUM --}}
                                <article class="agent-card group relative flex flex-col bg-white rounded-2xl ring-1 ring-stone-200 overflow-hidden">

                                    {{-- Bagian Atas: Foto & Info --}}
                                    <div class="p-4 flex items-start gap-4">
                                        <div class="relative shrink-0">
                                            <img src="{{ $foto($agent) }}" alt="{{ $agent->name }}" loading="lazy" class="w-16 h-16 rounded-full object-cover bg-stone-100 ring-2 ring-white shadow-sm">
                                            @if($agent->is_verified ?? false)
                                                <div class="absolute -bottom-1 -right-1 bg-white rounded-full p-0.5">
                                                    <i data-lucide="check-circle" class="w-4 h-4 text-emerald-500 fill-emerald-100"></i>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="min-w-0 flex-1 pt-0.5">
                                            <h3 class="text-base font-bold leading-tight text-stone-900 truncate group-hover:text-orange-600 transition">
                                                <a href="{{ $detailUrl($agent) }}" class="after:absolute after:inset-0">{{ $agent->name }}</a>
                                            </h3>
                                            <p class="mt-1.5 flex items-center gap-1 text-xs font-medium text-stone-500">
                                                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-orange-500 shrink-0"></i>
                                                <span class="truncate">{{ $agent->areas->first()?->name ?? 'Jember' }}</span>
                                                @if($sisa)<span class="shrink-0 rounded-md bg-stone-100 px-1.5 text-[10px] font-bold text-stone-600">+{{ $sisa }}</span>@endif
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Bagian Tengah: Bio & Badges --}}
                                    <div class="px-4 pb-4 flex-1 flex flex-col">
                                        @if(!empty($agent->bio))
                                            <p class="text-xs leading-relaxed text-stone-500 line-clamp-2 mb-3">{{ $agent->bio }}</p>
                                        @endif

                                        <div class="mt-auto flex flex-wrap gap-1.5">
                                            <span class="inline-flex items-center gap-1 rounded-md bg-stone-50 px-2 py-1 text-[10px] font-bold text-stone-600 ring-1 ring-stone-200">
                                                <i data-lucide="briefcase" class="w-3 h-3 text-stone-400"></i> {{ $lama($agent) }}
                                            </span>
                                            <span class="inline-flex items-center gap-1 rounded-md bg-orange-50 px-2 py-1 text-[10px] font-bold text-orange-700 ring-1 ring-orange-100">
                                                <i data-lucide="star" class="w-3 h-3 text-orange-500"></i> Freelance
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Bagian Bawah: Tombol Aksi --}}
                                    <div class="relative z-10 p-3 bg-stone-50 border-t border-stone-100 grid grid-cols-2 gap-2">
                                        @if($wa)
                                            <a href="{{ $wa }}" target="_blank" rel="noopener" class="h-9 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold flex items-center justify-center gap-1.5 transition {{ $ring }}">
                                                <svg class="w-4 h-4" fill="currentColor"><use href="#ic-wa"/></svg> WhatsApp
                                            </a>
                                        @else
                                            <span class="h-9 rounded-lg bg-stone-200 text-stone-400 text-xs font-bold flex items-center justify-center">N/A</span>
                                        @endif
                                        <a href="{{ $detailUrl($agent) }}" class="h-9 rounded-lg bg-white ring-1 ring-stone-200 text-stone-700 hover:bg-stone-900 hover:ring-stone-900 hover:text-white text-xs font-bold flex items-center justify-center gap-1.5 transition {{ $ring }}">
                                            Detail <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        {{-- PAGINATION DUMMY (Karena data dummy) --}}
                        <div class="mt-8 flex justify-center">
                            <nav class="flex items-center gap-1" aria-label="Pagination">
                                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg border border-stone-200 bg-white text-stone-400 hover:bg-stone-50 transition">
                                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                                </a>
                                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg bg-orange-500 text-white font-bold text-sm shadow-sm">1</a>
                                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg border border-stone-200 bg-white text-stone-700 hover:bg-stone-50 font-bold text-sm transition">2</a>
                                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg border border-stone-200 bg-white text-stone-700 hover:bg-stone-50 font-bold text-sm transition">3</a>
                                <span class="w-9 h-9 flex items-center justify-center text-stone-400 text-sm">...</span>
                                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg border border-stone-200 bg-white text-stone-700 hover:bg-stone-50 font-bold text-sm transition">8</a>
                                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg border border-stone-200 bg-white text-stone-400 hover:bg-stone-50 transition">
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </a>
                            </nav>
                        </div>
                    @else
                        {{-- Empty State --}}
                        <div class="rounded-3xl border border-dashed border-stone-300 bg-white px-6 py-16 text-center">
                            <div class="w-16 h-16 mx-auto rounded-full bg-stone-100 flex items-center justify-center mb-4"><i data-lucide="user-search" class="w-8 h-8 text-stone-400"></i></div>
                            <h3 class="text-xl font-bold text-stone-900">Agen tidak ditemukan</h3>
                            <p class="mt-2 text-stone-500">Coba kata kunci lain atau tampilkan semua agen.</p>
                            <a href="{{ route('agents.index') }}" class="mt-6 inline-flex rounded-xl bg-stone-900 px-6 py-2.5 text-sm font-bold text-white hover:bg-orange-500 transition {{ $ring }}">Tampilkan semua agen</a>
                        </div>
                    @endif
                </div>
            </div>

            {{-- ================= KOLOM KANAN (STICKY & BOUNDED) ================= --}}
            {{-- Menggunakan sticky, tinggi maksimal layar, dan scroll internal tersembunyi --}}
            <div class="hidden lg:flex lg:flex-col lg:gap-6 lg:sticky lg:top-24 lg:max-h-[calc(100vh-8rem)] lg:overflow-y-auto scrollbar-hide pb-4">

                {{-- PODIUM JUARA --}}
                @if($podium->isNotEmpty())
                    <section aria-label="Agen terbaik tahun ini" class="relative isolate overflow-hidden rounded-3xl bg-stone-950 text-white ring-1 ring-amber-400/25 shadow-xl shadow-stone-900/25 p-5 shrink-0">
                        <div class="absolute inset-0 -z-10 {{ $grid }} opacity-30 [-webkit-mask-image:linear-gradient(to_bottom,#000,transparent_75%)] [mask-image:linear-gradient(to_bottom,#000,transparent_75%)]" aria-hidden="true"></div>
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 w-[24rem] max-w-none h-40 -z-10 blur-2xl [background:conic-gradient(from_180deg_at_50%_0%,transparent_32%,rgba(251,191,36,0.30)_50%,transparent_68%)]" aria-hidden="true"></div>
                        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-amber-300 to-transparent" aria-hidden="true"></div>

                        <p class="flex items-center gap-1.5 text-xs font-bold text-amber-300"><i data-lucide="trophy" class="w-4 h-4"></i> Agen terbaik {{ now()->year }}</p>

                        <div class="mt-6 grid grid-cols-3 items-end gap-2">
                            @foreach($stage as $s)
                                @if($s['p'])
                                    <div class="min-w-0 text-center">
                                        <a href="{{ $detailUrl($s['p']) }}" class="block {{ $ring }} rounded-xl">
                                            @if($s['rank'] === 1)<i data-lucide="crown" class="w-5 h-5 mx-auto mb-1 text-amber-300"></i>@endif
                                            <img src="{{ $foto($s['p']) }}" alt="{{ $s['p']->name }}" class="{{ $s['av'] }} mx-auto rounded-2xl object-cover bg-stone-800 ring-2 {{ $s['rank'] === 1 ? 'ring-amber-400' : 'ring-white/25' }}">
                                            <p class="mt-2 text-[11px] font-semibold truncate">{{ Str::before($s['p']->name, ' ') }}</p>
                                            <p class="text-[10px] text-stone-400 mb-2">{{ isset($s['p']->sold_count) ? $s['p']->sold_count . ' terjual' : ($s['p']->areas->first()?->name ?? 'Jember') }}</p>
                                        </a>
                                        <div class="{{ $s['h'] }} rounded-t-xl bg-gradient-to-b {{ $s['c'] }} flex items-start justify-center pt-2 text-xl font-extrabold">{{ $s['rank'] }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </section>
                @endif

                {{-- PROPERTI TERJUAL TAHUN INI --}}
                <section aria-label="Properti terjual" class="rounded-3xl bg-white p-5 ring-1 ring-stone-200 shrink-0">
                    <div class="flex items-end justify-between gap-3">
                        <div>
                            <h3 class="text-sm font-bold text-stone-900">Properti terjual</h3>
                            <p class="mt-0.5 text-xs text-stone-500">Tahun {{ now()->year }}</p>
                        </div>
                        <p class="text-right"><span class="text-4xl font-semibold leading-none text-orange-600">{{ $terjualTahunIni }}</span><span class="block mt-1 text-[11px] text-stone-500">unit terjual</span></p>
                    </div>
                    <ul class="mt-4 divide-y divide-stone-100">
                        @foreach($terjualList as [$judul, $lokasi, $oleh, $harga, $tgl])
                            <li class="flex items-center gap-3 py-3">
                                <span class="w-9 h-9 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center shrink-0"><i data-lucide="home" class="w-4 h-4"></i></span>
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs font-semibold text-stone-900 truncate">{{ $judul }}</p>
                                    <p class="text-[11px] text-stone-500 truncate">{{ $lokasi }} · {{ $oleh }}</p>
                                </div>
                                <div class="text-right shrink-0">
                                    <p class="text-xs font-bold text-stone-900">{{ $harga }}</p>
                                    <p class="text-[10px] text-stone-400">{{ $tgl }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>

                {{-- AJAKAN JADI AGEN --}}
                <section class="relative isolate overflow-hidden rounded-3xl bg-gradient-to-br from-orange-500 to-orange-600 p-5 text-white shrink-0">
                    <div class="absolute inset-0 -z-10 {{ $grid }} [-webkit-mask-image:linear-gradient(135deg,transparent_30%,#000)] [mask-image:linear-gradient(135deg,transparent_30%,#000)]" aria-hidden="true"></div>
                    <h3 class="text-base font-semibold leading-snug">Ingin jadi agen Putra Property?</h3>
                    <p class="mt-1 text-xs text-orange-50 leading-relaxed">Pasarkan listing Anda ke calon pembeli dan penyewa di Jember.</p>
                    <a href="{{ $daftarUrl }}" class="mt-4 inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-stone-900 hover:bg-stone-950 hover:text-white transition {{ $ring }}">
                        Daftar jadi agen <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </section>

            </div>

        </div>
    </div>
</div>

@endsection
