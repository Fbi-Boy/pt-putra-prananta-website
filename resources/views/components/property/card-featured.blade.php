@props(['property'])

@php
    $imgUrl = $property->primaryImage?->medium_url ?? asset('images/property/rumah1.jpg');
    $agent = $property->agent;
    $waUrl = $agent?->whatsapp ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $agent->whatsapp) : '#';
    $location = $property->area?->name ? $property->area->name . ', Jember' : ($property->address ?? 'Jember');

    $listingType = $property->listing_type === 'sale' ? 'Beli' : 'Sewa';
    $typeName = $property->type?->name ?? 'Properti';
@endphp

<article class="group bg-[#09251C] rounded-[24px] p-4 border border-white/10 shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col">

    {{-- IMAGE (Atas - Full Width, Kotak / Persegi) --}}
    <div class="relative w-full aspect-square shrink-0 rounded-[16px] overflow-hidden bg-stone-800 mb-5">
        <img src="{{ $imgUrl }}"
             alt="{{ $typeName }}"
             class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-90 group-hover:opacity-100"
             loading="lazy">

        {{-- Badge Status --}}
        @if($property->badge)
            @php
                $badgeClass = match($property->badge['color']) {
                    'red' => 'bg-red-500', 'green' => 'bg-emerald-500', 'orange' => 'bg-orange-500', default => 'bg-stone-900',
                };
            @endphp
            <span class="absolute top-4 left-4 px-3 py-1.5 rounded-md text-[11px] font-bold tracking-wider uppercase text-white {{ $badgeClass }} shadow-sm">
                {{ $property->badge['label'] }}
            </span>
        @endif

        <button type="button" class="absolute top-4 right-4 w-10 h-10 rounded-full bg-black/40 backdrop-blur-md text-white flex items-center justify-center hover:bg-black/60 transition">
            <i data-lucide="heart" class="w-5 h-5"></i>
        </button>
    </div>

    {{-- CONTENT (Bawah) --}}
    <div class="flex flex-col flex-1 px-1">

        {{-- TITLE & HARGA --}}
        <div class="flex items-start justify-between gap-4 mb-2">
            <div class="min-w-0 flex items-center gap-2 mt-1">
                <h3 class="text-2xl font-bold text-white">
                    {{ $typeName }}
                </h3>
                <span class="text-stone-500 font-bold text-xl">·</span>
                <span class="text-2xl font-semibold text-orange-400">{{ $listingType }}</span>
            </div>
            <div class="shrink-0 mt-1.5">
                <p class="text-2xl font-bold text-white tracking-tight">{{ $property->price_formatted }}</p>
            </div>
        </div>

        {{-- LOCATION --}}
        <div class="flex items-center gap-2 text-sm text-stone-300 mb-4 mt-2">
            <i data-lucide="map-pin" class="w-4 h-4 shrink-0 text-orange-400"></i>
            <span class="truncate">{{ $location }}</span>
        </div>

        {{-- SPECIFICATIONS --}}
        <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm font-medium text-stone-300 mb-5">
            @if($property->land_area)
                <div class="flex items-center gap-2">
                    <i data-lucide="square" class="w-4 h-4 text-stone-400"></i> LT {{ $property->land_area }}m²
                </div>
            @endif
            @if($property->building_area)
                <div class="flex items-center gap-2">
                    <i data-lucide="home" class="w-4 h-4 text-stone-400"></i> LB {{ $property->building_area }}m²
                </div>
            @endif
            @if($property->bedrooms > 0)
                <div class="flex items-center gap-2">
                    <i data-lucide="bed-double" class="w-4 h-4 text-stone-400"></i> {{ $property->bedrooms }} Kamar
                </div>
            @endif
            @if($property->bathrooms > 0)
                <div class="flex items-center gap-2">
                    <i data-lucide="bath" class="w-4 h-4 text-stone-400"></i> {{ $property->bathrooms }} Mandi
                </div>
            @endif
        </div>

        {{-- FOOTER: Grid 20% : 20% : 60% --}}
        <div class="mt-auto pt-4 border-t border-white/10">
            <div class="grid grid-cols-5 gap-3">

                {{-- Button WA (20%) --}}
                <a href="{{ $waUrl }}" target="_blank" rel="noopener"
                   class="col-span-1 h-12 rounded-xl border border-white/30 text-white hover:bg-white hover:text-[#09251C] flex items-center justify-center transition-colors duration-300"
                   title="WhatsApp">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                </a>

                {{-- Button Share (20%) --}}
                <button type="button"
                        class="col-span-1 h-12 rounded-xl border border-white/30 text-white hover:bg-white hover:text-[#09251C] flex items-center justify-center transition-colors duration-300"
                        title="Bagikan">
                    <i data-lucide="share" class="w-5 h-5"></i>
                </button>

                {{-- Button Detail (60%) --}}
                <a href="#" class="col-span-3 h-12 rounded-xl bg-white hover:bg-stone-200 text-[#09251C] text-[15px] font-bold tracking-wider flex items-center justify-center gap-2 transition-colors duration-300">
                    DETAIL
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>

            </div>
        </div>
    </div>
</article>
