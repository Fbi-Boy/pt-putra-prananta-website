@props([
    'title' => 'Properti Terpopuler',
    'properties' => [],
    'viewAllUrl' => '#',
])

<section class="w-full py-10">

    {{-- HEADER --}}
    <div class="max-w-[1200px] mx-auto px-5 lg:px-0">

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                {{ $title }}
            </h2>

            <a
                href="{{ $viewAllUrl }}"
                class="hidden sm:inline-flex items-center justify-center
                       px-6 py-2.5 rounded-full
                       bg-gray-950 text-white
                       text-sm font-semibold
                       hover:bg-orange-600
                       transition"
            >
                Lihat Semua
            </a>

        </div>


        {{-- PROPERTY GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            @forelse ($properties as $property)

                <x-property.card
                    :property="$property"
                />

            @empty

                <div class="col-span-full py-16 text-center">

                    <p class="text-gray-500">
                        Belum ada properti.
                    </p>

                </div>

            @endforelse

        </div>


        {{-- MOBILE VIEW ALL --}}
        <div class="mt-5 sm:hidden">

            <a
                href="{{ $viewAllUrl }}"
                class="flex items-center justify-center
                       w-full h-11 rounded-xl
                       bg-gray-950 text-white
                       text-sm font-semibold
                       hover:bg-orange-600 transition"
            >
                Lihat Semua
            </a>

        </div>

    </div>

</section>