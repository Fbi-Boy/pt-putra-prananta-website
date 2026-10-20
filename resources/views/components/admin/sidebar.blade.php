@props([
    'active' => 'dashboard',
])

@php
$menuGroups = [
    [
        'label' => 'Utama',
        'items' => [
            ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'layout-dashboard', 'route' => 'admin.dashboard'],
        ],
    ],
    [
        'label' => 'Properti',
        'items' => [
            ['key' => 'properties', 'label' => 'Daftar Properti', 'icon' => 'building-2', 'route' => 'admin.properties.index'],
            ['key' => 'agents', 'label' => 'Agen', 'icon' => 'users', 'route' => 'admin.agents.index'],
        ],
    ],
    [
        'label' => 'Master Data',
        'items' => [
            ['key' => 'property-types', 'label' => 'Tipe Properti', 'icon' => 'tag', 'route' => 'admin.property-types.index'],
            ['key' => 'areas', 'label' => 'Area', 'icon' => 'map-pin', 'route' => 'admin.areas.index'],
            ['key' => 'facilities', 'label' => 'Fasilitas', 'icon' => 'list-checks', 'route' => 'admin.facilities.index'],
            ['key' => 'banks', 'label' => 'Bank KPR', 'icon' => 'landmark', 'route' => 'admin.banks.index'],
        ],
    ],
    [
        'label' => 'Interaksi',
        'items' => [
            ['key' => 'inquiries', 'label' => 'Inquiries', 'icon' => 'message-circle', 'route' => 'admin.inquiries.index', 'badge' => 3],
            ['key' => 'kpr-applications', 'label' => 'Pengajuan KPR', 'icon' => 'calculator', 'route' => 'admin.kpr-applications.index'],
        ],
    ],
    [
        'label' => 'Konten',
        'items' => [
            ['key' => 'testimonials', 'label' => 'Testimoni', 'icon' => 'quote', 'route' => 'admin.testimonials.index'],
            ['key' => 'news', 'label' => 'Berita', 'icon' => 'newspaper', 'route' => 'admin.news.index'],
            ['key' => 'developers', 'label' => 'Developer', 'icon' => 'building', 'route' => 'admin.developers.index'],
            ['key' => 'advertisements', 'label' => 'Iklan', 'icon' => 'megaphone', 'route' => 'admin.advertisements.index'],
        ],
    ],
    [
        'label' => 'Sistem',
        'items' => [
            ['key' => 'users', 'label' => 'Pengguna', 'icon' => 'user-cog', 'route' => 'admin.users.index'],
        ],
    ],
];
@endphp

<aside
    x-data="{ collapsed: false }"
    class="fixed inset-y-0 left-0 z-40 flex flex-col bg-stone-900 text-stone-300 transition-all duration-300"
    :class="collapsed ? 'w-20' : 'w-64'"
>
    {{-- ============ LOGO ============ --}}
    <div class="flex items-center h-16 px-4 border-b border-white/10 shrink-0">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 min-w-0">
            <div class="w-9 h-9 rounded-xl bg-orange-500 flex items-center justify-center shrink-0">
                <span class="text-white font-black text-lg">P</span>
            </div>
            <div class="leading-tight overflow-hidden" x-show="!collapsed" x-cloak>
                <p class="text-white font-bold text-sm whitespace-nowrap">Putra Admin</p>
                <p class="text-[10px] text-stone-400 uppercase tracking-wider whitespace-nowrap">Panel</p>
            </div>
        </a>
    </div>

    {{-- ============ MENU ============ --}}
    <nav class="flex-1 overflow-y-auto py-4 scrollbar-thin">
        @foreach ($menuGroups as $group)
            <div class="mb-5">
                <p
                    x-show="!collapsed"
                    x-cloak
                    class="px-5 mb-2 text-[10px] font-bold uppercase tracking-widest text-stone-500"
                >
                    {{ $group['label'] }}
                </p>

                <div class="space-y-0.5 px-2">
                    @foreach ($group['items'] as $item)
                        @php $isActive = $active === $item['key']; @endphp
                        <a
                            href="{{ route($item['route']) }}"
                            title="{{ $item['label'] }}"
                            class="group flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors
                                {{ $isActive
                                    ? 'bg-orange-500 text-white'
                                    : 'text-stone-400 hover:text-white hover:bg-white/5' }}"
                        >
                            <i data-lucide="{{ $item['icon'] }}" class="w-5 h-5 shrink-0"></i>

                            <span
                                x-show="!collapsed"
                                x-cloak
                                class="flex-1 whitespace-nowrap"
                            >
                                {{ $item['label'] }}
                            </span>

                            @if (!empty($item['badge']))
                                <span
                                    x-show="!collapsed"
                                    x-cloak
                                    class="px-1.5 py-0.5 rounded-md text-[10px] font-bold
                                        {{ $isActive ? 'bg-white/20' : 'bg-orange-500/20 text-orange-400' }}"
                                >
                                    {{ $item['badge'] }}
                                </span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </nav>

    {{-- ============ FOOTER ============ --}}
    <div class="border-t border-white/10 p-3 shrink-0">
        <button
            type="button"
            @click="collapsed = !collapsed"
            class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                   text-stone-400 hover:text-white hover:bg-white/5 transition-colors"
        >
            <i data-lucide="panel-left-close" class="w-5 h-5 shrink-0" x-show="!collapsed"></i>
            <i data-lucide="panel-left-open" class="w-5 h-5 shrink-0" x-show="collapsed" x-cloak></i>
            <span x-show="!collapsed" x-cloak>Perkecil</span>
        </button>
    </div>
</aside>
