<div x-show="openMore" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6" role="dialog" aria-modal="true">
    <div x-show="openMore" x-transition.opacity class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="openMore = false"></div>

    <div x-show="openMore"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="relative w-full max-w-4xl bg-white rounded-3xl shadow-2xl p-6 sm:p-8 z-10 max-h-[90vh] overflow-y-auto">

        <div class="flex items-center justify-between mb-8 border-b border-stone-100 pb-4">
            <div>
                <h3 class="text-xl font-bold text-stone-900">Semua Fitur & Layanan</h3>
                <p class="text-sm text-stone-500 mt-1">Jelajahi seluruh fitur yang tersedia.</p>
            </div>
            <button @click="openMore = false" class="w-10 h-10 flex items-center justify-center rounded-full bg-stone-100 text-stone-500 hover:bg-stone-200 transition">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Kolom 1: Perusahaan --}}
            <div>
                <h4 class="text-xs font-bold text-orange-600 uppercase tracking-wider mb-4">Perusahaan</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('company.profile') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="building" class="w-4 h-4 text-stone-400"></i> Tentang Kami</a></li>
                    <li><a href="{{ route('page.coming-soon', 'tim-kami') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="users" class="w-4 h-4 text-stone-400"></i> Tim Kami</a></li>
                    <li><a href="{{ route('page.coming-soon', 'karier') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="briefcase" class="w-4 h-4 text-stone-400"></i> Karier</a></li>
                    <li><a href="{{ route('page.coming-soon', 'kontak') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="phone" class="w-4 h-4 text-stone-400"></i> Hubungi Kami</a></li>
                </ul>
            </div>

            {{-- Kolom 2: Properti --}}
            <div>
                <h4 class="text-xs font-bold text-orange-600 uppercase tracking-wider mb-4">Properti</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('properties.sale') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="tag" class="w-4 h-4 text-stone-400"></i> Beli Properti</a></li>
                    <li><a href="{{ route('properties.rent') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="key" class="w-4 h-4 text-stone-400"></i> Sewa Properti</a></li>
                    <li><a href="{{ route('page.coming-soon', 'proyek-baru') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="building-2" class="w-4 h-4 text-stone-400"></i> Proyek Baru</a></li>
                    <li><a href="{{ route('page.coming-soon', 'favorit') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="heart" class="w-4 h-4 text-stone-400"></i> Properti Tersimpan</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Layanan --}}
            <div>
                <h4 class="text-xs font-bold text-orange-600 uppercase tracking-wider mb-4">Layanan</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('kpr.index') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="calculator" class="w-4 h-4 text-stone-400"></i> Kalkulator KPR</a></li>
                    <li><a href="{{ route('page.coming-soon', 'pindah-kpr') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="arrow-right-left" class="w-4 h-4 text-stone-400"></i> Take Over KPR</a></li>
                    <li><a href="{{ route('agents.index') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="user-round-search" class="w-4 h-4 text-stone-400"></i> Cari Agen</a></li>
                    <li><a href="{{ route('page.coming-soon', 'daftar-agent') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="user-plus" class="w-4 h-4 text-stone-400"></i> Daftar Agen</a></li>
                </ul>
            </div>

            {{-- Kolom 4: Panduan --}}
            <div>
                <h4 class="text-xs font-bold text-orange-600 uppercase tracking-wider mb-4">Panduan</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('page.coming-soon', 'panduan-beli') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="book-open" class="w-4 h-4 text-stone-400"></i> Cara Membeli Rumah</a></li>
                    <li><a href="{{ route('page.coming-soon', 'panduan-jual') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="file-text" class="w-4 h-4 text-stone-400"></i> Tips Menjual Properti</a></li>
                    <li><a href="{{ route('page.coming-soon', 'faq') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="circle-help" class="w-4 h-4 text-stone-400"></i> FAQ</a></li>
                    <li><a href="{{ route('page.coming-soon', 'tanya-forum') }}" class="text-sm text-stone-600 hover:text-stone-900 transition flex items-center gap-2"><i data-lucide="messages-square" class="w-4 h-4 text-stone-400"></i> Tanya Forum</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
