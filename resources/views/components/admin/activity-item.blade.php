@props([
    'icon' => 'activity',
    'color' => 'orange',    // orange | blue | green | red | gray
    'title' => '',
    'description' => null,
    'time' => null,         // contoh: '2 menit lalu', '10:30'
    'user' => null,         // nama user
])

@php
$colors = [
    'orange' => 'bg-orange-100 text-orange-600',
    'blue'   => 'bg-blue-100 text-blue-600',
    'green'  => 'bg-green-100 text-green-600',
    'red'    => 'bg-red-100 text-red-600',
    'gray'   => 'bg-stone-100 text-stone-600',
];

$theme = $colors[$color] ?? $colors['gray'];
@endphp

{{--
    Pemakaian:
    <x-admin.activity-item
        icon="plus-circle"
        color="green"
        title="Properti baru ditambahkan"
        description="Rumah Minimalis Modern — Kaliwates"
        user="Budi (Agent)"
        time="2 menit lalu"
    />
--}}

<div class="flex items-start gap-3 py-3 border-b border-stone-100 last:border-0">
    {{-- ICON --}}
    <div class="w-9 h-9 rounded-lg {{ $theme }} flex items-center justify-center shrink-0">
        <i data-lucide="{{ $icon }}" class="w-4 h-4"></i>
    </div>

    {{-- CONTENT --}}
    <div class="flex-1 min-w-0">
        <p class="text-sm font-semibold text-stone-900">
            {{ $title }}
        </p>

        @if ($description)
            <p class="text-xs text-stone-500 mt-0.5 line-clamp-2">
                {{ $description }}
            </p>
        @endif

        <div class="flex items-center gap-2 mt-1 text-xs text-stone-400">
            @if ($user)
                <span class="font-medium text-stone-600">{{ $user }}</span>
                <span>·</span>
            @endif
            @if ($time)
                <span>{{ $time }}</span>
            @endif
        </div>
    </div>
</div>
