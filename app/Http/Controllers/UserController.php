<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy(User $user){
        if ($user->trashed()) {
            $user->forceDelete();
            return back();
        }
        $user->delete();
        return back();
    }
    public function showAccount($id){
        $user = User::find($id);
        $articles = Article::with('tag', 'category', 'user', 'link', 'images')->where('user_id', $user->id)->get();
        return view('account', compact('articles', 'user'));
    }

}
