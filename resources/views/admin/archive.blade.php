@extends('layout.admin')

@section('dashboard-links')
<link rel="stylesheet" href="{{ asset('storage/css/admin.css') }}">
@endsection
@section('title')
<title>Admin Dasboard</title>
@endsection
@section('dashboard-action')
<div class="block-box">
    <div class="admin-Articles">
        <div class="admin-Articles-links">
            <h2>Users</h2>
            <a href="{{ route('archive') }}">blocked →</a>
        </div>
        <div class="admin-articles-container">
            @foreach ($users as $user)

            <div class="Admin-article ">
                <div class="admin-Article-info">
                    <div class="article-img-data">
                        <div class="">
                            @if ($user->photo == null)
                            <img width="80px" height="80px" src="{{ asset('storage/user _1.png') }}" alt="imag" class="admin-article-image">
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
                    <form action="{{ route('user.restore', $user) }}" method="POST">
                        @csrf
                        <button type="submit" class="restore">Restore</button>
                    </form>
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