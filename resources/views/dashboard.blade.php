<x-layout>
<h1>wellcome {{ Auth::user()->name }}</h1>
<form method="post" action="{{ route('logout') }}">
    @csrf
    <button class="btn btn-danger" type="submit">logout</button>
</form>
</x-layout>