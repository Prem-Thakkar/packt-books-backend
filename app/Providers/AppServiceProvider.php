<?php

namespace App\Providers;

use App\Services\BookService;
use App\Services\Interfaces\BookServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(BookServiceInterface::class, function () {
            return new BookService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
