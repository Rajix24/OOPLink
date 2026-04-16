    <!-- <div class="container">
        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Introduction</label>
                <textarea name="introduction" class="form-control" rows="3" placeholder="Short intro"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Body</label>
                <textarea name="body" class="form-control" rows="5" placeholder="Main content"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Conclusion</label>
                <textarea name="conclusion" class="form-control" rows="3" placeholder="Final thoughts"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" name="image[]" multiple accept="image/*" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Social Media Link</label>
                <span>GitHub</span><input type="url" name="link[]" class="form-control" placeholder="https://example.com">
                <span>Demo:</span><input type="url" name="link[]" class="form-control" placeholder="https://example.com">
            </div>

            <div class="form-label d-flex flex-column">
                @foreach($categories as $category)
                    <div class="catego">
                        <input type="checkbox" name="category_id[]" value="{{ $category->id }}">
                        <label>{{ $category->category }}</label>
                    </div>
                @endforeach
            </div>
             <label for="tag">Tag</label>
                <select class="form-select my-4" aria-label ="Default slect example" name="tag_id" id="tag">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"> {{ $tag->tag }}</option>
                @endforeach
                </select>

            <button type="submit" class="btn btn-primary w-100">Publish Article</button>
        </form>
    </div> -->
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
    <div class="create-article-card p-4" style="max-width: 750px; width:100%;">
        <h2 class="create-title mb-4 text-center">Create Article</h2>
        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label ">Title</label>
                <input type="text" name="title" class="form-control custom-input" placeholder="Enter title">
            </div>
            <!-- Introduction -->
            <div class="mb-3">
                <label class="form-label">Introduction</label>
                <textarea name="introduction" class="form-control custom-input" rows="3"></textarea>
            </div>
            <!-- Body -->
            <div class="mb-3">
                <label class="form-label">Body</label>
                <textarea name="body" class="form-control custom-input" rows="5"></textarea>
            </div>
            <!-- Conclusion -->
            <div class="mb-3">
                <label class="form-label">Conclusion</label>
                <textarea name="conclusion" class="form-control custom-input" rows="3"></textarea>
            </div>
            <!-- Image -->
            <div class="mb-3">
                <label class="form-label ">Upload Image</label>
                <input type="file" name="image[]" multiple class=" upload-files">
            </div>
            <div class="mb-3">
                <label class="form-label">Links</label>
                <div class="d-flex gap-2">
                    <input type="url" name="link[]" class="form-control custom-input" placeholder="GitHub">
                    <input type="url" name="link[]" class="form-control custom-input" placeholder="Demo">
                </div>
            </div>
            <!-- Categories -->
            <div class="mb-3">
                <label class="form-label">Categories</label>
                <div class="tag-list">
                    @foreach($categories as $category)
                    <div class="catego">
                        <input type="checkbox" class="check-box-input" name="category_id[]" value="{{ $category->id }}">
                        <label>{{ $category->category }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Tag -->
            <div class="mb-4">
                <label class="form-label">Tag</label>
                <select class="form-control custom-input" name="tag_id">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class=" submit-article-create w-100">Publish Article</button>

        </form>
    </div>
</div>
<aside>
    <div class="create-article">
        <a class="create-article-side-bar" href="{{ route('article.create') }}">Create Article</a>
    </div>
    <div class="topic">
        <h5>Recommended topics</h5>
        <div class="topic-link">
            <a href="">Ai chnge the world</a>
        </div>
        <div class="topic-link">
            <a href="">Are Ai can make you better programmer</a>
        </div>
        <div class="topic-link">
            <a href="">php is death</a>
        </div>
    </div>
    <div class="categories">
        <h5>Categories</h5>

        <div class="topic-link"><a href="">ai</a></div>
        <div class="topic-link"><a href="">ai</a></div>
        <div class="topic-link"><a href="">ai</a></div>
        <div class="topic-link"><a href="">ai</a></div>
    </div>
    <div class="follow-people">
        <div class="pepole-image"></div>
        <h4>Younes Rajix</h4>


    </div>
</aside>
@endsection