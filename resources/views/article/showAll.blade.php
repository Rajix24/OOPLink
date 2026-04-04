er<x-articles>
        <div class="col-md-4">
            <div class="card shadow-sm m-4">
                @if ($article->images != null)
                    @foreach ($article->images as $image)
                        <img src="{{ asset('storage/' . $image->image) }}" class="image-container" alt="article image" width="400px"
                            height="450px">
                    @endforeach
                @else
                    <h3>Images are not here</h3>
                @endif
                <div class="card-body">
                    <h5 class="card-title">title: {{ $article->title }}</h5>
                    <p class="card-text"> intro :
                        {{ $article->introduction }}
                    </p>
                    <p> body :
                        {{ $article->body }}
                    </p>
                    <p> consclusion :
                        {{ $article->conclusion }}
                    </p>
                    <span>categories</span>
                    @foreach ($article->category as $category)
                        <p class="btn btn-secondary">{{  $category->category }}</p>
                    @endforeach
                    <span>Tags</span>
                    <p class="btn btn-secondary">{{  $article->tag->tag }}</p>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-sm">Like</button>
                        <button class="btn btn-outline-secondary btn-sm">Comment</button>
                    </div>
                </div>
                <div class="actions d-flex flex-column gap-2">
                    <form action="{{  route('article.edit', $article) }}" method="GET">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-warning w-100" type="submit">Edit</button>
                    </form>
                    <form action="{{  route('article.destroy', $article) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger w-100" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>

    <a href="{{ route('article.create') }}">cerate article</a>
</x-articles>