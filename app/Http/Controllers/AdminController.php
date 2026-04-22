<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $articles = Article::with('tag', 'category', 'user', 'link', 'images')->get();
        $likes = Like::count();
        $users = User::all();
        $comments = Comment::count();
        return view('admin.index', compact('articles', 'users', 'likes', 'comments'));
    }
    public function archive()
    {
        $users = User::onlyTrashed()->get();
        return view("admin.archive", compact($users));
    }
}
