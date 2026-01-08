@extends('layouts.app')

@section('content')
    @isset($header)
        {{-- header wordt door layouts.app al gerenderd; deze section blijft leeg om double header te vermijden --}}
    @endisset
@endsection

@section('no_content_card')
    @php
        $header = view()->make('profile._header');
    @endphp

    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-slate-800 dark:text-slate-100">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-slate-800 dark:text-slate-100">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-slate-800 dark:text-slate-100">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
