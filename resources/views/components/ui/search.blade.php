{{-- SEARCH BAR + BOOKMARK (Sama dengan Properti) --}}
<div class="flex gap-2 mb-4">
    <form method="GET" action="{{ route('agents.index') }}" class="relative flex-1">
        {{-- Mempertahankan filter area jika ada --}}
        @if(request('area'))
            <input type="hidden" name="area" value="{{ request('area') }}">
        @endif

        <i data-lucide="search" class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none"></i>
        <input type="text" name="q" value="{{ request('q') }}"
               placeholder="Cari nama agen..."
               class="w-full h-11 pl-10 pr-10 rounded-xl border border-stone-300 bg-white hover:border-stone-400 focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none text-sm transition">
        @if(request('q'))
            <a href="{{ route('agents.index') }}?{{ http_build_query(request()->except('q')) }}"
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
