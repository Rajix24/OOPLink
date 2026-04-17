<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   @yield('title')
    @yield('dashboard-links')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('storage/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/layout.css') }}">
</head>


<body>
    <nav class="nav">
        <div class="app-logo d-flex">
            <img src="{{ asset('storage/logo.png') }}" alt="logo" height="70px" width="auth">
            <a class="oop" href="{{ route('dashboard') }}">OOPLink</a>
        </div>
        <div class="links">
            <div class="link-home">
                <a href="{{ route("dashboard") }}">Home</a>
                <a href="">About</a>
                <a href="">Contact</a>
            </div>
            <div class="actions">
                <div class="dropdown">
                    <button class="dropdown-btn"><img src="{{ asset('storage/user _1.png') }}" class="logout-imag" width="40px" height="auto" alt=""></button>
                    <div class="dropdown-content">
                        <a href="{{ route('account') }}">Account</a>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-danger logout" type="submit">
                                logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="main">
        @yield('dashboard-action')
    </main>
    @yield('dashboard-script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>