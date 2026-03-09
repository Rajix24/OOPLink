<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $userInfo = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $userInfo['password'] = bcrypt($userInfo['password']);
        $user = User::create($userInfo);

        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
