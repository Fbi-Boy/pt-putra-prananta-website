@props(['property'])

@php
    $isSale   = $property->listing_type === 'sale';
    $typeName = $property->type?->name ?? 'Properti';
    $areaName = $property->area?->name;
    $location = $areaName ? $areaName . ', Jember' : ($property->address ?? 'Jember');
    $url      = route('properties.show', $property->slug);
    $title    = $property->title ?? ($typeName . ($isSale ? ' dijual' : ' disewa') . ($areaName ? ' di ' . $areaName : ''));

    $imgUrl   = $property->primaryImage?->medium_url ?? asset('images/property/rumah1.jpg');
    $fotoCount = $property->images_count ?? ($property->relationLoaded('images') ? $property->images->count() : 0);

    $agent    = $property->agent;
    $agentImg = $agent?->photo ? asset($agent->photo) : asset('images/agents/agent.png');
    $updated  = $property->updated_at?->locale('id')->diffForHumans();

    // WhatsApp: 08xx -> 628xx, pesan sudah berisi judul & tautan properti
    $n = preg_replace('/\D/', '', $agent?->whatsapp ?? '');
    if ($n !== '' && str_starts_with($n, '0')) $n = '62' . substr($n, 1);
    $waUrl = $n ? 'https://wa.me/' . $n . '?text=' . rawurlencode("Halo, saya tertarik dengan \"{$title}\" ({$url}). Apakah masih tersedia?") : null;

    $specs = collect([
        [$property->bedrooms,      'K. Tidur',    ''],
        [$property->bathrooms,     'K. Mandi',    ''],
        [$property->land_area,     'L. Tanah',    ' m²'],
        [$property->building_area, 'L. Bangunan', ' m²'],
    ])->filter(fn ($s) => (float) $s[0] > 0);

    $badgeClass = $property->badge ? match ($property->badge['color']) {
        'red' => 'bg-red-500', 'green' => 'bg-emerald-500', 'orange' => 'bg-orange-500', default => 'bg-stone-900',
    } : null;

    $ring = 'focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60';
    $iconBtn = 'w-9 h-9 rounded-full bg-white/90 backdrop-blur text-stone-700 flex items-center justify-center shadow-sm hover:bg-white transition ' . $ring;
@endphp

<article class="group relative flex h-full flex-col overflow-hidden rounded-2xl bg-white ring-1 ring-stone-200 transition duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-stone-900/10 hover:ring-orange-300">

    {{-- FOTO 3:2 --}}
    <div class="relative aspect-[3/2] overflow-hidden bg-stone-200">
        <img src="{{ $imgUrl }}" alt="{{ $title }}" loading="lazy" decoding="async"
             class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105">
        <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/55 to-transparent" aria-hidden="true"></div>

        @if($badgeClass)
            <span class="absolute left-3 top-3 rounded-md px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide text-white shadow-sm {{ $badgeClass }}">{{ $property->badge['label'] }}</span>
        @endif

        {{-- Favorit & bagikan --}}
        <div class="absolute right-3 top-3 z-10 flex gap-2">
            <button type="button" data-share="{{ $url }}" data-title="{{ $title }}" title="Bagikan" aria-label="Bagikan properti" class="{{ $iconBtn }}">
                <i data-lucide="share-2" class="w-4 h-4"></i>
            </button>
            <button type="button" data-fav="{{ $property->id }}" aria-pressed="false" title="Simpan ke favorit" aria-label="Simpan ke favorit"
                    class="{{ $iconBtn }} aria-pressed:text-red-500 [&[aria-pressed=true]_svg]:fill-red-500">
                <i data-lucide="heart" class="w-4 h-4"></i>
            </button>
        </div>

        <div class="absolute bottom-3 left-3 flex items-center gap-1.5">
            <span class="rounded-md bg-white/95 px-2.5 py-1 text-[11px] font-bold text-stone-900">{{ $typeName }}</span>
            <span class="rounded-md bg-orange-500 px-2.5 py-1 text-[11px] font-bold text-white">{{ $isSale ? 'Dijual' : 'Disewa' }}</span>
        </div>
        @if($fotoCount > 1)
            <span class="absolute bottom-3 right-3 inline-flex items-center gap-1 rounded-md bg-black/60 px-2 py-1 text-[11px] font-semibold text-white backdrop-blur">
                <i data-lucide="camera" class="w-3 h-3"></i>{{ $fotoCount }}
            </span>
        @endif
    </div>

    <div class="flex flex-1 flex-col p-4">
        <p class="text-xl sm:text-[1.4rem] font-bold leading-none tracking-tight text-orange-600">
            {{ $property->price_formatted }}
            @unless($isSale)<span class="text-xs font-medium tracking-normal text-stone-500">/{{ $property->rent_period ?? 'tahun' }}</span>@endunless
        </p>

        <h3 class="mt-2 min-h-[2.6rem] text-[15px] font-semibold leading-snug text-stone-900 line-clamp-2">
            <a href="{{ $url }}" class="after:absolute after:inset-0 after:z-0 {{ $ring }} rounded">{{ $title }}</a>
        </h3>

        <p class="mt-1.5 flex items-center gap-1.5 text-[13px] text-stone-500">
            <i data-lucide="map-pin" class="w-3.5 h-3.5 shrink-0 text-orange-500"></i><span class="truncate">{{ $location }}</span>
        </p>

        @if($specs->isNotEmpty())
            <dl class="mt-4 flex divide-x divide-stone-200 rounded-xl bg-stone-50 py-2.5 ring-1 ring-stone-100">
                @foreach($specs as [$val, $label, $unit])
                    <div class="min-w-0 flex-1 px-2 text-center">
                        <dd class="text-sm font-bold text-stone-900">{{ $val }}{{ $unit }}</dd>
                        <dt class="text-[10px] text-stone-500 truncate">{{ $label }}</dt>
                    </div>
                @endforeach
            </dl>
        @endif

        {{-- AGEN + KONTAK --}}
        <div class="relative z-10 mt-auto flex items-center gap-3 border-t border-stone-100 pt-4 mt-4">
            <img src="{{ $agentImg }}" alt="" loading="lazy" class="h-9 w-9 shrink-0 rounded-xl bg-stone-100 object-cover ring-1 ring-stone-200">
            <div class="min-w-0 flex-1 leading-tight">
                <p class="truncate text-xs font-semibold text-stone-900">{{ $agent?->name ?? config('company.name') }}</p>
                <p class="truncate text-[11px] text-stone-500">{{ $updated ? 'Diperbarui ' . $updated : 'Agen properti' }}</p>
            </div>
            @if($waUrl)
                <a href="{{ $waUrl }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp"
                   class="inline-flex h-10 shrink-0 items-center gap-1.5 rounded-xl bg-emerald-500 px-3.5 text-xs font-semibold text-white transition hover:bg-emerald-600 {{ $ring }}">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    Chat
                </a>
            @endif
        </div>
    </div>
</article>

@include('components.layout.partials.property-action')
