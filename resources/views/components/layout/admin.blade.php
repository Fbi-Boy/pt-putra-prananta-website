<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body x-data="{ sidebarOpen: true, mobileOpen: false }" class="font-sans antialiased bg-stone-100">

    <div class="flex h-screen overflow-hidden">

        {{-- ========================================================= --}}
        {{-- SIDEBAR (Desktop)                                       --}}
        {{-- ========================================================= --}}
        <aside :class="sidebarOpen ? 'w-64' : 'w-20'"
               class="hidden lg:flex flex-col bg-[#09251C] text-white transition-all duration-300 shrink-0 z-40">

            {{-- Logo --}}
            <div class="h-16 flex items-center px-4 border-b border-white/10">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 overflow-hidden">
                    <div class="w-9 h-9 rounded-lg bg-orange-500 flex items-center justify-center shrink-0">
                        <span class="text-white font-black text-lg">P</span>
                    </div>
                    <div x-show="sidebarOpen" x-cloak class="leading-none whitespace-nowrap">
                        <span class="block text-base font-bold">Putra Admin</span>
                        <span class="block text-[9px] tracking-wider uppercase text-stone-400 mt-0.5">CRM Panel</span>
                    </div>
                </a>
            </div>

            {{-- Menu --}}
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-orange-500 text-white font-semibold text-sm">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Dashboard</span>
                </a>

                {{-- Section: Manajemen Properti --}}
                <div x-show="sidebarOpen" x-cloak class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                    Properti
                </div>
                <div x-show="!sidebarOpen" x-cloak class="my-3 border-t border-white/10"></div>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="building-2" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Data Properti</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="inbox" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Submission</span>
                    @if($stats['submissions_pending'] ?? 0)
                        <span class="ml-auto bg-orange-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full" x-show="sidebarOpen" x-cloak>
                            {{ $stats['submissions_pending'] }}
                        </span>
                    @endif
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="tag" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Tipe Properti</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="map-pin" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Area</span>
                </a>

                {{-- Section: Agen --}}
                <div x-show="sidebarOpen" x-cloak class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                    Agen
                </div>
                <div x-show="!sidebarOpen" x-cloak class="my-3 border-t border-white/10"></div>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="users" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Data Agen</span>
                </a>

                {{-- Section: Interaksi --}}
                <div x-show="sidebarOpen" x-cloak class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                    Interaksi
                </div>
                <div x-show="!sidebarOpen" x-cloak class="my-3 border-t border-white/10"></div>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="message-square" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Inquiry</span>
                    @if($stats['inquiries_new'] ?? 0)
                        <span class="ml-auto bg-emerald-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full" x-show="sidebarOpen" x-cloak>
                            {{ $stats['inquiries_new'] }}
                        </span>
                    @endif
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="calculator" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Pengajuan KPR</span>
                    @if($stats['kpr_pending'] ?? 0)
                        <span class="ml-auto bg-purple-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full" x-show="sidebarOpen" x-cloak>
                            {{ $stats['kpr_pending'] }}
                        </span>
                    @endif
                </a>

                {{-- Section: Konten --}}
                <div x-show="sidebarOpen" x-cloak class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                    Konten
                </div>
                <div x-show="!sidebarOpen" x-cloak class="my-3 border-t border-white/10"></div>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="newspaper" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Berita</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="star" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Testimoni</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="megaphone" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Iklan</span>
                </a>

                {{-- Section: Sistem --}}
                <div x-show="sidebarOpen" x-cloak class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                    Sistem
                </div>
                <div x-show="!sidebarOpen" x-cloak class="my-3 border-t border-white/10"></div>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 hover:text-white text-sm transition">
                    <i data-lucide="settings" class="w-5 h-5 shrink-0"></i>
                    <span x-show="sidebarOpen" x-cloak>Pengaturan</span>
                </a>
            </nav>

            {{-- Toggle Sidebar --}}
            <div class="border-t border-white/10 p-3">
                <button @click="sidebarOpen = !sidebarOpen"
                        class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg text-stone-400 hover:bg-white/5 hover:text-white text-xs transition">
                    <i :data-lucide="sidebarOpen ? 'chevrons-left' : 'chevrons-right'" class="w-4 h-4"></i>
                    <span x-show="sidebarOpen" x-cloak>Perkecil</span>
                </button>
            </div>
        </aside>


        {{-- ========================================================= --}}
        {{-- MOBILE SIDEBAR OVERLAY                                  --}}
        {{-- ========================================================= --}}
        <div x-show="mobileOpen" x-cloak
             @click="mobileOpen = false"
             class="fixed inset-0 bg-black/50 z-40 lg:hidden"></div>

        <aside x-show="mobileOpen" x-cloak
               x-transition:enter="transition ease-out duration-300"
               x-transition:enter-start="-translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in duration-200"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="-translate-x-full"
               class="fixed left-0 top-0 bottom-0 w-64 bg-[#09251C] text-white z-50 lg:hidden flex flex-col">

            <div class="h-16 flex items-center justify-between px-4 border-b border-white/10">
                <span class="text-base font-bold">Putra Admin</span>
                <button @click="mobileOpen = false" class="text-stone-400 hover:text-white">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-orange-500 text-white font-semibold text-sm">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm">
                    <i data-lucide="building-2" class="w-5 h-5"></i> Data Properti
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm">
                    <i data-lucide="inbox" class="w-5 h-5"></i> Submission
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm">
                    <i data-lucide="users" class="w-5 h-5"></i> Data Agen
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm">
                    <i data-lucide="message-square" class="w-5 h-5"></i> Inquiry
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm">
                    <i data-lucide="settings" class="w-5 h-5"></i> Pengaturan
                </a>
            </nav>
        </aside>


        {{-- ========================================================= --}}
        {{-- MAIN CONTENT                                             --}}
        {{-- ========================================================= --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- TOPBAR --}}
            <header class="h-16 bg-white border-b border-stone-200 flex items-center px-4 lg:px-6 shrink-0">

                {{-- Mobile Menu Button --}}
                <button @click="mobileOpen = true" class="lg:hidden w-10 h-10 rounded-lg hover:bg-stone-100 flex items-center justify-center mr-2">
                    <i data-lucide="menu" class="w-5 h-5 text-stone-700"></i>
                </button>

                {{-- Breadcrumb --}}
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-stone-900 truncate">@yield('page-title', 'Dashboard')</p>
                    <p class="text-xs text-stone-500 truncate hidden sm:block">@yield('page-subtitle', 'Selamat datang kembali di panel admin')</p>
                </div>

                {{-- Right Actions --}}
                <div class="flex items-center gap-2">
                    {{-- Notif --}}
                    <button class="w-10 h-10 rounded-lg hover:bg-stone-100 flex items-center justify-center relative">
                        <i data-lucide="bell" class="w-5 h-5 text-stone-600"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

                    {{-- View Site --}}
                    <a href="{{ route('home') }}" target="_blank"
                       class="hidden sm:flex items-center gap-2 h-10 px-4 rounded-lg border border-stone-300 hover:bg-stone-50 text-sm font-semibold text-stone-700 transition">
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                        <span>Lihat Website</span>
                    </a>

                    {{-- Profile Dropdown --}}
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-2 h-10 pl-1 pr-3 rounded-lg hover:bg-stone-100 transition">
                            <div class="w-8 h-8 rounded-full bg-orange-500 text-white flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                            </div>
                            <div class="hidden md:block text-left">
                                <p class="text-xs font-bold text-stone-900 leading-tight">{{ auth()->user()->name ?? 'Admin' }}</p>
                                <p class="text-[10px] text-stone-500">Administrator</p>
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-stone-400"></i>
                        </button>

                        <div x-show="open" x-cloak @click.outside="open = false"
                             class="absolute right-0 top-full mt-2 w-56 bg-white rounded-xl shadow-lg border border-stone-200 py-2 z-50">
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-stone-700 hover:bg-stone-50">
                                <i data-lucide="user" class="w-4 h-4"></i> Profil Saya
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-stone-700 hover:bg-stone-50">
                                <i data-lucide="settings" class="w-4 h-4"></i> Pengaturan
                            </a>
                            <div class="my-1 border-t border-stone-100"></div>
                            <form method="POST" action="#">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <i data-lucide="log-out" class="w-4 h-4"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            {{-- CONTENT AREA --}}
            <main class="flex-1 overflow-y-auto bg-stone-100 p-4 lg:p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
