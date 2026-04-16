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

<div class="article-box">
    @foreach ($articles as $article)
    <div class="article-card">
        <div class="article-img-wrap">
            @if ($article->images != null)
            @foreach ($article->images as $image)
            <img src="{{ asset('storage/' . $image->image) }}" class="image-container" alt="article image" width="400px"
                height="450px">
            @endforeach
            @else
            <h3>Images are not here</h3>
            @endif
            <span class="article-category">{{ $article->tag->tag }}</span>
        </div>
        <div class="article-body">
            <!-- Tags -->
            <div class="tag-list">
                @foreach ($article->category as $category)
                <span class="tag">{{ $category->category }}</span>
                @endforeach
            </div>
            <!-- Title -->
            <h2 class="article-title">
                <a href="{{ route("article.show", $article) }}" class="card-title">{{ $article->title }}</a>
            </h2>
            <!-- Author Meta -->
            <div class="article-meta">
                <div class="avatar">SR</div>
                <span class="meta-author">{{ $article->user->name }}</span>
                <div class="meta-dot"></div>
                <span class="meta-date"> {{ $article->created_at }}</span>
                <div class="meta-dot"></div>
                <span class="meta-date">10 min read</span>
            </div>
            <!-- Excerpt -->
            <p class="article-excerpt">
                {{ $article->introduction }}
            </p>
            <!-- Footer: Button + Stats -->
            <div class="article-footer">
                <a href="{{ route("article.show", $article) }}" class="read-btn">Read article →</a>
            </div>

        </div>
    </div>
    @endforeach
</div>
<aside>
    <div class="create-article">
        <a class="create-article-side-bar" href="{{ route('article.create') }}">Create Article</a>
    </div>
    <div class="topic">
        <h5>Recommended topics</h5>
        <div class="topic-link">
            <a href="">HTML</a>
        </div>
        <div class="topic-link">
            <a href="">HTML</a>
        </div>
        <div class="topic-link">
            <a href="">HTML</a>
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
<!-- <aside>
    <div class="topic">
        <h4>Topics:</h4>
        <div class="topic-link"><a href="">JS</a></div>
        <div class="topic-link"><a href="">Java</a></div>
        <div class="topic-link"><a href="">PHP</a></div>
        <div class="topic-link"><a href="">c++</a></div>
    </div>  
    <div class="follow-people">
        <div class="people">
            <div class="people-image"></div>
        </div>
    </div>
</aside> -->
<!-- example -->

<!-- <div class="container">
    @foreach ($articles as $article)
    <div class="col-md-4">
        <div class="card shadow-sm m-4">
            @if ($article->images != null)
            @foreach ($article->images as $image)
            <img src="{{ asset('storage/' . $image->image) }}" class="image-container" alt="article image" width="400px"
                height="450px">
            @endforeach
            @else
            <h3>Images are not here</h3>
            @endif
            <div class="card-body">
                <a href="{{ route("article.show", $article) }}" class="card-title">title: {{ $article->title }}</a>
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
        </div>
    </div>
    @endforeach
</div>

 -->


<!-- <a href="{{ route('article.create') }}" class="btn btn-primary">cerate article</a> -->

<!-- 
<a href="{{ route("article.index") }}" class="btn btn-primary"> see articles</a>
<a href="{{ route("categories.index") }}" class="btn btn-primary"> categories</a>
<a href="{{ route("tag.index") }}" class="btn btn-primary"> see tags</a> -->

@endsection