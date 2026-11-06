<a href="{{ route('kpr.index') }}"
   class="group w-full sm:w-[130px] h-[95px] sm:h-[105px] shrink-0 rounded-xl
          flex flex-col items-center justify-center gap-1.5 sm:gap-2
          transition-transform duration-300 active:scale-95
          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-300">

    <svg viewBox="0 0 64 64" aria-hidden="true"
         class="h-12 w-12 sm:h-14 sm:w-14 drop-shadow-[0_4px_6px_rgba(234,88,12,.25)]
                transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3">
        <defs>
            <linearGradient id="kpr-body" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fdba74"/><stop offset=".45" stop-color="#fb923c"/><stop offset="1" stop-color="#ea580c"/></linearGradient>
            <linearGradient id="kpr-screen" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fffbeb"/><stop offset="1" stop-color="#ffedd5"/></linearGradient>
            <linearGradient id="kpr-eq" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ea580c"/><stop offset="1" stop-color="#9a3412"/></linearGradient>
            <linearGradient id="kpr-coin" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fde68a"/><stop offset="1" stop-color="#f59e0b"/></linearGradient>
            <radialGradient id="kpr-floor" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#ea580c" stop-opacity=".35"/><stop offset="1" stop-color="#ea580c" stop-opacity="0"/></radialGradient>
        </defs>

        <ellipse cx="30" cy="59" rx="18" ry="3.2" fill="url(#kpr-floor)"/>

        <g transform="rotate(-6 32 34)">
            <rect x="14" y="12.5" width="36" height="46" rx="8" fill="#c2410c"/>
            <rect x="14" y="8" width="36" height="46" rx="8" fill="url(#kpr-body)"/>
            <path d="M20 9.2h24" stroke="#fff" stroke-opacity=".55" stroke-width="1.6" stroke-linecap="round"/>

            <rect x="19" y="13" width="26" height="12" rx="3.5" fill="url(#kpr-screen)"/>
            <rect x="19" y="13" width="26" height="12" rx="3.5" fill="none" stroke="#c2410c" stroke-opacity=".35"/>
            <rect x="31" y="17.5" width="3" height="5" rx="1" fill="#f97316"/>
            <rect x="36" y="17.5" width="3" height="5" rx="1" fill="#f97316"/>
            <rect x="26" y="20.5" width="3" height="2" rx="1" fill="#fdba74"/>

            <g fill="#fed7aa">
                <rect x="19" y="30.6" width="7" height="5.5" rx="2"/>
                <rect x="28.5" y="30.6" width="7" height="5.5" rx="2"/>
                <rect x="38" y="30.6" width="7" height="5.5" rx="2"/>
                <rect x="19" y="37.6" width="7" height="5.5" rx="2"/>
                <rect x="28.5" y="37.6" width="7" height="5.5" rx="2"/>
                <rect x="19" y="44.6" width="7" height="5.5" rx="2"/>
                <rect x="28.5" y="44.6" width="7" height="5.5" rx="2"/>
            </g>
            <g fill="#fff">
                <rect x="19" y="29.5" width="7" height="5.5" rx="2"/>
                <rect x="28.5" y="29.5" width="7" height="5.5" rx="2"/>
                <rect x="38" y="29.5" width="7" height="5.5" rx="2"/>
                <rect x="19" y="36.5" width="7" height="5.5" rx="2"/>
                <rect x="28.5" y="36.5" width="7" height="5.5" rx="2"/>
                <rect x="19" y="43.5" width="7" height="5.5" rx="2"/>
                <rect x="28.5" y="43.5" width="7" height="5.5" rx="2"/>
            </g>

            <rect x="38" y="37.6" width="7" height="12.5" rx="2" fill="#7c2d12"/>
            <rect x="38" y="36.5" width="7" height="12.5" rx="2" fill="url(#kpr-eq)"/>
            <path d="M40 41.5h3M40 44h3" stroke="#fff" stroke-width="1.4" stroke-linecap="round"/>
        </g>

        <circle cx="50" cy="16.6" r="9" fill="#b45309"/>
        <circle cx="50" cy="15" r="9" fill="url(#kpr-coin)"/>
        <circle cx="50" cy="15" r="6.6" fill="none" stroke="#fff" stroke-opacity=".55" stroke-width=".9"/>
        <circle cx="47.6" cy="12.6" r="1.3" fill="#92400e"/>
        <circle cx="52.4" cy="17.4" r="1.3" fill="#92400e"/>
        <path d="M52.6 12.2 47.4 17.8" stroke="#92400e" stroke-width="1.3" stroke-linecap="round"/>
    </svg>

    <span class="text-[10px] sm:text-[12px] font-semibold text-gray-800 text-center leading-tight transition-colors group-hover:text-orange-600">
        Kalkulator<br>KPR
    </span>
</a>
