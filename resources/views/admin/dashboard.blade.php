<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased bg-stone-100">

    <div class="flex h-screen overflow-hidden">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-[#09251C] text-white flex flex-col shrink-0">
            {{-- Logo --}}
            <div class="h-16 flex items-center px-5 border-b border-white/10">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-lg bg-orange-500 flex items-center justify-center">
                        <span class="text-white font-black text-lg">P</span>
                    </div>
                    <div class="leading-none">
                        <span class="block text-sm font-bold">Putra Admin</span>
                        <span class="block text-[9px] uppercase tracking-wider text-stone-400 mt-0.5">CRM Panel</span>
                    </div>
                </div>
            </div>

            {{-- Menu --}}
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">

                <a href="/admin/dashboard"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-orange-500 text-white font-semibold text-sm">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    Dashboard
                </a>

                <div class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                    Properti
                </div>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm transition">
                    <i data-lucide="building-2" class="w-5 h-5"></i> Data Properti
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm transition">
                    <i data-lucide="inbox" class="w-5 h-5"></i> Submission
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm transition">
                    <i data-lucide="users" class="w-5 h-5"></i> Data Agen
                </a>

                <div class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                    Interaksi
                </div>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm transition">
                    <i data-lucide="message-square" class="w-5 h-5"></i> Inquiry
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm transition">
                    <i data-lucide="calculator" class="w-5 h-5"></i> Pengajuan KPR
                </a>

                <div class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                    Sistem
                </div>
                <a href="/" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm transition">
                    <i data-lucide="external-link" class="w-5 h-5"></i> Lihat Website
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-stone-300 hover:bg-white/5 text-sm transition">
                    <i data-lucide="settings" class="w-5 h-5"></i> Pengaturan
                </a>
            </nav>

            {{-- Footer Sidebar --}}
            <div class="border-t border-white/10 p-3">
                <p class="text-[10px] text-stone-500 text-center">© {{ date('Y') }} Putra Property</p>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- TOPBAR --}}
            <header class="h-16 bg-white border-b border-stone-200 flex items-center px-6 shrink-0">
                <div class="flex-1">
                    <h1 class="text-base font-bold text-stone-900">@yield('page-title', 'Dashboard')</h1>
                    <p class="text-xs text-stone-500">@yield('page-subtitle', 'Selamat datang di panel admin')</p>
                </div>

                <div class="flex items-center gap-2">
                    <a href="/" target="_blank"
                       class="flex items-center gap-2 h-9 px-4 rounded-lg border border-stone-300 hover:bg-stone-50 text-xs font-semibold text-stone-700 transition">
                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                        Lihat Website
                    </a>

                    <div class="w-9 h-9 rounded-full bg-orange-500 text-white flex items-center justify-center font-bold text-sm">
                        A
                    </div>
                </div>
            </header>

            {{-- CONTENT --}}
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
