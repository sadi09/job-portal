<?php

namespace App\Providers;

use App\Helper\JwtToken;
use http\Env\Request;
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
        View::composer('*', function ($view) {
            $token = request()->cookie('token'); // Replace with your actual cookie name
            $user = $token ? JwtToken::VerifyToken($token) : null; // Implement your own decoding logic
            $view->with('currentUser', $user);
        });

    }
}
