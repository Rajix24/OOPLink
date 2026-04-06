<x-articles>
    <div class="container">
        @foreach ($articles as $article)
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
                    <a href="{{ route("article.show", $article) }}" class="card-title">title: {{ $article->title }}</a>
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
                    <p class="btn btn-secondary">{{ $category->category }}</p>
                    @endforeach
                    <span>Tags</span>
                    <p class="btn btn-secondary">{{ $article->tag->tag }}</p>
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
            <div id="box"></div>
            </div>
            <form id="form-action" class="comment-input">
                @csrf
                <input class="comment" id="content" type="text" placeholder="comments....">
                <input type="hidden" id="article" value="{{ $article->id }}">
                <button class="btn" type="submit">comment</button>
            </form>
        </div>
        @endforeach
    </div>
    <a href="{{ route('article.create') }}" class="btn btn-primary">cerate article</a>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

        function fetchArticles() {
            axios.get('/show/{{ $post->id }}').then(respense => {
                renderArticles(respense.data.data.comments || respense.data.data);
            });
        }
        fetchArticles();
        document.getElementById('form-action').addEventListener("submit", (e) => {
            e.preventDefault();
            const formData = {
                content: document.getElementById("content").value,
                post_id: document.getElementById("post_id").value
            }
            axios.post("/comment", formData)
                .then(response => {
                    console.log("{{ Auth::id() }}")
                    e.target.reset();
                    fetchArticles(); 
                })
                .catch(error => {
                    console.error("Error details:", error.response?.data || error.message);
                });
        });

        function renderArticles(articles) {
            let content = "";
            articles.forEach(article => {
                content += `
            <div style="border:1px solid #ddd; padding:10px; margin:10px 0;">
                <h4>comments: ${article.content}</h4>
                <p><strong>from:</strong> ${article.user.name || ""}</p>
            </div>`;
            });
            document.getElementById('box').innerHTML = content;
        }
    </script>
</x-articles>
