<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('storage/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/extra.css') }}">
    @yield('dashboard-links')
</head>

<body>
    <nav class="nav" id="nav">
        <div class="app-logo d-flex">
            <img src="{{ asset('storage/logo.png') }}" alt="logo" height="70px" width="auth">
            <a class="oop" href="{{ route('/') }}">OOPLink</a>
        </div>
        <div class="link-home" id="link-home">
            <a href="{{ route("dashboard") }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact</a>
            @if (auth()->user()->role_id == 1)
            <a href="{{ route('home') }}">Admin</a>
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
                <a href="{{ route('user-account', auth()->id()) }}">Account</a>
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
        @yield('dashboard-action')
    </main>
    @yield('dashboard-script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('storage/js/layout.js') }}"></script>
</body>

</html>