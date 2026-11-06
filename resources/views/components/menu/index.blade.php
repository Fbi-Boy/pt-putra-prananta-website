<div x-data="{ openFind: false, openMore: false }" class="w-full max-w-[1100px] mx-auto px-4">
    <div class="grid grid-cols-4 gap-1.5 sm:flex sm:justify-center sm:gap-2">
        {{-- Panggil semua item menu --}}
        <x-menu.kami-carikan />
        <x-menu.daftar-agent />
        <x-menu.cari-agen />
        <x-menu.konsultasi />
        <x-menu.kpr />
        <x-menu.pindah-kpr />
        <x-menu.tanya-forum />
        <x-menu.lainnya />
    </div>

    {{-- Panggil modal (di dalam wrapper Alpine agar state terbaca) --}}
    @include('components.public.menu.modals.kami-carikan')
    @include('components.public.menu.modals.lainnya')
</div>
