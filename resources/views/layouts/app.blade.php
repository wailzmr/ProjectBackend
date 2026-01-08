<!DOCTYPE html>
@props(['forceDark' => false])
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ dark: localStorage.getItem('dark') === 'true' }"
    x-init="$watch('dark', value => localStorage.setItem('dark', value))"
    :class="{ 'dark': dark }"
>
    <head class="font-sans antialiased bg-slate-50 text-slate-800
             dark:bg-slate-900 dark:text-slate-100 transition-colors">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased
             bg-slate-50 text-slate-800
             dark:bg-slate-900 dark:text-slate-100
             transition-colors">
    <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
        @isset($header)
            <header class="bg-transparent">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    {{ $header }}
                </div>
            </header>
        @endisset
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
