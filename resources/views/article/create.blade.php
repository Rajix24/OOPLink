<x-articles>
    <div class="container">
        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title -->
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title" required>
            </div>

            <!-- Introduction -->
            <div class="mb-3">
                <label class="form-label">Introduction</label>
                <textarea name="introduction" class="form-control" rows="3" placeholder="Short intro"></textarea>
            </div>

            <!-- Body -->
            <div class="mb-3">
                <label class="form-label">Body</label>
                <textarea name="body" class="form-control" rows="5" placeholder="Main content"></textarea>
            </div>

            <!-- Conclusion -->
            <div class="mb-3">
                <label class="form-label">Conclusion</label>
                <textarea name="conclusion" class="form-control" rows="3" placeholder="Final thoughts"></textarea>
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" name="image[]" multiple accept="image/*" class="form-control">
            </div>

            <!-- Social Media Link -->
            <div class="mb-3">
                <label class="form-label">Social Media Link</label>
                <span>GitHub</span><input type="url" name="link[]" class="form-control" placeholder="https://example.com">
                <span>Demo:</span><input type="url" name="link[]" class="form-control" placeholder="https://example.com">
            </div>

            <!-- Tag / Category -->
            <div class="form-label d-flex flex-column">
                @foreach($categories as $category)
                    <div class="catego">
                        <input type="checkbox" name="category_id[]" value="{{ $category->id }}">
                        <label>{{ $category->category }}</label>
                    </div>
                @endforeach
            </div>
            <!-- Tag  -->
             <label for="tag">Tag</label>
                <select class="form-select my-4" aria-label ="Default slect example" name="tag_id" id="tag">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"> {{ $tag->tag }}</option>
                @endforeach
                </select>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary w-100">Publish Article</button>
        </form>
    </div>
</x-articles>