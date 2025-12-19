@extends('layouts.app')

@section('content')
    <h2>Profiel aanpassen</h2>

    <x-form-errors />

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="username" value="{{ old('username', auth()->user()->username) }}" required>

        <input type="date" name="birthday" value="{{ old('birthday', auth()->user()->birthday?->format('Y-m-d')) }}">

        <textarea name="about">{{ old('about', auth()->user()->about) }}</textarea>

        <input type="file" name="avatar" accept="image/*">

        <button>Opslaan</button>
    </form>
@endsection

