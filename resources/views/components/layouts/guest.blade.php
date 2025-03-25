<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="{{ config('app.google_site_verification') }}" />

    <title>{{ $title ? $title . ' | ' . config('app.name') : config('app.name', 'Templates and More...') }}</title>
    <meta name="description" content="{{ $meta ?? 'Templates and more....' }}">
    <meta name="keywords" content="{{ $keywords ?? 'templates' }}">

    <meta content="{{ $title ?? config('app.name', 'Templates and More') }}" property="og:title">
    <meta content="{{ $meta ?? 'Top Templates and more.' }}" property="og:description">
    <meta content="{{ $ftImg ?? asset('assets/logo.png') }}" property="og:image">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&display=swap" rel="stylesheet">

    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>

    

    <!-- Theme Colors -->
    <meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#0a0a0a" media="(prefers-color-scheme: dark)">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-slate-900 dark:text-slate-100 antialiased" x-data="{ darkMode: localStorage.getItem('darkMode') ? JSON.parse(localStorage.getItem('darkMode')) : window.matchMedia('(prefers-color-scheme: dark)').matches }" :class="{ 'dark': darkMode }"
    x-init="$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak>

    <livewire:navbar />

    <div
        class="w-full bg-gradient-to-b from-[#fff9fb] to-[#f6f7ff] dark:bg-gradient-to-br dark:from-[#0a0a0a] dark:to-[#1a1a1a] overflow-x-hidden">
        {{ $slot }}
    </div>

    <x-parts.footer />

    @livewireScripts
</body>

</html>
