<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Models\Tag;
use Auth;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
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
            'user_id' => 1,
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
            'user_id' => 1,
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
                Storage::disk('public')->delete($image->image ?? '');
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
                Storage::disk('public')->delete($image->image ?? '');
                $image->delete();
            }
        }
        $article->link()->delete();
        $article->category()->detach();
        $article->delete();
        return redirect()->route('article.index');
    }
}
