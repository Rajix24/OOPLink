<x-layout>
    <h3>to create</h3>

    <form action="{{ route('categories.store') }}" method="POST">
        @CSRF
        <div class="mb-3">
            <label class="form-label">Enter category</label>
            <input type="text" id="tagInput" name="category" class="form-control"
            placeholder="Type a tag and press Enter">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>