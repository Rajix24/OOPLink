<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', function(){
    return view('auth.login');
})->name('login');

Route::post('login', LoginController::class)->middleware('throttle:5,1')->name('login.attempt');
Route::view('dashboard', 'dashboard')->name('dashboard')->middleware('auth');

Route::view('register', 'auth.register')->name('register');
Route::post('register', RegisterController::class)->name('register.store');

Route::post('logout', function(): RedirectResponse{
    Auth::guard('web')->logout();
    Session::invalidate();
    Session::regenerateToken();
    return redirect('/');
})->name('logout');



Route::middleware("auth")->group(function () {
    Route::resource('tag', TagController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('article', ArticleController::class);
    Route::get('/comment/{id}', [CommentController::class, "ShowComments"]);
    Route::post('/comment', [CommentController::class, "CreateComment"])->name('comment');
    Route::get("/countLike/{id}", function ($id){
        $article = Article::find($id);
        return response()->json([
            "data" => $article->likes->count()
        ]) ;
    });
    Route::post('/register-like', [ArticleController::class , "likeHandler"]);
});