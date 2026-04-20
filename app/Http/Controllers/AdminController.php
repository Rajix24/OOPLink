<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()  {
        $articles = Article::with('tag', 'category', 'user', 'link', 'images')->take(4)->get();
        return view('admin.index', compact('articles'));
    }
}
