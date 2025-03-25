<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-slate-900 dark:text-slate-100 antialiased" x-data="{ darkMode: false }" :class="{ 'dark': darkMode }"
    x-init="if (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        localStorage.setItem('darkMode', JSON.stringify(true));
    }
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak>

    <livewire:navbar />

    <div
        class="w-full  bg-gradient-to-b  from-[#fff9fb] to-[#f6f7ff] dark:bg-gradient-to-br 
  dark:from-[#0a0a0a] 
  dark:to-[#1a1a1a] overflow-x-hidden">
        {{ $slot }}
    </div>

    <x-parts.footer />
    </div>
    @livewireScripts

</body>

</html>
