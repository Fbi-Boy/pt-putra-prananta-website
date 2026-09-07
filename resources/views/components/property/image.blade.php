@props([
    'property',
])

<div class="relative aspect-[4/3] overflow-hidden">

    <img
        src="{{ $property['image'] }}"
        alt="{{ $property['title'] }}"
        class="w-full h-full object-cover
               group-hover:scale-105
               transition duration-500"
    >

    @if (!empty($property['status']))
        <x-property.status
            :status="$property['status']"
        />
    @endif

    <button
        type="button"
        class="absolute top-3 right-3
               w-9 h-9
               rounded-full
               bg-white/90
               flex items-center justify-center
               text-gray-700
               hover:text-orange-500
               transition"
    >
        <i data-lucide="heart" class="w-4 h-4"></i>
    </button>

</div>