@extends('components.layout.app')

@section('title', 'Cari Properti — ' . config('company.name'))

@php
    $activeAreaName = request('area')
        ? ($areas->firstWhere('id', request('area'))?->name ?? 'Jember')
        : 'Jember';
    $hasFilters = request()->hasAny(['q', 'area', 'type', 'bedrooms', 'min_price', 'max_price']);
@endphp

@section('content')
<div class="bg-stone-50 min-h-screen py-6" x-data="{ showAdvanced: false }">
    <div class="max-w-[1440px] mx-auto px-4 lg:px-6">

        {{-- SPLIT LAYOUT: 58% KIRI, 42% KANAN --}}
        <div class="grid grid-cols-1 lg:grid-cols-[58fr_42fr] gap-6 items-start">

            {{-- KOLOM KIRI (58%) --}}
            <div>

                {{-- SEARCH BAR + BOOKMARK --}}
                <div class="flex gap-2 mb-3">
                    <form method="GET" action="{{ url()->current() }}" class="relative flex-1">
                        @foreach(request()->except('q', 'page') as $k => $v)
                            @if(is_string($v) && $v !== '')
                                <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                            @endif
                        @endforeach
                        <i data-lucide="search" class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none"></i>
                        <input type="text" name="q" value="{{ request('q') }}"
                               placeholder="Cari properti, area, atau kata kunci..."
                               class="w-full h-11 pl-10 pr-10 rounded-xl border border-stone-300 bg-white hover:border-stone-400 focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none text-sm transition">
                        @if(request('q'))
                            <a href="{{ url()->current() }}?{{ http_build_query(request()->except('q')) }}"
                               class="absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-600">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </a>
                        @endif
                    </form>
                    <button type="button"
                            class="w-11 h-11 shrink-0 rounded-xl border border-stone-300 bg-white text-stone-600 hover:text-orange-500 hover:border-orange-300 flex items-center justify-center transition"
                            title="Simpan Pencarian">
                        <i data-lucide="bookmark" class="w-5 h-5"></i>
                    </button>
                </div>

                {{-- FILTER BAR --}}
                <form method="GET" action="{{ url()->current() }}" class="flex flex-wrap gap-2 mb-3">

                    <button type="button" @click="showAdvanced = !showAdvanced"
                            class="h-10 px-4 rounded-xl border border-stone-300 bg-white text-stone-700 hover:border-stone-400 text-sm font-medium flex items-center gap-2 transition"
                            :class="showAdvanced ? 'border-orange-500 text-orange-600 bg-orange-50' : ''">
                        <i data-lucide="sliders-horizontal" class="w-4 h-4"></i>
                        Filter
                    </button>

                    <div class="relative">
                        <i data-lucide="wallet" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none"></i>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none"></i>
                        <select name="max_price" onchange="this.form.submit()"
                                class="h-10 pl-9 pr-9 rounded-xl border border-stone-300 bg-white text-sm text-stone-700 hover:border-stone-400 focus:border-orange-500 outline-none appearance-none cursor-pointer transition">
                            <option value="">Harga</option>
                            <option value="500000000" @selected(request('max_price') == 500000000)>&lt; Rp 500 Jt</option>
                            <option value="1000000000" @selected(request('max_price') == 1000000000)>&lt; Rp 1 M</option>
                            <option value="2000000000" @selected(request('max_price') == 2000000000)>&lt; Rp 2 M</option>
                            <option value="5000000000" @selected(request('max_price') == 5000000000)>&lt; Rp 5 M</option>
                        </select>
                    </div>

                    <div class="relative">
                        <i data-lucide="tag" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none"></i>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none"></i>
                        <select name="type" onchange="this.form.submit()"
                                class="h-10 pl-9 pr-9 rounded-xl border border-stone-300 bg-white text-sm text-stone-700 hover:border-stone-400 focus:border-orange-500 outline-none appearance-none cursor-pointer transition">
                            <option value="">Tipe</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" @selected(request('type') == $type->id)>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="relative">
                        <i data-lucide="arrow-up-down" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none"></i>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none"></i>
                        <select name="sort" onchange="this.form.submit()"
                                class="h-10 pl-9 pr-9 rounded-xl border border-stone-300 bg-white text-sm text-stone-700 hover:border-stone-400 focus:border-orange-500 outline-none appearance-none cursor-pointer transition">
                            <option value="latest" @selected($sort === 'latest')>Terbaru</option>
                            <option value="price_asc" @selected($sort === 'price_asc')>Harga Terendah</option>
                            <option value="price_desc" @selected($sort === 'price_desc')>Harga Tertinggi</option>
                            <option value="popular" @selected($sort === 'popular')>Terpopuler</option>
                        </select>
                    </div>

                    @if($hasFilters)
                        <a href="{{ url()->current() }}"
                           class="h-10 px-4 rounded-xl border border-red-200 bg-red-50 text-red-600 hover:bg-red-100 text-sm font-medium flex items-center gap-2 transition">
                            <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                            Reset
                        </a>
                    @endif

                    @foreach(request()->except('max_price', 'type', 'sort', 'page') as $k => $v)
                        @if(is_string($v) && $v !== '')
                            <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                        @endif
                    @endforeach

                    <div x-show="showAdvanced" x-cloak
                         class="w-full mt-1 p-4 bg-white border border-stone-200 rounded-xl grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-stone-600 mb-1.5">Area</label>
                            <select name="area" onchange="this.form.submit()"
                                    class="w-full h-10 px-3 rounded-lg border border-stone-300 text-sm focus:border-orange-500 outline-none">
                                <option value="">Semua Area</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}" @selected(request('area') == $area->id)>{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-stone-600 mb-1.5">Kamar Tidur</label>
                            <select name="bedrooms" onchange="this.form.submit()"
                                    class="w-full h-10 px-3 rounded-lg border border-stone-300 text-sm focus:border-orange-500 outline-none">
                                <option value="">Semua</option>
                                @foreach([1, 2, 3, 4, 5] as $n)
                                    <option value="{{ $n }}" @selected(request('bedrooms') == $n)>{{ $n }}+ Kamar</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>

                {{-- JUDUL GRID --}}
                <div class="mb-4">
                    <h2 class="text-lg font-bold text-stone-900">
                        Menampilkan properti daerah {{ $activeAreaName }}
                    </h2>
                    <p class="text-xs text-stone-500 mt-0.5">
                        {{ $properties->total() }} properti ditemukan
                    </p>
                </div>

                {{-- GRID PROPERTI: pakai card-featured (1 kolom besar) --}}
                @if($properties->count() > 0)
                    <div class="flex flex-col gap-5">
                        @foreach($properties as $property)
                            <x-property.card-featured :property="$property" />
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $properties->onEachSide(1)->links() }}
                    </div>
                @else
                    <div class="bg-white rounded-2xl border border-stone-200 p-12 text-center">
                        <div class="w-16 h-16 mx-auto rounded-full bg-orange-50 flex items-center justify-center mb-4">
                            <i data-lucide="search-x" class="w-8 h-8 text-orange-400"></i>
                        </div>
                        <h3 class="text-lg font-bold text-stone-900">Tidak ada properti</h3>
                        <p class="mt-1 text-sm text-stone-500">Coba ubah filter atau kata kunci.</p>
                        <a href="{{ url()->current() }}"
                           class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold transition">
                            <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                            Reset Filter
                        </a>
                    </div>
                @endif

            </div>

            {{-- KOLOM KANAN (42%) --}}
            <div class="hidden lg:block sticky top-6">
                <div class="rounded-2xl border-2 border-dashed border-stone-200 bg-stone-100/50 flex flex-col items-center justify-center text-stone-400"
                     style="height: calc(100vh - 3rem);">
                    <i data-lucide="map" class="w-14 h-14 mb-4 text-stone-300"></i>
                    <p class="text-base font-semibold text-stone-500">Peta Lokasi / Iklan</p>
                    <p class="text-xs mt-1">(Segera Hadir)</p>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
