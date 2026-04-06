<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function ShowComments($id)
    {
        // $article =  Article::with('comments.user')->find($id);
        // $comments = Comment::with('user')->find($id);
        // dd($post->user->id);
        return response()->json([
            'data' => Comment::where("article_id","=",$id)->with('user')->get()
        ]);
    }

    public function CreateComment(Request $request)
    {

        // if (!Auth::check()) {
        //     return response()->json([
        //         'status' => false,
        //         'error' => 'User not recognized. Are you logged in aaaaaauthhhhh?'
        //     ], 405);
        // }
        if ($request->input("content") == null) return back();
        Comment::create([
            'content' => $request->input('content'),
            'user_id' =>    1,//that need AUTH;
            'article_id' => $request->input("article_id")
        ]);
        return response()->json([
            'status' => true
        ]);
    }
}
