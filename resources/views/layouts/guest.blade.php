<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sport Rift') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased
             min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-100
             relative overflow-x-hidden">

<div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-indigo-400/30 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute -bottom-32 -right-32 w-[500px] h-[500px] bg-purple-400/30 rounded-full blur-3xl pointer-events-none"></div>

<div class="relative z-10 min-h-screen w-full flex items-start justify-center px-4 py-10">
    <div class="w-full max-w-md">
        <div class="bg-white/60 dark:bg-slate-800/60 backdrop-blur-md rounded-2xl shadow-lg p-6 md:p-8 transition-colors">
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>
