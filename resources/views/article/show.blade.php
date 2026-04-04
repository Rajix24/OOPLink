er<x-articles>
    @foreach ($articles as $article)
        <div class="col-md-4">
            <div class="card shadow-sm m-4">
                @if ($article->images != null)
                    @foreach ($article->images as $image)
                        <img src="{{ asset('storage/'.$image->image) }}" class="image-container" alt="article image" width="400px" height="450px">
                    @endforeach
                @else
                    <h3>Images are not here</h3>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">
                        {{ $article->introduction }}
                    </p>
                    <p>
                        {{ $article->body }}
                    </p>
                    <p>
                        {{ $article->conclusion }}
                    </p>
                    <button>{{  $article->tag->tag }}</button>
                    <button>{{  $article->user->name }}</button>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-sm">Like</button>
                        <button class="btn btn-outline-secondary btn-sm">Comment</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <a href="{{ route('article.create') }}">cerate article</a>
</x-articles>