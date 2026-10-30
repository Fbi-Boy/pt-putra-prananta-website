@extends('components.layout.app')

@section('title', config('company.name') . ' — ' . config('company.full_name'))

@section('content')

    {{-- Hero Banner --}}
    <section class="relative">
        <img src="{{ asset('images/banner-property.png') }}"
             class="w-full h-[300px] object-cover"
             alt="Property">
        <div class="absolute left-1/2 bottom-0 -translate-x-1/2 translate-y-1/2 z-10">
            <x-public.search-panel />
        </div>
    </section>



    <div class="h-[50px]"></div>

    <div class="mt-24">
        <x-public.menu />
    </div>


    <x-public.developer-logo :developers="$developers" />

    <x-public.advertisement :banner="$banner" />

    {{-- Rekomendasi (Carousel) --}}
    <x-property.recommendation
        title="Rekomendasi Properti Untuk Anda"
        description="Temukan pilihan properti terbaik yang sesuai dengan kebutuhan dan keinginan Anda."
        :properties="$recommended"
        view-all-url="{{ route('properties.index') }}"
    />

 {{-- Properti Terpopuler --}}
    <x-property.section
        title="Properti Terpopuler"
        :properties="$popular"
        view-all-url="{{ route('properties.index') }}"
    />

    {{-- Properti Terbaru --}}
    <x-property.section
        title="Properti Terbaru"
        :properties="$latest"
        view-all-url="{{ route('properties.index') }}"
        background="bg-orange-50"
    />

    <x-public.news />

    {{-- Testimoni --}}
    <x-public.testimonial-card :testimonials="$testimonials" />

@endsection
