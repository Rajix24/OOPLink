<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Image;
use Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $articles = Article::with('tag', 'category', 'user', 'category', 'link', 'image')->get();
        // $articles = Article::with('tag', 'category', 'user', 'link', 'category', 'comments', 'likes', 'image')->get();
        // return view("article.show", compact('articles'));
        return response()->json([
            'status' => true,
            'message' => "hi form your fill rouge",
            "data" => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        // dd($request->file('image'));
        // all the input are working
        // 'title' => "required|string",   
        //     'introduction' => ' required|string',
        //     'body' => 'required|string',
        //     "conclusion" => 'required|string',
        //     "category_id" => "required|array|min:1",
        //     'categories.*' => 'integer|exists:categories,id',
        //     'tag_id' =>"required",
        //     'tag.*' => 'integer|exits:tags,id',
        //     "link" => 'required',
        //     'image' => 'required'


        // change the user_id to Auth::id()
        $article = Article::create([
            'user_id' =>  3,
            "title" => $request->title,
            'introduction' => $request->introduction,
            'body' => $request->introduction,
            'conclusion' => $request->conclusion,
            'tag_id' => $request->tag_id,
        ]);
        if ($request->hasFile('image')) {
            foreach($request->file('image') as $file){
                $path = $file->store('images', 'public');
                Image::create([
                    'article_id'  => $article->id,
                    'image' => $path
                ]);
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
