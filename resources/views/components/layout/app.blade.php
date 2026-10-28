<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', config('company.name') . ' — ' . config('company.full_name'))</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/button.css') }}">
    @stack('styles')
</head>
<body>

    <x-public.navbar />

    @yield('content')

    <x-public.footer />

    @stack('scripts')

</body>
</html>
