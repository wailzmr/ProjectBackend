<x-guest-layout>
    <div class="bg-white/80 backdrop-blur-xl
                border border-slate-200
                rounded-2xl shadow-xl
                p-10">

        <h1 class="text-3xl font-bold text-center mb-2">
            Create an account
        </h1>

        <p class="text-center text-slate-600 mb-8">
            Join Sport Rift today
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-input-label for="username" value="Username" />
                <x-text-input id="username" name="username" type="text" class="mt-1 w-full" required />
            </div>

            <div class="mt-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" class="mt-1 w-full" type="email" name="email" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password" class="mt-1 w-full" type="password" name="password" required />
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" value="Confirm Password" />
                <x-text-input id="password_confirmation" class="mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-between mt-6 text-sm">
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">
                    Already registered?
                </a>
            </div>

            <x-primary-button class="mt-8 w-full justify-center text-lg py-3">
                Register
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
