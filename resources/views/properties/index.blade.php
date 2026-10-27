@extends('components.layout.app')

@section('title', 'Cari Properti — ' . config('company.name'))

{{-- ========================================== --}}
{{-- STYLES UNTUK LEAFLET & CUSTOM MARKER       --}}
{{-- ========================================== --}}
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>

        .leaflet-control-attribution {
        display: none !important;
    }

    /* Tema Gelap Peta */
    #property-map { z-index: 10; }
    .leaflet-container { background: #09251C; font-family: inherit; }

    /* Desain Custom Marker Icon (Kotak Putih) */
    .custom-map-marker {
        background: white;
        color: #09251C;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        border: 2px solid transparent;
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .custom-map-marker svg { width: 22px; height: 22px; stroke-width: 2.5; }

    /* Hover & Active State Marker */
    .custom-map-marker:hover, .custom-map-marker.active {
        background: #f97316; /* Orange */
        color: white;
        border-color: white;
        transform: scale(1.15) translateY(-4px);
        z-index: 1000;
        box-shadow: 0 8px 20px rgba(249, 115, 22, 0.4);
    }

    /* Popup Kustom */
    .leaflet-popup-content-wrapper {
        border-radius: 16px;
        padding: 0;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    }
    .leaflet-popup-content { margin: 0; width: 240px !important; }
    .leaflet-popup-tip { background: white; }

    /* Sembunyikan outline bawaan leaflet */
    .leaflet-interactive:focus { outline: none; }
</style>
@endpush

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

            {{-- ===================================================== --}}
            {{-- KOLOM KIRI (58%)                                     --}}
            {{-- ===================================================== --}}
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
                                {{-- FILTER BAR --}}
                <form method="GET" action="{{ url()->current() }}" class="flex flex-wrap gap-2 mb-3" x-data="{ showAdvanced: false }">

                    {{-- Tombol Buka Advanced Filter --}}
                    <button type="button" @click="showAdvanced = !showAdvanced"
                            class="h-10 px-4 rounded-xl border border-stone-300 bg-white text-stone-700 hover:border-stone-400 text-sm font-medium flex items-center gap-2 transition"
                            :class="showAdvanced ? 'border-orange-500 text-orange-600 bg-orange-50' : ''">
                        <i data-lucide="sliders-horizontal" class="w-4 h-4"></i>
                        Filter
                        @if(request()->hasAny(['min_price', 'max_price', 'bathrooms', 'certificate', 'is_kpr_eligible', 'facilities']))
                            <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                        @endif
                    </button>

                    {{-- Tipe Properti --}}
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

                    {{-- Sortir --}}
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

                    {{-- Tombol Reset --}}
                    @if($hasFilters)
                        <a href="{{ url()->current() }}"
                           class="h-10 px-4 rounded-xl border border-red-200 bg-red-50 text-red-600 hover:bg-red-100 text-sm font-medium flex items-center gap-2 transition">
                            <i data-lucide="rotate-ccw" class="w-4 h-4"></i> Reset
                        </a>
                    @endif

                    {{-- Hidden inputs untuk mempertahankan filter saat ganti tipe/sort --}}
                    @foreach(request()->except('type', 'sort', 'page') as $k => $v)
                        @if(is_string($v) && $v !== '')
                            <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                        @endif
                    @endforeach

                    {{-- ======================================================== --}}
                    {{-- ADVANCED FILTER (Panel Putih Muncul Saat Diklik)        --}}
                    {{-- ======================================================== --}}
                    <div x-show="showAdvanced" x-cloak x-transition
                         class="w-full mt-2 p-5 bg-white border border-stone-200 rounded-2xl shadow-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

                        {{-- 1. Area --}}
                        <div>
                            <label class="block text-xs font-bold text-stone-700 mb-2">Area / Kecamatan</label>
                            <select name="area" onchange="this.form.submit()"
                                    class="w-full h-10 px-3 rounded-lg border border-stone-300 text-sm focus:border-orange-500 outline-none">
                                <option value="">Semua Area</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}" @selected(request('area') == $area->id)>{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- 2. Harga (Min & Max) --}}
                        <div>
                            <label class="block text-xs font-bold text-stone-700 mb-2">Rentang Harga (Rp)</label>
                            <div class="flex items-center gap-2">
                                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min"
                                       class="w-full h-10 px-3 rounded-lg border border-stone-300 text-sm focus:border-orange-500 outline-none">
                                <span class="text-stone-400">-</span>
                                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max"
                                       class="w-full h-10 px-3 rounded-lg border border-stone-300 text-sm focus:border-orange-500 outline-none">
                            </div>
                        </div>

                        {{-- 3. Kamar Tidur & Mandi --}}
                        <div>
                            <label class="block text-xs font-bold text-stone-700 mb-2">Kamar Tidur & Mandi</label>
                            <div class="flex items-center gap-2">
                                <select name="bedrooms" onchange="this.form.submit()" class="w-full h-10 px-3 rounded-lg border border-stone-300 text-sm focus:border-orange-500 outline-none">
                                    <option value="">KT</option>
                                    @foreach([1, 2, 3, 4, 5] as $n)
                                        <option value="{{ $n }}" @selected(request('bedrooms') == $n)>{{ $n }}+</option>
                                    @endforeach
                                </select>
                                <select name="bathrooms" onchange="this.form.submit()" class="w-full h-10 px-3 rounded-lg border border-stone-300 text-sm focus:border-orange-500 outline-none">
                                    <option value="">KM</option>
                                    @foreach([1, 2, 3, 4] as $n)
                                        <option value="{{ $n }}" @selected(request('bathrooms') == $n)>{{ $n }}+</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- 4. Sertifikat & KPR --}}
                        <div>
                            <label class="block text-xs font-bold text-stone-700 mb-2">Sertifikat</label>
                            <select name="certificate" onchange="this.form.submit()" class="w-full h-10 px-3 rounded-lg border border-stone-300 text-sm focus:border-orange-500 outline-none mb-3">
                                <option value="">Semua Sertifikat</option>
                                <option value="SHM" @selected(request('certificate') == 'SHM')>SHM</option>
                                <option value="HGB" @selected(request('certificate') == 'HGB')>HGB</option>
                                <option value="SHM HGB" @selected(request('certificate') == 'SHM HGB')>SHM HGB</option>
                                <option value="Girik" @selected(request('certificate') == 'Girik')>Girik</option>
                            </select>

                            {{-- Toggle Bisa KPR --}}
                            <label class="flex items-center gap-2 cursor-pointer mt-1">
                                <input type="checkbox" name="is_kpr_eligible" value="1" onchange="this.form.submit()" @checked(request('is_kpr_eligible'))
                                       class="w-4 h-4 text-orange-500 rounded border-stone-300 focus:ring-orange-500">
                                <span class="text-sm font-medium text-stone-700">Bisa KPR</span>
                            </label>
                        </div>

                        {{-- 5. Fasilitas (Full Width) --}}
                        <div class="md:col-span-2 lg:col-span-4 border-t border-stone-100 pt-4 mt-1">
                            <label class="block text-xs font-bold text-stone-700 mb-3">Fasilitas (Pilih satu atau lebih)</label>
                            <div class="flex flex-wrap gap-4">
                                @foreach($facilities as $facility)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="facilities[]" value="{{ $facility->id }}" onchange="this.form.submit()"
                                               @checked(in_array($facility->id, request('facilities', [])))
                                               class="w-4 h-4 text-orange-500 rounded border-stone-300 focus:ring-orange-500">
                                        <span class="text-sm text-stone-600">{{ $facility->name }}</span>
                                    </label>
                                @endforeach
                            </div>
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

                {{-- GRID PROPERTI: 2 KOLOM --}}
                @if($properties->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($properties as $property)
                            <x-property.card :property="$property" />
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

            {{-- ===================================================== --}}
            {{-- KOLOM KANAN (42%) - PETA LEAFLET                     --}}
            {{-- ===================================================== --}}
            <div class="hidden lg:block sticky top-6">
                <div class="relative rounded-2xl overflow-hidden shadow-xl border border-stone-200 bg-[#09251C]"
                     style="height: calc(100vh - 3rem);">

                    {{-- Tombol "Cari di Area Ini" --}}
                    <div id="search-area-wrapper" class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] hidden transition-all duration-300 transform -translate-y-4 opacity-0">
                        <button type="button" id="btn-search-area"
                                class="bg-white text-stone-900 px-4 py-2.5 rounded-full shadow-lg font-bold text-sm flex items-center gap-2 hover:bg-stone-50 transition">
                            <i data-lucide="search" class="w-4 h-4 text-orange-500"></i>
                            Cari di Area Ini
                        </button>
                    </div>

                    {{-- Tombol Ganti Tema Peta --}}
                    <div class="absolute top-4 right-4 z-[1000] flex flex-col gap-2">
                        <button type="button" id="btn-theme-dark" class="w-10 h-10 rounded-xl bg-[#09251C] text-white shadow-lg flex items-center justify-center border border-white/20" title="Mode Gelap">
                            <i data-lucide="moon" class="w-5 h-5"></i>
                        </button>
                        <button type="button" id="btn-theme-light" class="w-10 h-10 rounded-xl bg-white text-stone-900 shadow-lg flex items-center justify-center border border-stone-200 hover:bg-stone-50" title="Mode Terang">
                            <i data-lucide="sun" class="w-5 h-5"></i>
                        </button>
                        <button type="button" id="btn-theme-satellite" class="w-10 h-10 rounded-xl bg-stone-800 text-white shadow-lg flex items-center justify-center border border-stone-600 hover:bg-stone-700" title="Mode Satelit">
                            <i data-lucide="globe" class="w-5 h-5"></i>
                        </button>
                    </div>

                    {{-- Peta --}}
                    <div id="property-map" class="w-full h-full"></div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

