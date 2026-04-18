<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function show()
    {
        $user = User::find(Auth::id());
        return view('account-edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        // dd($user);
        $validation = $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'tele'  => 'nullable|numeric',
        ]);
        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }
            $path = $request->file('photo')->store('images', 'public');
            $validation['photo'] = $path;
        }
        // dd($validation);

        $user->update($validation);
        return redirect()->route('account');
    }
}
