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
    <form action="{{ route('tag.update', $tag) }}" method="POST">
        @CSRF
        @method('PUT');
        <div class="mb-3">
            <label class="form-label">Enter Tag</label>
            <input type="text" id="tagInput" name="tag" class="form-control"
            @if ($condition == true)
                value = "{{ $tag->tag }}"
            @endif
            placeholder="Type a tag and press Enter">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>