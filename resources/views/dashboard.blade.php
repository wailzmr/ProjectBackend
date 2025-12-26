<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:bg-slate-800 dark:text-slate-100">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Regular user --}}
            @if(Auth::check() && !Auth::user()->is_admin)
                <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-slate-100 rounded-2xl p-8 shadow-sm ">
                    <h3 class="text-lg font-semibold mb-2">Welcome</h3>
                    <p>You are logged in as a user.</p>

                    <div class="bg-white dark:bg-slate-800
border border-slate-200 dark:border-slate-700
text-slate-800 dark:text-slate-100 rounded-2xl
">
                        <a href="{{ route('workouts.index') }}"
                           class="inline-flex items-center justify-center px-5 py-3 bg-slate-900 text-white rounded-xl font-medium hover:bg-slate-800 transition">

                            View Workouts
                        </a>

                        <a href="{{ route('faq.index') }}"
                           class="inline-flex items-center justify-center px-5 py-3 bg-indigo-600 text-white rounded-xl font-medium hover:bg-indigo-700 transition">
                            View FAQ
                        </a>

                        <a href="{{ route('contact.create') }}"
                           class="inline-flex items-center justify-center px-5 py-3 bg-emerald-600 text-white rounded-xl font-medium hover:bg-emerald-700 transition">
                            Contact Us
                        </a>

                        {{-- If in future there is a public exercises page, add it here --}}
                    </div>
                </div>
            @endif

            {{-- Admin dashboard --}}
            @if(Auth::check() && Auth::user()->is_admin)
                <div class="p-6 bg-white shadow rounded-lg dark:bg-slate-800 dark:text-slate-100">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800 leading-tight dark:bg-slate-800 dark:text-slate-100">Admin panel</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div
                            class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition dark:bg-slate-800 ">

                            <h4 class="text-lg font-semibold text-slate-800 mb-1 dark:text-slate-100">News</h4>
                            <p class="text-sm text-gray-600">Create and manage news posts.</p>
                            <div class="mt-3 flex gap-2">
                                <a href="{{ route('admin.news.create') }}"
                                   class="inline-block px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">Create</a>
                                <a href="{{ route('admin.news.index') }}"
                                   class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Manage</a>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition dark:bg-slate-800 ">
                            <h4 class="text-lg font-semibold text-slate-800 mb-1 dark:text-slate-100">Workouts</h4>
                            <p class="text-sm text-gray-600">Manage workout programs visible to users.</p>
                            <div class="mt-3">
                                <a href="{{ route('admin.workouts.index') }}"
                                   class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Manage
                                    Workouts</a>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition dark:bg-slate-800 ">
                            <h4 class="text-lg font-semibold text-slate-800 mb-1 dark:text-slate-100">Exercises</h4>
                            <p class="text-sm text-gray-600">Create and edit exercises used in workouts.</p>
                            <div class="mt-3">
                                <a href="{{ route('admin.exercises.index') }}"
                                   class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Manage
                                    Exercises</a>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition dark:bg-slate-800 ">
                            <h4 class="text-lg font-semibold text-slate-800 mb-1 dark:text-slate-100">Users</h4>
                            <p class="text-sm text-gray-600">View, create or manage users.</p>
                            <div class="mt-3">
                                <a href="{{ route('admin.users.index') }}"
                                   class="inline-block px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Manage
                                    Users</a>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition dark:bg-slate-800 ">
                            <h4 class="text-lg font-semibold text-slate-800 mb-1 dark:text-slate-100">FAQ & Contacts</h4>
                            <p class="text-sm text-gray-600">Manage FAQs, FAQ categories and view contact messages.</p>

                            <div class="mt-3 flex flex-wrap gap-2">
                                <a href="{{ route('admin.faqs.index') }}"
                                   class="inline-block px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                    Manage FAQs
                                </a>

                                <a href="{{ route('admin.faq-categories.index') }}"
                                   class="inline-block px-3 py-1 bg-purple-600 text-white rounded hover:bg-purple-700">
                                    FAQ Categories
                                </a>

                                <a href="{{ route('admin.contacts.index') }}"
                                   class="inline-block px-3 py-1 bg-gray-600 text-white rounded hover:bg-gray-700">
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
