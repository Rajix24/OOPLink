@extends('layout.dashboard-layout')
@section('dashboard-links')
<link rel="stylesheet" href="{{ asset('storage/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('storage/css/show.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<div class="card-article">
    <div class="box-articel">
            <div class="image-contianer">
                @if ($article->images != null)
                @foreach ($article->images as $image)
                <img src="{{ asset('storage/' . $image->image) }}" class="image-show" alt="article image" width="400px"
                    height="450px">
                @endforeach
                @else
                <h3>Images are not here</h3>
                @endif
            </div>
            <div class="information">
                <div class="show-image">

                </div>
                <div class="name-show">
                    <p>Younes Rajix</p>
                    <p>public in </p>
                </div>
                <div class="follow">
                    @if (!Auth::user()->follow($article->user))
                    <form action="{{ route('follow', $article->user) }}" method="POST">
                        @csrf
                        <button class="follow-btn" type="submit" class="btn btn-primary">follow</button>
                    </form>
                    @else
                    <form id="unfollow-form" method="POST" action="{{ route('unfollow',$article->user) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">unfollow</button>
                    </form>
                    @endif
                </div>
            </div>
        <div class="card-body">
            <h5 class="card-title">title: {{ $article->title }}</h5>
            <p class="card-text"> intro :
                {{ $article->introduction }}
            </p>
            <p> body :
                {{ $article->body }}
            </p>
            <p> consclusion :
                {{ $article->conclusion }}
            </p>
            <span>categories</span>
            @foreach ($article->category as $category)
            <p class="btn btn-secondary">{{ $category->category }}</p>
            @endforeach
            <span>Tags</span>
            <p class="btn btn-secondary">{{ $article->tag->tag }}</p>
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary btn-sm">Like</button>
                <button class="btn btn-outline-secondary btn-sm">Comment</button>
            </div>
        </div>
        <div class="actions d-flex flex-column gap-2">
            <form action="{{  route('article.edit', $article) }}" method="GET">
                @csrf
                @method('PUT')
                <button class="btn btn-warning w-100" type="submit">Edit</button>
            </form>
            <form action="{{  route('article.destroy', $article) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger w-100" type="submit">Delete</button>
            </form>
        </div>
        <div class="likes">
            @if (Auth::user()->hasLiked($article->id))
            <i class="fa-solid fa-heart" id="like_{{ $article->id }}" style="color:red; font-size:30px;"></i>
            @else
            <i class="fa-regular fa-heart" id="like_{{ $article->id }}" style="color:red; font-size:30px;"></i>
            @endif
            <span class="like-counter" id="like-counter"></span>
        </div>
        <div id="box"></div>
        <form id="form-action" class="comment-input">
            @csrf
            <input class="comment" id="content" type="text" placeholder="comments....">
            <input type="hidden" id="article_id" value="{{ $article->id }}">
            <button class="btn" type="submit">comment</button>
        </form>
    </div>

    <a href="{{ route('article.create') }}">cerate article</a>
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
@section('dashboard-script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

    function fetchArticles() {
        axios.get('/comment/{{ $article->id }}').then(respense => {
            renderArticles(respense.data.data.comments || respense.data.data);
        });
    }
    fetchArticles();
    document.getElementById('form-action').addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = {
            content: document.getElementById("content").value,
            article_id: document.getElementById("article_id").value,
        }
        console.log(formData);
        axios.post("/comment", formData)
            .then(response => {
                console.log(formData);
                console.log("{{ Auth::id() }}")
                e.target.reset();
                fetchArticles();
            })
            .catch(error => {
                console.error("Error details:", error.response?.data || error.message);
            });
    });

    function renderArticles(articles) {
        let content = "";
        articles.forEach(article => {
            content += `
            <div style="border:1px solid #ddd; padding:10px; margin:10px 0;">
                <h4>comments: ${article.content}</h4>
                <p><strong>from:</strong> ${article.user.name || ""}</p>
            </div>`;
        });
        document.getElementById('box').innerHTML = content;
    }
    const like = document.getElementById("like_{{ $article->id }}")
    like.addEventListener("click", function(e) {
        e.preventDefault();
        like.classList.toggle("fa-solid");
        like.classList.toggle("fa-regular");
        const request = {
            article_id: '{{ $article->id }}',
            like: true,
        };
        axios.post("/register-like", request).then(response => {
            console.log(response.data);
            countLike();
        });

    });
    countLike();

    function countLike() {
        axios.get("http://localhost:8000/countLike/{{$article->id}}").then(response => {
            document.getElementById("like-counter").innerText = response.data.data
        });
    }
</script>
@endsection
<style>
    .like-counter {
        font-size: 20px;
    }
</style>box