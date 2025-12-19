@extends('layouts.app')

@section('content')
    <h1>Admin panel</h1>

    <nav>
        <a href="/admin/users">Users</a>
        <a href="/admin/news">Nieuws</a>
        <a href="/admin/faq">FAQ</a>
    </nav>

    <hr>

    @yield('admin-content')
@endsection
