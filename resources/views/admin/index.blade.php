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
            <span class="nubers-status">+ 1000</span>
            <span class="status-info">Total Articles</span>
        </div>
        <div class="status">
            <span class="nubers-status">+ 1000</span>
            <span class="status-info">Total Useers</span>
        </div>
        <div class="status">
            <span class="nubers-status">+ 100</span>
            <span class="status-info">Total Comments</span>
        </div>
        <div class="status">
            <span class="nubers-status">+ 100</span>
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
                            <h4> <a href="">{{ $article->title }}</a></h4>
                            <p>publush at: {{ $article->created_at }}</p>
                        </div>
                    </div>
                    <!-- <div class="Admin-article-information">
                        <span class="">
                            some information
                        </span>
                        <span class=" ">
                            some information
                        </span>
                    </div> -->
                </div>
                <div class="Admin-article-actions">
                    <a href="edit" class="action-link">Edit</a>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-link danger">Delete</button>
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
            <div class="Admin-article ">
                <div class="admin-Article-info">
                    <div class="article-img-data">
                        <div class="">
                            <img width="80px" height="80px" src="{{ asset('storage/user _1.png') }}" alt="imag">
                        </div>
                        <div class="admin-article-title">
                            <h4>title articel</h4>
                            <p>Created at</p>
                        </div>
                    </div>
                    <!-- <div class="Admin-article-information">
                            <span class="">
                                some information
                            </span>
                            <span class=" ">
                                some information
                            </span>
                        </div> -->
                </div>
                <div class="Admin-article-actions">
                    <a href="edit" class="action-link">Edit</a>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-link danger">Delete</button>
                    </form>
                </div>
            </div>
            <div class="Admin-article ">
                <div class="admin-Article-info">
                    <div class="article-img-data">
                        <div class="">
                            <img width="80px" height="80px" src="{{ asset('storage/user _1.png') }}" alt="imag">
                        </div>
                        <div class="admin-article-title">
                            <h4>title articel</h4>
                            <p>publush at</p>
                        </div>
                    </div>
                    <!-- <div class="Admin-article-information">
                            <span class="">
                                some information
                            </span>
                            <span class=" ">
                                some information
                            </span>
                        </div> -->
                </div>
                <div class="Admin-article-actions">
                    <a href="edit" class="action-link">Edit</a>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-link danger">Delete</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection