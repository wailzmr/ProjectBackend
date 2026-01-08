@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="flex items-start gap-6">
            <div class="shrink-0">
                @if($user->avatar_path)
                    <img
                        src="{{ asset('storage/' . $user->avatar_path) }}"
                        alt="{{ $user->username ?? $user->name }}"
                        class="w-24 h-24 rounded-2xl object-cover border border-white/40"
                    >
                @else
                    <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-500 text-white flex items-center justify-center font-bold text-2xl">
                        {{ strtoupper(substr($user->username ?? $user->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            <div class="flex-1">
                <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">
                    {{ $user->username ?? $user->name }}
                </h2>

                <div class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                    Joined {{ $user->created_at->format('d/m/Y') }}
                </div>

                @if($user->birthday)
                    <div class="mt-4 text-slate-700 dark:text-slate-200">
                        <strong>Verjaardag:</strong> {{ optional($user->birthday)->format('d/m/Y') }}
                    </div>
                @endif

                @if($user->about)
                    <div class="mt-3 text-slate-700 dark:text-slate-200 whitespace-pre-line">
                        {{ $user->about }}
                    </div>
                @endif

                <div class="mt-6 flex gap-3 flex-wrap">
                    <a href="{{ url()->previous() }}" class="px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 text-sm text-slate-700 dark:text-slate-200 hover:bg-white/40 dark:hover:bg-slate-800/40 transition">
                        Back
                    </a>

                    @auth
                        @if(auth()->id() === $user->id)
                            <a href="{{ route('profile.edit') }}" class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                                Edit profile
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
