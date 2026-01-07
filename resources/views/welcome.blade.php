<x-guest-layout>
    <div class="bg-white dark:bg-slate-800
       border border-slate-200 dark:border-slate-700
       rounded-xl shadow-sm"
    >
        <div class="max-w-xl w-full text-center">

            <h1 class="text-5xl font-extrabold tracking-tight mb-4
                       bg-gradient-to-r from-indigo-500 to-purple-600
                       bg-clip-text text-transparent">
                Sport Rift
            </h1>

            <p class="text-lg text-slate-600 dark:text-slate-400 mb-10">
                Your ultimate fitness companion
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold
                              hover:bg-indigo-700 transition">
                        Go to dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold
                              hover:bg-indigo-700 transition">
                        Log in
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-6 py-3 rounded-xl border border-indigo-600
                              text-indigo-600 dark:text-indigo-400
                              hover:bg-indigo-600 hover:text-white transition">
                        Register
                    </a>
                @endauth
            </div>

        </div>
    </div>
</x-guest-layout>
