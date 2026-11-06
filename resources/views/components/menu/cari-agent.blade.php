<a href="{{ route('agents.index') }}"
   class="group w-full sm:w-[130px] h-[95px] sm:h-[105px] shrink-0 rounded-xl
          flex flex-col items-center justify-center gap-1.5 sm:gap-2
          transition-transform duration-300 active:scale-95
          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-300">

    <svg viewBox="0 0 64 64" aria-hidden="true"
         class="h-12 w-12 sm:h-14 sm:w-14 drop-shadow-[0_4px_6px_rgba(234,88,12,.25)]
                transition-transform duration-300 group-hover:scale-110 group-hover:-translate-y-0.5">
        <defs>
            <linearGradient id="agn-body" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fdba74"/><stop offset=".45" stop-color="#fb923c"/><stop offset="1" stop-color="#ea580c"/></linearGradient>
            <linearGradient id="agn-light" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fffbeb"/><stop offset="1" stop-color="#fed7aa"/></linearGradient>
            <linearGradient id="agn-gold" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fde68a"/><stop offset="1" stop-color="#f59e0b"/></linearGradient>
            <radialGradient id="agn-floor" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#ea580c" stop-opacity=".35"/><stop offset="1" stop-color="#ea580c" stop-opacity="0"/></radialGradient>
        </defs>

        <ellipse cx="30" cy="59" rx="20" ry="3.2" fill="url(#agn-floor)"/>

        {{-- Bahu --}}
        <path d="M6 54c0-11 8-17 19-17s19 6 19 17z" fill="#c2410c" transform="translate(0 2.5)"/>
        <path d="M6 54c0-11 8-17 19-17s19 6 19 17z" fill="url(#agn-body)"/>
        <path d="M13 45c3-3 7-4.5 12-4.5" stroke="#fff" stroke-opacity=".5" stroke-width="1.6" stroke-linecap="round" fill="none"/>

        {{-- Kepala --}}
        <circle cx="25" cy="26.5" r="10" fill="#fdba74"/>
        <circle cx="25" cy="24" r="10" fill="url(#agn-light)"/>
        <path d="M19 19.5a8 8 0 0 1 6-3" stroke="#fff" stroke-opacity=".9" stroke-width="1.5" stroke-linecap="round" fill="none"/>

        {{-- Kaca pembesar --}}
        <path d="M50.5 47.5 58 55" stroke="#7c2d12" stroke-width="6.5" stroke-linecap="round"/>
        <path d="M50.5 47.5 58 55" stroke="#c2410c" stroke-width="4" stroke-linecap="round"/>
        <circle cx="45" cy="43.5" r="10" fill="none" stroke="#b45309" stroke-width="4.5"/>
        <circle cx="45" cy="41" r="10" fill="#fff" fill-opacity=".6" stroke="url(#agn-gold)" stroke-width="4.5"/>
        <path d="M39 37.5a7 7 0 0 1 5-3" stroke="#fff" stroke-width="1.8" stroke-linecap="round" fill="none"/>
    </svg>

    <span class="text-[10px] sm:text-[12px] font-semibold text-gray-800 text-center leading-tight transition-colors group-hover:text-orange-600">
        Cari Agen
    </span>
</a>
