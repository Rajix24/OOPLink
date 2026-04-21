<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy(User $user){
        $user->delete();
        return back();
    }
    public function showAccount($id){
        $user = User::find($id);
        // if ($user) {
        //     return back()->with("user", "user not exitst");
        // }
        $articles = Article::with('tag', 'category', 'user', 'link', 'images')->where('user_id', $user->id)->get();
        return view('account', compact('articles', 'user'));
    }
}
