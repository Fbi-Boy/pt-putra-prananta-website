<a href="{{ route('page.coming-soon', 'konsultasi') }}"
   class="group w-full sm:w-[130px] h-[95px] sm:h-[105px] shrink-0 rounded-xl
          flex flex-col items-center justify-center gap-1.5 sm:gap-2
          transition-transform duration-300 active:scale-95
          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-300">

    <svg viewBox="0 0 64 64" aria-hidden="true"
         class="h-12 w-12 sm:h-14 sm:w-14 drop-shadow-[0_4px_6px_rgba(234,88,12,.25)]
                transition-transform duration-300 group-hover:scale-110 group-hover:-translate-y-0.5">
        <defs>
            <linearGradient id="kon-body" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fdba74"/><stop offset=".45" stop-color="#fb923c"/><stop offset="1" stop-color="#ea580c"/></linearGradient>
            <linearGradient id="kon-gold" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fde68a"/><stop offset="1" stop-color="#f59e0b"/></linearGradient>
            <radialGradient id="kon-floor" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#ea580c" stop-opacity=".35"/><stop offset="1" stop-color="#ea580c" stop-opacity="0"/></radialGradient>
        </defs>

        <ellipse cx="28" cy="60.5" rx="18" ry="2.8" fill="url(#kon-floor)"/>

        {{-- Bubble chat --}}
        <path d="M16 44 12 56l14-12z" fill="#c2410c" transform="translate(0 2.5)"/>
        <rect x="6" y="14.5" width="42" height="32" rx="12" fill="#c2410c"/>
        <path d="M16 44 12 56l14-12z" fill="url(#kon-body)"/>
        <rect x="6" y="12" width="42" height="32" rx="12" fill="url(#kon-body)"/>
        <path d="M15 13.2h24" stroke="#fff" stroke-opacity=".55" stroke-width="1.6" stroke-linecap="round"/>
        <g fill="#fff">
            <circle cx="18" cy="28" r="3"/>
            <circle cx="27" cy="28" r="3"/>
            <circle cx="36" cy="28" r="3"/>
        </g>

        {{-- Koin tanda tanya --}}
        <circle cx="50" cy="16.6" r="9" fill="#b45309"/>
        <circle cx="50" cy="15" r="9" fill="url(#kon-gold)"/>
        <circle cx="50" cy="15" r="6.6" fill="none" stroke="#fff" stroke-opacity=".55" stroke-width=".9"/>
        <path d="M47.2 13a2.9 2.9 0 1 1 4.2 2.6c-.9.5-1.4 1-1.4 2" stroke="#92400e" stroke-width="1.6" stroke-linecap="round" fill="none"/>
        <circle cx="50" cy="20.3" r=".95" fill="#92400e"/>
    </svg>

    <span class="text-[10px] sm:text-[12px] font-semibold text-gray-800 text-center leading-tight transition-colors group-hover:text-orange-600">
        Konsultasi
    </span>
</a>
