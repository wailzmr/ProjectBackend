@extends('layouts.app')

@section('title', $user->username)

@section('content')
    <h2>{{ $user->username }}</h2>

    @if($user->avatar_path)
        <img src="{{ asset('storage/' . $user->avatar_path) }}" width="150">
    @endif

    <p><strong>Verjaardag:</strong> {{ optional($user->birthday)->format('d/m/Y') }}</p>
    <p>{{ $user->about }}</p>

    @auth
        @if(auth()->id() === $user->id)
            <a href="{{ route('profile.edit') }}">Profiel bewerken</a>
        @endif
    @endauth
@endsection
