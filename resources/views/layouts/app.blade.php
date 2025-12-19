<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Project')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<nav>
    <a href="/">Home</a>
    <a href="/news">Nieuws</a>
    <a href="/faq">FAQ</a>
    <a href="/contact">Contact</a>

    @auth
        <a href="{{ route('profile.show', auth()->user()) }}">Mijn profiel</a>
        @if(auth()->user()->is_admin)
            <a href="/admin">Admin</a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button>Logout</button>
        </form>
    @else
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    @endauth
</nav>

<main>
    @yield('content')
</main>

</body>
</html>
