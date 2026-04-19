@extends('layout.dashboard-layout')
@section('dashboard-links')
<link rel="stylesheet" href="{{ asset('storage/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('storage/css/show.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('title')
<title>Article {{ $article->user->name }}</title>
@endsection
@section('dashboard-action')
<div class="card-article">
    <div class="box-articel">
        <div class="image-contianer">
            <div class="slider-wrapper">
                <div class="slider" id="slider">
                    @if ($article->images != null)
                    @foreach ($article->images as $image)
                    <img src="{{ asset('storage/' . $image->image) }}" class="image-show" alt="article image" width="400px"
                        height="450px">
                    @endforeach
                    @else
                    <h3>Images are not here</h3>
                    @endif
                </div>
            </div>
            <button class="prev" onclick="prevSlide()">❮</button>
            <button class="next" onclick="nextSlide()">❯</button>
        </div>
        <div class="information">
            @if ($article->user->photo != null)
            <img class="show-image" src="{{ asset('storage/'. $article->user->photo) }}" alt="user-image">
            @else
            <img class="show-image" src="{{ asset('storage/user _1.png') }}" alt="photo is not exist">
            @endif
            <div class="name-show">
                <p>Younes Rajix</p>
                <p>public in {{ $article->created_at }} </p>
            </div>
            <div class="follow">
                @if (auth()->user() == $article->user)
                     <form action="{{  route('article.edit', $article) }}" method="GET">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-warning w-100" type="submit">Edit</button>
                    </form>
                @else
                @if (!Auth::user()->follow($article->user))
                <form action="{{ route('follow', $article->user) }}" method="POST">
                    @csrf
                    <button type="submit" class=" follow-btn ">follow</button>
                </form>
                @else
                <form id="unfollow-form" method="POST" action="{{ route('unfollow',$article->user) }}">
                    @csrf
                    <button type="submit" class="  unfollow-btn">unfollow</button>
                </form>
                @endif
                @endif
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">
                {{ $article->introduction }}
            </p>
            <p>
                {{ $article->body }}
            </p>
            <p>
                {{ $article->conclusion }}
            </p>
        </div>
        <div class="category-tag">
            <span>categories</span>
            <div class="category-box">
                @foreach ($article->category as $category)
                <p class="category ">{{ $category->category }}</p>
                @endforeach
            </div>
            <span>Tags</span>
            <div class="tags-box">
                <p class="tags">{{ $article->tag->tag }}</p>
            </div>
        </div>
        <div class="user-action">
            <div class="likes">
                @if (Auth::user()->hasLiked($article->id))
                <i class="fa-solid fa-heart" id="like_{{ $article->id }}" style="color:red; font-size:30px;"></i>
                @else
                <i class="fa-regular fa-heart" id="like_{{ $article->id }}" style="color:red; font-size:30px;"></i>
                @endif
                <span class="like-counter" id="like-counter"></span>
            </div>
            <form id="form-action" class="comment-input">
                @csrf
                <input class="comment" id="content" type="text" placeholder="comments....">
                <input type="hidden" id="article_id" value="{{ $article->id }}">
                <button class="btn-comment" type="submit">comment</button>
            </form>
        </div>
        <div id="box" class="comment-box"></div>
    </div>
</div>
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
        // console.log(formData);
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
            <div class="comment-show" style="  border-left: 3px solid var(--primary-color); padding-left: 1rem;">
                <h5>From:  ${article.user.name || ""}</h5>
                <p>comments: ${article.content}</p>
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
<script src="{{ asset('storage/js/articles.js') }}"></script>
@endsection
<style>
    .like-counter {
        font-size: 20px;
    }
</style>