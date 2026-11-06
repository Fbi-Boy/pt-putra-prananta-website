<button @click="openFind = true" type="button"
   class="group w-full sm:w-[130px] h-[95px] sm:h-[105px] shrink-0 rounded-xl bg-transparent
          flex flex-col items-center justify-center gap-1.5 sm:gap-2
          transition-transform duration-300 active:scale-95
          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-300">

    <svg viewBox="0 0 64 64" aria-hidden="true"
         class="h-12 w-12 sm:h-14 sm:w-14 drop-shadow-[0_4px_6px_rgba(234,88,12,.25)]
                transition-transform duration-300 group-hover:scale-110 group-hover:-translate-y-0.5">
        <defs>
            <linearGradient id="car-body" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fdba74"/><stop offset=".45" stop-color="#fb923c"/><stop offset="1" stop-color="#ea580c"/></linearGradient>
            <linearGradient id="car-light" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fffbeb"/><stop offset="1" stop-color="#fed7aa"/></linearGradient>
            <linearGradient id="car-gold" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fde68a"/><stop offset="1" stop-color="#f59e0b"/></linearGradient>
            <radialGradient id="car-floor" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#ea580c" stop-opacity=".35"/><stop offset="1" stop-color="#ea580c" stop-opacity="0"/></radialGradient>
        </defs>

        <ellipse cx="30" cy="60" rx="20" ry="3" fill="url(#car-floor)"/>

        {{-- Rumah: badan --}}
        <rect x="10" y="31.5" width="30" height="23" rx="3.5" fill="#fdba74"/>
        <rect x="10" y="29" width="30" height="23" rx="3.5" fill="url(#car-light)"/>
        {{-- Atap --}}
        <path d="M5 31 25 13l20 18z" fill="#c2410c" stroke="#c2410c" stroke-width="3" stroke-linejoin="round" transform="translate(0 2.5)"/>
        <path d="M5 31 25 13l20 18z" fill="url(#car-body)" stroke="url(#car-body)" stroke-width="3" stroke-linejoin="round"/>
        <path d="M14 24 25 15" stroke="#fff" stroke-opacity=".55" stroke-width="1.6" stroke-linecap="round"/>
        {{-- Pintu --}}
        <rect x="20" y="39.5" width="8" height="12.5" rx="2" fill="#c2410c"/>
        <rect x="20" y="38.5" width="8" height="12.5" rx="2" fill="url(#car-body)"/>

        {{-- Kaca pembesar --}}
        <path d="M51 49.5 58 56.5" stroke="#7c2d12" stroke-width="6.5" stroke-linecap="round"/>
        <path d="M51 49.5 58 56.5" stroke="#c2410c" stroke-width="4" stroke-linecap="round"/>
        <circle cx="45" cy="45.5" r="10" fill="none" stroke="#b45309" stroke-width="4.5"/>
        <circle cx="45" cy="43" r="10" fill="#fff" fill-opacity=".6" stroke="url(#car-gold)" stroke-width="4.5"/>
        <path d="M39 39.5a7 7 0 0 1 5-3" stroke="#fff" stroke-width="1.8" stroke-linecap="round" fill="none"/>
    </svg>

    <span class="text-[10px] sm:text-[12px] font-semibold text-gray-800 text-center leading-tight transition-colors group-hover:text-orange-600">
        Kami Carikan
    </span>
</button>
