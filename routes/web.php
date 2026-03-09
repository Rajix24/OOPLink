<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', function(){
    return view('auth.login');
})->name('login');

Route::post('login', LoginController::class)
->middleware('throttle:5,1')
->name('login.attempt');
Route::view('dashboard', 'dashboard')->name('dashboard')->middleware('auth');
Route::post('logout', function(): RedirectResponse{
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');
})->name('logout');

Route::view('register', 'auth.register')->name('register');
Route::post('register', RegisterController::class)->name('register.store');