<nav
    x-data="{ open: false }"
    class="relative w-full bg-white border-b border-gray-200">

    {{-- MAIN CONTAINER --}}
    <div class="max-w-[1440px] mx-auto h-[88px] px-6 lg:px-10 flex items-center">

        {{-- LOGO --}}
        <a href="{{ url('/') }}" class="flex items-center shrink-0">
            <div class="flex items-center gap-2">

                {{-- Logo Icon --}}
                <div class="w-10 h-10 rounded-xl bg-yellow-400 flex items-center justify-center">
                    <span class="text-black font-black text-xl">
                        P
                    </span>
                </div>

                {{-- Logo Text --}}
                <span class="text-[24px] font-bold tracking-tight text-gray-900">
                    Putra
                </span>

            </div>
        </a>


        {{-- DESKTOP MENU --}}
        <div class="hidden lg:flex items-center ml-12 gap-8">

            {{-- Buy --}}
            <div class="relative">
                <button
                    class="flex items-center gap-1 text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition">

                    Buy

                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </button>
            </div>


            {{-- Rent --}}
            <div class="relative">
                <button
                    class="flex items-center gap-1 text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition">

                    Rent

                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </button>
            </div>


            {{-- Sell --}}
            <div class="relative">
                <button
                    class="flex items-center gap-1 text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition">

                    Sell

                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </button>
            </div>


            {{-- New Projects --}}
            <div class="relative">
                <button
                    class="flex items-center gap-1 text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition">

                    New Projects

                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </button>
            </div>


            {{-- Find Agent --}}
            <a
                href="#"
                class="text-[15px] font-semibold text-gray-900
                       hover:text-yellow-500 transition">

                Find Agent
            </a>


            {{-- Guides --}}
            <a
                href="#"
                class="text-[15px] font-semibold text-gray-900
                       hover:text-yellow-500 transition">

                Guides
            </a>


            {{-- More --}}
            <div class="relative">
                <button
                    class="flex items-center gap-1 text-[15px] font-semibold
                           text-gray-900 hover:text-yellow-500 transition">

                    More

                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </button>
            </div>

        </div>


        {{-- RIGHT SIDE --}}
        <div class="ml-auto flex items-center gap-3">

            {{-- Jual Property --}}
            <button
                class="hidden md:flex items-center gap-3 h-10 px-5
                       rounded-2xl border border-gray-800
                       text-sm font-semibold text-gray-900
                       hover:bg-gray-50 transition">

                <i data-lucide="house-plus" class="w-5 h-5"></i>

                <span>Jual Property</span>
            </button>


            {{-- Saved / Favorite Property --}}
            <button
                class="hidden md:flex w-10 h-10 rounded-full
                       items-center justify-center
                       hover:bg-gray-100 transition"
                aria-label="Property tersimpan">

                <i data-lucide="heart" class="w-5 h-5"></i>
            </button>


            {{-- Login --}}
            <a
                href="#"
                class="hidden md:flex h-10 px-5 rounded-full
                       bg-yellow-400 hover:bg-yellow-500
                       items-center justify-center
                       text-sm font-semibold text-black transition">

                Login
            </a>


            {{-- MOBILE MENU BUTTON --}}
            <button
                @click="open = !open"
                class="lg:hidden w-10 h-10 rounded-xl
                       hover:bg-gray-100
                       flex items-center justify-center
                       transition"
                aria-label="Toggle menu"
                :aria-expanded="open">

                {{-- Menu Icon --}}
                <span x-show="!open" x-cloak>
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </span>

                {{-- Close Icon --}}
                <span x-show="open" x-cloak>
                    <i data-lucide="x" class="w-5 h-5"></i>
                </span>

            </button>

        </div>

    </div>


    {{-- MOBILE MENU PANEL --}}
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="open = false"
        class="lg:hidden absolute left-0 right-0 top-full
               bg-white border-t border-gray-100
               shadow-lg z-50">

        <div class="px-5 py-5">

            <nav class="flex flex-col gap-1">

                {{-- Home --}}
                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl
                           text-sm font-medium text-gray-900
                           hover:bg-gray-50 transition">
                    Home
                </a>


                {{-- Property --}}
                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl
                           text-sm font-medium text-gray-900
                           hover:bg-gray-50 transition">
                    Property
                </a>


                {{-- About --}}
                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl
                           text-sm font-medium text-gray-900
                           hover:bg-gray-50 transition">
                    About
                </a>


                {{-- Gallery --}}
                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl
                           text-sm font-medium text-gray-900
                           hover:bg-gray-50 transition">
                    Gallery
                </a>


                {{-- Contact --}}
                <a
                    href="#"
                    @click="open = false"
                    class="px-4 py-3 rounded-xl
                           text-sm font-medium text-gray-900
                           hover:bg-gray-50 transition">
                    Contact
                </a>


                {{-- Divider --}}
                <div class="my-3 border-t border-gray-100"></div>


                {{-- Jual Property --}}
                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                           text-sm font-semibold text-gray-900
                           hover:bg-gray-50 transition">

                    <i data-lucide="house-plus" class="w-5 h-5"></i>

                    <span>Jual Property</span>
                </a>


                {{-- Favorite --}}
                <a
                    href="#"
                    @click="open = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                           text-sm font-semibold text-gray-900
                           hover:bg-gray-50 transition">

                    <i data-lucide="heart" class="w-5 h-5"></i>

                    <span>Property Tersimpan</span>
                </a>


                {{-- Login --}}
                <a
                    href="#"
                    @click="open = false"
                    class="mt-2 h-11 rounded-xl
                           bg-yellow-400 hover:bg-yellow-500
                           flex items-center justify-center
                           text-sm font-semibold text-black transition">

                    Login
                </a>

            </nav>

        </div>

    </div>

</nav>