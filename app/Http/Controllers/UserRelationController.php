<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRelationController extends Controller
{
    public function follow(User $user)
    {
        $follower = auth()->user();
        $follower->following()->attach($user->id);
        return back()->with("you followed");
    }
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        $follower->following()->detach($user->id);
        return back()->with("you followed");
    }
}
