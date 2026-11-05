@extends('components.layout.app')

@section('title', 'Cari Agen Properti — ' . config('company.name'))

@section('content')

<div class="bg-stone-50 min-h-screen py-10">
    <div class="max-w-6xl mx-auto px-4 lg:px-6">

        {{-- SEARCH BAR TERPADU --}}
        <div class="max-w-3xl mx-auto mb-10">
            <form method="GET" action="{{ route('agents.index') }}" class="relative flex items-center bg-white rounded-full shadow-sm border border-stone-200 focus-within:border-orange-500 focus-within:ring-4 focus-within:ring-orange-100 transition-all">

                <i data-lucide="search" class="w-5 h-5 absolute left-5 text-stone-400"></i>

                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama agen..."
                       class="w-full h-14 pl-14 pr-40 bg-transparent border-none outline-none text-stone-800 placeholder-stone-400 text-sm rounded-full">

                <div class="absolute right-2 top-1/2 -translate-y-1/2 flex items-center gap-2">
                    <span class="w-px h-6 bg-stone-200 hidden sm:block"></span>
                    <select name="area" onchange="this.form.submit()"
                            class="h-10 pl-2 pr-8 bg-transparent border-none text-sm font-medium text-stone-700 outline-none cursor-pointer appearance-none hidden sm:block bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2378716c%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E')] bg-[length:10px_10px] bg-[right_8px_center] bg-no-repeat">
                        <option value="">Semua Area</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" @selected(request('area') == $area->id)>{{ $area->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="sm:hidden w-10 h-10 rounded-full bg-orange-500 text-white flex items-center justify-center shrink-0 mr-1">
                        <i data-lucide="search" class="w-4 h-4"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- GRID AGEN: 3 KOLOM VERTIKAL --}}
        @if($agents->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($agents as $agent)
                    @php
                        // Logika Durasi: Jika belum 2 tahun -> Anggota Baru, ubah ke integer agar tidak ada desimal
                        $tahun = (int) $agent->created_at->diffInYears(now());
                        $durasi = $tahun >= 2 ? $tahun . ' Tahun' : 'Anggota Baru';
                    @endphp

                    {{-- CARD VERTIKAL --}}
                    <div class="bg-white rounded-xl border border-stone-200 shadow-sm hover:shadow-lg hover:border-orange-200 transition-all duration-300 flex flex-col h-full overflow-hidden">

                        {{-- BAGIAN 1: ATAS (Foto Profil Kotak di Kanan) --}}
                        <div class="p-3 pb-2 border-b border-stone-100 flex justify-start bg-stone-50/50">                            <div class="w-20 h-20 rounded-xl overflow-hidden border-2 border-white shadow-sm bg-stone-100">
                                <img src="{{ $agent->photo ? asset($agent->photo) : asset('images/agents/agent.png') }}"
                                     alt="{{ $agent->name }}"
                                     class="w-full h-full object-cover">
                            </div>
                        </div>

                        {{-- BAGIAN 2: TENGAH (Info & List 1 Baris) --}}
                        <div class="p-3 flex-1 flex flex-col">

                            {{-- Nama & Wilayah --}}
                            <h3 class="text-base font-bold text-stone-900 leading-tight truncate">{{ $agent->name }}</h3>
                            <div class="flex items-center gap-1 text-[11px] text-stone-500 mt-1">
                                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-orange-500 shrink-0"></i>
                                <span class="truncate">{{ $agent->areas->first()?->name ?? 'Mangli' }} - Jember</span>
                            </div>

                            {{-- List Badges (Dipaksa 1 Baris dengan flex-nowrap & teks kecil) --}}
                            <div class="flex flex-row flex-nowrap items-center gap-1.5 mt-3 w-full overflow-hidden">
                                <div class="flex items-center gap-1 px-1.5 py-0.5 rounded bg-stone-100 border border-stone-200 text-[9px] font-bold text-stone-700 whitespace-nowrap">
                                    <i data-lucide="briefcase" class="w-2.5 h-2.5 text-stone-500"></i>
                                    {{ $durasi }}
                                </div>
                                <div class="flex items-center gap-1 px-1.5 py-0.5 rounded bg-orange-50 border border-orange-100 text-[9px] font-bold text-orange-700 whitespace-nowrap">
                                    <i data-lucide="star" class="w-2.5 h-2.5"></i>
                                    Freelance
                                </div>
                                <div class="flex items-center gap-1 px-1.5 py-0.5 rounded bg-yellow-100 border border-yellow-200 text-[9px] font-bold text-yellow-800 whitespace-nowrap">
                                    <i data-lucide="award" class="w-2.5 h-2.5"></i>
                                    Top Agent
                                </div>
                            </div>
                        </div>

                        {{-- BAGIAN 3: BAWAH (2 Button) --}}
                        <div class="p-2.5 border-t border-stone-100 grid grid-cols-2 gap-2 mt-auto">
                            {{-- Button WA (Hijau) --}}
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $agent->whatsapp ?? $agent->phone) }}"
                               target="_blank" rel="noopener"
                               class="h-9 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-semibold flex items-center justify-center gap-1 transition shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                WA
                            </a>

                            {{-- Button Detail (Hitam) --}}
                            <a href="#"
                               class="h-9 rounded-lg bg-stone-900 hover:bg-stone-800 text-white text-xs font-semibold flex items-center justify-center gap-1 transition shadow-sm">
                                <i data-lucide="list" class="w-3.5 h-3.5"></i>
                                Detail
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8 flex justify-center">
                {{ $agents->links() }}
            </div>
        @else
            {{-- Empty State --}}
            <div class="bg-white rounded-2xl border border-stone-200 p-16 text-center max-w-2xl mx-auto">
                <div class="w-16 h-16 mx-auto rounded-full bg-stone-100 flex items-center justify-center mb-4">
                    <i data-lucide="users" class="w-8 h-8 text-stone-400"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-900">Agen tidak ditemukan</h3>
                <p class="text-stone-500 mt-1">Coba gunakan kata kunci lain atau pilih area yang berbeda.</p>
                <a href="{{ route('agents.index') }}" class="mt-6 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold transition">
                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i> Reset Pencarian
                </a>
            </div>
        @endif

    </div>
</div>

@endsection
