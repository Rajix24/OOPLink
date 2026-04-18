    @extends('layout.dashboard-layout')
    @section('dashboard-links')
    <link rel="stylesheet" href="{{ asset('storage/css/main.css') }}">

    @endsection

    @section('dashboard-btn')
    <div class="dropdown">
        <button class="dropdown-btn"><img src="{{ asset('storage/user _1.png') }}" class="logout-imag" width="40px" height="auto" alt=""></button>
        <div class="dropdown-content">
            <a href="#">Account</a>
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger logout" type="submit">
                    logout
                </button>
            </form>
        </div>
    </div>
    @endsection
    @section('dashboard-action')
    <div class="big">
        <div class="create-box py-5 d-flex justify-content-center create-cont">
            <div class="create-article-card p-4" style="max-width: 750px; width:100%;">
                <h2 class="create-title mb-4 text-center">Edit Profile</h2>
                <form action="{{ route('update-account', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label ">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control custom-input" placeholder="Enter Name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">email</label>
                        <input name="email" type="email" value="{{ $user->email }}" class="form-control custom-input" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label ">Upload photo profile</label>
                        <input type="file" name="photo" class="upload-files">
                    </div>
                    <div class="mb-3">
                        <label class="form-label ">Tele:</label>
                        <input type="number" value="{{ $user->tele }}" name="tele" placeholder="Enter tele" class="p-2 upload-files">
                    </div>
                    <button type="submit" class=" submit-article-create w-100">Publish Article</button>
                </form>
            </div>
        </div>
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
        <div class="categories">
            <h5>Categories</h5>

            <div class="topic-link"><a href="">ai</a></div>
            <div class="topic-link"><a href="">ai</a></div>
            <div class="topic-link"><a href="">ai</a></div>
            <div class="topic-link"><a href="">ai</a></div>
        </div>
        <div class="follow-people">
            <div class="pepole-image"></div>
            <h4>Younes Rajix</h4>


        </div>
    </aside>
    @endsection