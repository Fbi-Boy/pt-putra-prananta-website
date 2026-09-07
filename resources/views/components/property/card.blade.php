@props([
    'property',
])

<article
    class="group overflow-hidden rounded-2xl
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
    <div class="p-4">

        {{-- PRICE --}}
        <x-property.price
            :property="$property"
        />


        {{-- TITLE --}}
        <h3
            class="mt-2 text-[15px] font-semibold
                   text-gray-900
                   line-clamp-2
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