@props([
    'label' => 'Stat',
    'value' => '0',
    'icon' => 'activity',
    'trend' => null,        // contoh: '+12%'
    'trendUp' => true,      // true = naik (hijau), false = turun (merah)
    'color' => 'orange',    // orange | blue | green | red | purple
    'suffix' => null,       // contoh: 'properti', 'agen'
])

@php
$colors = [
    'orange' => ['bg' => 'bg-orange-50', 'text' => 'text-orange-600', 'icon' => 'text-orange-500'],
    'blue'   => ['bg' => 'bg-blue-50',   'text' => 'text-blue-600',   'icon' => 'text-blue-500'],
    'green'  => ['bg' => 'bg-green-50',  'text' => 'text-green-600',  'icon' => 'text-green-500'],
    'red'    => ['bg' => 'bg-red-50',    'text' => 'text-red-600',    'icon' => 'text-red-500'],
    'purple' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-600', 'icon' => 'text-purple-500'],
];

$theme = $colors[$color] ?? $colors['orange'];
@endphp

<div class="bg-white border border-stone-200 rounded-2xl p-5 hover:shadow-md transition-shadow">
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p class="text-xs font-semibold uppercase tracking-wider text-stone-500">
                {{ $label }}
            </p>

            <div class="mt-2 flex items-baseline gap-1.5 flex-wrap">
                <p class="text-2xl font-bold text-stone-900 leading-tight">
                    {{ $value }}
                </p>
                @if ($suffix)
                    <span class="text-sm text-stone-500">{{ $suffix }}</span>
                @endif
            </div>

            @if ($trend)
                <div class="mt-3 flex items-center gap-1.5 text-xs font-medium
                    {{ $trendUp ? 'text-green-600' : 'text-red-600' }}">
                    <i data-lucide="{{ $trendUp ? 'trending-up' : 'trending-down' }}" class="w-3.5 h-3.5"></i>
                    <span>{{ $trend }}</span>
                    <span class="text-stone-400 font-normal">vs bulan lalu</span>
                </div>
            @endif
        </div>

        <div class="w-11 h-11 rounded-xl {{ $theme['bg'] }} flex items-center justify-center shrink-0">
            <i data-lucide="{{ $icon }}" class="w-5 h-5 {{ $theme['icon'] }}"></i>
        </div>
    </div>
</div>
