@props([
    'property',
])

<div class="flex items-center gap-1.5 mt-3 text-sm text-gray-500">

    <i
        data-lucide="map-pin"
        class="w-3.5 h-3.5 shrink-0"
    ></i>

    <span class="truncate">
        {{ $property['location'] ?? 'Lokasi tidak tersedia' }}
    </span>

</div>
