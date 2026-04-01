<x-layout>
    <h2>hi ti categories</h2>

    <div class="d-flex gap-3 ">
    @foreach ($categories as $category)
        <form action="{{ route('categories.destroy', $category) }}" method="post">
            @csrf
            @method("delete")
                {{ $category->category }}
                <button class="btn btn-danger"> X </button>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">E</a>
            </form>
            @endforeach
        </div>
    <a class="btn btn-primary" href="{{ route("categories.create") }}">create</a>
</x-layout>