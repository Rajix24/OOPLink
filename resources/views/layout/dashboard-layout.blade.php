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
    <nav class="nav" id="nav">
        <div class="app-logo d-flex">
            <img src="{{ asset('storage/logo.png') }}" alt="logo" height="70px" width="auth">
            <a class="oop" href="{{ route('dashboard') }}">OOPLink</a>
        </div>
        <div class="link-home" id="link-home">
            <a href="{{ route("dashboard") }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="">Contact</a>
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

    <main class="main">
        <div class="big">
            @yield('dashboard-action')
        </div>
        <aside>
            <div class="create-article">
                <a class="create-article-side-bar" href="{{ route('article.create') }}">Create Article</a>
            </div>
            <div class="topic">
                <h5>Recommended topics</h5>
                <div class="topic-link">
                    <a href="">Ai chnge the world</a>
                </div>
                <div class="topic-link">
                    <a href="">Are Ai can make you better programmer</a>
                </div>
                <div class="topic-link">
                    <a href="">php is death</a>
                </div>
            </div>
            <div class="topic">
                <h5>Categories</h5>
                @foreach ($categories as $category)
                <div class="topic-link"><a href="">{{ $category->category }}</a></div>
                @endforeach
            </div>
            <div class="topic">
                <h5>Tags</h5>
                @foreach ($tags as $tag)
                <div class="topic-link"><a href="">{{ $tag->tag }}</a></div>
                @endforeach
            </div>

            <div class="topic">
                @foreach ($users as $user)
                <div class="topic-link d-flex gap-4 ">
                    @if ($user->photo == null)
                    <img src="{{ asset('storage/user _1.png') }}" alt="user-img" width="40px" height="40px">
                    @else
                    <img src="{{ asset('storage/'.$user->photo) }}" class="photo-aside" alt="user-img" width="60px" height="60px">
                    @endif
                    <div class="aside-user-information">
                        <p class="aside-name"><a href="#">{{ $user->name }}</a></p>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="follow">
                        @if (!Auth::user()->follow($user))
                        <form action="{{ route('follow', $user) }}" method="POST">
                            @csrf
                            <button type="submit" class=" follow-btn ">follow</button>
                        </form>
                        @else
                        <form id="unfollow-form" method="POST" action="{{ route('unfollow',$user) }}">
                            @csrf
                            <button type="submit" class="  unfollow-btn">unfollow</button>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>
        </aside>
    </main>
    @yield('dashboard-script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('storage/js/') }}"></script>
</body>

</html>