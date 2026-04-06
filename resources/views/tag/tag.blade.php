<x-layout>
    @if ($data["status"] == false)
        <h1>some thing went wrong</h1>
    @endif
    @foreach ($data['data'] as $tag)
    <div class="d-flex gap-3 m-4">
        <p>{{ $tag->tag }} </p>
        <form action="{{ route('tag.destroy', $tag) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">del</button>
        </form>
        </div>
    @endforeach
    <a href="{{ route('tag.create') }}" class="btn btn-primary">Create</a>
</x-layout> 