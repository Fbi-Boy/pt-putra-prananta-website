<a href="{{ route('page.coming-soon', 'pindah-kpr') }}"
   class="group w-full sm:w-[130px] h-[95px] sm:h-[105px] shrink-0 rounded-xl
          flex flex-col items-center justify-center gap-1.5 sm:gap-2
          transition-transform duration-300 active:scale-95
          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-300">

    <svg viewBox="0 0 64 64" aria-hidden="true"
         class="h-12 w-12 sm:h-14 sm:w-14 drop-shadow-[0_4px_6px_rgba(234,88,12,.25)]
                transition-transform duration-300 group-hover:scale-110 group-hover:-translate-y-0.5">
        <defs>
            <linearGradient id="pin-body" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fdba74"/><stop offset=".45" stop-color="#fb923c"/><stop offset="1" stop-color="#ea580c"/></linearGradient>
            <linearGradient id="pin-gold" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fde68a"/><stop offset="1" stop-color="#f59e0b"/></linearGradient>
            <radialGradient id="pin-floor" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#ea580c" stop-opacity=".35"/><stop offset="1" stop-color="#ea580c" stop-opacity="0"/></radialGradient>
        </defs>

        <ellipse cx="29" cy="60" rx="20" ry="3" fill="url(#pin-floor)"/>

        {{-- Plat --}}
        <rect x="6" y="16.5" width="42" height="38" rx="12" fill="#c2410c"/>
        <rect x="6" y="14" width="42" height="38" rx="12" fill="url(#pin-body)"/>
        <path d="M15 15.2h24" stroke="#fff" stroke-opacity=".55" stroke-width="1.6" stroke-linecap="round"/>

        {{-- Panah tukar (bayangan lalu putih) --}}
        <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6">
            <g stroke="#c2410c" stroke-opacity=".55" transform="translate(0 1.2)">
                <path d="M15 28h24m-6-6 6 6-6 6"/>
                <path d="M39 40H15m6-6-6 6 6 6"/>
            </g>
            <g stroke="#fff">
                <path d="M15 28h24m-6-6 6 6-6 6"/>
                <path d="M39 40H15m6-6-6 6 6 6"/>
            </g>
        </g>

        {{-- Koin persen --}}
        <circle cx="50" cy="16.6" r="9" fill="#b45309"/>
        <circle cx="50" cy="15" r="9" fill="url(#pin-gold)"/>
        <circle cx="50" cy="15" r="6.6" fill="none" stroke="#fff" stroke-opacity=".55" stroke-width=".9"/>
        <circle cx="47.6" cy="12.6" r="1.3" fill="#92400e"/>
        <circle cx="52.4" cy="17.4" r="1.3" fill="#92400e"/>
        <path d="M52.6 12.2 47.4 17.8" stroke="#92400e" stroke-width="1.3" stroke-linecap="round"/>
    </svg>

    <span class="text-[10px] sm:text-[12px] font-semibold text-gray-800 text-center leading-tight transition-colors group-hover:text-orange-600">
        Pindah KPR
    </span>
</a>
