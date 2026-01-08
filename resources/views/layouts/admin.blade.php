@extends('layouts.app')

@section('no_content_card')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-transparent rounded-lg p-4">
            <h1 class="text-2xl font-semibold text-slate-800 dark:text-slate-100 mb-6">Admin panel</h1>

            <nav class="mb-6 flex gap-4 flex-wrap">
                <a href="/admin/users" class="text-sm text-slate-600 dark:text-slate-300 hover:underline">Users</a>
                <a href="/admin/news" class="text-sm text-slate-600 dark:text-slate-300 hover:underline">Nieuws</a>
                <a href="/admin/faq" class="text-sm text-slate-600 dark:text-slate-300 hover:underline">FAQ</a>
            </nav>

            <div>
                @yield('admin-content')
            </div>
        </div>
    </div>
@endsection
