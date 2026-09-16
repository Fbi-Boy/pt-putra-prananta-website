@props([
    'property',
])

<article
    class="group overflow-hidden rounded-xl
           border border-gray-200
           bg-white
           shadow-sm
           hover:shadow-lg
           transition duration-300"
>

    {{-- IMAGE --}}
    <x-property.image
        :property="$property"
    />

    {{-- CONTENT --}}
    <div class="p-3">

        {{-- PRICE --}}
        <x-property.price
            :property="$property"
        />

        {{-- TITLE --}}
        <h3
            class="mt-1
                text-[13px]
                font-semibold
                leading-[17px]
                text-gray-900
                whitespace-nowrap
                overflow-hidden
                text-ellipsis
                group-hover:text-orange-600
                transition"
        >
            {{ $property['title'] ?? 'Properti Tanpa Judul' }}
        </h3>

        {{-- LOCATION --}}
        <x-property.location
            :property="$property"
        />

        {{-- SPECIFICATION --}}
        <x-property.specification
            :property="$property"
        />

    </div>

</article>
