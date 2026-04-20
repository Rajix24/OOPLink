<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('storage/css/auth.css') }}">
</head>

<body>
    <nav class="nav" id="nav">
        <div class="app-logo d-flex">
            <img src="{{ asset('storage/logo.png') }}" alt="logo" height="70px" width="auth">
            <a class="oop" href="{{ route('dashboard') }}">OOPLink</a>
        </div>
        <div class="link-home" id="link-home">
            <a href="{{ route("dashboard") }}">Home</a>
            <a href="">About</a>
            <a href="">Contact</a>
            @if (auth()->user()->role_id == 1)
            <a href="{{ route('dashboard') }}">Admin</a>
            @endif
        </div>
        <div class="dropdown" id="dropdown-box">
            <button class="dropdown-btn">
                @if (auth()->user()->photo != NULL)
                <img src="{{ asset('storage/'.auth()->user()->photo) }}" class="logout-imag" alt="User-image"></button>
            @else
            <img src="{{ asset('storage/user _1.png')}} " class="logout-imag" alt="User-image"></button>
            @endif
            <div class="dropdown-content" id="dropdown">
                <a href="{{ route('account') }}">Account</a>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button id="log-out" class="logout-btn" type="submit">
                        logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <main>
        <aside></aside>
    </main>
</body>

</html>