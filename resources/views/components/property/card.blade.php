@props(['property'])

@php
    $imgUrl = $property->primaryImage?->medium_url ?? asset('images/property/rumah1.jpg');
    $agent = $property->agent;
    $waUrl = $agent?->whatsapp ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $agent->whatsapp) : '#';
    $location = $property->area?->name ? $property->area->name . ', Jember' : ($property->address ?? 'Jember');

    $listingType = $property->listing_type === 'sale' ? 'Beli' : 'Sewa';
    $typeName = $property->type?->name ?? 'Properti';
@endphp

<article class="group bg-stone-50 rounded-[24px] p-3 border border-stone-200 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-xl hover:border-orange-300 transition-all duration-300 flex flex-col h-full">

    {{-- IMAGE (Diganti menjadi kotak / persegi) --}}
    <div class="relative aspect-square overflow-hidden rounded-[16px] bg-stone-100 shrink-0">
        <img src="{{ $imgUrl }}"
             alt="{{ $typeName }}"
             class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
             loading="lazy">

        {{-- Tombol Hati --}}
        <button type="button" aria-label="Simpan"
                class="absolute top-3 right-3 w-9 h-9 rounded-full bg-black/40 backdrop-blur-md text-white flex items-center justify-center hover:bg-black/60 transition">
            <i data-lucide="heart" class="w-4 h-4"></i>
        </button>
    </div>

    {{-- CONTENT --}}
    <div class="pt-4 px-1 flex flex-col flex-1">

        {{-- TITLE & HARGA --}}
        <div class="flex items-start justify-between gap-3 mb-1.5">
            <div class="min-w-0 flex items-center gap-1.5 mt-0.5">
                <h3 class="text-[15px] font-bold text-stone-900 truncate">
                    {{ $typeName }}
                </h3>
                <span class="text-stone-300 font-bold">·</span>
                <span class="text-[15px] font-semibold text-orange-600">{{ $listingType }}</span>
            </div>
            <div class="shrink-0 mt-0.5">
                <p class="text-base font-bold text-stone-900 tracking-tight">{{ $property->price_formatted }}</p>
            </div>
        </div>

        {{-- LOCATION --}}
        <div class="flex items-center gap-1.5 text-[13px] text-stone-500 mb-3 mt-1">
            <i data-lucide="map-pin" class="w-3.5 h-3.5 shrink-0"></i>
            <span class="truncate">{{ $location }}</span>
        </div>

        {{-- SPECIFICATIONS --}}
        <div class="flex flex-wrap items-center gap-x-3 gap-y-1.5 text-[12px] font-medium text-stone-600 mb-4">
            @if($property->land_area)
                <div class="flex items-center gap-1 text-stone-500">
                    <i data-lucide="square" class="w-3.5 h-3.5"></i> LT {{ $property->land_area }}m²
                </div>
            @endif
            @if($property->building_area)
                <div class="flex items-center gap-1 text-stone-500">
                    <i data-lucide="home" class="w-3.5 h-3.5"></i> LB {{ $property->building_area }}m²
                </div>
            @endif
            @if($property->bedrooms > 0)
                <div class="flex items-center gap-1 text-stone-500">
                    <i data-lucide="bed-double" class="w-3.5 h-3.5"></i> {{ $property->bedrooms }} KT
                </div>
            @endif
            @if($property->bathrooms > 0)
                <div class="flex items-center gap-1 text-stone-500">
                    <i data-lucide="bath" class="w-3.5 h-3.5"></i> {{ $property->bathrooms }} KM
                </div>
            @endif
        </div>

        {{-- FOOTER: Grid 20% : 20% : 60% --}}
        <div class="mt-auto pt-3 border-t border-stone-100">
            <div class="grid grid-cols-5 gap-2">

                {{-- Button WA (20%) --}}
                <a href="{{ $waUrl }}" target="_blank" rel="noopener"
                   class="col-span-1 h-10 rounded-xl border border-stone-900 bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center transition-colors duration-300"
                   title="WhatsApp">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                </a>

                {{-- Button Share (20%) --}}
                <button type="button"
                        class="col-span-1 h-10 rounded-xl border border-stone-900 bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center transition-colors duration-300"
                        title="Bagikan">
                    <i data-lucide="share" class="w-4 h-4"></i>
                </button>

                {{-- Button Detail (60%) --}}
                <a href="#" class="col-span-3 h-10 rounded-xl bg-stone-900 hover:bg-stone-800 text-white text-[13px] font-medium tracking-wider flex items-center justify-center gap-2 transition-colors duration-300">
                    DETAIL
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>

            </div>
        </div>
    </div>
</article>
