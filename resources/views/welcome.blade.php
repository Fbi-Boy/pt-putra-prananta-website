<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <x-public.navbar />
    <section class="relative">

        <img
            src="{{ asset('images/banner-property.png') }}"
            class="w-full h-[300px] object-cover"
            alt="Property"
        >

        {{-- Search Panel --}}
        <div class="absolute left-1/2 bottom-0 -translate-x-1/2 translate-y-1/2 z-10">
            <x-public.search-panel />
        </div>

    </section>

    {{-- RUANG UNTUK SEARCH PANEL --}}
    <div class="h-[50px]"></div>

    {{-- Menu --}}
    <div class="mt-24">
        <x-public.menu />
    </div>

    {{-- Iklan --}}
    <x-public.advertisement />

    @php

        $popularProperties = [

            [
                'title' => 'Rumah Minimalis Modern Dekat Pusat Kota Jember',
                'price' => 'Rp 850 Juta',
                'location' => 'Kaliwates, Jember',
                'image' => asset('images/property/rumah1.jpg'),
                'status' => 'PREMIER',
                'land_area' => 120,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'date' => '6 Sep 2026',
            ],

            [
                'title' => 'Rumah Mewah dengan Halaman Luas',
                'price' => 'Rp 1,2 Miliar',
                'location' => 'Sumbersari, Jember',
                'image' => asset('images/property/rumah2.jpg'),
                'status' => 'PREMIER',
                'land_area' => 180,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'date' => '5 Sep 2026',
            ],

            [
                'title' => 'Rumah Strategis Dekat Kampus',
                'price' => 'Rp 650 Juta',
                'location' => 'Tegal Boto, Jember',
                'image' => asset('images/property/rumah3.jpg'),
                'status' => 'BARU',
                'land_area' => 100,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'date' => '4 Sep 2026',
            ],

            [
                'title' => 'Rumah Keluarga Nyaman di Lokasi Strategis',
                'price' => 'Rp 975 Juta',
                'location' => 'Patrang, Jember',
                'image' => asset('images/property/rumah4.jpg'),
                'status' => 'TURUN HARGA',
                'land_area' => 160,
                'bedrooms' => 4,
                'bathrooms' => 2,
                'date' => '3 Sep 2026',
            ],

        ];

        $latestProperties = [
            [
                'title' => 'Rumah Minimalis Baru di Jember',
                'price' => 'Rp 750 Juta',
                'location' => 'Sumbersari, Jember',
                'image' => asset('images/property/rumah1.jpg'),
                'status' => 'BARU',
                'land_area' => 120,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'date' => 'Hari ini',
            ],
            [
                'title' => 'Tanah Strategis Dekat Jalan Utama',
                'price' => 'Rp 450 Juta',
                'location' => 'Kaliwates, Jember',
                'image' => asset('images/property/rumah2.jpg'),
                'status' => 'BARU',
                'land_area' => 200,
                'bedrooms' => 0,
                'bathrooms' => 0,
                'date' => 'Hari ini',
            ],
            [
                'title' => 'Rumah Nyaman Siap Huni',
                'price' => 'Rp 900 Juta',
                'location' => 'Patrang, Jember',
                'image' => asset('images/property/rumah3.jpg'),
                'status' => 'BARU',
                'land_area' => 150,
                'bedrooms' => 4,
                'bathrooms' => 2,
                'date' => 'Kemarin',
            ],
            [
                'title' => 'Rumah Dekat Kampus',
                'price' => 'Rp 680 Juta',
                'location' => 'Tegal Boto, Jember',
                'image' => asset('images/property/rumah4.jpg'),
                'status' => 'BARU',
                'land_area' => 100,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'date' => 'Kemarin',
            ],
        ];
    @endphp

    <x-property.section
    title="Properti Terpopuler"
    :properties="$popularProperties"
    view-all-url="#"
    />

    <x-property.section
        title="Properti Terbaru"
        :properties="$latestProperties"
        view-all-url="#"
        background="bg-[#FFF4EA]"
    />

    {{-- Footer --}}
    <x-public.footer />

</body>
</html>