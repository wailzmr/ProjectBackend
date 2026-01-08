<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sport Rift</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-br from-indigo-50 via-white to-purple-100
             relative overflow-hidden">
<div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-indigo-400/30 rounded-full blur-3xl"></div>
<div class="absolute -bottom-32 -right-32 w-[500px] h-[500px] bg-purple-400/30 rounded-full blur-3xl"></div>


<main class="text-center px-6">

    <h1 class="text-[clamp(5rem,12vw,10rem)] font-extrabold tracking-tight mb-6
           bg-gradient-to-r from-indigo-500 via-blue-500 to-purple-600
           bg-clip-text text-transparent drop-shadow-sm">
        Sport Rift
    </h1>


    <p class="text-2xl text-slate-600 max-w-2xl mx-auto mb-16">
        Your ultimate fitness companion
    </p>

    <div class="flex gap-6 justify-center">
        <a href="{{ route('login') }}"
           class="px-12 py-5 rounded-full bg-indigo-600 text-white text-xl font-semibold
              shadow-lg shadow-indigo-600/30
              hover:bg-indigo-700 hover:scale-105 transition">
            Log in
        </a>

        <a href="{{ route('register') }}"
           class="px-12 py-5 rounded-full border-2 border-indigo-500
              text-indigo-600 text-xl font-semibold
              backdrop-blur-sm
              hover:bg-indigo-600 hover:text-white hover:scale-105 transition">
            Register
        </a>
    </div>


</main>

</body>
</html>
