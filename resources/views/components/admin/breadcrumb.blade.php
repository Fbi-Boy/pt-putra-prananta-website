@props([
    'items' => [],
])

{{--
    Pemakaian:
    <x-admin.breadcrumb :items="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Properti', 'url' => route('admin.properties.index')],
        ['label' => 'Tambah'],
    ]" />
--}}

<nav class="flex items-center gap-2 text-sm text-stone-500 mb-4">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-orange-500 transition">
        <i data-lucide="home" class="w-4 h-4"></i>
    </a>

    @foreach ($items as $item)
        <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-stone-300"></i>

        @if (!empty($item['url']) && !$loop->last)
            <a href="{{ $item['url'] }}" class="hover:text-orange-500 transition">
                {{ $item['label'] }}
            </a>
        @else
            <span class="text-stone-900 font-medium">{{ $item['label'] }}</span>
        @endif
    @endforeach
</nav>
