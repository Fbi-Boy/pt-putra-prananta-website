<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Pastikan ini ada --}}

    <title>@yield('title', config('company.name'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
{{-- PENTING 1: Tambahkan x-data="{ openLogin: false }" di tag body --}}
{{-- Tambahkan openFavorites: false di dalam x-data --}}
<body x-data="{ openLogin: false, openFavorites: false }" class="font-sans antialiased bg-stone-50">

    <x-public.navbar />

    <main>
        @yield('content')
    </main>

    <x-public.footer />

    {{-- Panggil Modal Login --}}
    <x-auth.login-modal />

    {{-- Panggil Drawer Favorit --}}
    <x-favorites-drawer />

    @stack('scripts')
</body>
</html>
