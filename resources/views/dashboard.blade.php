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
</x-layout>