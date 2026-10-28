@props([
    'title' => 'Properti Terpopuler',
    'properties' => [],
    'viewAllUrl' => '#',
    'background' => 'bg-white',
])

<section class="w-full py-10 {{ $background }}">
    <div class="max-w-[1200px] mx-auto px-5 lg:px-0">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-stone-900">{{ $title }}</h2>

            {{-- Tombol Lihat Semua (Desktop) --}}
            <a href="{{ $viewAllUrl }}"
               class="hidden sm:flex items-center justify-center px-6 h-10 rounded-full bg-stone-900 text-white text-sm font-semibold hover:bg-orange-500 transition shadow-md">
                Lihat Semua
            </a>
        </div>

        {{-- Grid: 1 kolom di HP, 2 di Tablet, 3 di Desktop --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($properties as $property)
                {{-- Logika: Jika index >= 2 (card ke-3), sembunyikan di HP, munculkan di tablet/desktop --}}
                <div class="{{ $loop->index >= 2 ? 'hidden sm:block' : '' }}">
                    <x-property.card :property="$property" />
                </div>
            @empty
                <div class="col-span-full py-16 text-center">
                    <p class="text-stone-500">Belum ada properti.</p>
                </div>
            @endforelse
        </div>

        {{-- Tombol Lihat Semua (Mobile) --}}
        <div class="mt-6 sm:hidden">
            <a href="{{ $viewAllUrl }}"
               class="flex items-center justify-center w-full h-11 rounded-xl bg-stone-900 text-white text-sm font-semibold hover:bg-orange-600 transition shadow-md">
                Lihat Semua
            </a>
        </div>

    </div>
</section>
