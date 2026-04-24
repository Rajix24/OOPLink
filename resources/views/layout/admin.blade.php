<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('storage/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/layout.css') }}">
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
            <a href="{{ route("about") }}">About</a>
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
                <div class="categories">
                    <form class="admin-form" action="{{ route('categories.update', $category) }}" method="POST">
                        @CSRF
                        @method('PUT')
                        <div class="">
                            <input type="text" id="tagInput" name="category" class="input-admin"
                                value="{{ $category->category }}"
                                placeholder="Type a tag and press Enter">
                        </div>
                        <button type="submit">E</button>
                    </form>
                    <form action="{{ route('categories.destroy', $category) }}" method="post">
                        @csrf
                        @method("delete")
                        <button type="submit" class="remove "> X </button>
                    </form>
                </div>
                @endforeach
                <form action="{{ route('categories.store') }}" method="POST">
                    @CSRF
                    <div class="mb-3">
                        <input type="text" id="tagInput" name="category" aria-placeholder="create category" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-create w-100">Create Category</button>
                </form>
            </div>

            <div class="topic">
                <h5>Tags</h5>
                @foreach ($tags as $tag)
                <div class="categories">
                    <form class="admin-form" action="{{ route('tag.update', $tag) }}" method="POST">
                        @CSRF
                        @method('PUT')
                        <div class="">
                            <input type="text" id="tagInput" name="tag" class="form-control"
                                value="{{ $tag->tag }}"
                                placeholder="Type a tag and press Enter">
                        </div>
                        <button type="submit" class="btn btn-primary">E</button>
                    </form>
                    <form action="{{ route('tag.destroy', $tag) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="remove">X</button>
                    </form>
                </div>
                @endforeach
                <form action="{{ route('tag.store') }}" method="POST">
                    @CSRF
                    <div class="mb-3">
                        <input type="text" id="tagInput" name="tag" class="form-control"
                            placeholder="Type a tag and press Enter">
                    </div>
                    <button type="submit" class="btn btn-create w-100">Create Tag</button>
                </form>
            </div>
        </aside>
    </main>
    @yield('dashboard-script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('storage/js/layout.js') }}"></script>
</body>

</html>