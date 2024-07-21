<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Question;
use App\Models\User;
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
        $getCategories = Category::all();

        $highestPoints = User::orderBy('point', 'desc')->take(5)->get();

        $recentQuestions = Question::orderBy('created_at', 'desc')->take(5)->get();

        view()->share(['getCategories'=> $getCategories, 'highestPoints'=> $highestPoints, 'recentQuestions'=> $recentQuestions]);
    }
}
