@extends('layout.dashboard-layout')
@section('dashboard-links')
<link rel="stylesheet" href="{{ asset('storage/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('storage/css/auth.css') }}">
@section('title')
<title>dashboard</title>
@endsection
@endsection
@section('dashboard-action')
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
            <!-- Tags -->
            <div class="tag-list">
                @foreach ($article->category as $category)
                <span class="tag">{{ $category->category }}</span> 
                @endforeach
            </div>
            <!-- Title -->
            <h2 class="article-title">
                <p class="card-title">{{ $article->title }}</p>
            </h2>
            <!-- Author Meta -->
            <div class="article-meta">
                <img src="{{ asset('storage/'. $article->user->photo) }}" alt="user photo" class="avatar">
                <span class="meta-author">{{ $article->user->name }}</span>
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

@section('dashboard-script')
<script src="{{ asset('storage/js/layout.js') }}"></script>
@endsection
<!-- <a href="{{ route('article.create') }}" class="btn btn-primary">cerate article</a> -->

<!-- 
<a href="{{ route("article.index") }}" class="btn btn-primary"> see articles</a>
<a href="{{ route("categories.index") }}" class="btn btn-primary"> categories</a>
<a href="{{ route("tag.index") }}" class="btn btn-primary"> see tags</a> -->

@endsection