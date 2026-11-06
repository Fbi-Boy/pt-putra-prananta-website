<a href="{{ route('page.coming-soon', 'daftar-agent') }}"
   class="group w-full sm:w-[130px] h-[95px] sm:h-[105px] shrink-0 rounded-xl
          flex flex-col items-center justify-center gap-1.5 sm:gap-2
          transition-transform duration-300 active:scale-95
          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-300">

    <svg viewBox="0 0 64 64" aria-hidden="true"
         class="h-12 w-12 sm:h-14 sm:w-14 drop-shadow-[0_4px_6px_rgba(234,88,12,.25)]
                transition-transform duration-300 group-hover:scale-110 group-hover:-translate-y-0.5">
        <defs>
            <linearGradient id="dft-body" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fdba74"/><stop offset=".45" stop-color="#fb923c"/><stop offset="1" stop-color="#ea580c"/></linearGradient>
            <linearGradient id="dft-back" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#ffedd5"/><stop offset="1" stop-color="#fdba74"/></linearGradient>
            <linearGradient id="dft-light" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fffbeb"/><stop offset="1" stop-color="#fed7aa"/></linearGradient>
            <radialGradient id="dft-floor" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#ea580c" stop-opacity=".35"/><stop offset="1" stop-color="#ea580c" stop-opacity="0"/></radialGradient>
        </defs>

        <ellipse cx="32" cy="59" rx="24" ry="3.2" fill="url(#dft-floor)"/>

        {{-- Orang belakang --}}
        <path d="M30 50c0-8.5 5.5-13.5 13-13.5S56 41.5 56 50z" fill="#ea580c" transform="translate(0 2.5)"/>
        <path d="M30 50c0-8.5 5.5-13.5 13-13.5S56 41.5 56 50z" fill="url(#dft-back)"/>
        <circle cx="43" cy="26.5" r="7.5" fill="#fdba74"/>
        <circle cx="43" cy="24" r="7.5" fill="url(#dft-light)"/>

        {{-- Orang depan --}}
        <path d="M5 55c0-11.5 7.5-18 18.5-18S42 43.5 42 55z" fill="#c2410c" transform="translate(0 2.5)"/>
        <path d="M5 55c0-11.5 7.5-18 18.5-18S42 43.5 42 55z" fill="url(#dft-body)"/>
        <path d="M11 46c3-3 7-4.5 12.5-4.5" stroke="#fff" stroke-opacity=".5" stroke-width="1.6" stroke-linecap="round" fill="none"/>
        <circle cx="23.5" cy="28.5" r="9.5" fill="#fdba74"/>
        <circle cx="23.5" cy="26" r="9.5" fill="url(#dft-light)"/>
        <path d="M18 21.5a7.5 7.5 0 0 1 5.5-3" stroke="#fff" stroke-opacity=".9" stroke-width="1.5" stroke-linecap="round" fill="none"/>
    </svg>

    <span class="text-[10px] sm:text-[12px] font-semibold text-gray-800 text-center leading-tight transition-colors group-hover:text-orange-600">
        Daftar Agent
    </span>
</a>
