@extends('layout.dashboard-layout')
@section('dashboard-links')
<link rel="stylesheet" href="{{ asset('storage/css/main.css') }}">

@endsection

@section('dashboard-btn')
<form method="post" action="{{ route('logout') }}">
    @csrf
    <button class=" logout" type="submit">
    <img src="{{ asset('storage/logout.png') }}" class="logout-imag" width="40px" height="auto" alt="">    
    </button>
</form>
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