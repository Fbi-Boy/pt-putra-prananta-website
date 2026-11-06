<a href="{{ route('page.coming-soon', 'forum-diskusi') }}"
   class="group w-full sm:w-[130px] h-[95px] sm:h-[105px] shrink-0 rounded-xl
          flex flex-col items-center justify-center gap-1.5 sm:gap-2
          transition-transform duration-300 active:scale-95
          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-300">

    <svg viewBox="0 0 64 64" aria-hidden="true"
         class="h-12 w-12 sm:h-14 sm:w-14 drop-shadow-[0_4px_6px_rgba(234,88,12,.25)]
                transition-transform duration-300 group-hover:scale-110 group-hover:-translate-y-0.5">
        <defs>
            <linearGradient id="frm-body" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fdba74"/><stop offset=".45" stop-color="#fb923c"/><stop offset="1" stop-color="#ea580c"/></linearGradient>
            <linearGradient id="frm-light" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fffbeb"/><stop offset="1" stop-color="#fed7aa"/></linearGradient>
            <radialGradient id="frm-floor" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#ea580c" stop-opacity=".3"/><stop offset="1" stop-color="#ea580c" stop-opacity="0"/></radialGradient>
        </defs>

        <ellipse cx="32" cy="60.5" rx="20" ry="2.8" fill="url(#frm-floor)"/>

        {{-- Bubble belakang --}}
        <path d="M47 31 52 40 40 31z" fill="#fdba74" transform="translate(0 2.5)"/>
        <rect x="24" y="10.5" width="34" height="24" rx="9" fill="#fdba74"/>
        <path d="M47 31 52 40 40 31z" fill="url(#frm-light)"/>
        <rect x="24" y="8" width="34" height="24" rx="9" fill="url(#frm-light)"/>
        <rect x="31" y="15" width="20" height="3" rx="1.5" fill="#fb923c"/>
        <rect x="31" y="21" width="13" height="3" rx="1.5" fill="#fdba74"/>

        {{-- Bubble depan --}}
        <path d="M15 49l-3 10 13-10z" fill="#c2410c" transform="translate(0 2.5)"/>
        <rect x="6" y="26.5" width="36" height="26" rx="10" fill="#c2410c"/>
        <path d="M15 49l-3 10 13-10z" fill="url(#frm-body)"/>
        <rect x="6" y="24" width="36" height="26" rx="10" fill="url(#frm-body)"/>
        <path d="M13 25.2h22" stroke="#fff" stroke-opacity=".5" stroke-width="1.6" stroke-linecap="round"/>
        <g fill="#fff">
            <circle cx="15" cy="37" r="2.8"/>
            <circle cx="24" cy="37" r="2.8"/>
            <circle cx="33" cy="37" r="2.8"/>
        </g>
    </svg>

    <span class="text-[10px] sm:text-[12px] font-semibold text-gray-800 text-center leading-tight transition-colors group-hover:text-orange-600">
        Forum Diskusi
    </span>
</a>
