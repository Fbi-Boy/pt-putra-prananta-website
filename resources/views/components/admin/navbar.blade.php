<header class="sticky top-0 z-30 h-16 bg-white border-b border-stone-200 flex items-center px-4 lg:px-6 gap-4">

    {{-- ============ MOBILE TOGGLE ============ --}}
    <button
        type="button"
        class="lg:hidden w-10 h-10 rounded-lg hover:bg-stone-100 flex items-center justify-center"
        aria-label="Buka menu"
    >
        <i data-lucide="menu" class="w-5 h-5"></i>
    </button>

    {{-- ============ BREADCRUMB / PAGE TITLE ============ --}}
    <div class="hidden md:block">
        <p class="text-xs text-stone-500">Panel Admin</p>
        <p class="text-sm font-semibold text-stone-900">
            {{ $title ?? 'Dashboard' }}
        </p>
    </div>

    {{-- ============ SPACER ============ --}}
    <div class="flex-1"></div>

    {{-- ============ SEARCH ============ --}}
    <div class="hidden md:block relative w-64">
        <i data-lucide="search" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-stone-400"></i>
        <input
            type="text"
            placeholder="Cari properti, agen..."
            class="w-full h-9 pl-9 pr-3 rounded-lg border border-stone-200 text-sm
                   focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500"
        >
    </div>

    {{-- ============ NOTIFICATION ============ --}}
    <button
        type="button"
        class="relative w-10 h-10 rounded-lg hover:bg-stone-100 flex items-center justify-center"
        aria-label="Notifikasi"
    >
        <i data-lucide="bell" class="w-5 h-5"></i>
        <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-orange-500"></span>
    </button>

    {{-- ============ USER MENU ============ --}}
    <div class="relative" x-data="{ open: false }">
        <button
            type="button"
            @click="open = !open"
            class="flex items-center gap-2 pl-2 pr-3 h-10 rounded-lg hover:bg-stone-100 transition"
        >
            <div class="w-8 h-8 rounded-full bg-orange-500 flex items-center justify-center overflow-hidden">
                @if (auth()->user()->avatar ?? null)
                    <img src="{{ auth()->user()->avatar }}" alt="" class="w-full h-full object-cover">
                @else
                    <span class="text-white text-sm font-bold">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </span>
                @endif
            </div>
            <div class="hidden lg:block text-left leading-tight">
                <p class="text-sm font-semibold text-stone-900">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-stone-500">{{ auth()->user()->email ?? '' }}</p>
            </div>
            <i data-lucide="chevron-down" class="w-4 h-4 text-stone-400"></i>
        </button>

        <div
            x-show="open"
            x-cloak
            @click.outside="open = false"
            x-transition
            class="absolute right-0 mt-1 w-56 bg-white rounded-xl border border-stone-200 shadow-lg py-2 z-50"
        >
            <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-stone-700 hover:bg-stone-50">
                <i data-lucide="user" class="w-4 h-4"></i> Profil Saya
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-stone-700 hover:bg-stone-50">
                <i data-lucide="settings" class="w-4 h-4"></i> Pengaturan
            </a>
            <div class="my-1 border-t border-stone-100"></div>
            <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50"
                >
                    <i data-lucide="log-out" class="w-4 h-4"></i> Keluar
                </button>
            </form>
        </div>
    </div>
</header>
