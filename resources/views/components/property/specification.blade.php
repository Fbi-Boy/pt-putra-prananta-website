@props([
    'property',
])

<div
    class="flex items-center gap-4
           mt-3 pt-3
           border-t border-gray-200
           text-xs text-gray-600 "
>

    {{-- LUAS TANAH --}}
    @if (isset($property['land_area']))

        <div class="flex items-center gap-1.5">

            <i data-lucide="maximize-2" class="w-3.5 h-3.5"></i>

            <span>
                {{ $property['land_area'] }} m²
            </span>

        </div>

    @endif


    {{-- KAMAR TIDUR --}}
    @if (isset($property['bedrooms']))

        <div class="flex items-center gap-1.5">

            <i data-lucide="bed-double" class="w-3.5 h-3.5"></i>

            <span>
                {{ $property['bedrooms'] }}
            </span>

        </div>

    @endif


    {{-- KAMAR MANDI --}}
    @if (isset($property['bathrooms']))

        <div class="flex items-center gap-1.5">

            <i data-lucide="bath" class="w-3.5 h-3.5"></i>

            <span>
                {{ $property['bathrooms'] }}
            </span>

        </div>

    @endif


    {{-- LUAS BANGUNAN --}}
    @if (isset($property['building_area']))

        <div class="flex items-center gap-1.5">

            <i data-lucide="house" class="w-3.5 h-3.5"></i>

            <span>
                {{ $property['building_area'] }} m²
            </span>

        </div>

    @endif

</div>
