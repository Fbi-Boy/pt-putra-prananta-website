<div x-show="openFind" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6" role="dialog" aria-modal="true">
    <div x-show="openFind" x-transition.opacity class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="openFind = false"></div>

    <div x-show="openFind"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl p-6 sm:p-8 overflow-hidden z-10">

        <button @click="openFind = false" class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-stone-100 text-stone-500 hover:bg-stone-200 transition">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>

        <div class="text-center mb-6">
            <div class="w-14 h-14 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <i data-lucide="search" class="w-7 h-7"></i>
            </div>
            <h3 class="text-xl font-bold text-stone-900">Kami Carikan Properti Anda</h3>
            <p class="text-sm text-stone-500 mt-2">Beri tahu kami kriteria impian Anda, tim kami akan mencarikannya.</p>
        </div>

        <form action="{{ route('properties.index') }}" method="GET" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-stone-700 mb-1.5">Kata Kunci (Nama / Alamat)</label>
                <input type="text" name="q" placeholder="Contoh: Rumah Minimalis Jember"
                       class="w-full h-11 px-4 rounded-xl border border-stone-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none text-sm transition">
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-bold text-stone-700 mb-1.5">Tipe Properti</label>
                    <select name="type" class="w-full h-11 px-3 rounded-xl border border-stone-300 focus:border-orange-500 text-sm outline-none cursor-pointer">
                        <option value="">Semua Tipe</option>
                        <option value="1">Rumah</option>
                        <option value="2">Tanah</option>
                        <option value="3">Ruko</option>
                        <option value="4">Apartemen</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-stone-700 mb-1.5">Budget Maksimal</label>
                    <select name="max_price" class="w-full h-11 px-3 rounded-xl border border-stone-300 focus:border-orange-500 text-sm outline-none cursor-pointer">
                        <option value="">Bebas</option>
                        <option value="500000000">&lt; 500 Juta</option>
                        <option value="1000000000">&lt; 1 Miliar</option>
                        <option value="2000000000">&lt; 2 Miliar</option>
                        <option value="5000000000">&lt; 5 Miliar</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="w-full h-12 mt-2 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl transition shadow-lg shadow-orange-500/30 flex items-center justify-center gap-2">
                <i data-lucide="search" class="w-5 h-5"></i> Cari Properti
            </button>
        </form>
    </div>
</div>
