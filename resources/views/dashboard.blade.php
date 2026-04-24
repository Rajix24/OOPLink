@extends('layout.dashboard-layout')
@section('dashboard-links')
<link rel="stylesheet" href="{{ asset('storage/css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('storage/css/main.css') }}">
@section('title')
<title>dashboard</title>
@endsection
@endsection
@section('dashboard-action')
    @if(session('success'))
    <div class="alert alert-success message">
        <p>{{ session('success') }}</p>
    </div>
    @endif
<div class="article-box">

    @if ($articles->isEmpty())
    <div class="no-articles">
        <div class="empty-icon">📰</div>
        <h2>No Articles Found</h2>
        <p>There are no articles available right now. Please check back later.</p>
    </div>
    @endif

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
                <p class="card-title">{{ $article->title }}</p>
            </h2>
            <div class="article-meta">
                @if ($article->user->photo != null)
                <img src="{{ asset('storage/'. $article->user->photo) }}" alt="user photo" class="avatar">
                @else
                <img src="{{ asset('storage/user _1.png') }}" alt="user photo" class="avatar">
                @endif
                <a href="{{ route('user-account', $article->user->id) }}" class="meta-author">{{ $article->user->name }}</a>
                <div class="meta-dot"></div>
                <span class="meta-date"> {{ $article->created_at }}</span>
                <div class="meta-dot"></div>
                <span class="meta-date">10 min read</span>
            </div>
            <div class="article-footer">
                <a href="{{ route("article.show", $article) }}" class="read-btn">Read article →</a>
            </div>

        </div>
    </div>
    @endforeach
</div>
@endsection