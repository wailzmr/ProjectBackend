<!DOCTYPE html>
@props(['forceDark' => false])
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head class="font-sans antialiased bg-slate-50 text-slate-800
             dark:bg-slate-900 dark:text-slate-100 transition-colors">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Initialize dark mode early to avoid flash -->
        <script>
            try {
                if (localStorage.getItem('dark') === 'true') {
                    document.documentElement.classList.add('dark');
                }
            } catch (e) { /* ignore */ }
        </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased transition-colors
             bg-gradient-to-br from-indigo-50 via-white to-purple-100
             dark:bg-gradient-to-br dark:from-slate-900 dark:via-slate-800 dark:to-slate-900
             min-h-screen text-slate-800 dark:text-slate-100 relative overflow-x-hidden">

        <!-- decorative blobs (like welcome) -->
        <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-indigo-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-[500px] h-[500px] bg-purple-400/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="min-h-screen flex flex-col pt-24">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-transparent">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                        {!! $header !!}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    {{-- If a view defines `no_content_card`, render that section raw (opt-out of the glass card). --}}
                    @hasSection('no_content_card')
                        @yield('no_content_card')
                    @else
                        <!-- content card to give a modern, glassy container while preserving page structure -->
                        <div class="bg-white/60 dark:bg-slate-800/60 backdrop-blur-md rounded-2xl shadow-lg p-6 md:p-10 transition-colors">
                            {{-- Support both component slot-based pages and classic section-based pages --}}
                            @hasSection('content')
                                @yield('content')
                            @else
                                {{ $slot }}
                            @endif
                        </div>
                    @endif
                </div>
            </main>
        </div>

        <!-- small helper to toggle dark mode from navigation (keeps functionality without Alpine) -->
        <script>
            function toggleDarkMode() {
                try {
                    const isDark = document.documentElement.classList.toggle('dark');
                    localStorage.setItem('dark', isDark);
                } catch (e) { /* ignore */ }
            }
        </script>
    </body>
</html>
