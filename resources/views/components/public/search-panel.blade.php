{{-- resources/views/components/public/search-panel.blade.php --}}
@php
    $homeTypes = \App\Models\PropertyType::query()
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
@endphp

<div
    x-data="{ activeTab: 'beli' }"
    class="w-[620px] max-w-[90vw] mx-auto bg-white rounded-2xl shadow-xl px-6 py-5"
>

    <h2 class="text-center text-2xl font-bold text-gray-900">
        Temukan Properti Impian Anda
    </h2>

    {{-- Menu Beli / Sewa / KPR --}}
    <div class="flex items-center justify-center gap-8 mt-4">
        <button type="button" @click="activeTab = 'beli'"
                :class="activeTab === 'beli' ? 'text-gray-900 font-bold' : 'text-gray-400 hover:text-gray-700'"
                class="text-sm transition">Beli</button>
        <button type="button" @click="activeTab = 'sewa'"
                :class="activeTab === 'sewa' ? 'text-gray-900 font-bold' : 'text-gray-400 hover:text-gray-700'"
                class="text-sm transition">Sewa</button>
        <button type="button" @click="activeTab = 'kpr'"
                :class="activeTab === 'kpr' ? 'text-gray-900 font-bold' : 'text-gray-400 hover:text-gray-700'"
                class="text-sm transition">KPR</button>
    </div>

    {{-- FORM BELI --}}
    <form x-show="activeTab === 'beli'" x-cloak
          action="{{ route('properties.sale') }}" method="GET" class="mt-5">
        <div class="flex items-center gap-2">
            <div class="relative flex-1">
                <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                <input type="text" name="q" placeholder="Cari lokasi, area, atau nama property..."
                       class="w-full h-10 pl-10 pr-3 rounded-xl border border-gray-300 bg-white outline-none focus:border-yellow-400 transition text-sm">
            </div>
            <button type="submit" class="h-10 px-5 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold text-sm transition">
                Cari
            </button>
        </div>
        <div class="flex items-center justify-center gap-2 mt-3">
            <select name="type" class="h-9 px-4 rounded-full border border-gray-300 bg-white text-sm text-gray-600 hover:border-gray-500 outline-none transition cursor-pointer">
                <option value="">Property Type</option>
                @foreach($homeTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <select name="max_price" class="h-9 px-4 rounded-full border border-gray-300 bg-white text-sm text-gray-600 hover:border-gray-500 outline-none transition cursor-pointer">
                <option value="">Harga</option>
                <option value="500000000">&lt; 500 Juta</option>
                <option value="1000000000">&lt; 1 Miliar</option>
                <option value="2000000000">&lt; 2 Miliar</option>
                <option value="5000000000">&lt; 5 Miliar</option>
            </select>
            <select name="bedrooms" class="h-9 px-4 rounded-full border border-gray-300 bg-white text-sm text-gray-600 hover:border-gray-500 outline-none transition cursor-pointer">
                <option value="">Kamar</option>
                <option value="1">1+</option>
                <option value="2">2+</option>
                <option value="3">3+</option>
                <option value="4">4+</option>
                <option value="5">5+</option>
            </select>
        </div>
    </form>

    {{-- FORM SEWA --}}
    <form x-show="activeTab === 'sewa'" x-cloak
          action="{{ route('properties.rent') }}" method="GET" class="mt-5">
        <div class="flex items-center gap-2">
            <div class="relative flex-1">
                <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                <input type="text" name="q" placeholder="Cari property untuk disewa..."
                       class="w-full h-10 pl-10 pr-3 rounded-xl border border-gray-300 bg-white outline-none focus:border-yellow-400 transition text-sm">
            </div>
            <button type="submit" class="h-10 px-5 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold text-sm transition">
                Cari
            </button>
        </div>
        <div class="flex items-center justify-center gap-2 mt-3">
            <select name="type" class="h-9 px-4 rounded-full border border-gray-300 bg-white text-sm text-gray-600 hover:border-gray-500 outline-none transition cursor-pointer">
                <option value="">Property Type</option>
                @foreach($homeTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <select name="max_price" class="h-9 px-4 rounded-full border border-gray-300 bg-white text-sm text-gray-600 hover:border-gray-500 outline-none transition cursor-pointer">
                <option value="">Harga Sewa</option>
                <option value="5000000">&lt; 5 Juta</option>
                <option value="10000000">&lt; 10 Juta</option>
                <option value="20000000">&lt; 20 Juta</option>
                <option value="50000000">&lt; 50 Juta</option>
            </select>
        </div>
    </form>

    {{-- FORM KPR --}}
    <form x-show="activeTab === 'kpr'" x-cloak
          action="{{ route('kpr.index') }}" method="GET" class="mt-5">
        <div class="flex items-center gap-2">
            <div class="relative flex-1">
                <i data-lucide="calculator" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                <input type="number" name="max_price" placeholder="Masukkan harga property..."
                       class="w-full h-10 pl-10 pr-3 rounded-xl border border-gray-300 bg-white outline-none focus:border-yellow-400 transition text-sm">
            </div>
            <button type="submit" class="h-10 px-5 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold text-sm transition">
                Cari KPR
            </button>
        </div>
    </form>

</div>
