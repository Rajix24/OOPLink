<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['layout.dashboard-layout','layout.admin'], function ($view) {
            $users = User::where('id', '!=', auth()->id())->latest()->take(3)->get();
            $categories = Category::latest()->get();
            $tags = Tag::all();
            $view->with(
                [
                'users' => $users,
                'categories' => $categories,
                'tags' =>$tags,
                ]
            );
        });
    }
}
