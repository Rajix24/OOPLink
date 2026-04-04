<x-articles>
    @foreach ($articles as $article)
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="https://picsum.photos/400/200" class="card-img-top" alt="post image">

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
</x-articles>