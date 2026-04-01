<x-layout>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @CSRF
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Edit category</label>
            <input type="text" id="tagInput" name="category" class="form-control"
                value = "{{ $category->category }}"
            placeholder="Type a tag and press Enter">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>