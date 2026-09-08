@props([
    'property',
])

<div class="flex items-center justify-between gap-3 mt-4 pt-3 border-t border-gray-100">

    {{-- AGENT --}}
    <div class="flex items-center gap-3 min-w-0">

        {{-- FOTO AGENT --}}
        <div class="w-10 h-10 rounded-lg overflow-hidden bg-gray-100 shrink-0">
            <img
                src="{{ $property['agent_image'] ?? asset('images/default-agent.jpg') }}"
                alt="{{ $property['agent_name'] ?? 'Agent' }}"
                class="w-full h-full object-cover"
            >
        </div>

        {{-- NAMA & WILAYAH --}}
        <div class="min-w-0">
            <p class="text-sm font-semibold text-gray-900 truncate">
                {{ $property['agent_name'] ?? 'Agent Putra' }}
            </p>

            <p class="text-[11px] text-gray-500 truncate">
                {{ $property['agent_area'] ?? 'Jember' }}
            </p>
        </div>

    </div>

    {{-- WHATSAPP --}}
    <a
        href="{{ $property['agent_whatsapp'] ?? '#' }}"
        target="_blank"
        rel="noopener noreferrer"
        class="w-10 h-10 rounded-lg
               bg-green-500
               flex items-center justify-center
               text-white shrink-0
               hover:bg-green-600
               transition"
        aria-label="Hubungi agent via WhatsApp"
    >
        {{-- WhatsApp SVG --}}
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="w-5 h-5"
        >
            <path d="M20.52 3.48A11.77 11.77 0 0 0 12.07 0C5.57 0 .28 5.29.28 11.79c0 2.08.54 4.11 1.57 5.9L.19 24l6.46-1.69a11.8 11.8 0 0 0 5.42 1.3h.01c6.5 0 11.79-5.29 11.79-11.79 0-3.15-1.23-6.12-3.35-8.34ZM12.08 21.55h-.01a9.76 9.76 0 0 1-4.98-1.36l-.36-.21-3.83 1 1.02-3.73-.23-.38a9.75 9.75 0 0 1-1.5-5.08c0-5.39 4.39-9.77 9.79-9.77 2.61 0 5.07 1.02 6.91 2.86a9.74 9.74 0 0 1 2.87 6.92c0 5.39-4.39 9.77-9.78 9.77Zm5.36-7.31c-.29-.15-1.71-.84-1.98-.94-.27-.1-.47-.15-.67.15-.2.29-.76.94-.93 1.13-.17.2-.34.22-.63.07-.29-.15-1.21-.45-2.31-1.43-.85-.76-1.43-1.7-1.6-1.99-.17-.29-.02-.45.13-.6.13-.13.29-.34.44-.51.15-.17.2-.29.29-.49.1-.2.05-.37-.02-.52-.07-.15-.67-1.61-.91-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.29-1.04 1.02-1.04 2.49s1.07 2.89 1.22 3.09c.15.2 2.1 3.2 5.09 4.49.71.31 1.27.49 1.7.63.71.23 1.35.2 1.86.12.57-.08 1.71-.7 1.95-1.37.24-.67.24-1.24.17-1.37-.07-.12-.27-.2-.56-.34Z"/>
        </svg>
    </a>

</div>