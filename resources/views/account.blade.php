@extends('layout.dashboard-layout')
@section('dashboard-links')
<link rel="stylesheet" href="{{ asset('storage/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('storage/css/account.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('title')
<title>account</title>
@endsection

@section('dashboard-action')
<div class="box">
    <div class="user-information">
        <div class="user-box">
            <div class="user-image">
                <img src="" alt="user-image">
                <div class="user-info">
                    <h5>{{ $user->name }}</h5>
                    <p>{{ $user->email }}</p>
                    <form action="{{ route('account-edit') }}" method="get">
                        @csrf
                        <button class="btn btn-light" type="submit">edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="articles-account">
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
                <div class="tag-list">
                    @foreach ($article->category as $category)
                    <span class="tag">{{ $category->category }}</span>
                    @endforeach
                </div>
                <h2 class="article-title">
                    <a href="{{ route("article.show", $article) }}" class="card-title">{{ $article->title }}</a>
                </h2>
                <div class="article-meta">
                    <div class="avatar">SR</div>
                    <span class="meta-author">{{ $article->user->name }}</span>
                    <div class="meta-dot"></div>
                    <span class="meta-date"> {{ $article->created_at }}</span>
                    <div class="meta-dot"></div>
                    <span class="meta-date">10 min read</span>
                </div>
                <div class="article-footer">
                    <a href="{{ route("article.show", $article) }}" class="read-btn">Read article →</a>
                    <div class="edit-delete">
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
        </div>
        @endforeach
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