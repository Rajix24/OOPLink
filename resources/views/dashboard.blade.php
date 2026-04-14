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

<h1>wellcome {{ Auth::user()->name }}</h1>
@auth
<h1>user are auth {{ Auth::user()->id }}</h1>
@endauth



<a href="{{ route("article.index") }}" class="btn btn-primary"> see articles</a>
<a href="{{ route("categories.index") }}" class="btn btn-primary"> categories</a>
<a href="{{ route("tag.index") }}" class="btn btn-primary"> see tags</a>

@endsection