<nav class="fixed inset-x-4 top-6 z-50 rounded-2xl bg-white/60 dark:bg-slate-900/60 backdrop-blur-md border border-white/20 dark:border-slate-800/30 shadow-md transition-colors">
    <div>
<!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-6">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg shadow-sm flex items-center justify-center text-white font-bold">SR</div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:flex items-center ms-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-3 py-2 rounded-md">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('news.index')" :active="request()->routeIs('news.*')" class="px-3 py-2 rounded-md">
                        {{ __('News') }}
                    </x-nav-link>

                    <x-nav-link :href="route('forum.index')" :active="request()->routeIs('forum.*')" class="px-3 py-2 rounded-md">
                        {{ __('Forum') }}
                    </x-nav-link>

                    {{-- Public workouts link --}}
                    <x-nav-link :href="route('workouts.index')" :active="request()->routeIs('workouts.*')" class="px-3 py-2 rounded-md">
                        {{ __('Workouts') }}
                    </x-nav-link>

                    <x-nav-link :href="route('faq.index')" :active="request()->routeIs('faq.index')" class="px-3 py-2 rounded-md">
                        {{ __('FAQ') }}
                    </x-nav-link>

                    @if(Auth::check() && Auth::user()->is_admin)
                        <x-nav-link :href="route('admin.contacts.index')"
                                    :active="request()->routeIs('admin.contacts.*')" class="px-3 py-2 rounded-md">
                            {{ __('Contacts') }}
                        </x-nav-link>
                    @elseif(Auth::check())
                        <x-nav-link :href="route('contact.create')"
                                    :active="request()->routeIs('contact.*')" class="px-3 py-2 rounded-md">
                            {{ __('Contact') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('contact.create')"
                                    :active="request()->routeIs('contact.*')" class="px-3 py-2 rounded-md">
                            {{ __('Contact') }}
                        </x-nav-link>
                    @endif



                    {{-- Admin-only exercises link --}}
                    @if(Auth::check() && Auth::user()->is_admin)
                        <x-nav-link :href="route('admin.exercises.index')" :active="request()->routeIs('admin.exercises.*')" class="px-3 py-2 rounded-md">
                            {{ __('Exercises') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button
                    onclick="toggleDarkMode()"
                    class="inline-flex items-center p-2 rounded-md text-sm font-medium leading-5 text-gray-500 dark:text-slate-300 hover:text-gray-700 dark:hover:text-white focus:outline-none transition duration-150 ease-in-out"
                    title="Toggle dark mode"
                >
                <!-- Sun icon (visible in light) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:hidden" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.66-8.66h-1M4.34 12H3m15.36 6.36l-.7-.7M6.34 6.34l-.7-.7m12.02 0l-.7.7M6.34 17.66l-.7.7M12 8a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>

                    <!-- Moon icon (visible in dark) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden dark:inline" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 a7 7 0 009.79 9.79z" />
                    </svg>
                </button>


                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <span class="font-medium">{{ Auth::user()->name }}</span>

                                <span class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger (mobile) -->
                <div class="-me-2 flex items-center sm:hidden">
                    <details class="">
                        <summary class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-slate-800 focus:outline-none transition duration-150 ease-in-out list-none">
                            <svg class="h-6 w-6" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </summary>

                        <div class="pt-2 pb-3 space-y-1">
                            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('news.index')" :active="request()->routeIs('news.*')">
                                {{ __('News') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link :href="route('forum.index')" :active="request()->routeIs('forum.*')">
                                {{ __('Forum') }}
                            </x-responsive-nav-link>

                            {{-- Public workouts link --}}
                            <x-responsive-nav-link :href="route('workouts.index')" :active="request()->routeIs('workouts.*')">
                                {{ __('Workouts') }}
                            </x-responsive-nav-link>

                            {{-- Admin-only exercises link --}}
                            @if(Auth::check() && Auth::user()->is_admin)
                                <x-responsive-nav-link :href="route('admin.exercises.index')" :active="request()->routeIs('admin.exercises.*')">
                                    {{ __('Exercises') }}
                                </x-responsive-nav-link>
                            @endif

                            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-slate-700">
                                <div class="px-4">
                                    <div class="font-medium text-base text-slate-800 dark:text-slate-100">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="font-medium text-sm text-slate-500 dark:text-slate-400">
                                        {{ Auth::user()->email }}
                                    </div>

                                </div>

                                <div class="mt-3 space-y-1">
                                    <x-responsive-nav-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-responsive-nav-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>
