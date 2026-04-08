<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Models\Like;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('tag', 'category', 'user', 'link', 'images')->get();
        return view("article.show", compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('article.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {

        $article = Article::create([
            'user_id' => Auth::id(),
            "title" => $request->title,
            'introduction' => $request->introduction,
            'body' => $request->introduction,
            'conclusion' => $request->conclusion,
            'tag_id' => $request->tag_id,
        ]);
        // dd($request->link);
        foreach ($request->link as $link) {
            $article->link()->create([
                'name' => $link,
            ]);
        }
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->store('images', 'public');
                Image::create([
                    'article_id' => $article->id,
                    'image' => $path
                ]);
            }
        }
        $article->category()->sync($request->category_id);
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.showAll', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.edit', compact('article', "tags", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::with('tag', 'category', 'user', 'link', 'images')->find($id);
        $article->update([
            'user_id' => Auth::id(),
            "title" => $request->title,
            'introduction' => $request->introduction,
            'body' => $request->introduction,
            'conclusion' => $request->conclusion,
            'tag_id' => $request->tag_id,
        ]);
        $article->link()->delete();
        foreach ($article->link as $link) {
            $article->link()->create([
                'name' => $link
            ]);
        }
        if ($article->images) {
            foreach ($article->images as $image) {
                FacadesStorage::disk('public')->delete($image->image ?? '');
                $image->delete();
            }
        }
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->store('images', 'public');
                Image::create([
                    'article_id' => $article->id,
                    'image' => $path
                ]);
            }
        }
        $article->category()->sync($request->category_id);
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->images) {
            foreach ($article->images as $image) {
                FacadesStorage::disk('public')->delete($image->image ?? '');
                $image->delete();
            }
        }
        $article->link()->delete();
        $article->category()->detach();
        $article->delete();
        return redirect()->route('article.index');
    }

    public function likeHandler(Request $request)
    {
        $article = Article::find($request->input("article_id"));
        $user = Auth::user();
        $existingLike = $user->likes()->where('article_id', $article->id)->first();

        if ($existingLike != null) {
            if ($existingLike->like == $request->input('like')) {
                $existingLike->delete();
                return response()->json([
                    "data" =>  'has been deleted',
                ]);
            }
        } else {
            $data = Like::create([
                'article_id' => $article->id,
                'user_id' => $user->id,
                'like' => $request->input("like"),
            ]);
        }
        return response()->json(['status' => true, 'message' => 'has remove like']);
    }
}
