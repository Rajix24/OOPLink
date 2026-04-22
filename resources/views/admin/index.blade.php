@extends('layout.admin')

@section('dashboard-links')
<link rel="stylesheet" href="{{ asset('storage/css/admin.css') }}">
@endsection
@section('title')
<title>Admin Dasboard</title>
@endsection
@section('dashboard-action')
<div class="admin-container">
    <div class="statis-bar">
        <div class="status">
            <span class="nubers-status">+ {{ count($articles) }}</span>
            <span class="status-info">Total Articles</span>
        </div>
        <div class="status">
            <span class="nubers-status">+ {{ count($users) }}</span>
            <span class="status-info">Total Useers</span>
        </div>
        <div class="status">
            <span class="nubers-status">+ {{ $comments }}</span>
            <span class="status-info">Total Comments</span>
        </div>
        <div class="status">
            <span class="nubers-status">+ {{ $likes }}</span>
            <span class="status-info">Total likes</span>
        </div>
    </div>

    <div class="admin-Articles">
        <div class="admin-Articles-links">
            <h2>Articles</h2>
            <a href="">View all →</a>
        </div>
        <div class="admin-articles-container">
            @foreach($articles as $article)
            <div class="Admin-article ">
                <div class="admin-Article-info">
                    <div class="article-img-data">
                        <div class="">
                            @if ($article->images[0]->image == null)
                            <img width="80px" height="80px" src="{{ asset('storage/user _1.png') }}" alt="imag" class="admin-article-image">
                            @else
                            <img width="80px" height="80px" src="{{ asset('storage/'. $article->images[0]->image) }}" alt="imag" class="admin-article-image">
                            @endif
                        </div>
                        <div class="admin-article-title">
                            <h4> <a href="{{ route('article.show', $article) }}">{{ $article->title }}</a></h4>
                            <p>publush at: {{ $article->created_at }}</p>
                            <p class="admin-user-owner"><a href="{{ route('home', $article->user->id) }}"></a> Owner: {{ $article->user->name }}</p>
                        </div>
                    </div>
                    <div class="Admin-article-information">
                        <span class="">
                           Likes {{$article->likes()->count()}}
                        </span>
                        <span class="">
                            Comments : {{ $article->comments()->count() }}
                        </span>
                    </div>
                </div>
                <div class="Admin-article-actions">
                    <a href="{{ route('article.edit', $article) }}" class="action-link">Edit</a>
                    <form action="{{ route('article.destroy', $article) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-link danger">Block</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    <div class="admin-Articles">
        <div class="admin-Articles-links">
            <h2>Users</h2>
            <a href="">View all →</a>
        </div>
        <div class="admin-articles-container">
            @foreach ($users as $user)
            
            <div class="Admin-article ">
                <div class="admin-Article-info">
                    <div class="article-img-data">
                        <div class="">
                            @if ($user->photo == null)
                            <img width="80px" height="80px" src="{{ asset('storage/logo.png') }}" alt="imag" class="admin-article-image">
                            @else
                            <img width="80px" height="80px" src="{{ asset('storage/'. $user->photo) }}" alt="imag" class="admin-article-image">
                            @endif
                        </div>
                        <div class="admin-article-title">
                            <h4><a href="{{ route('user-account', $user->id) }}">{{ $user->name }}</a></h4>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="Admin-article-information">
                        <span class="">
                                Followers: {{ $user->follower()->count() }}
                            </span>
                            <span class=" ">
                                Following: {{ $user->following()->count() }}
                            </span>
                        </div>
                </div>
                <div class="Admin-article-actions">
                    <form action="{{ route('delete.user', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-link danger">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</div>
@endsection