{{-- ========================================== --}}
{{-- SCRIPT UNTUK LEAFLET MAP & MARKER          --}}
{{-- ========================================== --}}
@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Inisialisasi Peta dengan Koordinat Jember
        var map = L.map('property-map', {
            zoomControl: false
        }).setView([-8.1689, 113.7020], 12);

        // Tambahkan kontrol zoom di pojok kanan bawah
        L.control.zoom({ position: 'bottomright' }).addTo(map);

                // Tile Layer Esri Dark Gray (Gratis, Tanpa API Key)
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Dark_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ',
            maxZoom: 16
        }).addTo(map);

        // 3. Ambil Data Properti dari Laravel
        var properties = @json($properties->items());
        var bounds = [];

        // 4. Kumpulan SVG Icons untuk Jenis Properti
        var svgIcons = {
            'Rumah': `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>`,
            'Tanah': `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M14.106 5.553a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619v12.764a1 1 0 0 1-.553.894l-4.553 2.277a2 2 0 0 1-1.788 0l-4.212-2.106a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0z"/><path d="M15 5.764v15"/><path d="M9 3.236v15"/></svg>`,
            'Ruko': `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/><path d="M22 7v3a2 2 0 0 1-2 2v0a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"/></svg>`,
            'Apartemen': `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>`,
            'Kos': `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><path d="M6 8v9"/></svg>`,
            'Villa': `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>`,
            'Gudang': `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M22 8.35V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8.35A2 2 0 0 1 3.26 6.5l8-3.2a2 2 0 0 1 1.48 0l8 3.2A2 2 0 0 1 22 8.35Z"/><path d="M6 18h12"/><path d="M6 14h12"/><rect width="12" height="12" x="6" y="10"/></svg>`,
            'Kantor': `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>`
        };

        // 5. Kumpulan SVG Spesifikasi untuk Popup
        var specSvgs = {
            lt: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-stone-500"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/></svg>`,
            lb: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-stone-500"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>`,
            kt: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-stone-500"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><path d="M6 8v9"/></svg>`,
            km: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-stone-500"><path d="M9 6 6.5 3.5a1.5 1.5 0 0 0-1-.5C4.683 3 4 3.683 4 4.5V17a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"/><line x1="10" x2="8" y1="5" y2="7"/><line x1="2" x2="22" y1="12" y2="12"/><line x1="7" x2="7" y1="19" y2="21"/><line x1="17" x2="17" y1="19" y2="21"/></svg>`
        };

        // 6. Looping data properti dan buat marker
        properties.forEach(function(prop) {
            if (prop.latitude && prop.longitude) {
                var lat = parseFloat(prop.latitude);
                var lng = parseFloat(prop.longitude);
                var typeName = prop.type ? prop.type.name : 'Rumah';
                var iconSvg = svgIcons[typeName] || svgIcons['Rumah'];

                var listingType = prop.listing_type === 'sale' ? 'Dijual' : 'Disewa';
                var priceStr = prop.price_formatted || 'Rp ' + (prop.price / 1000000) + ' Jt';

                // Custom Icon Marker
                var customIcon = L.divIcon({
                    className: 'bg-transparent',
                    html: `<div class="custom-map-marker">${iconSvg}</div>`,
                    iconSize: [44, 44],
                    iconAnchor: [22, 44],
                    popupAnchor: [0, -44]
                });

                var marker = L.marker([lat, lng], { icon: customIcon }).addTo(map);

                // Desain Popup
                var popupContent = `
                    <div class="p-4 bg-white">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="font-bold text-base text-stone-900">${typeName}</h4>
                            <span class="text-[10px] font-bold text-orange-600 bg-orange-50 px-2 py-0.5 rounded uppercase">${listingType}</span>
                        </div>
                        <p class="text-lg font-bold text-stone-900 mb-3">${priceStr}</p>

                        <div class="grid grid-cols-2 gap-y-2 gap-x-3 text-xs font-medium text-stone-600 mb-4">
                            ${prop.land_area ? `<div class="flex items-center gap-1.5">${specSvgs.lt} LT ${prop.land_area} m²</div>` : ''}
                            ${prop.building_area ? `<div class="flex items-center gap-1.5">${specSvgs.lb} LB ${prop.building_area} m²</div>` : ''}
                            ${prop.bedrooms > 0 ? `<div class="flex items-center gap-1.5">${specSvgs.kt} ${prop.bedrooms} KT</div>` : ''}
                            ${prop.bathrooms > 0 ? `<div class="flex items-center gap-1.5">${specSvgs.km} ${prop.bathrooms} KM</div>` : ''}
                        </div>

                        <a href="/properti/${prop.slug}" class="block w-full text-center bg-stone-900 hover:bg-stone-800 text-white text-xs font-bold py-2.5 rounded-xl transition">
                            Detail
                        </a>
                    </div>
                `;

                marker.bindPopup(popupContent, { maxWidth: 240, minWidth: 240, className: 'custom-popup' });

                // Buka popup saat di-hover
                marker.on('mouseover', function (e) {
                    this.openPopup();
                });

                bounds.push([lat, lng]);
            }
        });

        // 7. Auto-Zoom agar semua marker terlihat
        if (bounds.length > 0) {
            map.fitBounds(bounds, { padding: [50, 50], maxZoom: 15 });
        }
    });
</script>
@endpush
