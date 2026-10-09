<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {

            $favoritesCount = 0;

            if (Auth::check() && Auth::user()->role !== 'admin') {
                $favoritesCount = Auth::user()
                    ->favorites()
                    ->count();
            }

            $view->with('favoritesCount', $favoritesCount);
        });
    }
}

