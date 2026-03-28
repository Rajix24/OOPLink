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
    <form action="{{ route('tag.store') }}" method="POST">
        @CSRF
        <div class="mb-3">
            <label class="form-label">Enter Tag</label>
            <input type="text" id="tagInput" name="tag" class="form-control" placeholder="Type a tag and press Enter">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>