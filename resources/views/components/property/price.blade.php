@props([
    'property',
])

<div class="flex items-center justify-between gap-2">

    <p class="text-lg font-bold text-gray-900">
        {{ $property['price'] ?? 'Harga Hubungi' }}
    </p>

    @if (!empty($property['date']))
        <span class="text-[10px] text-gray-500">
            {{ $property['date'] }}
        </span>
    @endif

</div>