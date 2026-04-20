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
            @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                <div class="error-handler">
                    <p>{{ $error }}</p>
                </div>
                    @endforeach
                </div>
                @endif
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
    @endsection