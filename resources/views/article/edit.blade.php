    @extends('layout.dashboard-layout')
    @section('dashboard-links')
    <link rel="stylesheet" href="{{ asset('storage/css/main.css') }}">

    @endsection

    @section('dashboard-btn')
    <div class="dropdown">
        <button class="dropdown-btn"><img src="{{ asset('storage/user _1.png') }}" class="logout-imag" width="40px" height="auto" alt=""></button>
        <div class="dropdown-content">
            <a href="#">Account</a>
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger logout" type="submit">
                    logout
                </button>
            </form>
        </div>
    </div>
    @endsection
    @section('dashboard-action')
    <div class="create-box py-5 d-flex justify-content-center create-cont">
        <div class="create-article-card p-4" >
            @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                <div class="error-handler">
                    <p>{{ $error }}</p>
                </div>
                @endforeach
            </div>
            @endif
            <h2 class="create-title mb-4 text-center">Edit Article</h2>
            <form action="{{ route('article.update',$article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" value="{{ $article->title }}" name="title" class="form-control custom-input" placeholder="Enter title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Introduction</label>
                    <textarea name="introduction" class="form-control text-input" rows="3" placeholder="Short intro">{{ $article->introduction }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Body</label>
                    <textarea name="body" class="form-control custom-input text-input" rows="5" placeholder="Main content">value="{{ $article->body }}"</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Conclusion</label>
                    <textarea name="conclusion" class="form-control custom-input text-input" rows="3" placeholder="Final thoughts">value="{{ $article->conclusion }}"</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image[]" multiple accept="image/*" class="upload-files">
                </div>

                <div class="mb-3">
                    <label class="form-label">Social Media Link</label>
                    <span>GitHub</span><input type="url" name="link[]" class="form-control custom-input" placeholder="https://example.com">
                    <span>Demo:</span><input type="url" name="link[]" class="form-control custom-input" placeholder="https://example.com">
                </div>

                <div class="form-label d-flex flex-column gap-2">
                    <label for="categories">Categories</label>
                    @foreach($categories as $category)
                    <div class="catego">
                        <input type="checkbox" name="category_id[]" class="check-box-inputx" value="{{ $category->id }}">
                        <label>{{ $category->category }}</label>
                    </div>
                    @endforeach
                </div>
                <label for="tag">Tag</label>
                <select class="form-select my-4 custom-input" aria-label="Default slect example" name="tag_id" id="tag">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"> {{ $tag->tag }}</option>
                    @endforeach
                </select>

                <button type="submit" class="submit-article-create w-100">Publish Article</button>
            </form>
        </div>
    </div>
    @endsection