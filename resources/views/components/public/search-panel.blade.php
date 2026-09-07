<div
    x-data="{ activeTab: 'beli' }"
    class="w-[620px] max-w-[90vw] mx-auto bg-white rounded-2xl shadow-xl px-6 py-5"
>

    {{-- Judul --}}
    <h2 class="text-center text-2xl font-bold text-gray-900">
        Temukan Properti Impian Anda
    </h2>


    {{-- Menu Beli / Sewa / KPR --}}
    <div class="flex items-center justify-center gap-8 mt-4">

        {{-- Beli --}}
        <button
            type="button"
            @click="activeTab = 'beli'"
            :class="activeTab === 'beli'
                ? 'text-gray-900 font-bold'
                : 'text-gray-400 hover:text-gray-700'"
            class="text-sm transition"
        >
            Beli
        </button>

        {{-- Sewa --}}
        <button
            type="button"
            @click="activeTab = 'sewa'"
            :class="activeTab === 'sewa'
                ? 'text-gray-900 font-bold'
                : 'text-gray-400 hover:text-gray-700'"
            class="text-sm transition"
        >
            Sewa
        </button>

        {{-- KPR --}}
        <button
            type="button"
            @click="activeTab = 'kpr'"
            :class="activeTab === 'kpr'
                ? 'text-gray-900 font-bold'
                : 'text-gray-400 hover:text-gray-700'"
            class="text-sm transition"
        >
            KPR
        </button>

    </div>


    {{-- ========================= --}}
    {{-- BELI --}}
    {{-- ========================= --}}
    <div
        x-show="activeTab === 'beli'"
        x-cloak
        class="mt-5"
    >

        <div class="flex items-center gap-2">

            {{-- Search --}}
            <div class="relative flex-1">

                <i
                    data-lucide="search"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"
                ></i>

                <input
                    type="text"
                    placeholder="Cari lokasi, area, atau nama property..."
                    class="w-full h-10 pl-10 pr-3 rounded-xl border border-gray-300 bg-white outline-none focus:border-yellow-400 transition text-sm"
                >

            </div>

            {{-- Cari --}}
            <button
                type="button"
                class="h-10 px-5 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold text-sm transition"
            >
                Cari
            </button>

        </div>


        {{-- Filter --}}
        <div class="flex items-center justify-center gap-2 mt-3">

            <button
                type="button"
                class="h-9 px-4 rounded-full border border-gray-300 bg-white text-sm text-gray-600 hover:border-gray-500 transition"
            >
                Property Type
            </button>

            <button
                type="button"
                class="h-9 px-4 rounded-full border border-gray-300 bg-white text-sm text-gray-600 hover:border-gray-500 transition"
            >
                Harga
            </button>

            <button
                type="button"
                class="h-9 px-4 rounded-full border border-gray-300 bg-white text-sm text-gray-600 hover:border-gray-500 transition"
            >
                Kamar
            </button>

        </div>

    </div>


    {{-- ========================= --}}
    {{-- SEWA --}}
    {{-- ========================= --}}
    <div
        x-show="activeTab === 'sewa'"
        x-cloak
        class="mt-5"
    >

        <div class="flex items-center gap-2">

            <div class="relative flex-1">

                <i
                    data-lucide="search"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"
                ></i>

                <input
                    type="text"
                    placeholder="Cari property untuk disewa..."
                    class="w-full h-10 pl-10 pr-3 rounded-xl border border-gray-300 bg-white outline-none focus:border-yellow-400 transition text-sm"
                >

            </div>

            <button
                type="button"
                class="h-10 px-5 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold text-sm transition"
            >
                Cari
            </button>

        </div>


        <div class="flex items-center justify-center gap-2 mt-3">

            <button
                type="button"
                class="h-9 px-4 rounded-full border border-gray-300 bg-white text-sm text-gray-600 hover:border-gray-500 transition"
            >
                Property Type
            </button>

            <button
                type="button"
                class="h-9 px-4 rounded-full border border-gray-300 bg-white text-sm text-gray-600 hover:border-gray-500 transition"
            >
                Harga Sewa
            </button>

        </div>

    </div>


    {{-- ========================= --}}
    {{-- KPR --}}
    {{-- ========================= --}}
    <div
        x-show="activeTab === 'kpr'"
        x-cloak
        class="mt-5"
    >

        <div class="flex items-center gap-2">

            <div class="relative flex-1">

                <i
                    data-lucide="calculator"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"
                ></i>

                <input
                    type="text"
                    placeholder="Masukkan harga property..."
                    class="w-full h-10 pl-10 pr-3 rounded-xl border border-gray-300 bg-white outline-none focus:border-yellow-400 transition text-sm"
                >

            </div>

            <button
                type="button"
                class="h-10 px-5 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold text-sm transition"
            >
                Hitung KPR
            </button>

        </div>

    </div>

</div>