<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">
                Dashboard
            </h2>

            @if(Auth::user()->is_admin)
                <span class="px-3 py-1 text-sm rounded-full
                             bg-indigo-100 text-indigo-700
                             dark:bg-indigo-500/10 dark:text-indigo-400">
                    Admin
                </span>
            @endif
        </div>
    </x-slot>

    {{-- Page wrapper with gradient --}}
    <div class="relative min-h-screen
                bg-gradient-to-br from-indigo-50 via-white to-purple-100
                dark:from-slate-900 dark:via-slate-900 dark:to-slate-800
                overflow-hidden">

        {{-- Background glow --}}
        <div class="absolute -top-32 -left-32 w-[500px] h-[500px]
                    bg-indigo-400/20 dark:bg-indigo-500/10
                    rounded-full blur-3xl"></div>

        <div class="absolute -bottom-32 -right-32 w-[500px] h-[500px]
                    bg-purple-400/20 dark:bg-purple-500/10
                    rounded-full blur-3xl"></div>

        {{-- Content --}}
        <div class="relative z-10 max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 space-y-8">

            {{-- REGULAR USER --}}
            @if(Auth::check() && !Auth::user()->is_admin)
                <div class="bg-white/80 dark:bg-slate-800/80
                            backdrop-blur-xl
                            border border-slate-200 dark:border-slate-700
                            rounded-2xl p-8 shadow-sm">

                    <h3 class="text-xl font-semibold text-slate-800 dark:text-slate-100 mb-2">
                        Welcome
                    </h3>

                    <p class="text-slate-600 dark:text-slate-400 mb-6">
                        You are logged in as a user.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <a href="{{ route('workouts.index') }}"
                           class="flex items-center justify-center px-5 py-3
                                  bg-slate-900 text-white rounded-xl font-medium
                                  hover:bg-slate-800 transition">
                            View Workouts
                        </a>

                        <a href="{{ route('faq.index') }}"
                           class="flex items-center justify-center px-5 py-3
                                  bg-indigo-600 text-white rounded-xl font-medium
                                  hover:bg-indigo-700 transition">
                            View FAQ
                        </a>

                        <a href="{{ route('contact.create') }}"
                           class="flex items-center justify-center px-5 py-3
                                  bg-emerald-600 text-white rounded-xl font-medium
                                  hover:bg-emerald-700 transition">
                            Contact Us
                        </a>
                    </div>
                </div>
            @endif

            {{-- ADMIN PANEL --}}
            @if(Auth::check() && Auth::user()->is_admin)
                <div class="bg-white/80 dark:bg-slate-800/80
                            backdrop-blur-xl
                            border border-slate-200 dark:border-slate-700
                            rounded-2xl p-8 shadow-sm">

                    <h3 class="text-xl font-semibold text-slate-800 dark:text-slate-100 mb-6">
                        Admin panel
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        {{-- News --}}
                        <div class="group bg-white dark:bg-slate-800
                                    border border-slate-200 dark:border-slate-700
                                    rounded-2xl p-6
                                    hover:shadow-lg hover:-translate-y-1 transition">
                            <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-1">
                                News
                            </h4>
                            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                                Create and manage news posts.
                            </p>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.news.create') }}"
                                   class="px-4 py-2 rounded-lg bg-emerald-600 text-white text-sm font-medium hover:bg-emerald-700 transition">
                                    Create
                                </a>
                                <a href="{{ route('admin.news.index') }}"
                                   class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                                    Manage
                                </a>
                            </div>
                        </div>

                        {{-- Workouts --}}
                        <div class="group bg-white dark:bg-slate-800
                                    border border-slate-200 dark:border-slate-700
                                    rounded-2xl p-6
                                    hover:shadow-lg hover:-translate-y-1 transition">
                            <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-1">
                                Workouts
                            </h4>
                            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                                Manage workout programs visible to users.
                            </p>
                            <a href="{{ route('admin.workouts.index') }}"
                               class="inline-block px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                                Manage Workouts
                            </a>
                        </div>

                        {{-- Exercises --}}
                        <div class="group bg-white dark:bg-slate-800
                                    border border-slate-200 dark:border-slate-700
                                    rounded-2xl p-6
                                    hover:shadow-lg hover:-translate-y-1 transition">
                            <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-1">
                                Exercises
                            </h4>
                            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                                Create and edit exercises used in workouts.
                            </p>
                            <a href="{{ route('admin.exercises.index') }}"
                               class="inline-block px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">
                                Manage Exercises
                            </a>
                        </div>

                        {{-- Users --}}
                        <div class="group bg-white dark:bg-slate-800
                                    border border-slate-200 dark:border-slate-700
                                    rounded-2xl p-6
                                    hover:shadow-lg hover:-translate-y-1 transition">
                            <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-1">
                                Users
                            </h4>
                            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                                View, create or manage users.
                            </p>
                            <a href="{{ route('admin.users.index') }}"
                               class="inline-block px-4 py-2 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-700 transition">
                                Manage Users
                            </a>
                        </div>

                        {{-- FAQ & Contacts --}}
                        <div class="group bg-white dark:bg-slate-800
                                    border border-slate-200 dark:border-slate-700
                                    rounded-2xl p-6
                                    hover:shadow-lg hover:-translate-y-1 transition">
                            <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-1">
                                FAQ & Contacts
                            </h4>
                            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                                Manage FAQs, categories and contact messages.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('admin.faqs.index') }}"
                                   class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                                    FAQs
                                </a>
                                <a href="{{ route('admin.faq-categories.index') }}"
                                   class="px-4 py-2 rounded-lg bg-purple-600 text-white text-sm font-medium hover:bg-purple-700 transition">
                                    Categories
                                </a>
                                <a href="{{ route('admin.contacts.index') }}"
                                   class="px-4 py-2 rounded-lg bg-slate-600 text-white text-sm font-medium hover:bg-slate-700 transition">
                                    Contacts
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
