<button @click="openMore = true" type="button"
   class="group w-full sm:w-[130px] h-[95px] sm:h-[105px] shrink-0 rounded-xl bg-transparent
          flex flex-col items-center justify-center gap-1.5 sm:gap-2
          transition-transform duration-300 active:scale-95
          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-300">

    <svg viewBox="0 0 64 64" aria-hidden="true"
         class="h-12 w-12 sm:h-14 sm:w-14 drop-shadow-[0_4px_6px_rgba(234,88,12,.25)]
                transition-transform duration-300 group-hover:scale-110 group-hover:-translate-y-0.5">
        <defs>
            <linearGradient id="lain-body" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fdba74"/><stop offset=".45" stop-color="#fb923c"/><stop offset="1" stop-color="#ea580c"/></linearGradient>
            <linearGradient id="lain-gold" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fde68a"/><stop offset="1" stop-color="#f59e0b"/></linearGradient>
            <radialGradient id="lain-floor" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#ea580c" stop-opacity=".35"/><stop offset="1" stop-color="#ea580c" stop-opacity="0"/></radialGradient>
        </defs>

        <ellipse cx="32" cy="60.5" rx="22" ry="2.8" fill="url(#lain-floor)"/>

        {{-- Alas tebal (3D) --}}
        <g transform="translate(0 3)">
            <rect x="8"  y="8"  width="21" height="21" rx="6.5" fill="#c2410c"/>
            <rect x="35" y="8"  width="21" height="21" rx="6.5" fill="#c2410c"/>
            <rect x="8"  y="35" width="21" height="21" rx="6.5" fill="#c2410c"/>
            <rect x="35" y="35" width="21" height="21" rx="6.5" fill="#b45309"/>
        </g>
        {{-- Permukaan --}}
        <rect x="8"  y="8"  width="21" height="21" rx="6.5" fill="url(#lain-body)"/>
        <rect x="35" y="8"  width="21" height="21" rx="6.5" fill="url(#lain-body)"/>
        <rect x="8"  y="35" width="21" height="21" rx="6.5" fill="url(#lain-body)"/>
        <rect x="35" y="35" width="21" height="21" rx="6.5" fill="url(#lain-gold)"/>
        {{-- Kilau --}}
        <g stroke="#fff" stroke-opacity=".6" stroke-width="1.6" stroke-linecap="round">
            <path d="M13 10.2h11"/><path d="M40 10.2h11"/><path d="M13 37.2h11"/><path d="M40 37.2h11"/>
        </g>
    </svg>

    <span class="text-[10px] sm:text-[12px] font-semibold text-gray-800 text-center leading-tight transition-colors group-hover:text-orange-600">
        Lainnya
    </span>
</button>
