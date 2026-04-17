<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function show(){
        $user = User::find(Auth::id());
        return view('Account-edit', compact('user'));
    }
    public function update(){
        
    }
}
