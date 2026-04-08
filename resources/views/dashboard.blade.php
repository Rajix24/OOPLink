<x-layout>
<h1>wellcome {{ Auth::user()->name }}</h1>
@auth
<h1>user are auth {{ Auth::user()->id }}</h1>
@endauth
<form method="post" action="{{ route('logout') }}">
    @csrf
    <button class="btn btn-danger" type="submit">logout</button>
</form>



<a href="{{ route("article.index") }}" class="btn btn-primary"> see articles</a>
<a href="{{ route("categories.index") }}" class="btn btn-primary"> categories</a>
<a href="{{ route("tag.index") }}" class="btn btn-primary"> see tags</a>
</x-layout>