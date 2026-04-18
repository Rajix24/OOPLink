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
    <div class="big">
        <div class="create-box py-5 d-flex justify-content-center create-cont">
            <div class="create-article-card p-4" style="max-width: 750px; width:100%;">
                <h2 class="create-title mb-4 text-center">Edit Article</h2>
                <form action="{{ route('article.update',$article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" value="{{ $article->title }}" name="title" class="form-control custom-input" placeholder="Enter title" required>
                    </div>

                    <!-- Introduction -->
                    <div class="mb-3">
                        <label class="form-label">Introduction</label>
                        <textarea name="introduction" class="form-control" rows="3" placeholder="Short intro">{{ $article->introduction }}</textarea>
                    </div>

                    <!-- Body -->
                    <div class="mb-3">
                        <label class="form-label">Body</label>
                        <textarea name="body" class="form-control custom-input" rows="5" placeholder="Main content">value="{{ $article->body }}"</textarea>
                    </div>

                    <!-- Conclusion -->
                    <div class="mb-3">
                        <label class="form-label">Conclusion</label>
                        <textarea name="conclusion" class="form-control custom-input" rows="3" placeholder="Final thoughts">value="{{ $article->conclusion }}"</textarea>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="image[]" multiple accept="image/*" class="form-control">
                    </div>

                    <!-- Social Media Link -->
                    <div class="mb-3">
                        <label class="form-label">Social Media Link</label>
                        <span>GitHub</span><input type="url" name="link[]" class="form-control custom-input" placeholder="https://example.com">
                        <span>Demo:</span><input type="url" name="link[]" class="form-control custom-input" placeholder="https://example.com">
                    </div>

                    <!-- Tag / Category -->
                    <div class="form-label d-flex flex-column">
                        @foreach($categories as $category)
                        <div class="catego">
                            <input type="checkbox" name="category_id[]" class="check-box-inputx" value="{{ $category->id }}">
                            <label>{{ $category->category }}</label>
                        </div>
                        @endforeach
                    </div>
                    <!-- Tag  -->
                    <label for="tag">Tag</label>
                    <select class="form-select my-4 custom-input" aria-label="Default slect example" name="tag_id" id="tag">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"> {{ $tag->tag }}</option>
                        @endforeach
                    </select>

                    <!-- Submit -->
                    <button type="submit" class="submit-article-create w-100">Publish Article</button>
                </form>
            </div>
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