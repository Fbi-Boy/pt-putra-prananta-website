<div x-show="openFavorites" x-cloak class="fixed inset-0 z-[90]" role="dialog" aria-modal="true">

    {{-- Backdrop (Latar Gelap) --}}
    <div x-show="openFavorites"
         x-transition.opacity.duration.300ms
         class="fixed inset-0 bg-stone-900/50 backdrop-blur-sm"
         @click="openFavorites = false"></div>

    {{-- Panel Drawer (Meluncur dari Kanan) --}}
    <div x-show="openFavorites"
         x-transition:enter="transition ease-in-out duration-300 transform"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in-out duration-300 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="absolute right-0 top-0 h-full w-full max-w-md bg-white shadow-2xl flex flex-col">

        {{-- Header Drawer --}}
        <div class="flex items-center justify-between px-6 py-5 border-b border-stone-100 bg-white">
            <div class="flex items-center gap-2">
                <i data-lucide="heart" class="w-5 h-5 text-red-500 fill-red-500"></i>
                <h2 class="text-lg font-bold text-stone-900">Properti Tersimpan</h2>
                <span class="bg-stone-100 text-stone-600 text-xs font-bold px-2.5 py-0.5 rounded-full">2</span>
            </div>
            <button @click="openFavorites = false" class="w-8 h-8 rounded-full bg-stone-100 text-stone-500 hover:bg-stone-200 flex items-center justify-center transition">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>

        {{-- Isi Drawer (Scrollable) --}}
        <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-stone-50">

            {{-- CONTOH ITEM FAVORIT 1 (Dummy Data) --}}
            <div class="group relative flex gap-4 bg-white p-3 rounded-2xl border border-stone-200 shadow-sm hover:shadow-md transition">
                <div class="w-24 h-24 shrink-0 rounded-xl overflow-hidden bg-stone-100">
                    <img src="{{ asset('images/property/rumah1.jpg') }}" alt="Rumah" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col justify-center min-w-0 pr-6">
                    <p class="text-[10px] font-bold text-orange-600 uppercase tracking-wider mb-1">Rumah · Beli</p>
                    <a href="#" class="text-sm font-bold text-stone-900 truncate hover:text-orange-600 transition">Rumah Minimalis Modern Dekat Pusat Kota</a>
                    <p class="text-xs text-stone-500 mt-0.5 truncate">Kaliwates, Jember</p>
                    <p class="text-sm font-bold text-stone-900 mt-2">Rp 850 Jt</p>
                </div>
                {{-- Tombol Hapus --}}
                <button class="absolute top-3 right-3 text-stone-400 hover:text-red-500 transition" title="Hapus dari favorit">
                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                </button>
            </div>

            {{-- CONTOH ITEM FAVORIT 2 (Dummy Data) --}}
            <div class="group relative flex gap-4 bg-white p-3 rounded-2xl border border-stone-200 shadow-sm hover:shadow-md transition">
                <div class="w-24 h-24 shrink-0 rounded-xl overflow-hidden bg-stone-100">
                    <img src="{{ asset('images/property/rumah2.jpg') }}" alt="Rumah" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col justify-center min-w-0 pr-6">
                    <p class="text-[10px] font-bold text-orange-600 uppercase tracking-wider mb-1">Rumah · Beli</p>
                    <a href="#" class="text-sm font-bold text-stone-900 truncate hover:text-orange-600 transition">Rumah Mewah dengan Halaman Luas</a>
                    <p class="text-xs text-stone-500 mt-0.5 truncate">Sumbersari, Jember</p>
                    <p class="text-sm font-bold text-stone-900 mt-2">Rp 1,2 M</p>
                </div>
                {{-- Tombol Hapus --}}
                <button class="absolute top-3 right-3 text-stone-400 hover:text-red-500 transition" title="Hapus dari favorit">
                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                </button>
            </div>

            {{-- Empty State (Jika tidak ada favorit, hapus komentar di bawah dan hapus 2 div di atas) --}}
            {{--
            <div class="h-full flex flex-col items-center justify-center text-center py-10">
                <div class="w-20 h-20 bg-stone-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="heart" class="w-10 h-10 text-stone-300"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-900 mb-1">Belum ada properti tersimpan</h3>
                <p class="text-sm text-stone-500 max-w-[200px]">Tandai properti dengan ikon hati untuk menyimpannya di sini.</p>
                <button @click="openFavorites = false" class="mt-6 px-5 py-2.5 bg-stone-900 text-white text-sm font-semibold rounded-xl hover:bg-orange-500 transition">Cari Properti</button>
            </div>
            --}}

        </div>

        {{-- Footer Drawer --}}
        <div class="p-6 border-t border-stone-100 bg-white">
            <a href="#" class="w-full h-12 flex items-center justify-center rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm shadow-lg shadow-orange-500/30 transition">
                Lihat Semua Favorit
            </a>
        </div>
    </div>
</div>
