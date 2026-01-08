<x-guest-layout>


        <h1 class="text-3xl font-bold text-center mb-2">
            Welcome back
        </h1>

        <p class="text-center text-slate-600 mb-8">
            Log in to continue to Sport Rift
        </p>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" class="mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password" class="mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6 text-sm">
                <label class="flex items-center gap-2 text-slate-600" for="remember">
                    <input id="remember" name="remember" type="checkbox" class="rounded border-slate-300 text-indigo-600">
                    Remember me
                </label>

                <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">
                    Forgot password?
                </a>
            </div>

            <x-primary-button class="mt-8 w-full justify-center text-lg py-3">
                Log in
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
