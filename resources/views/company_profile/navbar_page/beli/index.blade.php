@extends('company_profile.layouts.navbar')

@section('title', 'Beli Properti - Prananta Property')

@section('content')

<section class="min-h-screen bg-gray-50 py-16">

    <div class="mx-auto max-w-7xl px-4">

        <div class="mb-10">
            <span class="text-sm font-semibold uppercase tracking-wider text-yellow-500">
                Beli Properti
            </span>

            <h1 class="mt-2 text-3xl font-bold text-gray-900">
                Temukan Properti yang Tepat untuk Anda
            </h1>

            <p class="mt-3 max-w-2xl text-gray-600">
                Temukan berbagai pilihan properti yang sesuai dengan kebutuhan,
                lokasi, dan budget Anda bersama Prananta Property.
            </p>
        </div>

        {{-- CONTENT BELI --}}
        <div class="rounded-2xl bg-white p-8 shadow-sm">
            <h2 class="text-xl font-semibold text-gray-900">
                Halaman Beli Properti
            </h2>

            <p class="mt-2 text-gray-600">
                Daftar dan pencarian properti akan ditampilkan di sini.
            </p>
        </div>

    </div>

</section>

@endsection
