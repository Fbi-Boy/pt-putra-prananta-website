<div x-data="{ openFind: false, openMore: false }" class="w-full max-w-[1100px] mx-auto px-4">
    {{-- Style untuk x-cloak --}}
    <style>
        [x-cloak] { display: none !important; }
    </style>

    @php
        // Urutan menu sudah diatur manual (tidak berubah saat di-refresh)
        $menus = [
            'kpr',             // 1. KPR duluan
            'cari-agent',      // 2. Cari Agent
            'kami-carikan',    // 3. Kami Carikan
            'daftar-agent',    // 4. Daftar Agent
            'pindah-kpr',      // 5. Pindah KPR
            'konsultasi',      // 6. Konsultasi
            'forum-diskusi',   // 7. Forum Diskusi
            'lainnya'          // 8. Lainnya
        ];
    @endphp

    <div class="grid grid-cols-4 gap-1.5 sm:flex sm:justify-center sm:gap-2">
        @foreach($menus as $menu)
            @include('components.menu.' . $menu)
        @endforeach
    </div>

    @include('components.menu.modals.kami-carikan')
    @include('components.menu.modals.lainnya')
</div>
