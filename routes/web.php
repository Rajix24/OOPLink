<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRelationController;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    $articles = Article::with('tag', 'category', 'user', 'link', 'images')->take(4)->get();
    return view("welcome", compact('articles'));
})->name('/');

Route::get("user-account/{id}", [UserController::class, 'showAccount'])->name('user-account')->middleware("auth");
Route::get('about', function (){
    return view('about');
})->name('about');

Route::get('/content', function () {
    return  view('contact');
})->name('contact');

Route::middleware('auth', 'admin')->prefix('admin') ->group(function (){
    Route::get('/home', [AdminController::class, "index"])->name('home');
});

Route::middleware('auth')->group(function (){
    Route::get('account-edit', [AccountController::class, "show"])->name('account-edit');
    Route::put('account-update/{user}', [AccountController::class, "update"])->name('update-account');
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', LoginController::class)->middleware('throttle:5,1')->name('login.attempt');
Route::get('dashboard', [ArticleController::class, 'index'])->middleware('auth')->name('dashboard');
Route::view('register', 'auth.register')->name('register');
Route::post('register', RegisterController::class)->name('register.store');

Route::post('logout', function (): RedirectResponse {
    Auth::guard('web')->logout();
    Session::invalidate();
    Session::regenerateToken();
    return redirect('/');
})->name('logout');


Route::middleware("auth")->group(function () {
    Route::resource('tag', TagController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('article', ArticleController::class);
    Route::delete('delete/{user}', [UserController::class, 'destroy'])->name('delete.user');
    Route::get('/comment/{id}', [CommentController::class, "ShowComments"]);
    Route::post('/comment', [CommentController::class, "CreateComment"])->name('comment');
    Route::get("/countLike/{id}", function ($id) {
        $article = Article::find($id);
        return response()->json([
            "data" => $article->likes->count()
        ]);
    });
    Route::post('/register-like', [ArticleController::class, "likeHandler"]);

    Route::post('/follow/{user}', [UserRelationController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [UserRelationController::class, 'unfollow'])->name('unfollow');
});
