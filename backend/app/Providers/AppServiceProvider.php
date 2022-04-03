<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Review\ReviewService;
use App\Services\Review\ReviewServiceInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReviewServiceInterface::class, ReviewService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
